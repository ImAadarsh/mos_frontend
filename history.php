<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Transactions</title>
    <?php  include "include/private_page.php" ;  include "include/meta.php" ?>
    <meta name="robots" content="noindex">
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
                                <h4 class="title">Order History</h4>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="dashboard__review-table">
                                    <?php
    // Fetch payments data
    $userId = $_SESSION['userid'];
    $paymentsQuery = "SELECT payments.*, workshops.name AS workshop_name FROM payments 
                      LEFT JOIN workshops ON payments.workshop_id = workshops.id 
                      WHERE payments.user_id = ?";
    $stmt = $connect->prepare($paymentsQuery);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $paymentsResult = $stmt->get_result();
    $payments = $paymentsResult->fetch_all(MYSQLI_ASSOC);
?>

<table class="table table-borderless">
    <thead>
        <tr>
            <th>Transaction ID</th>
            <th>Workshop Name</th>
            <th>Date</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($payments as $payment) { ?>
            <tr>
                <td>
                    <p>#<?php echo $payment['payment_id']; ?></p>
                </td>
                <td>
                    <p><?php echo $payment['workshop_name']; ?></p>
                </td>
                <td>
                    <p><?php echo date('F d, Y', strtotime($payment['created_at'])); ?></p>
                </td>
                <td>
                    <p>₹<?php echo number_format($payment['amount'], 2); ?></p>
                </td>
                <td>
                    <span class="dashboard__quiz-result"><?php  if($payment['payment_status']==1){echo "Success";} else{echo "Failed";} ?></span>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

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