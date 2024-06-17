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
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Blogs</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Blogs</span>
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

        <!-- blog-area -->
        <section class="blog-area section-py-120">
            <div class="container">
                <div class="row">
                <?php
                    // Set the number of results per page
                    $results_per_page = 9;

                    // Get the current page number from the URL, if not set default to 1
                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                        $page = (int)$_GET['page'];
                    } else {
                        $page = 1;
                    }

                    // Calculate the starting limit of the results
                    $start_from = ($page - 1) * $results_per_page;

                    // Build the base SQL query
                    if (isset($_GET['category_id'])) {
                        $cat = $_GET['category_id'];
                        $sql = "SELECT * FROM blogs WHERE category_id=$cat";
                    } else if (isset($_GET['search'])) {
                        $key = trim($_GET["search"]);
                        $sql = "SELECT * FROM blogs WHERE title LIKE '%$key%' OR content LIKE '%$key%' OR subtitle LIKE '%$key%' OR author_name LIKE '%$key%'";
                    } else if (isset($_GET['tag'])) {
                        $key = trim($_GET["tag"]);
                        $sql = "SELECT * FROM blogs WHERE tags LIKE '%$key%'";
                    } else {
                        $sql = "SELECT * FROM blogs";
                    }

                    // Get the total number of results
                    $total_results = $connect->query($sql)->num_rows;

                    // Modify the SQL query to limit the number of results per page
                    $sql .= " LIMIT $start_from, $results_per_page";
                    $results = $connect->query($sql);

                    ?>

<div class="col-xl-9 col-lg-8 order-0 order-lg-2">
    <div class="row gutter-20">
        <?php while ($final = $results->fetch_assoc()) { ?>
            <?php
            $cid = $final['category_id'];
            $sql1 = "SELECT * FROM blog_categories WHERE id=$cid";
            $results1 = $connect->query($sql1);
            $final1 = $results1->fetch_assoc();
            ?>
            <div class="col-xl-4 col-md-6">
                <div class="blog__post-item shine__animate-item">
                    <div class="blog__post-thumb">
                        <a href="blog-details.php?id=<?php echo $final['id'] ?>" class="shine__animate-link"><img src="<?php echo $uri . $final['icon'] ?>" alt="img"></a>
                        <a href="blogs.php?category_id=<?php echo $final1['id'] ?>" class="post-tag"><?php echo $final1['name'] ?></a>
                    </div>
                    <div class="blog__post-content">
                        <div class="blog__post-meta">
                            <ul class="list-wrap">
                                <li><i class="flaticon-calendar"></i><?php
                                    $date = $final['created_at'];
                                    $formattedDate = DateTime::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
                                    echo $formattedDate;
                                    ?></li>
                                <li><i class="flaticon-user-1"></i>by <a href="blog-details.php?id=<?php echo $final['id'] ?>"><?php echo $final['author_name'] ?></a></li>
                            </ul>
                        </div>
                        <h4 class="title"><a href="blog-details.php?id=<?php echo $final['id'] ?>"><?php echo $final['title'] ?></a></h4>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <nav class="pagination__wrap mt-25">
        <ul class="list-wrap">
            <?php
            // Calculate the total number of pages
            $total_pages = ceil($total_results / $results_per_page);

            // Display the pagination links
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<li' . ($i == $page ? ' class="active"' : '') . '><a href="blogs.php?page=' . $i;
                if (isset($_GET['category_id'])) {
                    echo '&category_id=' . $_GET['category_id'];
                } else if (isset($_GET['search'])) {
                    echo '&search=' . $_GET['search'];
                } else if (isset($_GET['tag'])) {
                    echo '&tag=' . $_GET['tag'];
                }
                echo '">' . $i . '</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>

                    <div class="col-xl-3 col-lg-4">
                        <aside class="blog-sidebar blog-sidebar-two">
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
                                <h4 class="widget-title">Most Popular Posts</h4>
                                <?php
                      $side = "SELECT * FROM blogs ORDER BY visit DESC LIMIT 5";
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
        <!-- blog-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
        <?php include "include/footer.php" ?>
    <!-- footer-area-end -->

    <?php include "include/script.php" ?>
</body>

</html>