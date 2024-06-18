<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php  include "include/private_page.php" ; include "include/meta.php" ?>
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
                                <h4 class="title">Reviews</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="dashboard__review-table">
                                    <?php
                                    $userId = $_SESSION['userid'];
    // Fetch reviews data
    $reviewsQuery = "SELECT reviews.*, workshops.name AS workshop_name FROM reviews 
                     LEFT JOIN workshops ON reviews.workshop_id = workshops.id 
                     WHERE reviews.user_id = ?";
    $stmt = $connect->prepare($reviewsQuery);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $reviewsResult = $stmt->get_result();
    $reviews = $reviewsResult->fetch_all(MYSQLI_ASSOC);
?>

<table class="table table-borderless">
    <thead>
        <tr>
            <th>Workshops</th>
            <th>Feedback</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reviews as $review) { ?>
            <tr>
                <td>
                    <a href="course-details.php?id=<?php echo $review['workshop_id']; ?>"><?php echo $review['workshop_name']; ?></a>
                </td>
                <td>
                    <div class="review__wrap">
                        <div class="rating">
                            <?php for ($i = 0; $i < $review['rating']; $i++) { ?>
                                <i class="fas fa-star"></i>
                            <?php } ?>
                        </div>
                        <span>(<?php echo $review['rating']; ?> Star)</span>
                    </div>
                    <p><?php echo $review['comment']; ?></p>
                </td>
                <td>
                    <div class="dashboard__review-action">
                        <a href="https://magicofskills.com/course-details.php?id=<?php echo $review['workshop_id']; ?>#reviews" title="Edit"><i class="skillgro-edit"></i></a>
                        <a href="remove/review.php?id=<?php echo $review['id']; ?>" title="Delete"><i class="skillgro-bin"></i></a>
                    </div>
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