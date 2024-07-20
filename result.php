<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Quiz Results</title>
    <?php include "include/private_page.php"; include "include/meta.php" ?>
    <meta name="robots" content="noindex">
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
               <?php include "user_dash/head.php"; ?>
                <div class="row">
                    <div class="col-lg-3">
                    <?php include "user_dash/nav.php"; ?>
                    </div>
                    <div class="col-lg-9">
                        <div class="dashboard__content-wrap">
                            <div class="dashboard__content-title">
                                <h4 class="title">Quiz Results</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="dashboard__review-table">
                                    <?php
    // Fetch quiz results data
    $userId = $_SESSION['userid'];
    $quizResultsQuery = "SELECT uqa.attempt_id, q.quiz_id, q.quiz_name, uqa.start_time, uqa.score, 
                                (SELECT SUM(marks) FROM questions WHERE quiz_id = q.quiz_id) as total_marks
                         FROM user_quiz_attempts uqa
                         JOIN quizzes q ON uqa.quiz_id = q.quiz_id
                         WHERE uqa.user_id = ?
                         ORDER BY uqa.start_time DESC";
    $stmt = $connect->prepare($quizResultsQuery);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $quizResultsResult = $stmt->get_result();
    $quizResults = $quizResultsResult->fetch_all(MYSQLI_ASSOC);
?>

<table class="table table-borderless">
    <thead>
        <tr>
            <th>Quiz ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Marks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($quizResults as $result) { ?>
            <tr>
                <td>
                    <p><?php echo $result['quiz_id']; ?></p>
                </td>
                <td>
                    <p><?php echo $result['quiz_name']; ?></p>
                </td>
                <td>
                    <p><?php echo date('F d, Y', strtotime($result['start_time'])); ?></p>
                </td>
                <td>
                    <p><?php echo $result['score'] . ' / ' . $result['total_marks']; ?></p>
                </td>
                <td>
                    <a href="quiz_results.php?attempt_id=<?php echo $result['attempt_id']; ?>" class="btn btn-primary btn-sm">View Details</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

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