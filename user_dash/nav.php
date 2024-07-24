<?php
// Function to get the current URL path
function getCurrentUrl() {
    $currentPath = $_SERVER['PHP_SELF'];
    $pathInfo = pathinfo($currentPath);
    return $pathInfo['basename'];
}

// Get the current URL
$currentUrl = getCurrentUrl();
?>

<div class="dashboard__sidebar-wrap">
    <div class="dashboard__sidebar-title mb-20">
        <h6 class="title"> <?php echo $_SESSION['name'] ?></h6>
    </div>
    <nav class="dashboard__sidebar-menu">
        <ul class="list-wrap">
            <li class="<?php echo ($currentUrl == 'dashboard.php') ? 'active' : ''; ?>">
                <a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="<?php echo ($currentUrl == 'profile.php') ? 'active' : ''; ?>">
                <a href="profile.php">
                    <i class="skillgro-avatar"></i>
                    My Profile
                </a>
            </li>
            <li class="<?php echo ($currentUrl == 'enrolled-courses.php') ? 'active' : ''; ?>">
                <a href="enrolled-courses.php">
                    <i class="skillgro-book"></i>
                    Enrolled Workshops
                </a>
            </li>
            <li class="<?php echo ($currentUrl == 'wishlist.php') ? 'active' : ''; ?>">
                <a href="wishlist.php">
                    <i class="skillgro-label"></i>
                    Wishlist
                </a>
            </li>
            <li class="<?php echo ($currentUrl == 'review.php') ? 'active' : ''; ?>">
                <a href="review.php">
                    <i class="skillgro-book-2"></i>
                    Reviews
                </a>
            </li>
            <li class="<?php echo ($currentUrl == 'quiz.php') ? 'active' : ''; ?>">
                <a href="quiz.php">
                    <i class="skillgro-book-2"></i>
                    Daily Quiz
                </a>
            </li>
            <li class="<?php echo ($currentUrl == 'result.php') ? 'active' : ''; ?>">
                <a href="result.php ">
                    <i class="skillgro-book-2"></i>
                    Quiz Results
                </a>
            </li>
            <!-- <li class="<?php echo ($currentUrl == 'attempts.php') ? 'active' : ''; ?>">
                <a href="attempts.php">
                    <i class="skillgro-question"></i>
                    My Quiz Attempts
                </a>
            </li> -->
            <li class="<?php echo ($currentUrl == 'history.php') ? 'active' : ''; ?>">
                <a href="history.php">
                    <i class="skillgro-satchel"></i>
                    Transaction Details
                </a>
            </li>
        </ul>
    </nav>
    <div class="dashboard__sidebar-title mt-30 mb-20">
        <h6 class="title">User</h6>
    </div>
    <nav class="dashboard__sidebar-menu">
        <ul class="list-wrap">
            <li class="<?php echo ($currentUrl == 'setting.php') ? 'active' : ''; ?>">
                <a href="setting.php">
                    <i class="skillgro-settings"></i>
                    Settings
                </a>
            </li>
            <li class="<?php echo ($currentUrl == 'logout.php') ? 'active' : ''; ?>">
                <a href="logout.php">
                    <i class="skillgro-logout"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
</div>
