<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php 
    include "include/session.php";
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
               <?php include "user_dash/head.php"; ?>
                <div class="row">
                    <div class="col-lg-3">
                       <?php include "user_dash/nav.php"; ?>
                    </div>
                    <?php 
         
                   $user_id = $_SESSION['userid'];
                   
                   // SQL query to fetch user details
                   $sql = "SELECT * FROM users WHERE id = ?";
                   
                   $stmt = $connect->prepare($sql);
                   
                   // Check if the statement was prepared successfully
                   if ($stmt === false) {
                       die("Prepare failed: " . $connect->error);
                   }
                   
                   // Bind the parameter
                   $stmt->bind_param("i", $user_id);
                   
                   // Execute the statement
                   $stmt->execute();
                   
                   // Get the result
                   $result = $stmt->get_result();
                   
                   // Check if the user exists
                   if ($result->num_rows > 0) {
                       // Fetch user data
                       $row = $result->fetch_assoc();
                       $first_name = $row['first_name'];
                       $last_name = $row['last_name'];
                       $email = $row['email'];
                       $mobile = $row['mobile'];
                       $about = $row['about'];
                       $created_at = $row['created_at'];
                       if($row['email_verified']==0){$text = "<b style='color: Red'>Not Verified</b>";}else{$text = "<b style='color: Red'> Verified</b>";}
                   
                       // Format the registration date
                       $registration_date = date("F j, Y g:i a", strtotime($created_at));
                   
                       // Display the user profile
                       echo '
                       <div class="col-lg-9">
                           <div class="dashboard__content-wrap">
                               <div class="dashboard__content-title">
                                   <h4 class="title">My Profile</h4>
                               </div>
                               <div class="row">
                                   <div class="col-lg-12">
                                       <div class="profile__content-wrap">
                                           <ul class="list-wrap">
                                               <li><span>Registration Date</span> ' . $registration_date . '</li>
                                               <li><span>First Name</span> ' . $first_name . '</li>
                                               <li><span>Last Name</span> ' . $last_name . '</li>
                                               <li><span>Grade</span> ' . $row['grade'] . '</li>
                                               <li><span>School Name</span> ' . $row['school']. '</li>
                                               <li><span>City Name</span> ' . $row['city'] . '</li>
                                               <li><span>Email Verified</span> ' . $text . '</li>
                                               <li><span>Email</span> ' . $email . '</li>
                                               <li><span>Phone Number</span> ' . $mobile . '</li>
                                               <li><span>Biography</span> ' . $about . '</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>';
                   } else {
                       echo "No user found with ID: $user_id";
                   }
                   
                   // Close the statement and connection
                   $stmt->close();
                   $connect->close();
                   ?>
                   
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