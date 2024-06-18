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
                        <div class="dashboard__content-wrap">
                            <div class="dashboard__content-title">
                                <h4 class="title">Settings</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="dashboard__nav-wrap">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="itemOne-tab" data-bs-toggle="tab" data-bs-target="#itemOne-tab-pane" type="button" role="tab" aria-controls="itemOne-tab-pane" aria-selected="true">Profile</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="itemTwo-tab" data-bs-toggle="tab" data-bs-target="#itemTwo-tab-pane" type="button" role="tab" aria-controls="itemTwo-tab-pane" aria-selected="false">Update Email Address</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="itemThree-tab" data-bs-toggle="tab" data-bs-target="#itemThree-tab-pane" type="button" role="tab" aria-controls="itemThree-tab-pane" aria-selected="false">Social Share</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="itemOne-tab-pane" role="tabpanel" aria-labelledby="itemOne-tab" tabindex="0">
    <div class="instructor__cover-bg" style="background-image: url('assets/img/bg/student_bg.jpg');">
        <div class="instructor__cover-info">
            <div class="instructor__cover-info-left">
                <div class="thumb">
                    <img src="assets/img/courses/details_instructors02.jpg" alt="img" id="profile-img">
                </div>
                <input type="file" id="profile-photo" name="profile_photo" style="display:none;" onchange="previewProfileImage(event)">
                <i class="fas fa-camera"></i>
            </div>
            <!-- <div class="instructor__cover-info-right">
                <input type="file" id="cover-photo" name="cover_photo" style="display:none;" onchange="previewCoverImage(event)">
                <a href="javascript:void(0);" onclick="document.getElementById('cover-photo').click();" class="btn btn-two arrow-btn">Edit Cover Photo</a>
            </div> -->
        </div>
    </div>
    <?php
          $uid = $_SESSION['userid'];
          $sql = "SELECT * FROM users where id=$uid";
          $results = $connect->query($sql);
          $final = $results->fetch_assoc();
          ?>
    <div class="instructor__profile-form-wrap">
        <form action="controller/updateprofile.php" method="post" enctype="multipart/form-data" class="instructor__profile-form">
            <div class="row">
                 <!-- Other fields -->
            <div class="col-md-6">
                <div class="form-grp">
                    <label for="profile_photo">Profile Photo</label>
                    <input id="profile_photo" name="profile_photo" type="file" accept="image/*" onchange="previewProfileImage(event)">
                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-grp">
                    <label for="cover_photo">Cover Photo</label>
                    <input id="cover_photo" name="cover_photo" type="file" accept="image/*" onchange="previewCoverImage(event)">
                   
                </div>
            </div>
            <!-- Other fields -->
                <div class="col-md-6">
                    <div class="form-grp">
                        <label for="firstname">First Name</label>
                        <input required id="first_name" name="first_name" type="text" value="<?php echo $final['first_name']; ?>" placeholder="First Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-grp">
                        <label for="lastname">Last Name</label>
                        <input required id="last_name" name="last_name" value="<?php echo $final['last_name']; ?>" type="text" placeholder="Last Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-grp">
                        <label for="username">School</label>
                        <input required id="school" name="school" type="text" value="<?php echo $final['school']; ?>" placeholder="School Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-grp">
                        <label for="skill">Grade</label>
                        <input required id="grade" name="grade" type="text"  value="<?php echo $final['grade']; ?>" placeholder="Grade">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-grp">
                        <label for="skill">City</label>
                        <input  required id="city" name="city" type="text" value="<?php echo $final['city']; ?>" placeholder="Phone Number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-grp">
                        <label for="skill">Mobile (Cannot Be Changed)</label>
                        <input disabled readonly id="skill" name="city" type="text" value="<?php echo $final['country_code'].' '.$final['mobile']; ?>" placeholder="City Name">
                    </div>
                </div>
               
            </div>
            <div class="form-grp">
                <label for="bio">About Yourself</label>
                <textarea id="about" name="about"value="<?php echo $final['about']; ?>"  placeholder="About Yourself"></textarea>
            </div>
            <div class="submit-btn mt-25">
                <button type="submit" class="btn">Update Info</button>
            </div>
        </form>
    </div>
</div>

<script>
function previewProfileImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('profile-img');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function previewCoverImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.querySelector('.instructor__cover-bg');
        output.style.backgroundImage = 'url(' + reader.result + ')';
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>


                                        <div class="tab-pane fade" id="itemTwo-tab-pane" role="tabpanel" aria-labelledby="itemTwo-tab" tabindex="0">
                                            <div class="instructor__profile-form-wrap">
                                            <div class="pe_verify_email" data-client-id="13155789032170991970"><script src="https://www.phone.email/verify_email_v1.js" async></script></div> 
                                   
                                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                       <script>
                                       function phoneEmailReceiver(userObj) {
                                           var user_json_url = userObj.user_json_url;
                                           var user_email_id = userObj.user_email_id;

                                           // alert('SUCCESS !!\nYour email id ' + user_email_id + ' has been authenticated.');

                                           // Make an AJAX call to the backend PHP script
                                           $.ajax({
                                               url: 'controller/email_verification.php', // Change this to your actual PHP handler file path
                                               type: 'POST',
                                               data: {
                                                   email: user_email_id,
                                                   token: '<?php echo $_SESSION["token"]; ?>' // This will be replaced by the server-side token
                                               },
                                               success: function(response) {
                                                   try {
                                                       var responseData = JSON.parse(response);

                                                       if(responseData.status == "true") {
                                                           alert('SUCCESS !!\n' + "Your Eamil Id is Updated");
                                                       } else {
                                                           alert('ERROR !!\n' + responseData.message);
                                                       }
                                                   } catch (e) {
                                                       alert('ERROR: Unable to parse response');
                                                       console.error('Parsing error:', e);
                                                       console.error('Response:', response);
                                                   }

                                                   console.log(response);
                                                   // Redirect or perform additional actions if necessary
                                               },
                                               error: function(xhr, status, error) {
                                                   // Handle error response
                                                   var errorMessage = xhr.status + ': ' + xhr.statusText;
                                                   alert('ERROR !!\n' + errorMessage);
                                                   console.error('Error: ' + error);
                                               }
                                           });
                                       }
                                       </script>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="itemThree-tab-pane" role="tabpanel" aria-labelledby="itemThree-tab" tabindex="0">
                                            <div class="instructor__profile-form-wrap">
                                                <form action="#" class="instructor__profile-form">
                                                    <div class="form-grp">
                                                        <label for="facebook">Facebook</label>
                                                        <input id="facebook" type="url" placeholder="https://facebook.com/">
                                                    </div>
                                                    <div class="form-grp">
                                                        <label for="twitter">Twitter</label>
                                                        <input id="twitter" type="url" placeholder="https://twitter.com/">
                                                    </div>
                                                    <div class="form-grp">
                                                        <label for="linkedin">Linkedin</label>
                                                        <input id="linkedin" type="url" placeholder="https://linkedin.com/">
                                                    </div>
                                                    <div class="form-grp">
                                                        <label for="website">Website</label>
                                                        <input id="website" type="url" placeholder="https://website.com/">
                                                    </div>
                                                    <div class="form-grp">
                                                        <label for="github">Github</label>
                                                        <input id="github" type="url" placeholder="https://github.com/">
                                                    </div>
                                                    <div class="submit-btn mt-25">
                                                        <button type="submit" class="btn">Update Profile</button>
                                                    </div>
                                                </form>
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