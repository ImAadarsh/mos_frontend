<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include "include/private_page.php";
$host = "82.180.142.204";
$user = "u954141192_mos";
$password = "Mos@2024";
$dbname = "u954141192_mos";
$connect = mysqli_connect($host,$user,$password,$dbname);


$uid = $_SESSION['userid'];

$sql = "SELECT * FROM users WHERE id = $uid";
$results = $connect->query($sql);
$final = $results->fetch_assoc();

$queryWorkshops = "SELECT * FROM workshops";
$resultWorkshops = $connect->query($queryWorkshops);
$events = array();

while ($row = $resultWorkshops->fetch_assoc()) {
    $wiid = $row['id'];
    $queryPayments = "SELECT * FROM payments WHERE user_id = $uid AND workshop_id = $wiid";
    $resultPayments = $connect->query($queryPayments);
    $row1 = $resultPayments->fetch_assoc();

    if ($row1['payment_status'] == 1) {
        $color = "purple";
    } else {
        if ($row['is_completed'] == 1) {
            $color = "red";
        } else {
            $color = "green";
        }
    }

    $events[] = array(
        'title' => $row['name'],
        'start' => $row['start_time'],
        'url' => "https://magicofskills.com/course-details.php?id={$row['id']}",
        'description' => $row['short_description'],
        'backgroundColor' => $color,
    );
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>Magic Of Skills | Calendar Page</title>
    <?php 
    include "include/private_page.php";
    include "include/meta.php"; 
    ?>
    <link rel='stylesheet' href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css'>
    <link rel='stylesheet' href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="calendar/style.css">
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            nowIndicator: true,
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            navLinks: true,
            editable: true,
            selectable: true,
            selectMirror: true,
            dayMaxEvents: true,
            events: <?php echo json_encode($events); ?>,
        });
        calendar.render();
    });
    </script>
</head>
<body>
    <?php include "include/header.php"; ?>

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
                <!-- <?php include "user_dash/head.php"; ?> -->
                <div class="row">
                    <div class="col-lg-3">
                        <!-- <?php include "user_dash/nav.php"; ?> -->
                    </div>
                    <div class="col-lg-9">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- dashboard-area-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer-area -->
    <?php include "include/footer.php"; ?>
    <!-- footer-area-end -->

    <?php include "include/script.php"; ?>
    <script src='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js'></script>
    <script src='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js'></script>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <script src="./script.js"></script>
    <script src="calendar/scripts.js"></script>
</body>
</html>
