<?php
session_start();
include '../include/connect.php';

function getTodaysQuiz() {
    global $connect;
    $today = date('Y-m-d');
    $stmt = $connect->prepare("SELECT * FROM quizzes WHERE creation_date = ? LIMIT 1");
    $stmt->bind_param("s", $today);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function hasAttemptedTodaysQuiz($userId, $quizId) {
    global $connect;
    $stmt = $connect->prepare("SELECT * FROM user_quiz_attempts WHERE user_id = ? AND quiz_id = ? AND DATE(start_time) = CURDATE()");
    $stmt->bind_param("ii", $userId, $quizId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

function getQuizDetails($quizId) {
    global $connect;
    $stmt = $connect->prepare("SELECT * FROM quizzes WHERE quiz_id = ?");
    $stmt->bind_param("i", $quizId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function getQuizQuestions($quizId) {
    global $connect;
    $stmt = $connect->prepare("SELECT * FROM questions WHERE quiz_id = ?");
    $stmt->bind_param("i", $quizId);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function startQuizAttempt($userId, $quizId) {
    global $connect;
    $stmt = $connect->prepare("INSERT INTO user_quiz_attempts (user_id, quiz_id, start_time) VALUES (?, ?, NOW())");
    $stmt->bind_param("ii", $userId, $quizId);
    if ($stmt->execute()) {
        $attemptId = $connect->insert_id;
        
        // Fetch the quiz duration
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

function submitQuiz($attemptId, $answers) {
    global $connect;
    
    $connect->begin_transaction();
    
    try {
        $stmt = $connect->prepare("UPDATE user_quiz_attempts SET end_time = NOW() WHERE attempt_id = ?");
        $stmt->bind_param("i", $attemptId);
        $stmt->execute();

        $stmt = $connect->prepare("INSERT INTO user_answers (attempt_id, question_id, user_answer) VALUES (?, ?, ?)");
        foreach ($answers as $questionId => $userAnswer) {
            $stmt->bind_param("iii", $attemptId, $questionId, $userAnswer);
            $stmt->execute();
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
        SELECT q.marks, q.correct_option, ua.user_answer 
        FROM user_answers ua 
        JOIN questions q ON ua.question_id = q.question_id 
        WHERE ua.attempt_id = ?
    ");
    $stmt->bind_param("i", $attemptId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($row['correct_option'] == $row['user_answer']) {
            $score += $row['marks'];
        }
    }

    $stmt = $connect->prepare("UPDATE user_quiz_attempts SET score = ? WHERE attempt_id = ?");
    $stmt->bind_param("di", $score, $attemptId);
    $stmt->execute();
}

// API endpoints
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'start_quiz':
                $userId = $_SESSION['userid'] ?? 0;
                $quizId = $_POST['quiz_id'] ?? 0;
                $result = startQuizAttempt($userId, $quizId);
                if ($result) {
                    echo json_encode($result);
                } else {
                    echo json_encode(['error' => 'Failed to start quiz']);
                }
                break;
            case 'submit_quiz':
                $attemptId = $_POST['attempt_id'] ?? 0;
                $answers = json_decode($_POST['answers'], true);
                $result = submitQuiz($attemptId, $answers);
                echo json_encode(['status' => $result ? 'success' : 'error']);
                break;
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'get_questions':
                $quizId = $_GET['quiz_id'] ?? 0;
                $questions = getQuizQuestions($quizId);
                echo json_encode($questions);
                break;
            case 'get_quiz_status':
                $userId = $_SESSION['userid'] ?? 0;
                $todaysQuiz = getTodaysQuiz();

                if (!$todaysQuiz) {
                    echo json_encode(['status' => 'no_quiz', 'message' => 'There is no quiz available for today.']);
                } elseif (hasAttemptedTodaysQuiz($userId, $todaysQuiz['quiz_id'])) {
                    echo json_encode(['status' => 'already_attempted', 'message' => 'You have already attempted today\'s quiz.']);
                } else {
                    echo json_encode([
                        'status' => 'available',
                        'quiz_id' => $todaysQuiz['quiz_id'],
                        'quiz_name' => $todaysQuiz['quiz_name'],
                        'duration_minutes' => $todaysQuiz['duration_minutes']
                    ]);
                }
                break;
        }
    }
}