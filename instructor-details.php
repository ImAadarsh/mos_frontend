<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Instructor Details</title>
    <?php include "include/session.php" ; include "include/meta.php" ?>
</head>

<body>

    <?php include "include/header.php" ?>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM trainers where id='$id'";
    $results = $connect->query($sql);
    $final = $results->fetch_assoc();

    // $cid = $final['category_id'];
    // $csql = "SELECT * FROM categories where id='$cid'";
    // $cresults = $connect->query($csql);
    // $cfinal = $cresults->fetch_assoc();
    ?>




    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <div class="breadcrumb__area breadcrumb__bg breadcrumb__bg-two" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="instructors.php">Mentors</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem"><?php echo $final['name'] ?></php></span>
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
        </div>
        <!-- breadcrumb-area-end -->

        <!-- instructor-details-area -->
        <section class="instructor__details-area section-pt-120 section-pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="instructor__details-wrap">
                            <div class="instructor__details-info">
                                <div class="instructor__details-thumb">
                                    <img src="<?php echo $uri.$final['image'] ?>" alt="img">
                                </div>
                                <div class="instructor__details-content">
                                    <h2 class="title"><?php echo $final['name'] ?></h2>
                                    <span class="designation"><?php echo $final['designation'] ?></span>
                                    <ul class="list-wrap">
                                        <li class="avg-rating"><i class="fas fa-star"></i>(4.8 Reviews)</li>
                                        <li><i class="far fa-envelope"></i><a href="mailto:info@gmail.com">info@gmail.com</a></li>
                                        <li><i class="fas fa-phone-alt"></i><a href="tel:0123456789">+123 9500 600</a></li>
                                    </ul>
                                    <p><?php echo $final['short_description'] ?></p>
                                    <div class="instructor__details-social">
                                        <ul class="list-wrap">
                                            <li>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor__details-biography">
                                <h4 class="title">About Me</h4>
                                <p><?php echo $final['description'] ?></p>
                              
                            </div>
                           
                            <div class="instructor__details-courses">
                                <div class="row align-items-center mb-30">
                                    <div class="col-md-8">
                                        <h2 class="main-title">My Workshops</h2>
                                        <p>Explore the Workshops by <?php echo $final['name'] ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="instructor__details-nav">
                                            <button class="courses-button-prev"><i class="flaticon-arrow-right"></i></button>
                                            <button class="courses-button-next"><i class="flaticon-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper courses-swiper-active-two">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $sql = "SELECT workshops.*, categories.name as cat_name 
                                                FROM workshops 
                                                JOIN categories ON workshops.category_id = categories.id 
                                                WHERE trainer_id = $id AND workshops.is_deleted=0 AND workshops.is_completed = 0
                                                ORDER BY workshops.start_time ASC";

                                        $results = $connect->query($sql);

                                        if ($results === false) {
                                            // Display the SQL error message
                                            echo "Error: " . $connect->error;
                                        } else {
                                            while ($workshop = $results->fetch_assoc()) {
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class="courses__item shine__animate-item">
                                                        <div class="courses__item-thumb">
                                                            <a href="course-details.php?id=<?php echo $workshop['id'] ?>" class="shine__animate-link">
                                                                <img src="<?php echo $uri . $workshop['banner_image'] ?>" alt="img">
                                                            </a>
                                                        </div>
                                                        <div class="courses__item-content">
                                                            <ul class="courses__item-meta list-wrap">
                                                                <li class="courses__item-tag">
                                                                    <a href="courses.php?category_id=<?php echo $workshop['category_id'] ?>"><?php echo $workshop['cat_name'] ?></a>
                                                                </li>
                                                                <li class="avg-rating"><i class="fas fa-star"></i> (4.8 Reviews)</li>
                                                            </ul>
                                                            <h5 class="title"><a href="course-details.php?id=<?php echo $workshop['id'] ?>"><?php echo $workshop['name'] ?></a></h5>
                                                            <p class="author">Date: <a href="#"><?php
                                                                $start_time = $workshop['start_time']; // e.g., '2024-07-05 17:00:00'
                                                                $date = new DateTime($start_time);
                                                                $formatted_date = $date->format('d/m/Y h:i A'); // Format to '07/05/2024 05:00 PM'
                                                                echo $formatted_date;
                                                            ?></a></p>
                                                            <div class="courses__item-bottom">
                                                                <div class="button">
                                                                    <a href="course-details.php?id=<?php echo $workshop['id'] ?>">
                                                                        <span class="text">Enroll Now</span>
                                                                        <i class="flaticon-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                                <h5 class="price">₹<?php echo $workshop['price'] ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                            }
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
        <!-- instructor-details-area-end -->


    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
        <?php include "include/footer.php" ?>
    <!-- footer-area-end -->

    <?php include "include/script.php" ?>
</body>

</html>