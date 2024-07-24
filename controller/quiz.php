<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

session_start();
include '../include/connect.php';

function logError($message) {
    error_log(date('[Y-m-d H:i:s] ') . $message . "\n", 3, 'quiz_error.log');
}

function jsonResponse($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function getTodaysQuiz() {
    global $connect;
    $today = date('Y-m-d');
    $stmt = $connect->prepare("SELECT * FROM quizzes WHERE creation_date = ? LIMIT 1");
    $stmt->bind_param("s", $today);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getInProgressQuiz($userId) {
    global $connect;
    $stmt = $connect->prepare("
        SELECT uqa.attempt_id, uqa.quiz_id, q.duration_minutes, 
               TIMESTAMPDIFF(SECOND, uqa.start_time, NOW()) as elapsed_time
        FROM user_quiz_attempts uqa
        JOIN quizzes q ON uqa.quiz_id = q.quiz_id
        WHERE uqa.user_id = ? AND uqa.end_time IS NULL AND DATE(uqa.start_time) = CURDATE()
        ORDER BY uqa.start_time DESC
        LIMIT 1
    ");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function startQuizAttempt($userId, $quizId) {
    global $connect;
    $stmt = $connect->prepare("INSERT INTO user_quiz_attempts (user_id, quiz_id, start_time) VALUES (?, ?, NOW())");
    $stmt->bind_param("ii", $userId, $quizId);
    if ($stmt->execute()) {
        $attemptId = $connect->insert_id;
        
        $stmt = $connect->prepare("SELECT duration_minutes FROM quizzes WHERE quiz_id = ?");
        $stmt->bind_param("i", $quizId);
        $stmt->execute();
        $result = $stmt->get_result();
        $quiz = $result->fetch_assoc();
        
        return [
            'attempt_id' => $attemptId,
            'duration_minutes' => $quiz['duration_minutes']
        ];
    }
    return false;
}

function getQuizQuestions($quizId) {
    global $connect;
    $stmt = $connect->prepare("SELECT * FROM questions WHERE quiz_id = ?");
    $stmt->bind_param("i", $quizId);
    $stmt->execute();
    $questions = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    foreach ($questions as &$question) {
        if ($question['question_type'] === 'fill_blank') {
            $question['fill_blank_answers'] = getFillBlankAnswers($question['question_id']);
        }
    }
    
    return $questions;
}

function getFillBlankAnswers($questionId) {
    global $connect;
    $stmt = $connect->prepare("SELECT correct_answer FROM fill_blank_answers WHERE question_id = ?");
    $stmt->bind_param("i", $questionId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function submitQuiz($attemptId, $answers) {
    global $connect;
    
    $connect->begin_transaction();
    
    try {
        $stmt = $connect->prepare("UPDATE user_quiz_attempts SET end_time = NOW() WHERE attempt_id = ?");
        $stmt->bind_param("i", $attemptId);
        $stmt->execute();

        $stmtMultiple = $connect->prepare("INSERT INTO user_answers (attempt_id, question_id, user_answer) VALUES (?, ?, ?)");
        $stmtFillBlank = $connect->prepare("INSERT INTO user_answers (attempt_id, question_id, text_answer) VALUES (?, ?, ?)");
        
        foreach ($answers as $questionId => $userAnswer) {
            if (is_array($userAnswer)) { // Fill in the blank
                $stmtFillBlank->bind_param("iis", $attemptId, $questionId, $userAnswer['text']);
                $stmtFillBlank->execute();
            } else { // Multiple choice
                $stmtMultiple->bind_param("iii", $attemptId, $questionId, $userAnswer);
                $stmtMultiple->execute();
            }
        }

        calculateScore($attemptId);

        $connect->commit();
        return true;
    } catch (Exception $e) {
        $connect->rollback();
        return false;
    }
}

function calculateScore($attemptId) {
    global $connect;
    $score = 0;

    $stmt = $connect->prepare("
        SELECT q.question_id, q.marks, q.correct_option, q.question_type, ua.user_answer, ua.text_answer 
        FROM user_answers ua 
        JOIN questions q ON ua.question_id = q.question_id 
        WHERE ua.attempt_id = ?
    ");
    $stmt->bind_param("i", $attemptId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($row['question_type'] === 'multiple_choice') {
            if ($row['correct_option'] == $row['user_answer']) {
                $score += $row['marks'];
            }
        } else if ($row['question_type'] === 'fill_blank') {
            $fillBlankAnswers = getFillBlankAnswers($row['question_id']);
            foreach ($fillBlankAnswers as $answer) {
                if (strtolower(trim($row['text_answer'])) === strtolower(trim($answer['correct_answer']))) {
                    $score += $row['marks'];
                    break;
                }
            }
        }
    }

    $stmt = $connect->prepare("UPDATE user_quiz_attempts SET score = ? WHERE attempt_id = ?");
    $stmt->bind_param("di", $score, $attemptId);
    $stmt->execute();
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case 'start_quiz':
                    $userId = $_SESSION['userid'] ?? 0;
                    $quizId = $_POST['quiz_id'] ?? 0;
                    logError("Starting quiz for user $userId, quiz $quizId");
                    
                    $result = startQuizAttempt($userId, $quizId);
                    if ($result) {
                        jsonResponse($result);
                    } else {
                        logError("Failed to start quiz for user $userId, quiz $quizId");
                        jsonResponse(['error' => 'Failed to start quiz. Please try again later.']);
                    }
                    break;
                case 'submit_quiz':
                    $attemptId = $_POST['attempt_id'] ?? 0;
                    $answers = json_decode($_POST['answers'], true);
                    $result = submitQuiz($attemptId, $answers);
                    jsonResponse(['status' => $result ? 'success' : 'error']);
                    break;
            }
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'get_questions':
                    $quizId = $_GET['quiz_id'] ?? 0;
                    $questions = getQuizQuestions($quizId);
                    jsonResponse($questions);
                    break;
                case 'get_quiz_status':
                    $userId = $_SESSION['userid'] ?? 0;
                    logError("Checking quiz status for user $userId");
                    $todaysQuiz = getTodaysQuiz();
                    
                    if (!$todaysQuiz) {
                        jsonResponse(['status' => 'no_quiz', 'message' => 'There is no quiz available for today.']);
                    } else {
                        $inProgressQuiz = getInProgressQuiz($userId);
                        if ($inProgressQuiz) {
                            $remainingTime = ($inProgressQuiz['duration_minutes'] * 60) - $inProgressQuiz['elapsed_time'];
                            jsonResponse([
                                'status' => 'in_progress',
                                'attempt_id' => $inProgressQuiz['attempt_id'],
                                'quiz_id' => $inProgressQuiz['quiz_id'],
                                'remaining_time' => max(0, $remainingTime)
                            ]);
                        } else {
                            jsonResponse([
                                'status' => 'available',
                                'quiz_id' => $todaysQuiz['quiz_id'],
                                'quiz_name' => $todaysQuiz['quiz_name'],
                                'duration_minutes' => $todaysQuiz['duration_minutes']
                            ]);
                        }
                    }
                    break;
            }
        }
    }
} catch (Exception $e) {
    logError("Caught exception: " . $e->getMessage());
    jsonResponse(['error' => 'An unexpected error occurred. Please try again later.']);
}