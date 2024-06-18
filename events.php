<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Events</title>
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
                            <h3 class="title">All Events</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Events</span>
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

        <!-- event-area -->
        <section class="event__area-two section-py-120">
            <div class="container">
                <div class="event__inner-wrap">
                    <div class="row justify-content-center">
                    <?php 
               $sql = "SELECT * FROM events WHERE is_completed=0 ORDER BY date ASC";

                $results = $connect->query($sql);
                while ($final = $results->fetch_assoc()) {
                ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="event__item shine__animate-item">
                                <div class="event__item-thumb">
                                    <a href="events-details.php?id=<?php echo $final['id'] ?>" class="shine__animate-link"><img src="<?php echo $uri.$final['icon'] ?>" alt="img"></a>
                                </div>
                                <div class="event__item-content">
                                    <span class="date"><?php
$date = $final['date']; // Assume this is in 'Y-m-d H:i:s' format (e.g., '2024-07-05 17:00:00')
$formattedDate = DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
echo $formattedDate;
?>
</span>
                                    <h2 class="title"><a href="events-details.php?id=<?php echo $final['id'] ?>"><?php echo $final['name'] ?></a></h2>
                                    <a href="#" class="location" target="_blank"><i class="flaticon-map"></i><?php echo $final['location'] ?></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                       
                    </div>
                    <!-- <nav class="pagination__wrap mt-30">
                        <ul class="list-wrap">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="courses.php">2</a></li>
                            <li><a href="courses.php">3</a></li>
                            <li><a href="courses.php">4</a></li>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </section>
        <!-- event-area-end -->

    </main>
    <!-- main-area-end -->

    <?php include "include/footer.php" ?>




    <?php include "include/script.php" ?>
</body>

</html>