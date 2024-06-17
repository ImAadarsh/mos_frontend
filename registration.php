<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php
  include "include/session.php" ; 
    $mobile = $_SESSION['mobile'];
    $token = $_SESSION['token'];
    if($_SESSION['is_data']==1){
        header('location: ../dashboard.php');
    }
    include "include/meta.php" ?>
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
                            <h3 class="title">Profile Creation</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Student Details</span>
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

        <!-- singUp-area -->
        <section class="singUp-area section-py-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="singUp-wrap">
                            <h2 class="title">Student Details</h2>
                           
                            <div class="account__divider">
                         
                            </div>
                            <form action="controller/profilecreation.php" method="post" enctype="multipart/form-data" class="account__form">
                                <div class="row gutter-20">
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <label for="fast-name">First Name</label>
                                            <input name="first_name" type="text" id="fast-name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-grp">
                                            <label for="last-name">Last name</label>
                                            <input  name="last_name" type="text" id="last-name" placeholder="Last name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <label for="email">Email</label>
                                    <input name="email"  required type="email" id="email" placeholder="Valid Email Address">
                                </div>
                                <div class="form-grp">
                                    <label for="email">Mobile</label>
                                    <input  readonly type="tel" id="email" disabled value="<?php echo $mobile ?>" placeholder="Mobile Number">
                                </div>
                                <div class="form-grp">
                                    <label for="email">School</label>
                                    <input name="school" required type="text" id="email" placeholder="School Name">
                                </div>
                                <div class="form-grp">
                                    <label for="email">City</label>
                                    <input name="city" required type="text" id="email" placeholder="City Name">
                                </div>
                                <div class="form-grp">
                                    <label for="email">Grade</label>
                                    <input name="grade" required type="text" id="email" placeholder="Grade">
                                </div>
                                
                                <button name="data" type="submit" class="btn btn-two arrow-btn">Confirm Profile<img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- singUp-area-end -->

    </main>
    <!-- main-area-end -->

    <?php include "include/footer.php" ?>

    <?php include "include/script.php" ?>
</body>

</html>