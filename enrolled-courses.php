<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php include "include/private_page.php" ;  include "include/meta.php" ?>
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
                                                    Enrolled Workshops
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button"
                                                    role="tab" aria-controls="design-tab-pane" aria-selected="false">
                                                    Upcoming Workshops
                                                </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="business-tab" data-bs-toggle="tab" data-bs-target="#business-tab-pane" type="button"
                                                    role="tab" aria-controls="business-tab-pane" aria-selected="false">
                                                    Completed Workshops
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="courseTabContent">
                                        <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                                            <div class="swiper dashboard-courses-active">
                                            <div class="row">
                                                                    <?php
                                 
                                 $userId = $_SESSION['userid'];

                                 // Fetch payment data
                                 $paymentQuery = "SELECT * FROM payments WHERE user_id = ? AND payment_status=1";
                                 $stmt = $connect->prepare($paymentQuery);
                                 $stmt->bind_param('i', $userId);
                                 $stmt->execute();
                                 $paymentResult = $stmt->get_result();
                                 $paymentItems = $paymentResult->fetch_all(MYSQLI_ASSOC);
                             
                                 // Fetch workshops data
                                 $workshopIds = array_column($paymentItems, 'workshop_id');
                                 $workshopIdsString = implode(',', $workshopIds);
                             
                                 $workshopsQuery = "SELECT workshops.*, trainers.name AS trainer_name,  trainers.image AS trainer_image 
                                             FROM workshops 
                                             LEFT JOIN trainers ON workshops.trainer_id = trainers.id 
                                             WHERE workshops.id IN ($workshopIdsString)";
                                 $workshopsResult = $connect->query($workshopsQuery);
                                 $workshops = $workshopsResult->fetch_all(MYSQLI_ASSOC);
                             
                                 // Include order_id in workshops array
                                 foreach ($workshops as $key => $workshop) {
                                     foreach ($paymentItems as $paymentItem) {
                                         if ($paymentItem['workshop_id'] == $workshop['id']) {
                                             $workshops[$key]['order_id'] = $paymentItem['order_id'];
                                             break;
                                         }
                                     }
                                 }
                                                                    ?>


                                <?php foreach ($workshops as $workshop) { ?>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="courses__item courses__item-two shine__animate-item">
                                                <div class="courses__item-thumb courses__item-thumb-two">
                                                    <a href="course-details.php?id=<?php echo $workshop['id']; ?>" class="shine__animate-link">
                                                        <img  src="<?php echo $uri.$workshop['banner_image']; ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="courses__item-content courses__item-content-two">
                                                <h5 class="title"><a href="course-details.php?id=<?php echo $workshop['id']; ?>"><?php echo $workshop['name']; ?></a></h5>
                                                    
                                                    
                                                    <div class="courses__item-content-bottom">
                                                        <div class="author-two">
                                                            <a href="instructor-details.php?id=<?php echo $workshop['trainer_id']; ?>"><img src="<?php echo $uri.$workshop['trainer_image']; ?>" alt="img"><?php echo $workshop['trainer_name']; ?></a>
                                                        </div>
                                                        <?php if($workshop['is_completed']){ ?>
                                                            <a href="certificate/?certificate=MOS_<?php echo  $workshop['order_id'] ?>"> <img style="border: 1px solid black; padding:2px; border-radius: 50%;" src="assets/img/icons/youtube.svgx" alt=""> Download Certificate</a>
                                                        <?php }else{
                                                            ?>
                                                            <a href="#"> <img style="border: 1px solid black; padding:2px; border-radius: 50%;" src="assets/img/icons/youtube.svgx" alt=""> Avaliable Soon</a>
                                                            <?php
                                                        } ?>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <div class="courses__item-bottom-two">
                                                    <ul class="list-wrap">
                                                        <li><i class="flaticon-clock"></i><?php echo date('d/m/y h:i A', strtotime($workshop['start_time'])); ?></li>
                                                        <?php if($workshop['is_completed']==1){ if($workshop['recording']==NULL){
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['recording']; ?>">Recording Aval. Soon</a> </li>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="player.php?id=<?php echo $workshop['recording']; ?>">View Recording</a> </li>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                        <?php 
                                                        }else{
                                                            if($workshop['workshop_link']==NULL){
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['workshop_link']; ?>">Join. Link Aval. Soon</a> </li>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['workshop_link']; ?>">Join Workshop Now</a> </li>
                                                                <?php
                                                            }
                                                            ?>


                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                        <li>  <i class="flaticon-cross"></i> <a href="course-details.php?id=<?php echo $workshop['id']; ?>"></a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                
                          
                                    
                            </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                            <div class="swiper dashboard-courses-active">
                                            <div class="row">
                                                                    <?php
                                 
                                 $userId = $_SESSION['userid'];

                                 // Fetch payment data
                                 $paymentQuery = "SELECT * FROM payments WHERE user_id = ? AND payment_status=1";
                                 $stmt = $connect->prepare($paymentQuery);
                                 $stmt->bind_param('i', $userId);
                                 $stmt->execute();
                                 $paymentResult = $stmt->get_result();
                                 $paymentItems = $paymentResult->fetch_all(MYSQLI_ASSOC);
                             
                                 // Fetch workshops data
                                 $workshopIds = array_column($paymentItems, 'workshop_id');
                                 $workshopIdsString = implode(',', $workshopIds);
                             
                                 $workshopsQuery = "SELECT workshops.*, trainers.name AS trainer_name,  trainers.image AS trainer_image 
                                             FROM workshops 
                                             LEFT JOIN trainers ON workshops.trainer_id = trainers.id 
                                             WHERE workshops.id IN ($workshopIdsString) AND workshops.is_completed=0";
                                 $workshopsResult = $connect->query($workshopsQuery);
                                 $workshops = $workshopsResult->fetch_all(MYSQLI_ASSOC);
                             
                                 // Include order_id in workshops array
                                 foreach ($workshops as $key => $workshop) {
                                     foreach ($paymentItems as $paymentItem) {
                                         if ($paymentItem['workshop_id'] == $workshop['id']) {
                                             $workshops[$key]['order_id'] = $paymentItem['order_id'];
                                             break;
                                         }
                                     }
                                 }
                                                                    ?>


                                <?php foreach ($workshops as $workshop) { ?>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="courses__item courses__item-two shine__animate-item">
                                                <div class="courses__item-thumb courses__item-thumb-two">
                                                    <a href="course-details.php?id=<?php echo $workshop['id']; ?>" class="shine__animate-link">
                                                        <img  src="<?php echo $uri.$workshop['banner_image']; ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="courses__item-content courses__item-content-two">
                                                <h5 class="title"><a href="course-details.php?id=<?php echo $workshop['id']; ?>"><?php echo $workshop['name']; ?></a></h5>
                                                    
                                                    
                                                    <div class="courses__item-content-bottom">
                                                        <div class="author-two">
                                                            <a href="instructor-details.php?id=<?php echo $workshop['trainer_id']; ?>"><img src="<?php echo $uri.$workshop['trainer_image']; ?>" alt="img"><?php echo $workshop['trainer_name']; ?></a>
                                                        </div>
                                                        <?php if($workshop['is_completed']){ ?>
                                                            <a href="certificate/?certificate=MOS_<?php echo  $workshop['order_id'] ?>"> <img style="border: 1px solid black; padding:2px; border-radius: 50%;" src="assets/img/icons/youtube.svgx" alt=""> Download Certificate</a>
                                                        <?php }else{
                                                            ?>
                                                            <a href="#"> <img style="border: 1px solid black; padding:2px; border-radius: 50%;" src="assets/img/icons/youtube.svgx" alt=""> Avaliable Soon</a>
                                                            <?php
                                                        } ?>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <div class="courses__item-bottom-two">
                                                    <ul class="list-wrap">
                                                        <li><i class="flaticon-clock"></i><?php echo date('d/m/y h:i A', strtotime($workshop['start_time'])); ?></li>
                                                        <?php if($workshop['is_completed']==1){ if($workshop['recording']==NULL){
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['recording']; ?>">Recording Aval. Soon</a> </li>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="player.php?id=<?php echo $workshop['recording']; ?>">View Recording</a> </li>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                        <?php 
                                                        }else{
                                                            if($workshop['workshop_link']==NULL){
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['workshop_link']; ?>">Join. Link Aval. Soon</a> </li>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['workshop_link']; ?>">Join Workshop Now</a> </li>
                                                                <?php
                                                            }
                                                            ?>


                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                        <li>  <i class="flaticon-cross"></i> <a href="course-details.php?id=<?php echo $workshop['id']; ?>"></a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                
                          
                                    
                            </div> 

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="business-tab-pane" role="tabpanel" aria-labelledby="business-tab" tabindex="0">
                                            <div class="swiper dashboard-courses-active">
                                            <div class="row">
                                                                    <?php
                                 
                                 $userId = $_SESSION['userid'];

                                 // Fetch payment data
                                 $paymentQuery = "SELECT * FROM payments WHERE user_id = ? AND payment_status=1";
                                 $stmt = $connect->prepare($paymentQuery);
                                 $stmt->bind_param('i', $userId);
                                 $stmt->execute();
                                 $paymentResult = $stmt->get_result();
                                 $paymentItems = $paymentResult->fetch_all(MYSQLI_ASSOC);
                             
                                 // Fetch workshops data
                                 $workshopIds = array_column($paymentItems, 'workshop_id');
                                 $workshopIdsString = implode(',', $workshopIds);
                             
                                 $workshopsQuery = "SELECT workshops.*, trainers.name AS trainer_name,  trainers.image AS trainer_image 
                                             FROM workshops 
                                             LEFT JOIN trainers ON workshops.trainer_id = trainers.id 
                                             WHERE workshops.id IN ($workshopIdsString) AND workshops.is_completed=1";
                                 $workshopsResult = $connect->query($workshopsQuery);
                                 $workshops = $workshopsResult->fetch_all(MYSQLI_ASSOC);
                             
                                 // Include order_id in workshops array
                                 foreach ($workshops as $key => $workshop) {
                                     foreach ($paymentItems as $paymentItem) {
                                         if ($paymentItem['workshop_id'] == $workshop['id']) {
                                             $workshops[$key]['order_id'] = $paymentItem['order_id'];
                                             break;
                                         }
                                     }
                                 }
                                                                    ?>


                                <?php foreach ($workshops as $workshop) { ?>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="courses__item courses__item-two shine__animate-item">
                                                <div class="courses__item-thumb courses__item-thumb-two">
                                                    <a href="course-details.php?id=<?php echo $workshop['id']; ?>" class="shine__animate-link">
                                                        <img  src="<?php echo $uri.$workshop['banner_image']; ?>" alt="img">
                                                    </a>
                                                </div>
                                                <div class="courses__item-content courses__item-content-two">
                                                <h5 class="title"><a href="course-details.php?id=<?php echo $workshop['id']; ?>"><?php echo $workshop['name']; ?></a></h5>
                                                    
                                                    
                                                    <div class="courses__item-content-bottom">
                                                        <div class="author-two">
                                                            <a href="instructor-details.php?id=<?php echo $workshop['trainer_id']; ?>"><img src="<?php echo $uri.$workshop['trainer_image']; ?>" alt="img"><?php echo $workshop['trainer_name']; ?></a>
                                                        </div>
                                                        <?php if($workshop['is_completed']){ ?>
                                                            <a href="certificate/?certificate=MOS_<?php echo  $workshop['order_id'] ?>"> <img style="border: 1px solid black; padding:2px; border-radius: 50%;" src="assets/img/icons/youtube.svgx" alt=""> Download Certificate</a>
                                                        <?php }else{
                                                            ?>
                                                            <a href="#"> <img style="border: 1px solid black; padding:2px; border-radius: 50%;" src="assets/img/icons/youtube.svgx" alt=""> Avaliable Soon</a>
                                                            <?php
                                                        } ?>
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <div class="courses__item-bottom-two">
                                                    <ul class="list-wrap">
                                                        <li><i class="flaticon-clock"></i><?php echo date('d/m/y h:i A', strtotime($workshop['start_time'])); ?></li>
                                                        <?php if($workshop['is_completed']==1){ if($workshop['recording']==NULL){
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['recording']; ?>">Recording Aval. Soon</a> </li>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="player.php?id=<?php echo $workshop['recording']; ?>">View Recording</a> </li>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                        <?php 
                                                        }else{
                                                            if($workshop['workshop_link']==NULL){
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['workshop_link']; ?>">Join. Link Aval. Soon</a> </li>
                                                                <?php
                                                            }else{
                                                                ?>
                                                                <li><i class="flaticon-arrow-right"></i> <a href="<?php echo $workshop['workshop_link']; ?>">Join Workshop Now</a> </li>
                                                                <?php
                                                            }
                                                            ?>


                                                            <?php
                                                        }
                                                        ?>
                                                        
                                                        <li>  <i class="flaticon-cross"></i> <a href="course-details.php?id=<?php echo $workshop['id']; ?>"></a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                
                          
                                    
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