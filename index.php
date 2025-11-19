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
            <div class="banner-clouds-wrapper">
                <div class="banner-cloud-layer cloud-layer-1" data-background="assets/img/banner/h5_hero_bg_shape.svg"></div>
                <div class="banner-cloud-layer cloud-layer-2" data-background="assets/img/banner/h5_hero_bg_shape.svg"></div>
                <div class="banner-cloud-layer cloud-layer-3" data-background="assets/img/banner/h5_hero_bg_shape.svg"></div>
                <div class="banner-cloud-layer cloud-layer-4" data-background="assets/img/banner/h5_hero_bg_shape.svg"></div>
            </div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-5 col-lg-5">
                        <div class="banner__content-five">
                            <span class="sub-title" data-aos="fade-right" data-aos-delay="200">Unlock Your Potential with the Magic of Skills!</span>
                            <h2 class="title" data-aos="fade-right" data-aos-delay="400">World-Class <span> Workshops for </span>Future Leaders.</h2>
                            <p data-aos="fade-right" data-aos-delay="600">A fun and interactive space to transform your interests into powerful life skills! Discover, Learn & Grow with the Magic of Skills!</p>
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
        <section class="courses-area section-pt-120">
            <style>
                .workshop-grid-item {
                    margin-bottom: 20px;
                }
                .workshop-card-compact {
                    background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.98) 100%);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(102, 126, 234, 0.1);
                    border-radius: 12px;
                    overflow: hidden;
                    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.08), 
                                0 0 0 1px rgba(255,255,255,0.5) inset;
                    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    position: relative;
                }
                .workshop-card-compact::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    height: 2px;
                    background: linear-gradient(90deg, 
                        rgba(102, 126, 234, 0.8) 0%, 
                        rgba(118, 75, 162, 0.8) 50%, 
                        rgba(102, 126, 234, 0.8) 100%);
                    opacity: 0;
                    transition: opacity 0.4s ease;
                }
                .workshop-card-compact:hover::before {
                    opacity: 1;
                }
                .workshop-card-compact:hover {
                    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.2), 
                                0 0 0 1px rgba(102, 126, 234, 0.2) inset,
                                0 0 40px rgba(102, 126, 234, 0.1);
                    transform: translateY(-4px) scale(1.01);
                    border-color: rgba(102, 126, 234, 0.3);
                }
                .workshop-thumb-compact {
                    position: relative;
                    width: 100%;
                    padding-bottom: 44.65%;
                    overflow: hidden;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                }
                .workshop-thumb-compact::after {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: linear-gradient(180deg, 
                        rgba(102, 126, 234, 0) 0%, 
                        rgba(102, 126, 234, 0.1) 100%);
                    opacity: 0;
                    transition: opacity 0.4s ease;
                    pointer-events: none;
                }
                .workshop-card-compact:hover .workshop-thumb-compact::after {
                    opacity: 1;
                }
                .workshop-thumb-compact img {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    filter: brightness(1) saturate(1);
                }
                .workshop-card-compact:hover .workshop-thumb-compact img {
                    transform: scale(1.08);
                    filter: brightness(1.05) saturate(1.1);
                }
                .workshop-category-badge {
                    display: inline-block;
                    padding: 3px 10px;
                    background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
                    backdrop-filter: blur(5px);
                    border: 1px solid rgba(102, 126, 234, 0.2);
                    border-radius: 15px;
                    font-size: 9px;
                    font-weight: 700;
                    color: var(--tg-theme-primary, #667eea);
                    text-decoration: none;
                    margin-bottom: 8px;
                    transition: all 0.3s ease;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }
                .workshop-category-badge:hover {
                    background: linear-gradient(135deg, rgba(102, 126, 234, 0.25) 0%, rgba(118, 75, 162, 0.25) 100%);
                    transform: scale(1.05);
                    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
                }
                .workshop-body-compact {
                    padding: 12px;
                    flex-grow: 1;
                    display: flex;
                    flex-direction: column;
                    background: linear-gradient(180deg, transparent 0%, rgba(255,255,255,0.5) 100%);
                }
                .workshop-title-compact {
                    font-size: 14px;
                    font-weight: 700;
                    margin: 0 0 6px 0;
                    line-height: 1.3;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
                .workshop-title-compact a {
                    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    text-decoration: none;
                    transition: all 0.3s ease;
                    display: block;
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }
                .workshop-title-compact a:hover {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                }
                .workshop-trainer-compact {
                    font-size: 11px;
                    color: #666;
                    margin-bottom: 8px;
                }
                .workshop-trainer-compact a {
                    color: var(--tg-theme-primary, #667eea);
                    text-decoration: none;
                    font-weight: 500;
                    transition: all 0.3s ease;
                }
                .workshop-trainer-compact a:hover {
                    color: #764ba2;
                }
                .workshop-meta-compact {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 8px;
                    margin-bottom: 8px;
                    padding-bottom: 8px;
                    border-bottom: 1px solid rgba(102, 126, 234, 0.1);
                }
                .workshop-meta-item {
                    display: flex;
                    align-items: center;
                    gap: 4px;
                    font-size: 10px;
                    color: #666;
                    transition: all 0.3s ease;
                }
                .workshop-meta-item:hover {
                    color: #667eea;
                }
                .workshop-meta-item i {
                    font-size: 10px;
                    color: var(--tg-theme-primary, #667eea);
                    filter: drop-shadow(0 0 2px rgba(102, 126, 234, 0.3));
                }
                .workshop-level-badge {
                    display: inline-block;
                    padding: 2px 6px;
                    border-radius: 4px;
                    font-size: 9px;
                    font-weight: 700;
                    background: linear-gradient(135deg, #f0f0f0 0%, #e0e0e0 100%);
                    color: #666;
                    border: 1px solid rgba(0,0,0,0.05);
                }
                .workshop-level-badge.beginner {
                    background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
                    color: #2e7d32;
                    box-shadow: 0 2px 4px rgba(46, 125, 50, 0.2);
                }
                .workshop-level-badge.intermediate {
                    background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
                    color: #e65100;
                    box-shadow: 0 2px 4px rgba(230, 81, 0, 0.2);
                }
                .workshop-level-badge.advanced {
                    background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 100%);
                    color: #c2185b;
                    box-shadow: 0 2px 4px rgba(194, 24, 91, 0.2);
                }
                .workshop-footer-compact {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-top: auto;
                    padding-top: 8px;
                }
                .workshop-price-compact {
                    font-size: 16px;
                    font-weight: 800;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    margin: 0;
                    filter: drop-shadow(0 2px 4px rgba(102, 126, 234, 0.2));
                }
                .workshop-btn-compact {
                    padding: 5px 12px;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: #fff;
                    text-decoration: none;
                    border-radius: 8px;
                    font-weight: 700;
                    font-size: 11px;
                    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3),
                                0 0 0 0 rgba(102, 126, 234, 0.4);
                    position: relative;
                    overflow: hidden;
                }
                .workshop-btn-compact::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                    transition: left 0.5s ease;
                }
                .workshop-btn-compact:hover::before {
                    left: 100%;
                }
                .workshop-btn-compact:hover {
                    background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
                    transform: translateY(-2px) scale(1.05);
                    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.5),
                                0 0 20px rgba(102, 126, 234, 0.3);
                }
                .workshop-coming-soon {
                    padding: 5px 12px;
                    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
                    color: var(--tg-theme-primary, #667eea);
                    border-radius: 8px;
                    font-weight: 700;
                    font-size: 11px;
                    border: 1px solid rgba(102, 126, 234, 0.3);
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }
                .workshop-view-all {
                    text-align: center;
                    margin-top: 30px;
                }
                .workshop-view-all-link {
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    padding: 10px 24px;
                    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
                    backdrop-filter: blur(10px);
                    border: 1px solid rgba(102, 126, 234, 0.3);
                    border-radius: 25px;
                    color: var(--tg-theme-primary, #667eea);
                    text-decoration: none;
                    font-weight: 700;
                    font-size: 13px;
                    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                    position: relative;
                    overflow: hidden;
                }
                .workshop-view-all-link::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    transition: left 0.4s ease;
                    z-index: -1;
                }
                .workshop-view-all-link:hover::before {
                    left: 0;
                }
                .workshop-view-all-link:hover {
                    color: #fff;
                    border-color: rgba(102, 126, 234, 0.5);
                    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4),
                                0 0 20px rgba(102, 126, 234, 0.2);
                    transform: translateY(-2px);
                }
                .workshop-view-all-link i {
                    font-size: 14px;
                    transition: transform 0.3s ease;
                }
                .workshop-view-all-link:hover i {
                    transform: translateX(4px);
                }
            </style>
            <div class="container">
                <div class="section__title-wrap" style="margin-bottom: 30px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="section__title text-center">
                                <span class="sub-title">Top Class Workshops</span>
                                <h2 class="title" style="font-size: 28px; margin-bottom: 8px;">Discover Workshops That Inspire You to Do More</h2>
                                <p class="desc" style="font-size: 13px; margin-top: 8px; width: 80%; margin: 0 auto;">Step into a world of ideas, challenges, and hands-on activities. Each workshop is designed to spark curiosity, build new abilities, and help you explore what you're truly capable of.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                                <?php 
                                $sql= "SELECT workshops.*, categories.name AS category_name, categories.id AS category_id, trainers.name AS trainer_name 
                                            FROM workshops 
                                            JOIN categories ON workshops.category_id = categories.id 
                                            JOIN trainers ON workshops.trainer_id = trainers.id 
                                            LIMIT 6";
                                            $results = $connect->query($sql);
                    while ($final = $results->fetch_assoc()) { 
                        // Format date and time
                        $start_time = $final['start_time'];
                        $date = new DateTime($start_time);
                        $now = new DateTime();
                        $one_year_later = clone $now;
                        $one_year_later->modify('+1 year');
                        
                        // Check if date is more than 1 year away
                        $is_coming_soon = $date > $one_year_later;
                        
                        $formatted_date = $is_coming_soon ? 'Coming Soon' : $date->format('M j, Y');
                        $formatted_time = $date->format('h:i A');
                        
                        // Get level text
                        $level_text = '';
                        $level_class = '';
                        if($final['level'] == 1) {
                            $level_text = 'Beginner';
                            $level_class = 'beginner';
                        } else if($final['level'] == 2) {
                            $level_text = 'Intermediate';
                            $level_class = 'intermediate';
                        } else {
                            $level_text = 'Advanced';
                            $level_class = 'advanced';
                        }
                    ?>
                    <div class="col-lg-4 col-md-6 workshop-grid-item">
                        <div class="workshop-card-compact">
                            <div class="workshop-thumb-compact">
                                                        <a href="course-details.php?id=<?php echo $final['id']; ?>">
                                    <img src="<?php echo $uri . $final['banner_image'] ?>" alt="<?php echo htmlspecialchars($final['name']); ?>">
                                                        </a>
                                                    </div>
                            <div class="workshop-body-compact">
                                <a href="course-details.php?id=<?php echo $final['id']; ?>" class="workshop-category-badge"><?php echo htmlspecialchars($final['category_name']); ?></a>
                                <h5 class="workshop-title-compact">
                                    <a href="course-details.php?id=<?php echo $final['id']; ?>"><?php echo htmlspecialchars($final['name']); ?></a>
                                </h5>
                                <p class="workshop-trainer-compact">By <a href="#"><?php echo htmlspecialchars($final['trainer_name']); ?></a></p>
                                <div class="workshop-meta-compact">
                                    <div class="workshop-meta-item">
                                        <i class="flaticon-calendar"></i>
                                        <span><?php echo $formatted_date; ?></span>
                                                </div>
                                    <div class="workshop-meta-item">
                                        <i class="flaticon-clock"></i>
                                        <span><?php echo $final['duration']; ?> Min</span>
                                        </div>
                                    <div class="workshop-meta-item">
                                        <span class="workshop-level-badge <?php echo $level_class; ?>"><?php echo $level_text; ?></span>
                                    </div>
                                </div>
                                <div class="workshop-footer-compact">
                                    <h5 class="workshop-price-compact">₹<?php echo number_format($final['price']); ?></h5>
                                    <?php if($is_coming_soon) { ?>
                                        <span class="workshop-coming-soon">Coming Soon</span>
                                    <?php } else { ?>
                                        <a href="course-details.php?id=<?php echo $final['id']; ?>" class="workshop-btn-compact">Enroll Now</a>
                                    <?php } ?>
                                </div>
                                    </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="workshop-view-all">
                    <a href="courses.php?is_completed[]=0" class="workshop-view-all-link">
                        View All Upcoming Workshops
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
        <!-- course-area-end -->
                  <!-- features-area -->
        <section class="features__area-three section-pb-90 features-compact-area">
            <style>
                .features-compact-area {
                    padding-top: 40px;
                }
                .features-compact-card {
                    background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(244,247,255,0.95));
                    border-radius: 22px;
                    padding: 22px;
                    box-shadow: 0 18px 40px rgba(12, 18, 56, 0.12);
                    display: flex;
                    align-items: center;
                    gap: 18px;
                    border: 1px solid rgba(255, 193, 36, 0.25);
                    position: relative;
                    overflow: hidden;
                    backdrop-filter: blur(6px);
                }
                .features-compact-card::after {
                    content: "";
                    position: absolute;
                    inset: 0;
                    border-radius: inherit;
                    border: 1px solid rgba(255,255,255,0.35);
                    pointer-events: none;
                }
                .features-compact-card:hover {
                    transform: translateY(-6px);
                    box-shadow: 0 25px 55px rgba(12, 18, 56, 0.18);
                }
                .features-compact-icon {
                    width: 64px;
                    height: 64px;
                    border-radius: 18px;
                    background: linear-gradient(135deg, #ffe3a3, #ffc124);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 10px 25px rgba(255, 193, 36, 0.4);
                }
                .features-compact-icon img {
                    width: 32px;
                    height: 32px;
                }
                .features-compact-card h3 {
                    margin: 0 0 6px;
                    font-size: 19px;
                    font-weight: 700;
                }
                .features-compact-card p {
                    margin: 0;
                    font-size: 14px;
                    color: #5a5670;
                    line-height: 1.5;
                }
                .features-compact-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                    gap: 26px;
                }
                @media (max-width: 575.98px) {
                    .features-compact-card {
                        padding: 18px;
                    }
                    .features-compact-icon {
                        width: 56px;
                        height: 56px;
                    }
                    .features-compact-card h3 {
                        font-size: 18px;
                    }
                    .features-compact-card p {
                        font-size: 13px;
                    }
                }
            </style>
            <div class="container">
                <div class="row justify-content-center mb-30">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section__title text-center">
                            <span class="sub-title">What We Offer</span>
                            <h2 class="title">Learn New Skills, Anywhere</h2>
                            <p>Everything you need to grow with confidence — bite-sized, practical, and people-first.</p>
                        </div>
                    </div>
                </div>
                <div class="features-compact-grid">
                    <div class="features-compact-card">
                        <div class="features-compact-icon">
                            <img src="assets/img/icons/h2_features_icon01.svg" alt="Expert Tutors" class="injectable">
                        </div>
                        <div>
                            <h3>Expert Tutors</h3>
                            <p>Learn directly from practitioners who teach from lived experience.</p>
                        </div>
                    </div>
                    <div class="features-compact-card">
                        <div class="features-compact-icon">
                            <img src="assets/img/icons/h2_features_icon02.svg" alt="Effective Courses" class="injectable">
                        </div>
                        <div>
                            <h3>Effective Courses</h3>
                            <p>Short, outcome-driven formats designed to fit real schedules.</p>
                        </div>
                    </div>
                    <div class="features-compact-card">
                        <div class="features-compact-icon">
                            <img src="assets/img/icons/h2_features_icon03.svg" alt="Certificate" class="injectable">
                        </div>
                        <div>
                            <h3>Earn Certificates</h3>
                            <p>Showcase your progress with verifiable credentials on completion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-area-end -->
          <!-- about-area -->
           <br>
        <section class="about-area-five>
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
                                <span class="sub-title">Get to Know Us</span>
                                <h2 class="title bold">Why Magic of Skills is the Right Place for You</h2>
                            </div>
                            <p>Magic of Skills is a creative learning space where students discover what they’re good at and what they love doing. We turn everyday curiosity into practical skills through fun activities, challenges, and interactive workshops. <br>From communication to creativity and confidence to content creation, this is where you learn things that actually matter in real life. </p>
                            <h5 class="title bold">What Makes Us Different?</h5>
                            <ul class="about__info-list list-wrap">
                                <li class="about__info-list-item">
                                    <i class="flaticon-angle-right"></i>
                                    <p class="content">⭐ Skill-Based Learning That Matters</p>
                                </li>
                                <li class="about__info-list-item">
                                    <i class="flaticon-angle-right"></i>
                                    <p class="content">⭐ Learn Your Way</p>
                                </li>
                                <li class="about__info-list-item">
                                    <i class="flaticon-angle-right"></i>
                                    <p class="content">⭐ A Space That Supports You</p>
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

       



          <!-- faq-area -->
        <!-- <section class="faq__area-two tg-motion-effects section-py-140">
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
        </section> -->
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
                <!-- Desktop Grid View -->
                <div class="row justify-content-center d-none d-md-flex">
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
                <!-- Mobile Swiper View -->
                <div class="swiper blog-swiper-active d-md-none">
                    <div class="swiper-wrapper">
                        <?php
                          $side2 = "SELECT blogs.* , blog_categories.name as cat_name FROM blogs, blog_categories where blogs.category_id = blog_categories.id  ORDER BY blogs.id DESC LIMIT 3";
                          $sider2 = $connect->query($side2);
                          while($finalr2=$sider2->fetch_assoc()){?>
                        <div class="swiper-slide">
                            <div class="blog__post-item-four shine__animate-item">
                                <div class="blog__post-thumb-four">
                                    <a href="blog-details.php?id=<?php echo $finalr2['id'] ?>" class="shine__animate-link"><img src="<?php echo $uri.$finalr2['icon'] ?>" alt="img"></a>
                                </div>
                                <div class="blog__post-content-four">
                                    <a href="blog.php" class="post-tag-three"><?php echo $finalr2['cat_name'] ?></a>
                                    <h2 class="title"><a href="blog-details.php?id=<?php echo $finalr2['id'] ?>"><?php echo $finalr2['title'] ?></a></h2>
                                    <div class="blog__post-meta">
                                        <ul class="list-wrap">
                                            <li><i class="flaticon-user-1"></i>by <a href="blog-details.php?id=<?php echo $finalr2['id'] ?>"><?php echo $finalr2['author_name'] ?></a></li>
                                            <li><i class="flaticon-calendar"></i><?php
                                                $date2 = $finalr2['created_at'];
                                                $formattedDate2 = DateTime::createFromFormat('Y-m-d H:i:s', $date2)->format('F j, Y');
                                                echo $formattedDate2;
                                                ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="blog__nav">
                        <div class="blog-button-prev"><i class="flaticon-arrow-right"></i></div>
                        <div class="blog-button-next"><i class="flaticon-arrow-right"></i></div>
                    </div>
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