<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php include "include/session.php" ;  include "include/meta.php" ?>
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
                        <div class="dashboard__content-wrap dashboard__content-wrap-two">
                            <div class="dashboard__content-title">
                                <h4 class="title">Enrolled Courses</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="dashboard__nav-wrap">
                                        <ul class="nav nav-tabs" id="courseTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button"
                                                    role="tab" aria-controls="all-tab-pane" aria-selected="true">
                                                    Enrolled Courses
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button"
                                                    role="tab" aria-controls="design-tab-pane" aria-selected="false">
                                                    Active Courses
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#business-tab-pane" type="button"
                                                    role="tab" aria-controls="business-tab-pane" aria-selected="false">
                                                    Completed Courses
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="courseTabContent">
                                        <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                            <div class="swiper dashboard-courses-active">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb01.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Development</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author001.png" alt="img">David Millar</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.8 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>88%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 88%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>05</li>
                                                                    <li><i class="flaticon-clock"></i>11h 20m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>22</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb02.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Design</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">The Complete Graphic Design for Beginners</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author002.png" alt="img">Wilson</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.5 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>70%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 70%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>60</li>
                                                                    <li><i class="flaticon-clock"></i>70h 45m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>202</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb03.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Data Science</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author003.png" alt="img">Warren</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.8 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>95%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 95%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>08</li>
                                                                    <li><i class="flaticon-clock"></i>18h 20m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>66</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb04.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Business</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Financial Analyst Training & Investing Course</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author004.png" alt="img">Robert Fox</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.2 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>80%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 80%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>05</li>
                                                                    <li><i class="flaticon-clock"></i>11h 20m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>22</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb05.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Mathematic</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author002.png" alt="img">Hawkins</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.7 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>60%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 60%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>10</li>
                                                                    <li><i class="flaticon-clock"></i>13h 10m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>99</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                            <div class="swiper dashboard-courses-active">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb02.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Design</a>
                                                                    </li>
                                                                    <li class="price"><del>$20.00</del>$10.00</li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">The Complete Graphic Design for Beginners</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author002.png" alt="img">Wilson</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.5 Reviews)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>60</li>
                                                                    <li><i class="flaticon-clock"></i>70h 45m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>202</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb01.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Development</a>
                                                                    </li>
                                                                    <li class="price"><del>$29.00</del>$9.00</li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author001.png" alt="img">David Millar</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.8 Reviews)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>05</li>
                                                                    <li><i class="flaticon-clock"></i>11h 20m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>22</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb03.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Data Science</a>
                                                                    </li>
                                                                    <li class="price">$20.00</li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author003.png" alt="img">Warren</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.8 Reviews)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>08</li>
                                                                    <li><i class="flaticon-clock"></i>18h 20m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>66</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb04.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Business</a>
                                                                    </li>
                                                                    <li class="price"><del>$20.00</del>$15.00</li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Financial Analyst Training & Investing Course</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author004.png" alt="img">Robert Fox</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.2 Reviews)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>05</li>
                                                                    <li><i class="flaticon-clock"></i>11h 20m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>22</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb05.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Mathematic</a>
                                                                    </li>
                                                                    <li class="price"><del>$29.00</del>$9.00</li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author002.png" alt="img">Hawkins</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.7 Reviews)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>10</li>
                                                                    <li><i class="flaticon-clock"></i>13h 10m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>99</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="business-tab-pane" role="tabpanel" aria-labelledby="business-tab" tabindex="0">
                                            <div class="swiper dashboard-courses-active">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb01.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Development</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author001.png" alt="img">David Millar</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.8 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>100%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>05</li>
                                                                    <li><i class="flaticon-clock"></i>11h 20m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>22</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb02.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Design</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">The Complete Graphic Design for Beginners</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author002.png" alt="img">Wilson</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.5 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>100%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>60</li>
                                                                    <li><i class="flaticon-clock"></i>70h 45m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>202</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="courses__item courses__item-two shine__animate-item">
                                                            <div class="courses__item-thumb courses__item-thumb-two">
                                                                <a href="course-details.php" class="shine__animate-link">
                                                                    <img src="assets/img/courses/course_thumb05.jpg" alt="img">
                                                                </a>
                                                            </div>
                                                            <div class="courses__item-content courses__item-content-two">
                                                                <ul class="courses__item-meta list-wrap">
                                                                    <li class="courses__item-tag">
                                                                        <a href="course.html">Mathematic</a>
                                                                    </li>
                                                                </ul>
                                                                <h5 class="title"><a href="course-details.php">Learning JavaScript With Imagination</a></h5>
                                                                <div class="courses__item-content-bottom">
                                                                    <div class="author-two">
                                                                        <a href="instructor-details.php"><img src="assets/img/courses/course_author002.png" alt="img">Hawkins</a>
                                                                    </div>
                                                                    <div class="avg-rating">
                                                                        <i class="fas fa-star"></i> (4.7 Reviews)
                                                                    </div>
                                                                </div>
                                                                <div class="progress-item progress-item-two">
                                                                    <h6 class="title">COMPLETE <span>100%</span></h6>
                                                                    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                                        <div class="progress-bar" style="width: 100%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="courses__item-bottom-two">
                                                                <ul class="list-wrap">
                                                                    <li><i class="flaticon-book"></i>10</li>
                                                                    <li><i class="flaticon-clock"></i>13h 10m</li>
                                                                    <li><i class="flaticon-mortarboard"></i>99</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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