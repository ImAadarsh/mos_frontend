<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Dashboard</title>
    <?php 
    include "include/private_page.php" ; 
    include "include/meta.php" ?>
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
              <?php include "user_dash/head.php" ?>
                <div class="row">
                    <div class="col-lg-3">
                        <?php include "user_dash/nav.php"; ?>
                    </div>
                    <?php
                        $uid = $_SESSION['userid'];

                        // Enrolled workshops
                        $sql = "SELECT * FROM payments WHERE user_id=$uid AND payment_status=1";
                        $results = $connect->query($sql);
                        $enrolled = mysqli_num_rows($results);

                        // Upcoming workshops
                        $sql_upcoming = "SELECT * FROM workshops w JOIN payments p ON w.id = p.workshop_id WHERE p.user_id=$uid AND w.is_completed=0";
                        $results_upcoming = $connect->query($sql_upcoming);
                        $upcoming = mysqli_num_rows($results_upcoming);

                        // Completed workshops
                        $sql_completed = "SELECT * FROM workshops w JOIN payments p ON w.id = p.workshop_id WHERE p.user_id=$uid AND w.is_completed=1";
                        $results_completed = $connect->query($sql_completed);
                        $completed = mysqli_num_rows($results_completed);
                    ?>

                    <div class="col-lg-9">
                        <div class="dashboard__content-wrap dashboard__content-wrap-two">
                            <div class="dashboard__content-title">
                                <h4 class="title">Dashboard</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="dashboard__counter-item">
                                        <div class="icon">
                                            <i class="skillgro-book"></i>
                                        </div>
                                        <div class="content">
                                        <span class="count odometer" data-count="<?php echo $enrolled; ?>"></span>
                                            <p>ENROLLED Workshops </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="dashboard__counter-item">
                                        <div class="icon">
                                            <i class="skillgro-tutorial"></i>
                                        </div>
                                        <div class="content">
                                        <span class="count odometer" data-count="<?php echo $upcoming; ?>"></span>
                                        <p>UPCOMING WORKSHOPS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="dashboard__counter-item">
                                        <div class="icon">
                                            <i class="skillgro-diploma-1"></i>
                                        </div>
                                        <div class="content">
                                        <span class="count odometer" data-count="<?php echo $completed; ?>"></span>
                                        <p>COMPLETED WORKSHOPS</p>
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
</body>

</html>