<?php include "include/session.php"; ?>
<?php include "include/connect.php"; ?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM events where id='$id'";
    $results = $connect->query($sql);
    $final = $results->fetch_assoc();

    $cid = $final['category_id'];
    $csql = "SELECT * FROM categories where id='$cid'";
    $cresults = $connect->query($csql);
    $cfinal = $cresults->fetch_assoc();

    $tid = $final['trainer_id'];
    $tsql = "SELECT * FROM trainers where id='$tid'";
    $tresults = $connect->query($tsql);
    $tfinal = $tresults->fetch_assoc();
    ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $final['brand'] ?> | <?php echo $final['name'] ?></title>

    <meta name="description" content="<?php echo $final['description'] ?>">
    <meta name="keywords" content="<?php echo $final['brand'] ?>, event">
    <!-- Fav Icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <meta property="og:title" content="<?php echo $final['name'] ?>">
    <meta property="og:description" content="<?php echo $final['description'] ?>">
    <meta property="og:image" content="<?php echo $uri.$final['icon'] ?>">
    <meta property="og:url" content="https://magicofskills.com">
    <meta property="og:type" content="website">

    <meta name="twitter:title" content="<?php echo $final['name'] ?>">
    <meta name="twitter:description" content="<?php echo $final['description'] ?>">
    <meta name="twitter:image" content="<?php echo $uri.$final['icon'] ?>">
    <meta name="twitter:card" content="<?php echo $final['name'] ?>">
    <meta property="og:site_name" content="Magic Of Skills">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/flaticon-skillgro.css">
    <link rel="stylesheet" href="assets/css/flaticon-skillgro-new.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/default-icons.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/plyr.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/tg-cursor.css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>

<body>
<?php include "include/header.php" ?>



    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title"><?php echo $final['name'] ?></h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="events.php">Events</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem"><?php echo $final['name'] ?></span>
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

        <!-- event-details-area -->
        <section class="event__details-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event__details-thumb">
                            <img src="<?php echo $uri.$final['banner_image'] ?>" alt="img">
                        </div>
                        <div class="event__details-content-wrap">
                            <div class="row">
                                <div class="col-70">
                                    <div class="event__details-content">
                                        <div class="event__details-content-top">
                                            <a href="courses.php" class="tag"><?php echo $final['brand'] ?></a>
                                            <!-- <span class="avg-rating"><i class="fas fa-star"></i>(4.8 Reviews)</span> -->
                                        </div>
                                        <h2 class="title"><?php echo $final['name'] ?></h2>
                                        <div class="event__meta">
                                            <ul class="list-wrap">
                                                <li class="author">
                                                    <img height="50px" width="50px" src="<?php  echo $uri.$final['icon'] ?>" alt="img">
                                                    By
                                                    <a href="instructor-details.php"><?php echo $final['brand'] ?></a>
                                                </li>
                                                <li class="location"><i class="flaticon-placeholder"></i><?php echo $final['location'] ?></li>
                                                
                                            </ul>
                                        </div>
                                        <div class="event__details-overview">
                                            <h4 class="title-two">Event Overview</h4>
                                            <p><?php echo $final['description'] ?></p>
                                        </div>
                                        <h4 class="title-two">What you'll learn in this event?</h4>
                                       
                                        <div class="event__details-inner">
                                            <div class="row">
                                               
                                                <div class="col-80">
                                                    <div class="event__details-inner-content">
                                                      
                                                        <ul class="about__info-list list-wrap">
                                                                <?php 
                                                                $learnings = explode('<br>', $final['learning']);
                                                                foreach ($learnings as $learning) {
                                                                    // Trim to remove any extra whitespace
                                                                    $learning = trim($learning);
                                                                    if (!empty($learning)) {
                                                                        echo '<li class="about__info-list-item">';
                                                                        echo '<i class="flaticon-angle-right"></i>';
                                                                        echo '<p class="content">' . htmlspecialchars($learning) . '</p>';
                                                                        echo '</li>';
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-30">
                                    <aside class="event__sidebar">
                                        <div class="event__widget">
                                            <div class="courses__details-sidebar">
                                                <div class="courses__cost-wrap">
                                                    <span>Event Fee</span>
                                                    <h2 class="title"><?php  if($final['price']==0){echo "Free";}else{echo '₹'.$final['price'];} ?></h2>
                                                </div>
                                                <div class="courses__information-wrap">
                                                    <h5 class="title">Event Information:</h5>
                                                    <ul class="list-wrap">
                                                        <li>
                                                            <img src="assets/img/icons/calendar.svg" alt="img" class="injectable">
                                                            Date
                                                            <span><?php
                                                            $date = $final['date']; // Assume this is in 'Y-m-d H:i:s' format (e.g., '2024-07-05 17:00:00')
                                                            $formattedDate = DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
                                                            echo $formattedDate;
                                                            ?></span>
                                                        </li>
                                                        <li>
                                                            <img src="assets/img/icons/course_icon02.svg" alt="img" class="injectable">
                                                            Start Time
                                                            <span><span>
                                                                    <?php
                                                                    $date = $final['time']; // Assume this is in 'H:i:s' format (e.g., '17:00:00')
                                                                    $formattedTime = DateTime::createFromFormat('H:i:s', $date)->format('h:i A');
                                                                    echo $formattedTime;
                                                                    ?>
                                                                </span>
                                                                </span>
                                                        </li>
                                                        
                                                        <li>
                                                            <img src="assets/img/icons/course_icon05.svg" alt="img" class="injectable">
                                                            Certifications
                                                            <span>Yes</span>
                                                        </li>
                                                        <li>
                                                            <img src="assets/img/icons/course_icon06.svg" alt="img" class="injectable">
                                                            Total Seat
                                                            <span><?php echo $final['seat'] ?></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <div class="courses__payment">
                                                    <h5 class="title">Secure Payment:</h5>
                                                    <img src="assets/img/others/payment.png" alt="img">
                                                </div> -->
                                                <?php
                                                // Assume this is your event ID, replace with your dynamic $id variable
                                                    $eventUrl = "https://magicofskills.com/events-details.php?id=" . $id;
                                                    ?>

                                                    <div class="courses__details-social">
                                                        <h5 class="title">Share this course:</h5>
                                                        <ul class="list-wrap">
                                                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($eventUrl); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($eventUrl); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                            <li><a href="https://wa.me/?text=<?php echo urlencode($eventUrl); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                                            <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($eventUrl); ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                                        </ul>
                                                    </div>

                                                <div class="courses__details-enroll">
                                                    <div class="tg-button-wrap">
                                                        <a href="<?php echo $final['register_link'] ?>" class="btn arrow-btn">Join This Event <img src="assets/img/icons/right_arrow.svg" alt="img"  class="injectable"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="instructor__details-courses">
                                <div class="row align-items-center mt-70 mb-30">
                                    <div class="col-md-8">
                                        <h2 class="main-title">Explore Magic Of Skills Workshops</h2>
                                        <!-- <p>Explore the Workshops by <?php echo $final['name'] ?></p> -->
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
                                                WHERE workshops.is_deleted=0 AND workshops.is_completed = 0
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
        </section>
        <!-- event-details-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
    <?php include "include/footer.php" ?>
    <!-- footer-area-end -->



    <?php include "include/script.php" ?>
</body>

</html>