<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Our Instructors</title>
    <?php include "include/session.php" ;  include "include/meta.php" ?>
</head>

<body class="instructors-page">

    <?php include "include/header.php" ?>

 



    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">All Instructors</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Instructors</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
                <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- instructor-area -->
        <section class="instructor__area section-py-120">
            <div class="container">
                <div class="section__title-wrap">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section__title text-center">
                                <span class="sub-title">Our Team</span>
                                <h2 class="title">Meet Our Expert Instructors</h2>
                                <p class="desc">Learn from industry professionals and experienced educators</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php 
                $sql = "SELECT * FROM trainers";
                $results = $connect->query($sql);
                while ($final = $results->fetch_assoc()) {
                    $trainer_id = $final['id'];
                    $feedsql = "SELECT AVG(rating) as average_rating, COUNT(*) as review_count FROM reviews WHERE trainer_id = $trainer_id";
                    $feedback = $connect->query($feedsql);
                    $feedback_data = $feedback->fetch_assoc();
                ?>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="instructor__item instructor__item-card">
                            <div class="instructor__thumb">
                                <a href="instructor-details.php?id=<?php echo $final['id'] ?>">
                                    <img src="<?php echo $uri.$final['image'] ?>" alt="img">
                                </a>
                            </div>
                            <div class="instructor__content">
                                <h2 class="title"><a href="instructor-details.php?id=<?php echo $final['id'] ?>"><?php echo $final['name'] ?></a></h2>
                                <span class="designation"><?php echo $final['designation'] ?></span>
                                <?php if($feedback_data['review_count'] > 0){ ?>
                                <p class="avg-rating">
                                    <?php
                                    $average_rating = round($feedback_data['average_rating'], 1);
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= round($feedback_data['average_rating'])) {
                                            echo '<i class="fas fa-star"></i>';
                                        } else {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                    ?>
                                    <span><?php echo $average_rating; ?> (<?php echo $feedback_data['review_count']; ?> reviews)</span>
                                </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- instructor-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
        <?php include "include/footer.php" ?>
    <!-- footer-area-end -->


    <?php include "include/script.php" ?>
</body>

</html>