<div class="dashboard__top-wrap">
                    <div class="dashboard__top-bg" data-background="<?php if($_SESSION['profile']==null){echo "assets/banner.png";}else{echo $uri.$_SESSION['banner']; } ?>"></div>
                    <div class="dashboard__instructor-info">
                        <div class="dashboard__instructor-info-left">
                            <div class="thumb">
                                <img src="<?php if($_SESSION['profile']==null){echo "assets/user_icon.png";}else{echo $uri.$_SESSION['profile']; } ?>" alt="img">
                            </div>
                            <div class="content">
                                <h4 class="title">Hello <?php echo $_SESSION['name'] ?></h4>
                                <ul class="list-wrap">
                                    <li>
                                        <img src="assets/img/icons/course_icon03.svg" alt="img" class="injectable">
                                        <?php echo $_SESSION['email'] ?>
                                    </li>
                                    <li>
                                        <img src="assets/img/icons/course_icon05.svg" alt="img" class="injectable">
                                        <?php echo $_SESSION['mobile'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dashboard__instructor-info-right">
                            <?php if($_SESSION['is_email']==0){
                                ?>
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
                                                            alert('SUCCESS !!\n' + responseData.message);
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


                                <?php
                            }else{
                                ?>
                                <a href="#" style="background-color: green; color: white; border-color:yellow;" class="btn btn-two arrow-btn">Email Address Verified <img src="assets/prime.png" width="35px"> </a>
                                <?php
                            } ?>
                            
                        </div>
                    </div>
                </div>