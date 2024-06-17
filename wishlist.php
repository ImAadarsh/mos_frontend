<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php include "include/session.php" ; include "include/meta.php" ?>
</head>

<body>

    <?php include "include/header.php" ?>

    <!-- header-area -->
    
    <!-- header-area-end -->



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
                        <div class="dashboard__content-wrap dashboard__content-wrap-two">
                            <div class="dashboard__content-title">
                                <h4 class="title">Wishlist</h4>
                            </div>
                            <div class="row">
                            <?php
                                 
                                    $userId = $_SESSION['userid'];

                                    // Fetch wishlist data
$wishlistQuery = "SELECT * FROM wishlists WHERE user_id = ?";
$stmt = $connect->prepare($wishlistQuery);
$stmt->bind_param('i', $userId);
$stmt->execute();
$wishlistResult = $stmt->get_result();
$wishlistItems = $wishlistResult->fetch_all(MYSQLI_ASSOC);

// Fetch workshops data
$workshopIds = array_column($wishlistItems, 'workshop_id');
$workshopIdsString = implode(',', $workshopIds);

$workshopsQuery = "SELECT workshops.*, trainers.name AS trainer_name,  trainers.image AS trainer_image 
                   FROM workshops 
                   LEFT JOIN trainers ON workshops.trainer_id = trainers.id 
                   WHERE workshops.id IN ($workshopIdsString)";
$workshopsResult = $connect->query($workshopsQuery);
$workshops = $workshopsResult->fetch_all(MYSQLI_ASSOC);
                                    ?>


<?php foreach ($workshops as $workshop) { ?>
        <div class="col-xl-6 col-md-6">
            <div class="courses__item courses__item-two shine__animate-item">
                <div class="courses__item-thumb courses__item-thumb-two">
                    <a href="course-details.php?id=<?php echo $workshop['id']; ?>" class="shine__animate-link">
                        <img  src="<?php echo $uri.$workshop['banner_image']; ?>" alt="img">
                    </a>
                </div>
                <div class="courses__item-content courses__item-content-two">
                <h5 class="title"><a href="course-details.php?id=<?php echo $workshop['id']; ?>"><?php echo $workshop['name']; ?></a></h5>
                    <ul class="courses__item-meta list-wrap">
                        
                        <li class="price">
                            <?php if ($workshop['cut_price'] > $workshop['price']) { ?>
                                <del>₹<?php echo $workshop['cut_price']; ?></del>
                            <?php } ?>
                            ₹<?php echo $workshop['price']; ?>
                        </li>
                    </ul>
                    
                    <div class="courses__item-content-bottom">
                        <div class="author-two">
                            <a href="instructor-details.php?id=<?php echo $workshop['trainer_id']; ?>"><img src="<?php echo $uri.$workshop['trainer_image']; ?>" alt="img"><?php echo $workshop['trainer_name']; ?></a>
                        </div>
                        <a href="controller/wishlist.php?workshop_id=<?php echo $workshop['id']; ?>&del=1"> <img style="border: 1px solid black; padding:2px; border-radius: 50%;" src="assets/close.png" width="20px" alt=""> Remove</a>
                        
                    </div>
                </div>
                <div class="courses__item-bottom-two">
                    <ul class="list-wrap">
                        <li><i class="flaticon-clock"></i><?php echo date('d/m/y h:i A', strtotime($workshop['start_time'])); ?></li>
                        <li><i class="flaticon-arrow-right"></i> <a href="course-details.php?id=<?php echo $workshop['id']; ?>">Enroll Now</a> </li>
                        <li>  <i class="flaticon-cross"></i> <a href="course-details.php?id=<?php echo $workshop['id']; ?>"></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>
                                
                          
                                    
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