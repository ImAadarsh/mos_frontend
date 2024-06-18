<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include "include/session.php";
include "include/connect.php"; 
use Monolog\Level;?>

<?php
// Set the timezone to IST

    $id = $_GET['id'];
    $sql = "SELECT * FROM workshops where id='$id'";
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

    if($_SESSION['token']){
        $uid = $_SESSION['userid'];
        $transactionsql = "SELECT * FROM payments where workshop_id='$id' AND user_id=$uid AND payment_status=1";
        $transactionres = $connect->query($transactionsql);
        $transaction = $transactionres->fetch_assoc();
    }
    ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>

    <meta name="description" content="<?php echo $final['short_description'] ?>">
    <meta name="keywords" content="Magic Of Skills, workshop">
    <!-- Fav Icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <meta property="og:title" content="<?php echo $final['name'] ?>">
    <meta property="og:description" content="<?php echo $final['description'] ?>">
    <meta property="og:image" content="<?php echo $uri.$final['icon'] ?>">
    <meta property="og:url" content="https://magicofskills.com">
    <meta property="og:type" content="website">

    <meta name="twitter:title" content="<?php echo $final['name'] ?>">
    <meta name="twitter:description" content="<?php echo $final['short_description'] ?>">
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
    <style>
       .rating {
    display: inline-block;
}

.rating input {
    display: none;
}

.rating label {
    cursor: pointer;
    width: 35px;
    height: 35px;
    float: right;
    color: #ccc; /* Grey color for unselected stars */
}

.rating label:before {
    content: '\2605'; /* Star symbol */
    font-size: 30px;
    line-height: 35px;
}

.rating input:checked ~ label {
    color: #ffca08; /* Golden color for selected stars */
}

.rating input:checked ~ label:before {
    content: '\2605'; /* Filled star symbol */
}

    </style>
</head>

<body>

<?php include "include/header.php" ?>



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
                                    <a href="courses.php">Workshops</a>
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
        </div>
        <!-- breadcrumb-area-end -->

        <!-- courses-details-area -->
        <section class="courses__details-area section-py-120">
            <div class="container">

                <div class="row">
                    
                    <div class="col-xl-9 col-lg-8">
                        
                        <div class="courses__details-thumb">
                            <img src="<?php echo $uri.$final['banner_image'] ?>" alt="img">
                        </div>
                        <div class="courses__details-content">
                            <ul class="courses__item-meta list-wrap">
                                <li class="courses__item-tag">
                                    <a href="course.html"><?php echo $cfinal['name'] ?></a>
                                </li>
                                <!-- <li class="avg-rating"><i class="fas fa-star"></i>  -->
                                <?php
                                $trainer_id = $final['trainer_id'];
                            $feedsql = "SELECT AVG(rating) as average_rating, COUNT(*) as review_count FROM reviews WHERE trainer_id = $trainer_id";
                            $feedback = $connect->query($feedsql);
                            $feedback_data = $feedback->fetch_assoc();
                            ?>

                            <li class="rating">
                                <?php
                                $average_rating = round($feedback_data['average_rating']);
                                for ($i = 1; $i <= $average_rating; $i++) {
                                    echo '<i style="color: #FFC124;" class=" avg-rating fas fa-star"></i>';
                                    
                                }echo round($feedback_data['average_rating'],2).' Stars'; 
                                ?>
                                <li class="avg-rating" >(<?php echo $feedback_data['review_count']; ?> reviews)</li>
                            </li>
                        <?php
                        
                        ?>
                            </ul>
                            <h2 class="title"><?php echo $final['name'] ?></h2>
                            <div class="courses__details-meta">
                                <ul class="list-wrap">
                                    <li class="author-two">
                                        <img width="50px" src="<?php echo $uri.$tfinal['image'] ?>" alt="img">
                                        By
                                        <a href="#"><?php echo $tfinal['name'] ?></a>
                                    </li>
                                    <li class="date"><i class="flaticon-calendar"></i><?php
                                    $start_time = $final['start_time']; // e.g., '2024-07-05 17:00:00'
                                    $date = new DateTime($start_time);
                                    $formatted_date = $date->format('d/m/Y h:i A'); // Format to '07/05/2024 05:00 PM'
                                    echo $formatted_date;
                                    ?>
                                    </li>
                                    <!-- <li><i class="flaticon-mortarboard"></i>2,250 Students</li> -->
                                </ul>
                            </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview-tab-pane" type="button" role="tab" aria-controls="overview-tab-pane" aria-selected="true">Overview</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="instructors-tab" data-bs-toggle="tab" data-bs-target="#instructors-tab-pane" type="button" role="tab" aria-controls="instructors-tab-pane" aria-selected="false">Instructors</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">reviews</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                                    <div class="courses__overview-wrap">
                                        <h3 class="title">Course Description</h3>
                                        <p><?php echo $final['description'] ?></p>
                                        <h3 class="title">What you'll learn in this course?</h3>
                                        <p><?php echo $final['short_description'] ?>.</p>
                                        <ul class="about__info-list list-wrap">
                                            <?php 
                                            $learnings = explode('<br>', $final['learnings']);
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
                               
                                <div class="tab-pane fade" id="instructors-tab-pane" role="tabpanel" aria-labelledby="instructors-tab" tabindex="0">
                                    <div class="courses__instructors-wrap">
                                        <div class="courses__instructors-thumb">
                                            <img src="<?php echo $uri.$tfinal['image'] ?>" alt="img">
                                        </div>
                                        <div class="courses__instructors-content">
                                            <h2 class="title"><?php echo $tfinal['name'] ?></h2>
                                            <span class="designation"><?php echo $tfinal['designation'] ?></span>
                                            <p class="avg-rating"><i class="fas fa-star"></i>(4.8 Ratings)</p>
                                            <p><?php echo $tfinal['about'] ?></p>
                                            <div class="instructor__social">
                                                <ul class="list-wrap justify-content-start">
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            $workshop_id = $_GET['id']; // Assuming workshop ID is passed as a query parameter
                            $rsql = "
                                SELECT reviews.id, reviews.user_id, reviews.trainer_id, reviews.workshop_id, reviews.rating, reviews.comment, reviews.updated_at, reviews.created_at,
                                    users.first_name AS user_name, users.icon,
                                    trainers.name AS trainer_name
                                FROM reviews
                                JOIN users ON reviews.user_id = users.id
                                JOIN trainers ON reviews.trainer_id = trainers.id
                                WHERE reviews.workshop_id = $workshop_id
                            ";
                            // echo $rsql;
                            $rresults = $connect->query($rsql);

                            $reviews = [];
                            $total_rating = 0;
                            $rating_counts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];

                            while ($review = $rresults->fetch_assoc()) {
                                $reviews[] = $review;
                                $total_rating += $review['rating'];
                                $rating_counts[$review['rating']]++;
                            }

                            $total_reviews = count($reviews);

                            if ($total_reviews > 0) {
                                $average_rating = $total_rating / $total_reviews;
                            } else {
                                $average_rating = 0; // No reviews, so average rating is 0
                            }
                            ?>

                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                            <div class="courses__rating-wrap">
                                <h2 class="title">Reviews</h2>
                                <?php if(isset($_SESSION['token']) && isset($transaction['payment_id'])){?>
                            <div id="#reviews"  class="comment-respond">
                                <h4  class="comment-reply-title">Post a review</h4>
                                <form  action="#" class="comment-form">
                                    <p class="comment-notes">
                                        <span>Post a review sharing your experience of workshop *</span>
                                    </p>
                                    <div class="comment-field">
                                        <textarea required placeholder="Write Review"></textarea>
                                        <input name="workshop_id"  value="<?php echo $workshop_id; ?>" hidden  placeholder="">
                                        <input name="trainer_id"  value="<?php echo $tid; ?>"  hidden  placeholder="">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="comment-field">
                                                <div class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 stars"></label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 stars"></label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 stars"></label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 stars"></label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="form-submit">
                                        <button type="submit" class="btn btn-two arrow-btn">Post Review <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></button>
                                    </p>
                                </form>
                            </div>
                            <?php } ?>
        <div class="course-rate">
            <div class="course-rate__summary">
                <div class="course-rate__summary-value"><?php echo number_format($average_rating, 1); ?></div>
                <div class="course-rate__summary-stars">
                    <?php for ($i = 0; $i < 5; $i++) {
                        echo $i < $average_rating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                    } ?>
                </div>
                <div class="course-rate__summary-text">
                    <?php echo $total_reviews; ?> Ratings
                </div>
            </div>
            <div class="course-rate__details">
                <?php foreach ($rating_counts as $star => $count) { 
                    $percentage = ($total_reviews > 0) ? ($count / $total_reviews) * 100 : 0;
                ?>
                    <div class="course-rate__details-row">
                        <div class="course-rate__details-row-star">
                            <?php echo $star; ?>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="course-rate__details-row-value">
                            <div class="rating-gray"></div>
                            <div class="rating" style="width:<?php echo $percentage; ?>%;" title="<?php echo $percentage; ?>%"></div>
                            <span class="rating-count"><?php echo $count; ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php foreach ($reviews as $review) { ?>
            <div class="course-review-head">
                <div class="review-author-thumb">
                    <img src="<?php if($review['icon']==null){echo "assets/user_icon.png";}else{echo $uri.$review['icon']; } ?>" alt="img">
                </div>
                <div class="review-author-content">
                    <div class="author-name">
                        <h5 class="name"><?php echo $review['user_name']; ?> <span><?php echo time_elapsed_string($review['created_at']); ?></span></h5>
                        <div class="author-rating">
                            <?php for ($i = 0; $i < 5; $i++) {
                                echo $i < $review['rating'] ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                            } ?>
                        </div>
                    </div>
                    <h4 class="title">Student Review</h4> <!-- Adjust as needed -->
                    <p><?php echo $review['comment']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="courses__details-sidebar">
                            <!-- <div class="courses__details-video">
                                <img src="assets/img/courses/course_thumb02.jpg" alt="img">
                                <a href="https://www.youtube.com/watch?v=YwrHGratByU" class="popup-video"><i class="fas fa-play"></i></a>
                            </div> -->
                            <div class="courses__cost-wrap">
                                <span>This Workshop Fee:</span>
                                    <?php if($final['is_completed'] == 1) {
                                        ?>
                                        <h2 class="title">₹<?php echo $final['record_price']; ?> <del><?php echo $final['cut_price']; ?></del></h2>
                                        <?php 
                                    } else {
                                        if($final['start_time'] > $current_time) {
                                            ?>
                                            <h2 class="title">₹<?php echo $final['price']; ?> <del><?php echo $final['cut_price']; ?></del></h2>
                                            <?php
                                        } else {
                                            ?>
                                            <h2 class="title">Closed</h2>
                                            <?php
                                        }
                                    }
                                    ?>
                            </div>
                            <div class="courses__information-wrap">
                                <h5 class="title">Course includes:</h5>
                                <ul class="list-wrap">
                                    <li>
                                        <img src="assets/img/icons/course_icon01.svg" alt="img" class="injectable">
                                        Level
                                        <span><?php  if($final['level']==1){echo "Basic";}else if($final['Level']){echo "Intermediate";}else{echo "Advanced";} ?></span>
                                    </li>
                                    <li>
                                        <img src="assets/img/icons/course_icon02.svg" alt="img" class="injectable">
                                        Duration
                                        <span><?php echo $final['duration'] ?> Mins</span>
                                    </li>
                                    <li>
                                        <img src="assets/img/icons/course_icon03.svg" alt="img" class="injectable">
                                        category
                                        <span><?php echo $cfinal['name'] ?></span>
                                    </li>
                                    <!-- <li>
                                        <img src="assets/img/icons/course_icon04.svg" alt="img" class="injectable">
                                        Quizzes
                                        <span>145</span>
                                    </li> -->
                                    <li>
                                        <img src="assets/img/icons/course_icon05.svg" alt="img" class="injectable">
                                        Certifications
                                        <span>Yes</span>
                                    </li>
                                    <li>
                                        <img src="assets/img/icons/course_icon06.svg" alt="img" class="injectable">
                                        Recording
                                        <span>Yes</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="courses__payment">
                                <h5 class="title">Secure Payment:</h5>
                                <img src="assets/img/others/payment.png" alt="img">
                            </div> -->
                            <?php 
// Assuming you already have the $final array from your previous database query
$course_url = 'https://magicofskills.com/course-details.php?id=' . $final['id'];
$course_name = $final['name'];
?>

<div class="courses__details-social">
    <h5 class="title">Share this course:</h5>
    <ul class="list-wrap">
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($course_url); ?>" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li>
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($course_url); ?>&text=<?php echo urlencode('Check out this course: ' . $course_name); ?>" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li>
            <a href="https://api.whatsapp.com/send?text=<?php echo urlencode('Check out this course: ' . $course_url); ?>" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($course_url); ?>" target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
    </ul>
</div>


                            <div class="courses__details-enroll">
                            <?php 
                        if(!isset($transaction['payment_id'])){
                                        ?>  
                            <div class="tg-button-wrap mb-20">
                                <?php 
                                    if(isset($_SESSION['token'])){
                                        ?>      
                                   
                                    <?php 
                                    if($final['start_time'] > $current_time || $final['is_completed']==1 ) {
                                        ?>
                                        <a href="controller/cart.php?workshop_id=<?php echo $final['id'] ?>" class="btn btn-two arrow-btn">
                                        Add To Cart
                                        <img style="width: 400px important;" src="assets/img/icons/cart.svg" alt="img" class="injectable">
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="btn btn-two arrow-btn">
                                    Closed!!
                                    
                                </a>
                                        <?php
                                    }
                                ?>
                            </div>
                            
                            <div class="tg-button-wrap">
                                    
                                    <?php if($final['is_completed'] == 1) {
                                        ?>
                                        <a href="controller/buy.php?workshop_id=<?php echo $final['id'] ?>" class="btn btn-two arrow-btn">
                                        Buy Recording
                                        <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable">
                                    </a>
                                        <?php 
                                    } else {
                                        if($final['start_time'] > $current_time) {
                                            ?>
                                            <a href="controller/buy.php?workshop_id=<?php echo $final['id'] ?>" class="btn btn-two arrow-btn">
                                        Enroll Now
                                        <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable">
                                    </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="#" class="btn btn-two arrow-btn">
                                        Closed
                                        <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable">
                                    </a>
                                            <?php
                                        }
                                    }}else{
                                        ?>
                                        <a href="login.php" class="btn btn-two arrow-btn">
                                        Login to Enroll
                                        <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable">
                                    </a>
                                        <?php
                                    }
                                    ?>
                            </div>
                            <?php }else{
                                ?>
<div class="tg-button-wrap">
<a href="#" class="btn btn-two arrow-btn">
                                       Already Purchased.
                                        
                                    </a>
</div>
                                <?php
                            } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- courses-details-area-end -->

    </main>
    <!-- main-area-end -->



    <?php include "include/footer.php" ?>



    <?php include "include/script.php" ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.location.hash === '#reviews') {
                document.getElementById('reviews-tab').click();
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.comment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const textarea = form.querySelector('textarea');
        const workshopInput = form.querySelector('input[name="workshop_id"]');
        const trainerInput = form.querySelector('input[name="trainer_id"]');
        
        const rating = form.querySelector('input[name="rating"]:checked');

        if (!rating) {
            alert('Please select a rating.');
            return;
        }

        const reviewText = textarea.value.trim();
        const selectedRating = rating.value;
        const workshopId = workshopInput.value;
        const trainerId = trainerInput.value;

        // Ensure workshopId is not empty
        if (!workshopId) {
            alert('Workshop ID is missing.');
            return;
        }

        // Here you can perform AJAX request to submit the review data
        fetch('controller/review.php', {
            method: 'POST',
            body: JSON.stringify({ rating: selectedRating, review: reviewText, workshop_id: workshopId, trainer_id : trainerId }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Handle response
            console.log(data);
            alert('Review submitted successfully.');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error submitting your review.');
        });

        // For demonstration purposes, alert the selected values
        alert(`Rating: ${selectedRating}, Review: ${reviewText}`);

        // Clear the textarea (optional)
        textarea.value = '';
        // Clear the selected rating (optional)
        form.querySelectorAll('input[name="rating"]').forEach(input => input.checked = false);
    });
});

    </script>
</body>

</html>