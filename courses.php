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
                            <h3 class="title">All Courses</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Courses</span>
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

        <!-- all-courses -->
        <section class="all-courses-area section-py-10 mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 order-2 order-lg-0">
                    <aside class="courses__sidebar">
    <form id="filterForm" method="GET" action="courses.php">
        <div class="courses-widget">
            <h4 class="widget-title">Categories</h4>
            <div class="courses-cat-list">
                <ul class="list-wrap">
                    <?php
                    $sql = "SELECT * FROM categories ORDER BY sequence DESC";
                    $results = $connect->query($sql);
                    while ($final = $results->fetch_assoc()) {
                    ?>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category[]" value="<?php echo $final['id']; ?>" id="cat_<?php echo $final['id']; ?>">
                            <label class="form-check-label" for="cat_<?php echo $final['id']; ?>"><?php echo $final['name']; ?></label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        
        <div class="courses-widget">
            <h4 class="widget-title">Price</h4>
            <div class="courses-cat-list">
                <ul class="list-wrap">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" value="all" id="price_all">
                            <label class="form-check-label" for="price_all">All Price</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" value="free" id="price_free">
                            <label class="form-check-label" for="price_free">Free</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="price[]" value="paid" id="price_paid">
                            <label class="form-check-label" for="price_paid">Paid</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="courses-widget">
            <h4 class="widget-title">Skill level</h4>
            <div class="courses-cat-list">
                <ul class="list-wrap">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skill[]" value="all" id="skill_all">
                            <label class="form-check-label" for="skill_all">All Skills</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skill[]" value="beginner" id="skill_beginner">
                            <label class="form-check-label" for="skill_beginner">Beginner</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skill[]" value="intermediate" id="skill_intermediate">
                            <label class="form-check-label" for="skill_intermediate">Intermediate</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="skill[]" value="advance" id="skill_advance">
                            <label class="form-check-label" for="skill_advance">Advance</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="courses-widget">
            <h4 class="widget-title">Instructors</h4>
            <div class="courses-cat-list">
                <ul class="list-wrap">
                    <?php
                    $sql = "SELECT * FROM trainers ORDER BY id DESC";
                    $results = $connect->query($sql);
                    while ($final = $results->fetch_assoc()) {
                    ?>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="instructor[]" value="<?php echo $final['id']; ?>" id="ins_<?php echo $final['id']; ?>">
                            <label class="form-check-label" for="ins_<?php echo $final['id']; ?>"><?php echo $final['name']; ?></label>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="show-more">
                <a href="instructors.php">Show All Trainers +</a>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>
</aside>

                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="courses-top-wrap courses-top-wrap">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    
                                </div>
                                <div class="col-md-7">
                                    <div class="d-flex justify-content-center justify-content-md-end align-items-center flex-wrap">
                                        <!-- <div class="courses-top-right m-0 ms-md-auto">
                                            <span class="sort-by">Sort By:</span>
                                            <div class="courses-top-right-select">
                                                <select name="orderby" class="orderby">
                                                    <option value="Most Popular">Most Popular</option>
                                                    <option value="popularity">popularity</option>
                                                    <option value="average rating">average rating</option>
                                                    <option value="latest">latest</option>
                                                    <option value="latest">latest</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <ul class="nav nav-tabs courses__nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="grid-tab" data-bs-toggle="tab" data-bs-target="#grid" type="button" role="tab" aria-controls="grid" aria-selected="true">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 1H2C1.44772 1 1 1.44772 1 2V6C1 6.55228 1.44772 7 2 7H6C6.55228 7 7 6.55228 7 6V2C7 1.44772 6.55228 1 6 1Z"  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M16 1H12C11.4477 1 11 1.44772 11 2V6C11 6.55228 11.4477 7 12 7H16C16.5523 7 17 6.55228 17 6V2C17 1.44772 16.5523 1 16 1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M6 11H2C1.44772 11 1 11.4477 1 12V16C1 16.5523 1.44772 17 2 17H6C6.55228 17 7 16.5523 7 16V12C7 11.4477 6.55228 11 6 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M16 11H12C11.4477 11 11 11.4477 11 12V16C11 16.5523 11.4477 17 12 17H16C16.5523 17 17 16.5523 17 16V12C17 11.4477 16.5523 11 16 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">
                                                    <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.5 6C0.67 6 0 6.67 0 7.5C0 8.33 0.67 9 1.5 9C2.33 9 3 8.33 3 7.5C3 6.67 2.33 6 1.5 6ZM1.5 0C0.67 0 0 0.67 0 1.5C0 2.33 0.67 3 1.5 3C2.33 3 3 2.33 3 1.5C3 0.67 2.33 0 1.5 0ZM1.5 12C0.67 12 0 12.68 0 13.5C0 14.32 0.68 15 1.5 15C2.32 15 3 14.32 3 13.5C3 12.68 2.33 12 1.5 12ZM5.5 14.5H17.5C18.05 14.5 18.5 14.05 18.5 13.5C18.5 12.95 18.05 12.5 17.5 12.5H5.5C4.95 12.5 4.5 12.95 4.5 13.5C4.5 14.05 4.95 14.5 5.5 14.5ZM5.5 8.5H17.5C18.05 8.5 18.5 8.05 18.5 7.5C18.5 6.95 18.05 6.5 17.5 6.5H5.5C4.95 6.5 4.5 6.95 4.5 7.5C4.5 8.05 4.95 8.5 5.5 8.5ZM4.5 1.5C4.5 2.05 4.95 2.5 5.5 2.5H17.5C18.05 2.5 18.5 2.05 18.5 1.5C18.5 0.95 18.05 0.5 17.5 0.5H5.5C4.95 0.5 4.5 0.95 4.5 1.5Z" fill="currentColor" />
                                                    </svg>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                                <div class="row courses__grid-wrap row-cols-1 row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-1">
                                <?php 
                                            $workshops_per_page = 12; // Number of workshops per page
                                            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get current page from URL, default to 1
                                            $offset = ($current_page - 1) * $workshops_per_page; // Calculate offset for SQL query
                                    
                                            $filters = [];
                                            $where_clauses = [];
                                    
                                            // Filter by category
                                            if (!empty($_GET['category'])) {
                                                $category_ids = array_map('intval', $_GET['category']);
                                                $filters['category'] = "workshops.category_id IN (" . implode(',', $category_ids) . ")";
                                            }
                                    
                                            // Filter by price
                                            if (!empty($_GET['price'])) {
                                                $price_filters = [];
                                                foreach ($_GET['price'] as $price) {
                                                    if ($price == 'free') {
                                                        $price_filters[] = "workshops.price = 0";
                                                    } elseif ($price == 'paid') {
                                                        $price_filters[] = "workshops.price > 0";
                                                    }
                                                }
                                                if ($price_filters) {
                                                    $filters['price'] = "(" . implode(' OR ', $price_filters) . ")";
                                                }
                                            }
                                    
                                            // Filter by skill level
                                            if (!empty($_GET['skill'])) {
                                                $skill_filters = [];
                                                foreach ($_GET['skill'] as $skill) {
                                                    if ($skill == 'beginner') {
                                                        $skill_filters[] = "workshops.level = '1'";
                                                    } elseif ($skill == 'intermediate') {
                                                        $skill_filters[] = "workshops.level = '2'";
                                                    } elseif ($skill == 'advance') {
                                                        $skill_filters[] = "workshops.level = '3'";
                                                    }
                                                }
                                                if ($skill_filters) {
                                                    $filters['skill'] = "(" . implode(' OR ', $skill_filters) . ")";
                                                }
                                            }
                                    
                                            // Filter by instructor
                                            if (!empty($_GET['instructor'])) {
                                                $instructor_ids = array_map('intval', $_GET['instructor']);
                                                $filters['instructor'] = "workshops.trainer_id IN (" . implode(',', $instructor_ids) . ")";
                                            }
                                    
                                            // Combine all filters into the WHERE clause
                                            if ($filters) {
                                                $where_clauses[] = implode(' AND ', $filters);
                                            }
                                    
                                            $where_sql = '';
                                            if ($where_clauses) {
                                                $where_sql = 'WHERE ' . implode(' AND ', $where_clauses);
                                            }
                                    
                                            // Fetch total number of workshops with filters
                                            $total_workshops_sql = "SELECT COUNT(*) AS total FROM workshops $where_sql";
                                            $total_workshops_result = $connect->query($total_workshops_sql);
                                            $total_workshops = $total_workshops_result->fetch_assoc()['total'];
                                            $total_pages = ceil($total_workshops / $workshops_per_page); // Calculate total number of pages
                                    
                                            // Fetch workshops for the current page with filters
                                            $sql = "SELECT workshops.*, categories.name AS category_name, categories.id AS category_id, trainers.name AS trainer_name 
                                                    FROM workshops 
                                                    JOIN categories ON workshops.category_id = categories.id 
                                                    JOIN trainers ON workshops.trainer_id = trainers.id 
                                                    $where_sql
                                                    LIMIT $workshops_per_page OFFSET $offset";
                                            $results = $connect->query($sql);

                                    while ($final = $results->fetch_assoc()) {
                                ?>
                                    <div class="col">
                                        <div class="courses__item shine__animate-item">
                                            <div class="courses__item-thumb">
                                                <a href="course-details.php?id=<?php echo $final['id']; ?>" class="shine__animate-link">
                                                    <img src="<?php echo $uri . $final['icon'] ?>" alt="img">
                                                    <!-- <a href="course-details.php" class="courses__wishlist-two"><img src="assets/img/icons/heart02.svg" alt="" class="injectable"></a> -->
                                                </a>
                                                
                                            </div>
                                            <div class="courses__item-content">
                                                <ul class="courses__item-meta list-wrap">
                                                    <li class="courses__item-tag">
                                                        <a href="courses.php?category=<?php echo $final['category_id']; ?>"><?php echo $final['category_name']; ?></a>
                                                    </li>
                                                    <li class="avg-rating"><a href="controller/wishlist.php?workshop_id=<?php echo $final['id']; ?>" class="courses__wishlist-one"><img src="assets/img/icons/heart02.svg" alt="" class="injectable"></a></li>
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
                                                     
                                                     <h5 class="price">₹<?php echo $final['price']; ?></h5>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                                <!-- <nav class="pagination__wrap mt-30">
                                    <ul class="list-wrap">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="courses.html">2</a></li>
                                        <li><a href="courses.html">3</a></li>
                                        <li><a href="courses.html">4</a></li>
                                    </ul>
                                </nav> -->
                            </div>
                            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
    <div class="row courses__list-wrap row-cols-1"></div>
    <?php 
        $workshops_per_page = 12; // Number of workshops per page
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Get current page from URL, default to 1
        $offset = ($current_page - 1) * $workshops_per_page; // Calculate offset for SQL query

        $filters = [];
        $where_clauses = [];

        // Filter by category
        if (!empty($_GET['category'])) {
            $category_ids = array_map('intval', $_GET['category']);
            $filters['category'] = "workshops.category_id IN (" . implode(',', $category_ids) . ")";
        }

        // Filter by price
        if (!empty($_GET['price'])) {
            $price_filters = [];
            foreach ($_GET['price'] as $price) {
                if ($price == 'free') {
                    $price_filters[] = "workshops.price = 0";
                } elseif ($price == 'paid') {
                    $price_filters[] = "workshops.price > 0";
                }
            }
            if ($price_filters) {
                $filters['price'] = "(" . implode(' OR ', $price_filters) . ")";
            }
        }

        // Filter by skill level
        if (!empty($_GET['skill'])) {
            $skill_filters = [];
            foreach ($_GET['skill'] as $skill) {
                if ($skill == 'beginner') {
                    $skill_filters[] = "workshops.level = '1'";
                } elseif ($skill == 'intermediate') {
                    $skill_filters[] = "workshops.level = '2'";
                } elseif ($skill == 'advance') {
                    $skill_filters[] = "workshops.level = '3'";
                }
            }
            if ($skill_filters) {
                $filters['skill'] = "(" . implode(' OR ', $skill_filters) . ")";
            }
        }

        // Filter by instructor
        if (!empty($_GET['instructor'])) {
            $instructor_ids = array_map('intval', $_GET['instructor']);
            $filters['instructor'] = "workshops.trainer_id IN (" . implode(',', $instructor_ids) . ")";
        }

        // Combine all filters into the WHERE clause
        if ($filters) {
            $where_clauses[] = implode(' AND ', $filters);
        }

        $where_sql = '';
        if ($where_clauses) {
            $where_sql = 'WHERE ' . implode(' AND ', $where_clauses);
        }

        // Fetch total number of workshops with filters
        $total_workshops_sql = "SELECT COUNT(*) AS total FROM workshops $where_sql";
        $total_workshops_result = $connect->query($total_workshops_sql);
        $total_workshops = $total_workshops_result->fetch_assoc()['total'];
        $total_pages = ceil($total_workshops / $workshops_per_page); // Calculate total number of pages

        // Fetch workshops for the current page with filters
        $sql = "SELECT workshops.*, categories.name AS category_name, categories.id AS category_id, trainers.name AS trainer_name 
                FROM workshops 
                JOIN categories ON workshops.category_id = categories.id 
                JOIN trainers ON workshops.trainer_id = trainers.id 
                $where_sql
                LIMIT $workshops_per_page OFFSET $offset";
        $results = $connect->query($sql);

        while ($final = $results->fetch_assoc()) {
    ?>
    
    <div class="col">
        <div class="courses__item courses__item-three shine__animate-item">
            <div class="courses__item-thumb">
                <a href="course-details.php?id=<?php echo $final['id']; ?>" class="shine__animate-link">
                    <img height="560px" width="380px" style="width: 380px !important;" src="<?php echo $uri . $final['icon'] ?>" alt="img">
                  
                </a>
                
            </div>
            <div class="courses__item-content">
                <ul class="courses__item-meta list-wrap">
                    <li class="courses__item-tag">
                    <a href="courses.php?category=<?php echo $final['category_id']; ?>"><?php echo $final['category_name']; ?></a>
                        <div >
                        <a href="controller/wishlist.php?workshop_id=<?php echo $final['id']; ?>" class="courses__wishlist-one"><img src="assets/img/icons/heart02.svg" alt="" class="injectable"></a>
                        </div>
                    </li>
                    <li class="price"><del>₹<?php echo $final['cut_price']; ?></del>₹<?php echo $final['price']; ?></li>
                </ul>
                <h5 class="title"><a href="course-details.php?id=<?php echo $final['id']; ?>"><?php echo $final['name']; ?></a></h5>
                <p class="author">By <a href="#"><?php echo $final['trainer_name']; ?></a></p>
                <p class="info"><?php echo $final['short_description']; ?></p>
                <div class="courses__item-bottom list-wrap">
                    <div class="button">
                        <a href="course-details.php?id=<?php echo $final['id']; ?>">
                            <span class="text">Enroll Now</span>
                            <i class="flaticon-arrow-right"></i>
                        </a>
                    </div>
                   
                                    <li  style="color: black; font-size:medium; margin-top: 10px;" class="price">Date: <?php
                                    $start_time = $final['start_time']; // e.g., '2024-07-05 17:00:00'
                                    $date = new DateTime($start_time);
                                    $formatted_date = $date->format('d/m/Y h:i A'); // Format to '07/05/2024 05:00 PM'
                                    echo $formatted_date;
                                    ?></li>
                                  
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    </div>
    <nav class="pagination__wrap mt-30">
        <ul class="list-wrap">
            <?php if ($current_page > 1): ?>
                <li><a href="courses.php?page=<?php echo $current_page - 1; ?>">&laquo; Previous</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="<?php if ($i == $current_page) echo 'active'; ?>"><a href="courses.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($current_page < $total_pages): ?>
                <li><a href="courses.php?page=<?php echo $current_page + 1; ?>">Next &raquo;</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- all-courses-end -->

    </main>
    <!-- main-area-end -->



    <?php include "include/footer.php" ?>

    <?php include "include/script.php" ?>
</body>

</html>