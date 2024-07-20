<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Quiz </title>
    <?php 
    include "include/private_page.php" ; 
    include "include/meta.php" ?>
    <meta name="robots" content="noindex">
    <style>
        .quiz__content-wrap {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .quiz__timer {
            font-size: 1.2em;
            font-weight: bold;
            text-align: right;
            margin-bottom: 20px;
        }
        .quiz__progress {
            height: 10px;
            background: #e0e0e0;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .quiz__progress .progress-bar {
            height: 100%;
            background: #4CAF50;
            border-radius: 5px;
            transition: width 0.3s ease;
        }
        .quiz__questions {
            max-height: 500px;
            overflow-y: auto;
            padding-right: 15px;
        }
        .quiz__question {
            margin-bottom: 30px;
        }
        .quiz__question-text {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .quiz__options label {
            display: block;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .quiz__submit-btn, #start-quiz {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
        }
        .quiz__side-panel {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }
        .quiz__question-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        .quiz__question-btn {
            width: 100%;
            aspect-ratio: 1;
            border: none;
            background: #e0e0e0;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .quiz__question-btn.answered {
            background: #4CAF50;
            color: #fff;
        }
        .quiz__stats {
            font-size: 0.9em;
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
                                <h4 class="title">Daily Quiz</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="quiz__side-panel">
                                        <h5>Question Navigator</h5>
                                        <div class="quiz__question-list" id="question-list">
                                            <!-- Question buttons will be dynamically inserted here -->
                                        </div>
                                        <div class="quiz__stats">
                                            <p>Answered: <span id="answered-count">0</span></p>
                                            <p>Remaining: <span id="remaining-count">0</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-9">
                                    <div class="quiz__content-wrap">
                                        <div id="quiz-info">
                                            <h2 id="quiz-name"></h2>
                                            <p id="quiz-duration"></p>
                                            <button id="start-quiz" onclick="confirmStartQuiz()">Start Quiz</button>
                                        </div>
                                        <div id="quiz-content" style="display: none;">
                                            <div class="quiz__timer">
                                                Time Remaining: <span id="timer">30:00</span>
                                            </div>
                                            <div class="quiz__progress">
                                                <div class="progress-bar" id="quiz-progress"></div>
                                            </div>
                                            <div class="quiz__questions" id="quiz-questions">
                                                <!-- Questions will be dynamically inserted here -->
                                            </div>
                                            <button class="quiz__submit-btn" id="submit-quiz" onclick="submitQuiz()">Submit Quiz</button>
                                        </div>
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

    <script>
    let attemptId;
    let quizId;
    let userId = <?php echo $_SESSION['userid']; ?>; // Get user ID from PHP session
    let quizTimer;
    let quizQuestions = [];
    let quizSubmitted = false;

    function confirmStartQuiz() {
        if (confirm("Are you ready to start the quiz? The timer will begin immediately.")) {
            startQuiz();
        }
    }

    function startQuiz() {
    document.getElementById('quiz-info').style.display = 'none';
    document.getElementById('quiz-content').style.display = 'block';
    
    fetch('controller/quiz.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=start_quiz&quiz_id=${quizId}&user_id=${userId}`
    })
    .then(response => response.json())
    .then(data => {
        attemptId = data.attempt_id;
        fetchQuestions();
        if (data.duration_minutes) {
            startTimer(data.duration_minutes * 60); // Convert minutes to seconds
        } else {
            console.error('Duration not provided by the server');
            document.getElementById('timer').textContent = 'Duration error';
        }
    })
    .catch(error => {
        console.error('Error starting quiz:', error);
        document.getElementById('timer').textContent = 'Start error';
    });
}

    function checkQuizStatus() {
        fetch('controller/quiz.php?action=get_quiz_status')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'available') {
                quizId = data.quiz_id;
                displayQuizInfo(data);
            } else {
                displayMessage(data.message);
            }
        });
    }

    function displayQuizInfo(quizData) {
        document.getElementById('quiz-name').textContent = quizData.quiz_name;
        document.getElementById('quiz-duration').textContent = `Duration: ${quizData.duration_minutes} minutes`;
        document.getElementById('start-quiz').style.display = 'block';
    }

    function displayMessage(message) {
        const quizContainer = document.querySelector('.quiz__content-wrap');
        quizContainer.innerHTML = `<p class="quiz-message">${message}</p>`;
    }

    function fetchQuestions() {
        fetch(`controller/quiz.php?action=get_questions&quiz_id=${quizId}`)
        .then(response => response.json())
        .then(data => {
            quizQuestions = data;
            renderQuestions();
            updateProgress(); // Initial progress update
        });
    }

    function renderQuestions() {
        const questionsContainer = document.getElementById('quiz-questions');
        const questionList = document.getElementById('question-list');
        questionsContainer.innerHTML = '';
        questionList.innerHTML = '';

        quizQuestions.forEach((q, index) => {
            const questionEl = document.createElement('div');
            questionEl.classList.add('quiz__question');
            questionEl.innerHTML = `
                <p class="quiz__question-text">${index + 1}. ${q.question_text}</p>
                <div class="quiz__options">
                    ${['option1', 'option2', 'option3', 'option4'].map((option, i) => `
                        <label>
                            <input type="radio" name="q${q.question_id}" value="${i+1}">
                            ${q[option]}
                        </label>
                    `).join('')}
                </div>
            `;
            questionsContainer.appendChild(questionEl);

            const buttonEl = document.createElement('button');
            buttonEl.classList.add('quiz__question-btn');
            buttonEl.textContent = index + 1;
            buttonEl.onclick = () => scrollToQuestion(index);
            questionList.appendChild(buttonEl);
        });
    }

    function scrollToQuestion(index) {
        const questions = document.querySelectorAll('.quiz__question');
        questions[index].scrollIntoView({ behavior: 'smooth' });
    }

    function startTimer(duration) {
    let timer = duration;
    updateTimerDisplay(timer); // Display initial time immediately
    quizTimer = setInterval(() => {
        timer--;
        updateTimerDisplay(timer);
        if (timer < 0) {
            clearInterval(quizTimer);
            submitQuiz();
        }
    }, 1000);
}

function updateTimerDisplay(timeLeft) {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    document.getElementById('timer').textContent = 
        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

    function updateProgress() {
        const answered = document.querySelectorAll('input[type="radio"]:checked').length;
        const total = quizQuestions.length;
        document.getElementById('answered-count').textContent = answered;
        document.getElementById('remaining-count').textContent = total - answered;
        document.getElementById('quiz-progress').style.width = `${(answered / total) * 100}%`;

        const buttons = document.querySelectorAll('.quiz__question-btn');
        buttons.forEach((btn, index) => {
            if (document.querySelector(`input[name="q${quizQuestions[index].question_id}"]:checked`)) {
                btn.classList.add('answered');
            } else {
                btn.classList.remove('answered');
            }
        });
    }

    function submitQuiz() {
        if (quizSubmitted) return;
        quizSubmitted = true;
        clearInterval(quizTimer);
        const answers = {};
        quizQuestions.forEach(q => {
            const selectedAnswer = document.querySelector(`input[name="q${q.question_id}"]:checked`);
            answers[q.question_id] = selectedAnswer ? selectedAnswer.value : null;
        });

        fetch('controller/quiz.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=submit_quiz&attempt_id=${attemptId}&answers=${JSON.stringify(answers)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Quiz submitted successfully!');
                // Redirect to results page or show results
                window.location.href = 'quiz_results.php?attempt_id=' + attemptId;
            } else {
                alert('Failed to submit quiz. Please try again.');
            }
        });
    }

    // Event listeners
    document.getElementById('quiz-questions').addEventListener('change', updateProgress);

    // Call checkQuizStatus when the page loads
    window.onload = checkQuizStatus;

    // Add event listener for beforeunload
    window.addEventListener('beforeunload', function (e) {
        if (attemptId && !quizSubmitted) {
            submitQuiz();
            e.returnValue = 'Are you sure you want to leave? Your quiz progress will be submitted.';
        }
    });
    </script>
</body>
</html>