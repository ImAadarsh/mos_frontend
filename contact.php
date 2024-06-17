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
                            <h3 class="title">Contact With Us</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Contact</span>
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

        <!-- contact-area -->
        <section class="contact-area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info-wrap">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <img src="assets/img/icons/map.svg" alt="img" class="injectable">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Address</h4>
                                        <p>Raj Palace CHS Limited Sector 02, <br>
                                        Kopar Khairane, Navi Mumbai - 400709</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="assets/img/icons/contact_phone.svg" alt="img" class="injectable">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Phone</h4>
                                        <a href="tel:+91 7697001231">+91 7697001231</a>
                                        <a href="tel:+91 84007 00199">+91 84007 00199</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="assets/img/icons/emial.svg" alt="img" class="injectable">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">E-mail Address</h4>
                                        <a href="mailto:info@magicofskills.com">info@magicofskills.com</a>
                                        <a href="mailto:help@magicofskills.com">help@magicofskills.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-form-wrap">
                            <h4 class="title">Send Us Message</h4>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form  action="controller/contact.php" enctype="multipart/form-data" method="POST">
                               
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-grp">
                                            <input name="name" type="text" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-grp">
                                            <input name="email" type="email" placeholder="E-mail" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-grp">
                                            <input name="mobile" type="tel" placeholder="Your Mobile Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-grp">
                                            <input name="subject" type="text" placeholder="Subject" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grp">
                                    <textarea name="query" placeholder="Write your query here" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-two arrow-btn">Submit Now <img src="assets/img/icons/right_arrow.svg" alt="img" class="injectable"></button>
                            </form>
                            <p class="ajax-response mb-0"></p>
                        </div>
                    </div>
                </div>
                <!-- contact-map -->
                <!-- <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48409.69813174607!2d-74.05163325136718!3d40.68264649999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1684309529719!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> -->
                <!-- contact-map-end -->
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
        <?php include "include/footer.php" ?>
    <!-- footer-area-end -->

    <?php include "include/script.php" ?>
</body>

</html>