<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('course-cat').addEventListener('change', function() {
            var categoryId = this.value;
            if (categoryId) {
                window.location.href = 'courses.php?category_id=' + categoryId;
            }
        });
    });
</script>

    <!--Preloader-->
    <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="assets/img/logo/preloader.svg" alt="Preloader"></div>
            </div>
        </div>
    </div>
    <!--Preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="tg-flaticon-arrowhead-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header>
        <div class="tg-header__top">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tg-header__top-info list-wrap">
                            <li><img src="assets/img/icons/map_marker.svg" alt="Icon"> <span>Raj Palace, Navi Mumbai- 400709</span></li>
                            <li><img src="assets/img/icons/envelope.svg" alt="Icon"> <a href="mailto:help@magicofskills.com">help@magicofskills.com</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tg-header__top-right">
                            <div class="tg-header__phone">
                                <img src="assets/img/icons/phone.svg" alt="Icon">Call us: <a href="tel:+917697001231">+91 7697001231</a>
                            </div>
                            <ul class="tg-header__top-social list-wrap">
                                <li>Follow Us On :</li>
                                <li><a href="https://www.facebook.com/IPNAcademy/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://instagram.com/ipnacademy?igshid=NDk5N2NlZjQ%3D"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://wa.me/917697001231"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/ipn-leadership-academy/"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.youtube.com/@IPNAcademy/videos?app=desktop"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-fixed-height"></div>
        <div id="sticky-header" class="tg-header__area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                <div class="logo">
                                    <a href="index.php"><img style="width: 139px;" src="assets/img/logo/logo.svg" alt="Logo"></a>
                                </div>
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li class="active "><a href="index.php">Home</a>
                                            
                                        </li>
                                        <li class=""><a href="about-us.php">About Us</a>
                                        
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Workshops</a>
                                            <ul class="sub-menu">
                                                <li class="active">
                                                    <a href="courses.php">All Workshops</a>
                                                </li>
                                                <li>
                                                    <a href="courses.php?is_completed%5B%5D=0">Upcoming Workshops <span class="tg-badge-two">New</span></a>
                                                </li>
                                                <li>
                                                    <a href="courses.php?is_completed%5B%5D=1">Previous Workshops <span class="tg-badge">Prev</span></a>
                                                </li>
                                                <li>
                                                    <a href="courses.php?price%5B%5D=free">Free Workshops</a>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        <li class="menu-item-has-children"><a href="#">Resources</a>
                                            <ul class="sub-menu">
                                            <li class=""><a href="events.php">Events</a>
                                            <li class=""><a href="instructors.php">Instructor</a>
                                            <li class=""><a href="blog.php">Blogs</a>
                                            <li class=""><a href="contact.php">Contact</a>
                                            </ul>
                                        </li>
                                        
                                       
                                                                                    <?php 
                                           
                                            if (isset($_SESSION['token'])) { 
                                            ?> 

                                        <li class="menu-item-has-children"><a href="#">Dashboard</a>
                                            <ul class="sub-menu">
                                               
                                                
                                                  
                                                        <li><a href="dashboard.php">Dashboard</a></li>
                                                        <li><a href="quiz.php">Daily Quiz</a></li>
                                                        <li><a href="profile.php">Profile</a></li>
                                                        <li><a href="enrolled-courses.php">Enrolled Workshops</a></li>
                                                        <li><a href="wishlist.php">Wishlist</a></li>
                                                        <li><a href="review.php">Reviews</a></li>
                                                        <li><a href="history.php">Transactions Details</a></li>
                                                        <li><a href="setting.php">Settings</a></li>
                                                        <li><a href="logout.php">Logout</a></li>
                                                  
                                               
                                            </ul>
                                        </li>
                                        <?php 
                                            } 
                                            ?>
                                    </ul>
                                </div>
                                <div class="tgmenu__search d-none d-md-block">
                                    <form action="courses.php" method="get" class="header-search-form">
                                        <div class="header-search-container">
                                            <svg class="header-search-icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.625 15.375C12.476 15.375 15.375 12.476 15.375 8.625C15.375 4.774 12.476 1.875 8.625 1.875C4.774 1.875 1.875 4.774 1.875 8.625C1.875 12.476 4.774 15.375 8.625 15.375Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M16.125 16.125L12.7813 12.7813" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <input 
                                                name="workshop_name[]" 
                                                type="text" 
                                                class="header-search-input" 
                                                placeholder="Search Workshops, Events, Blogs, etc."
                                                autocomplete="off"
                                            >
                                            <button type="submit" class="header-search-btn" aria-label="Search">
                                                <svg width="16" height="16" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.625 15.375C12.476 15.375 15.375 12.476 15.375 8.625C15.375 4.774 12.476 1.875 8.625 1.875C4.774 1.875 1.875 4.774 1.875 8.625C1.875 12.476 4.774 15.375 8.625 15.375Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M16.125 16.125L12.7813 12.7813" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tgmenu__action">
                                    <ul class="list-wrap">
                                        
                                        <?php if($_SESSION['token']){
                                            $uid = $_SESSION['userid'];
                                            $countwishheader = "select count(*) as count from wishlists where user_id=$uid";
                                            $countwishheaderRes = $connect->query($countwishheader);
                                            $countwishheaderFinal = $countwishheaderRes->fetch_assoc()
                                            ?>
                                            
                                        <li class="wishlist-icon">
                                            <a href="wishlist.php" class="cart-count">
                                                <img src="assets/img/icons/heart.svg" class="injectable" alt="img">
                                                <span class="wishlist-count"><?php echo $countwishheaderFinal['count']; ?></span>
                                            </a>
                                        </li>
                                        <?php 
                                            $uid = $_SESSION['userid'];
                                            $cart_id = $_SESSION['cart_id'];
                                            $countwishheader = "select count(*) as count from items where cart_id=$cart_id";
                                            $countwishheaderRes = $connect->query($countwishheader);
                                            $countwishheaderFinal = $countwishheaderRes->fetch_assoc()
                                            ?>
                                        <li class="mini-cart-icon">
                                            <a href="cart.php" class="cart-count">
                                                <img src="assets/img/icons/cart.svg" class="injectable" alt="img">
                                                <span class="mini-cart-count"><?php echo $countwishheaderFinal['count']; ?></span>
                                            </a>
                                        </li>
                                            <li class="header-btn login-btn">
                                            <a href="dashboard.php"><?php echo $_SESSION['name'] ?></a>
                                        </li>
                                            <?php
                                        }else{
                                            ?>
                                            <li class="header-btn login-btn">
                                            <a href="login.php">Log in</a>
                                        </li>
                                            <?php
                                        }
                                        ?>
                                        
                                    </ul>
                                </div>
                                <div class="mobile-login-btn">
                                <?php if($_SESSION['token']){ ?>
                                    <a href="dashboard.php"><img style="width: 80px;  border: 1px solid black; border-radius: 50%; padding: 1px;" src="<?php if($_SESSION['profile']==null){echo "assets/user_icon.png";}else{echo $uri.$_SESSION['profile']; } ?>" alt="" class="injectable"></a>
                                    <?php }else{
                                        ?>
                                        <a href="login.php"><img src="assets/img/icons/user.svg" alt="" class="injectable"></a>
                                        <?php
                                    } ?>
                                    
                                </div>
                                <div class="mobile-nav-toggler"><i class="tg-flaticon-menu-1"></i></div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="tgmobile__menu">
                            <nav class="tgmobile__menu-box">
                                <div class="close-btn"><i class="tg-flaticon-close-1"></i></div>
                                <div class="nav-logo">
                                    <a href="index.php"><img src="assets/img/logo/logo.svg" alt="Logo"></a>
                                </div>
                                <div class="tgmobile__search">
                                    <form action="#">
                                        <input type="text" placeholder="Search here...">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="tgmobile__menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="list-wrap">
                                     <li><a href="https://www.facebook.com/IPNAcademy/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://instagram.com/ipnacademy?igshid=NDk5N2NlZjQ%3D"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://wa.me/917697001231"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/ipn-leadership-academy/"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.youtube.com/@IPNAcademy/videos?app=desktop"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="tgmobile__menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->