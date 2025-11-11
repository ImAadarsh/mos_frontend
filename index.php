<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
<?php include "include/session.php" ;  include "include/meta.php" ?>
</head>
<body class="index-page">
<?php include "include/header.php" ?>
    <!-- main-area -->
    <main class="main-area fix">

        <!-- banner-area -->
        <section class="banner-area banner-bg-five banner-align-centered tg-motion-effects" data-background="assets/img/banner-hh.png">
            <div class="banner-bg-five-shape" data-background="assets/img/banner/h5_hero_bg_shape.svg"></div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-5 col-lg-5">
                        <div class="banner__content-five">
                            <span class="sub-title" data-aos="fade-right" data-aos-delay="200">Unlock Your Potential with the Magic of Skills!</span>
                            <h2 class="title" data-aos="fade-right" data-aos-delay="400">World-Class <span> Workshops for </span>Future Leaders.</h2>
                            <p data-aos="fade-right" data-aos-delay="600">Transform your passions into skills that shape your future. Explore, learn, and grow with Magic of Skills!</p>
                            <div class="banner__btn" data-aos="fade-right" data-aos-delay="800">
                                <a href="login.php" class="btn arrow-btn">Start Your Journey Now <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9 col-sm-10">
                        <div class="banner__images-five">
                            <img src="assets/img/hero-mos.png" alt="img">
                            <div class="shape-wrap">
                                <div class="shape-one" data-aos="fade-up-right" data-aos-delay="800" >
                                    <img src="assets/img/banner/h5_hero_shape04.svg" alt="shape" class="tg-motion-effects1">
                                </div>
                                <div class="shape-two" data-aos="fade-down-left" data-aos-delay="800">
                                    <img src="assets/img/banner/h5_hero_shape05.svg" alt="shape" class="tg-motion-effects3">
                                </div>
                                <div class="shape-three" data-aos="fade-up-left" data-aos-delay="800">
                                    <img src="assets/img/banner/h5_hero_shape06.svg" alt="shape">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner__shape-wrap-two">
                <img src="assets/img/banner/h5_hero_shape01.svg" alt="shape" data-aos="fade-right" data-aos-delay="1000">
                <img src="assets/img/banner/h5_hero_shape02.svg" alt="shape" class="tg-motion-effects7">
                <img src="assets/img/banner/h5_hero_shape03.svg" alt="shape" class="tg-motion-effects3">
            </div>
        </section>
        <!-- banner-area-end -->


       
        <!-- course-area -->
        <section class="courses-area section-pt-120 section-pb-90" data-background="assets/img/bg/courses_bg.jpg">
            <div class="container">
                <div class="section__title-wrap">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section__title text-center ">
                                <span class="sub-title">Top Class Workshops</span>
                                <h2 class="title">Explore Our World's Best Workshops</h2>
                                <p class="desc">Unlock your potential with unparalleled learning experiences.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="courseTabContent">
                    <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                        <div class="swiper courses-swiper-active">
                            <div class="swiper-wrapper">
                                <?php 
                                $sql= "SELECT workshops.*, categories.name AS category_name, categories.id AS category_id, trainers.name AS trainer_name 
                                            FROM workshops 
                                            JOIN categories ON workshops.category_id = categories.id 
                                            JOIN trainers ON workshops.trainer_id = trainers.id 
                                            LIMIT 10";
                                            $results = $connect->query($sql);

                                    while ($final = $results->fetch_assoc()) {?>
                                <div class="swiper-slide">
                                    <div class="courses__item shine__animate-item">
                                        <div class="courses__item-thumb">
                                            <a href="course-details.php?id=<?php echo $final['id']; ?>" class="shine__animate-link">
                                                <img src="<?php echo $uri . $final['icon'] ?>" alt="img">
                                            </a>
                                        </div>
                                        <div class="courses__item-content">
                                            <ul class="courses__item-meta list-wrap">
                                                <li class="courses__item-tag">
                                                    <a href="course-details.php?id=<?php echo $final['id']; ?>"><?php echo $final['category_name']; ?></a>
                                                </li>
                                          <li><a href="controller/wishlist.php?workshop_id=<?php echo $final['id']; ?>" class="courses__wishlist-one"><img src="assets/img/icons/heart02.svg" alt="" class="injectable"></a></li>
                                            </ul>
                                            <h5 class="title"><a href="course-details.php?id=<?php echo $final['id']; ?>"><?php echo $final['name']; ?></a></h5>
                                            <p class="author">By <a href="#"><?php echo $final['trainer_name']; ?></a></p>
                                            <div class="courses__item-bottom">
                                                    <div class="button">
                                                        <a href="course-details.php?id=<?php echo $final['id']; ?>">
                                                            <span class="text">Enroll Now</span>
                                                            <i class="flaticon-arrow-right"></i>
                                                        </a>
                                                    </div>
                                                     <!-- <a href="controller/wishlist.php?workshop_id=<?php echo $final['id']; ?>" class="courses__wishlist-one"><img src="assets/img/icons/heart02.svg" alt="" class="injectable"></a> -->
                                                     <h5 class="price">₹<?php echo $final['price']; ?></h5>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                    <?php } ?>
                               
                            </div>
                        </div>
                        <div class="courses__nav">
                            <div class="courses-button-prev"><i class="flaticon-arrow-right"></i></div>
                            <div class="courses-button-next"><i class="flaticon-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- course-area-end -->
          <!-- about-area -->
        <section class="about-area-five section-pb-140">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="about__images-five">
                            <div class="about__mask-img-one">
                                <img src="assets/img/Untitled design (3).png" alt="img">
                            </div>
                            <div class="about__mask-img-two" data-aos="fade-right" data-aos-delay="200">
                                <img src="assets/img/b5.png" alt="img">
                            </div>
                            <div class="shape">
                                <img src="assets/img/others/h5_about_img_shape01.svg" alt="shape" data-aos="fade-down-left" data-aos-delay="400">
                                <img src="assets/img/others/h5_about_img_shape02.svg" alt="shape" data-aos="fade-up-right" data-aos-delay="400">
                                <img src="assets/img/others/h5_about_img_shape03.svg" alt="shape" class="rotateme">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__content-five">
                            <div class="section__title mb-15">
                                <span class="sub-title">Get More About Us</span>
                                <h2 class="title bold">Reasons to get started with Magic of Skills:</h2>
                            </div>
                            <p>Magic of Skills is a dynamic platform designed to help students discover their talents and interests. Whether you're looking to develop in STEM, explore your creative side, or improve your personal development, Magic of Skills offers a variety of engaging courses and a supportive community.</p>
                            <ul class="about__info-list list-wrap">
                                <li class="about__info-list-item">
                                    <i class="flaticon-angle-right"></i>
                                    <p class="content">Learn in-demand skills</p>
                                </li>
                                <li class="about__info-list-item">
                                    <i class="flaticon-angle-right"></i>
                                    <p class="content">Flexible learning</p>
                                </li>
                                <li class="about__info-list-item">
                                    <i class="flaticon-angle-right"></i>
                                    <p class="content">Supportive community</p>
                                </li>
                            </ul>
                            <div class="about__content-bottom">
                                <a href="login.php" class="btn arrow-btn">Start for Free <img src="assets/img/icons/right_arrow.svg" alt="" class="injectable"></a>
                                <div class="about__contact">
                                    <div class="icon">
                                        <i class="skillgro-phone-call"></i>
                                        <svg width="61" height="57" viewBox="0 0 61 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M33.8271 1.03084C45.4231 1.45238 55.2747 9.02544 58.7825 19.8885C62.2129 30.5119 58.2066 41.852 49.1968 48.6277C39.3708 56.0171 26.0908 58.9731 15.8124 52.2032C4.34981 44.6532 -2.0548 30.6516 2.45508 17.8409C6.75857 5.61644 20.666 0.552417 33.8271 1.03084Z" stroke="currentcolor" stroke-width="2" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <a href="tel:+917697001231">+91 7697001231</a>
                                        <span>Call for any Question</span>
                                    </div>
                                </div>
                            </div>
                            <div class="shape">
                                <img src="assets/img/others/h5_about_shape02.png" alt="shape" class="alltuchtopdown">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about__shape">
                <img src="assets/img/others/h5_about_shape01.png" alt="shape" data-aos="fade-right" data-aos-delay="800">
            </div>
        </section>
        <!-- about-area-end -->

       

        <!-- instructor-area -->
        <section class="instructor__area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="instructor__content-wrap">
                            <div class="section__title mb-15">
                                <span class="sub-title">Skilled Introduce</span>
                                <h2 class="title">Our Top Class & Expert Instructors in One Place</h2>
                            </div>
                            <p>Our instructors are not only highly knowledgeable in their fields but also passionate about teaching and mentoring students.</p>
                            <div class="tg-button-wrap">
                                <a href="instructors.php" class="btn arrow-btn">See All Instructors <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="instructor__item-wrap">
                            <div class="row">
                            <?php 
                            $sql = "SELECT * FROM trainers";
                            $results = $connect->query($sql);
                            while ($final = $results->fetch_assoc()) {
                            ?>
                            <?php
                                $trainer_id = $final['id'];
                            $feedsql = "SELECT AVG(rating) as average_rating, COUNT(*) as review_count FROM reviews WHERE trainer_id = $trainer_id";
                            $feedback = $connect->query($feedsql);
                            $feedback_data = $feedback->fetch_assoc();
                            ?>
                                <div class="col-sm-6">
                                    <div class="instructor__item">
                                        <div class="instructor__thumb">
                                            <a href="instructor-details.php?id=<?php echo $final['id'] ?>"><img style=" border-radius: 50%; border: 2px solid gold; padding: 3px;" src="<?php echo $uri.$final['image'] ?>" alt="img"></a>
                                        </div>
                                        <div class="instructor__content">
                                            <h2 class="title"><a href="instructor-details.php?id=<?php echo $final['id'] ?>"><?php echo $final['name'] ?></a></h2>
                                            <span class="designation"><?php echo $final['designation'] ?></span>
                                            <?php if($feedback_data['review_count']>5){?>
                                            <p class="avg-rating">
                                                
                                                <?php
                                                $average_rating = round($feedback_data['average_rating']);
                                                for ($i = 1; $i <= $average_rating; $i++) {
                                                    echo '<i class="fas fa-star"></i>';
                                                    
                                                }echo round($feedback_data['average_rating'],2).''; 
                                                ?>
 Stars
                                            </p>
                                            <?php } ?>
                                            <div class="instructor__social">
                                                <ul class="list-wrap">
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
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
        <!-- instructor-area-end -->

          <!-- faq-area -->
        <section class="faq__area-two tg-motion-effects section-py-140">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-8 order-0 order-lg-2">
                        <div class="faq__img-three">
                            <div class="faq__mask-img">
                                <img src="assets/img/a2.png" alt="img">
                            </div>
                            <div class="faq__img-shape">
                                <img src="assets/img/others/h5_faq_img_shape.svg" alt="" class="injectable">
                            </div>
                            <div class="shape shape-one" data-aos="fade-down-left" data-aos-delay="400">
                                <img src="assets/img/others/h5_faq_shape02.svg" alt="shape" class="tg-motion-effects3">
                            </div>
                            <div class="shape shape-two" data-aos="fade-up-left" data-aos-delay="400">
                                <img src="assets/img/others/h5_faq_shape03.svg" alt="shape" class="tg-motion-effects4">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq__content-two">
                            <div class="section__title mb-15">
                                <span class="sub-title">Faq’s</span>
                                <h2 class="title bold">Why Our Schools are the Right Fit for Your Child?</h2>
                            </div>
                            <p>We are dedicated to empowering the next generation through skill-building and knowledge enrichment. Magic of Skills is committed to nurturing young minds and helping them acquire the tools they need to succeed in an ever-evolving world. Join us on this exciting journey to unlock your potential and transform your future.</p>
                            <div class="faq__wrap faq__wrap-two">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Tailored Learning Experiences:
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Our platform offers a wide range of courses and workshops designed to meet the diverse interests and needs of students. Whether you're passionate about science, technology, arts, or personal development, we have something for you.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Expert Instructors:
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Learn from the best! Our courses are taught by experienced educators and industry professionals from around the world, ensuring high-quality and relevant learning experiences.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Interactive and Engaging:
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>We believe that learning should be fun and engaging. Our courses incorporate interactive elements, hands-on projects, and real-world applications to keep you motivated and inspired.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
                                            Flexible Learning: 
                                            </button>
                                        </h2>
                                        <div id="collapseThree1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>With both online and offline options, you can learn at your own pace and convenience. Our flexible schedules and diverse formats make it easy to fit learning into your busy life.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree">
                                            Community and Support: 
                                            </button>
                                        </h2>
                                        <div id="collapseThree2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>Join a vibrant community of like-minded learners and receive the support you need to succeed. Our dedicated team is here to guide you every step of the way.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq__shape">
                <img src="assets/img/others/h5_faq_shape01.svg" alt="shape" class="tg-motion-effects3">
            </div>
        </section>
        <!-- faq-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial__area-four tg-motion-effects">
            <div class="testimonial__bg-shape-one">
                <img src="assets/img/others/h5_testimonial_bg_shape01.svg" alt="" class="injectable">
            </div>
            <div class="testimonial__bg-shape-two">
                <img src="assets/img/others/h5_testimonial_bg_shape02.svg" alt="" class="injectable">
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-7 order-0 order-lg-2">
                        <div class="swiper-container testimonial-active-four">
                            <div class="swiper-wrapper">
                            <?php 
                                $sql = "SELECT * from testimonials limit 5";
                                    $results = $connect->query($sql);
                                    while ($testimonials = $results->fetch_assoc()) {
                                        
                                        
                                    ?>
                                <div class="swiper-slide">
                                    <div class="testimonial__item-four">
                                        <div class="rating">
                                        <?php for ($i=0; $i < $testimonials['rating']; $i++) { ?>
                                                                <i class="fas fa-star"></i>
                                                                <?php } ?>
                                        </div>
                                        <p><?php echo $testimonials['review'] ?></p>
                                        <div class="testimonial__bottom-two">
                                            <h4 class="title"><?php echo $testimonials['name'] ?></h4>
                                            <span>Students</span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="testimonial-pagination testimonial-pagination-two"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7">
                        <div class="testimonial__img-two">
                            <img src="assets/img/student-image.png" alt="img">
                            <div class="shape">
                                <img src="assets/img/others/h5_testimonial_shape01.svg" alt="shape" class="alltuchtopdown">
                                <img src="assets/img/others/h5_testimonial_shape02.svg" alt="shape" class="tg-motion-effects4">
                                <img src="assets/img/others/h5_testimonial_shape03.svg" alt="shape" class="tg-motion-effects3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial__shape-wrap">
                <img src="assets/img/others/h5_testimonial_shape04.svg" alt="shape" data-aos="fade-up" data-aos-delay="400">
                <img src="assets/img/others/h5_testimonial_shape05.svg" alt="shape" data-aos="fade-down-left" data-aos-delay="400">
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- blog-area -->
        <section class="blog__post-area-five section-pt-140 section-pb-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section__title text-center mb-50">
                            <span class="sub-title">News & Blogs</span>
                            <h2 class="title">Our Latest News Feed</h2>
                            <p>Read about the trending topics and our stories</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <?php
                      $side = "SELECT blogs.* , blog_categories.name as cat_name FROM blogs, blog_categories where blogs.category_id = blog_categories.id  ORDER BY blogs.id DESC LIMIT 3";
                      $sider = $connect->query($side);
                      while($finalr=$sider->fetch_assoc()){?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog__post-item-four shine__animate-item">
                            <div class="blog__post-thumb-four">
                                <a href="blog-details.php?id=<?php echo $finalr['id'] ?>" class="shine__animate-link"><img src="<?php echo $uri.$finalr['icon'] ?>" alt="img"></a>
                            </div>
                            <div class="blog__post-content-four">
                                <a href="blog.php" class="post-tag-three"><?php echo $finalr['cat_name'] ?></a>
                                <h2 class="title"><a href="blog-details.php?id=<?php echo $finalr['id'] ?>"><?php echo $finalr['title'] ?></a></h2>
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-user-1"></i>by <a href="blog-details.php?id=<?php echo $finalr['id'] ?>"><?php echo $finalr['author_name'] ?></a></li>
                                        <li><i class="flaticon-calendar"></i><?php
                                            $date = $finalr['created_at']; // Assume this is in 'Y-m-d H:i:s' format (e.g., '2024-04-13 17:00:00')
                                            $formattedDate = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
                                            echo $formattedDate;
                                            ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    
                </div>
            </div>
            <div class="blog__shape-wrap-two">
                <img src="assets/img/blog/h5_blog_shape01.svg" alt="shape" data-aos="fade-right" data-aos-delay="400">
                <img src="assets/img/blog/h5_blog_shape02.svg" alt="shape" data-aos="fade-up-left" data-aos-delay="400">
            </div>
        </section>
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
    <?php include "include/footer.php" ?>
    <!-- footer-area-end -->



    <?php include "include/script.php" ?>
</body>

</html>