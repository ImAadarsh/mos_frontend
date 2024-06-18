<?php include "include/session.php" ; ?>
<?php include "include/connect.php"; ?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM blogs where id='$id'";
    $results = $connect->query($sql);
    $final = $results->fetch_assoc();

    $cid = $final['category_id'];
    $csql = "SELECT * FROM blog_categories where id='$cid'";
    $cresults = $connect->query($csql);
    $cfinal = $cresults->fetch_assoc();

    // $tid = $final['trainer_id'];
    // $tsql = "SELECT * FROM trainers where id='$tid'";
    // $tresults = $connect->query($tsql);
    // $tfinal = $tresults->fetch_assoc();
    ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $final['title'] ?> | <?php echo $final['author_name'] ?></title>

    <meta name="description" content="<?php echo $final['subtitle'] ?>">
    <meta name="keywords" content="Magic Of Skills, workshop">
    <!-- Fav Icon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <meta property="og:title" content="<?php echo $final['title'] ?>">
    <meta property="og:description" content="<?php echo $final['subtitle'] ?>">
    <meta property="og:image" content="<?php echo $uri.$final['icon'] ?>">
    <meta property="og:url" content="https://magicofskills.com">
    <meta property="og:type" content="website">

    <meta name="twitter:title" content="<?php echo $final['title'] ?>">
    <meta name="twitter:description" content="<?php echo $final['subtitle'] ?>">
    <meta name="twitter:image" content="<?php echo $uri.$final['icon'] ?>">
    <meta name="twitter:card" content="<?php echo $final['title'] ?>">
    <meta property="og:site_name" content="Magic Of Skills">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
     <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QS071R2WWY"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-QS071R2WWY');
    </script>

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
                            <h3 class="title"><?php echo $final['title'] ?></h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="blog.php">Blogs</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem"><?php echo $final['title'] ?></span>
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

        <!-- blog-details-area -->
        <section class="blog-details-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="blog__details-wrapper">
                            <div class="blog__details-thumb">
                                <img src="<?php echo $uri.$final['banner'] ?>" alt="img">
                            </div>
                            <div class="blog__details-content">
                                <div class="blog__post-meta">
                                    <ul class="list-wrap">
                                        <li><i class="flaticon-calendar"></i>  <?php
                                            $date = $final['created_at']; // Assume this is in 'Y-m-d H:i:s' format (e.g., '2024-04-13 17:00:00')
                                            $formattedDate = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
                                            echo $formattedDate;
                                            ?></li>
                                        <li><i class="flaticon-user-1"></i> by <a href="#"><?php echo $final['author_name'] ?></a></li>
                                        <li><i class="flaticon-clock"></i> <?php echo rand(5,15); ?> Min Read</li>
                                        
                                    </ul>
                                </div>
                                <h3 class="title"><?php echo $final['title'] ?></h3>
                                <p><?php echo $final['content'] ?></p>
                                
                                <blockquote>
                                    <p>“ <?php echo $final['quote'] ?>”</p>
                                </blockquote>
                               
                                <div class="blog__details-content-inner">
                                
                               
                                <div class="blog__details-bottom">
                                    <div class="row align-items-center">
                                        <div class="col-xl-6 col-md-7">
                                            <div class="tg-post-tag">
                                                <h5 class="tag-title">Tags :</h5>
                                                <ul class="list-wrap p-0 mb-0">
                                                    <li><a href="#">Bath Cleaning</a></li>
                                                    <li><a href="#">Cleaning</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-5">
                                            <div class="tg-post-social justify-content-start justify-content-md-end">
                                                <h5 class="social-title">Share :</h5>
                                                <ul class="list-wrap p-0 mb-0">
                                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <aside class="blog-sidebar">
                            <div class="blog-widget widget_search">
                                <div class="sidebar-search-form">
                                    <form action="blog.php" method="get">
                                        <input name="search" type="text" placeholder="Search here">
                                        <button><i class="flaticon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="blog-widget">
                                <h4 class="widget-title">Categories</h4>
                                <div class="shop-cat-list">
                                    <ul class="list-wrap">
                                    <?php 
                                        $sql = "SELECT * FROM blog_categories ";

                                            $results = $connect->query($sql);
                                            while ($final = $results->fetch_assoc()) {
                                            ?>
                                        <li>
                                            <a href="blog.php?category_id=<?php echo $final['id'] ?>"><i class="flaticon-angle-right"></i><?php echo $final['name'] ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog-widget">
                                <h4 class="widget-title">Latest Post</h4>
                                <?php
                      $side = "SELECT * FROM blogs ORDER BY created_at ASC LIMIT 5";
                      $sider = $connect->query($side);
                      while($finalr=$sider->fetch_assoc()){?>
                                <div class="rc-post-item">
                                    <div class="rc-post-thumb">
                                        <a href="blog-details.php?id=<?php echo $finalr['id'] ?>">
                                            <img src="<?php echo $uri.$finalr['icon'] ?>" alt="img">
                                        </a>
                                    </div>
                                    <div class="rc-post-content">
                                        <span class="date"><i class="flaticon-calendar"></i> <?php
                                            $date = $finalr['created_at']; // Assume this is in 'Y-m-d H:i:s' format (e.g., '2024-04-13 17:00:00')
                                            $formattedDate = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
                                            echo $formattedDate;
                                            ?>
                                            </span>
                                        <h4 class="title"><a href="blog-details.php?id=<?php echo $finalr['id'] ?>"><?php echo $finalr['title'] ?></a></h4>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="blog-widget">
                                <h4 class="widget-title">Tags</h4>
                                <div class="tagcloud">
                                <?php
                      // Assuming $connect is your database connection

                      // Fetching all tags from the blogs table
                      $sql = "SELECT tags FROM blogs WHERE is_deleted = 0";
                      $results = $connect->query($sql);

                      // Concatenate all tags into a single string
                      $all_tags_string = "";
                      while ($row = $results->fetch_assoc()) {
                          $all_tags_string .= $row['tags'] . ",";
                      }

                      // Split the concatenated string into individual tags
                      $all_tags_array = array_filter(array_map('trim', explode(",", $all_tags_string)));

                      // Create an array of unique tags
                      $unique_tags_array = array_unique($all_tags_array);

                      // Iterate through the unique tags to create the tag cloud
                      ?>
                    <div class="tagcloud">
                    <?php foreach ($unique_tags_array as $tag) { ?>
                      <a href="blog.php?tag=<?php echo urlencode($tag); ?>" ><?php echo $tag; ?></a>
                    <?php } ?>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog-details-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
    <?php include "include/footer.php" ?>
    <!-- footer-area-end -->

    <?php include "include/script.php" ?>
</body>

</html>