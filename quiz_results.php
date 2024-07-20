<?php





?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Quiz Results</title>
    <?php 
    include "include/private_page.php";
    include "include/meta.php";
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    
    <meta name="robots" content="noindex">
    <style>
        .result__content-wrap {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .result__summary {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .result__question {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
        }
        .result__question-text {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .result__options label {
            display: block;
            margin-bottom: 5px;
        }
        .result__correct {
            color: #28a745;
        }
        .result__incorrect {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <?php include "include/header.php" ?>

    <!-- main-area -->
    <main class="main-area">
        <!-- breadcrumb-area -->
        <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-three" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="breadcrumb__shape-wrap">
                <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
                <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- dashboard-area -->
        <section class="dashboard__area section-pb-120">
            <div class="container">
                <?php include "user_dash/head.php" ?>
                <div class="row">
                    <div class="col-lg-3">
                        <?php include "user_dash/nav.php"; ?>
                    </div>
                    
                    <div class="col-lg-9">
                        <div class="dashboard__content-wrap dashboard__content-wrap-two">
                            <div class="dashboard__content-title">
                                <h4 class="title">Quiz Results</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="result__content-wrap">
                                        <?php
                                        $attemptId = $_GET['attempt_id'] ?? 0;
                                        // echo "Debug: Attempt ID = $attemptId<br>";

                                        if ($attemptId) {
                                            // Fetch attempt details
                                            $stmt = $connect->prepare("
                                                SELECT uqa.*, q.quiz_name, q.duration_minutes
                                                FROM user_quiz_attempts uqa
                                                JOIN quizzes q ON uqa.quiz_id = q.quiz_id
                                                WHERE uqa.attempt_id = ?
                                            ");
                                            $stmt->bind_param("i", $attemptId);
                                            $stmt->execute();
                                            $attemptResult = $stmt->get_result()->fetch_assoc();

                                            if ($attemptResult) {
                                                // echo "Debug: Attempt found.<br>";
                                                $totalQuestions = 0;
                                                $correctAnswers = 0;
                                                $totalMarks = 0;
                                                $earnedMarks = 0;

                                                // Fetch questions and answers
                                                $stmt = $connect->prepare("
                                                    SELECT q.*, ua.user_answer
                                                    FROM questions q
                                                    LEFT JOIN user_answers ua ON q.question_id = ua.question_id AND ua.attempt_id = ?
                                                    WHERE q.quiz_id = ?
                                                ");
                                                $stmt->bind_param("ii", $attemptId, $attemptResult['quiz_id']);
                                                $stmt->execute();
                                                $questions = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

                                                // echo "Debug: " . count($questions) . " questions fetched.<br>";

                                                // Calculate statistics
                                                foreach ($questions as $question) {
                                                    $totalQuestions++;
                                                    $totalMarks += $question['marks'];
                                                    if ($question['user_answer'] == $question['correct_option']) {
                                                        $correctAnswers++;
                                                        $earnedMarks += $question['marks'];
                                                    }
                                                }

                                                $accuracy = ($correctAnswers / $totalQuestions) * 100;
                                                $timeTaken = strtotime($attemptResult['end_time']) - strtotime($attemptResult['start_time']);
                                                
                                                // Display summary
                                                echo "<div class='result__summary'>";
                                                echo "<h5>{$attemptResult['quiz_name']}</h5>";
                                                echo "<p>Score: {$attemptResult['score']} / {$totalMarks}</p>";
                                                echo "<p>Accuracy: " . number_format($accuracy, 2) . "%</p>";
                                                echo "<p>Correct Answers: {$correctAnswers} / {$totalQuestions}</p>";
                                                echo "<p>Time Taken: " . gmdate("H:i:s", $timeTaken) . " / {$attemptResult['duration_minutes']} minutes</p>";
                                                echo "</div>";

                                                // Display questions and answers
                                                foreach ($questions as $index => $question) {
                                                    echo "<div class='result__question'>";
                                                    echo "<p class='result__question-text'>" . ($index + 1) . ". {$question['question_text']}</p>";
                                                    echo "<div class='result__options'>";
                                                    for ($i = 1; $i <= 4; $i++) {
                                                        $optionClass = '';
                                                        if ($i == $question['correct_option']) {
                                                            $optionClass = 'result__correct';
                                                        } elseif ($i == $question['user_answer'] && $question['user_answer'] != $question['correct_option']) {
                                                            $optionClass = 'result__incorrect';
                                                        }
                                                        echo "<label class='{$optionClass}'>";
                                                        echo "<input type='radio' disabled " . ($question['user_answer'] == $i ? 'checked' : '') . ">";
                                                        echo $question["option{$i}"];
                                                        echo "</label>";
                                                    }
                                                    echo "</div>";
                                                    echo "<p>Marks: " . ($question['user_answer'] == $question['correct_option'] ? $question['marks'] : 0) . " / {$question['marks']}</p>";
                                                    echo "</div>";
                                                }
                                            } else {
                                                echo "<p>Debug: No attempt found for ID: $attemptId</p>";
                                            }
                                        } else {
                                            echo "<p>Debug: No attempt ID provided.</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- dashboard-area-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <?php include "include/footer.php" ?>
    <!-- footer-area-end -->

    <?php include "include/script.php" ?>
</body>
</html>