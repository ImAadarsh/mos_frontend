<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php 
    include "include/private_page.php" ; 
    include "include/meta.php" ?>
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
       
                <div class="row">
                    <div class="col-lg-3">
                      
                    </div>
<!-- //x? -->
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
}
?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Magic of Skills Recorded Sessions</h4>
                    </div>
                    <div class="card-body">
                        <div style="padding:50% 0 0 0;position:relative;"><iframe
                                src="https://player.vimeo.com/video/<?php echo $id; ?>?h=18291dcbb6&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                                style="position:absolute;top:0;left:0;width:100%;height:100%;" title=""></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
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