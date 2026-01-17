<?php
include "include/connect.php";
include "include/session.php";

$workshop_id = isset($_GET['workshop_id']) ? intval($_GET['workshop_id']) : 0;
$success_msg = "";
$error_msg = "";

// Fetch Workshop Details
$sql = "SELECT * FROM workshops WHERE id='$workshop_id' AND is_visible=1 AND is_deleted=0";
$results = $connect->query($sql);

if ($results->num_rows > 0) {
    $workshop = $results->fetch_assoc();

    // Fetch Category
    $cid = $workshop['category_id'];
    $csql = "SELECT * FROM categories where id='$cid'";
    $cresults = $connect->query($csql);
    $category = $cresults->fetch_assoc();

    // Fetch Trainer
    $tid = $workshop['trainer_id'];
    $tsql = "SELECT * FROM trainers where id='$tid'";
    $tresults = $connect->query($tsql);
    $trainer = $tresults->fetch_assoc();

    // Duration
    $duration_mins = $workshop['duration'];

    // Format Date
    $start_time = $workshop['start_time'];
    $date_obj = new DateTime($start_time);
    $formatted_date = $date_obj->format('jS F Y');
    $formatted_time = $date_obj->format('h:i A');

} else {
    // Workshop not found
    header("Location: index.php");
    exit();
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $connect->real_escape_string($_POST['full_name']);
    $school_name = $connect->real_escape_string($_POST['school_name']);
    $city = $connect->real_escape_string($_POST['city']);
    $email = $connect->real_escape_string($_POST['email']);
    $phone = $connect->real_escape_string($_POST['phone']);
    $rating = intval($_POST['rating']);
    $liked_most = $connect->real_escape_string($_POST['liked_most']);
    $future_topics = $connect->real_escape_string($_POST['future_topics']);

    $insert_sql = "INSERT INTO workshop_feedback (workshop_id, full_name, school_name, city, email, phone, rating, liked_most, future_topics) 
                   VALUES ('$workshop_id', '$full_name', '$school_name', '$city', '$email', '$phone', '$rating', '$liked_most', '$future_topics')";

    if ($connect->query($insert_sql) === TRUE) {
        $success_msg = "Thank you for your feedback!";
    } else {
        $error_msg = "Error submitting feedback: " . $connect->error;
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback -
        <?php echo $workshop['name']; ?>
    </title>

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/flaticon-skillgro.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/default-icons.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/tg-cursor.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <style>
        .feedback-area {
            background-color: #f5f8ff;
            padding: 60px 0;
        }

        .workshop-card {
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .workshop-card img {
            width: 100%;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .workshop-info h3 {
            font-size: 22px;
            margin-bottom: 15px;
            color: var(--tg-heading-color);
            line-height: 1.4;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 10px;
            font-size: 15px;
            color: #555;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
        }

        .info-row span {
            min-width: 80px;
            /* Ensure labels align nicely */
            font-weight: 500;
        }

        .info-row strong {
            color: #333;
            font-weight: 600;
        }

        .form-card {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--tg-heading-color);
            font-size: 14px;
        }

        .form-control {
            background-color: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 8px;
            height: 48px;
            padding: 10px 15px;
            font-size: 14px;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: var(--tg-theme-primary);
            box-shadow: none;
        }

        textarea.form-control {
            height: 120px;
            resize: none;
        }

        /* Star Rating */
        .rating-input {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
        }

        .rating-input input {
            display: none;
        }

        .rating-input label {
            cursor: pointer;
            font-size: 28px;
            color: #ddd;
            margin: 0;
            line-height: 1;
        }

        .rating-input input:checked~label,
        .rating-input label:hover,
        .rating-input label:hover~label {
            color: #ffca08;
        }

        .btn-submit {
            background-color: var(--tg-theme-primary);
            color: #fff;
            padding: 14px 35px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            /* Full width on mobile by default, adjustable */
        }

        @media (min-width: 768px) {
            .btn-submit {
                width: auto;
            }
        }

        .btn-submit:hover {
            background-color: var(--tg-heading-color);
            color: #fff;
        }

        .section-title {
            margin-bottom: 25px;
        }

        .section-title h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Mobile Optimization */
        @media (max-width: 767px) {
            .feedback-area {
                padding: 40px 0;
            }

            .form-card {
                padding: 25px;
                margin-top: 0;
                /* Removing top gap if any */
            }

            .workshop-card {
                padding: 20px;
                margin-bottom: 25px;
            }

            .breadcrumb__area {
                padding: 40px 0;
                /* Smaller breadcrumb on mobile */
            }

            .section-title h2 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <?php include "include/header.php"; ?>

    <main class="main-area">

        <!-- Breadcrumb -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <nav class="breadcrumb">
                                <span><a href="index.php">Home</a></span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span>Feedback Form</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feedback-area">
            <div class="container">
                <div class="row">
                    <!-- Workshop Details -->
                    <div class="col-lg-4">
                        <div class="workshop-card">
                            <div class="workshop-img">
                                <img src="<?php echo $uri . $workshop['banner_image']; ?>"
                                    alt="<?php echo $workshop['name']; ?>">
                            </div>
                            <div class="workshop-info">
                                <h3>
                                    <?php echo $workshop['name']; ?>
                                </h3>

                                <div class="info-row">
                                    <span>Date:</span>
                                    <strong>
                                        <?php echo $formatted_date; ?>
                                    </strong>
                                </div>
                                <div class="info-row">
                                    <span>Time:</span>
                                    <strong>
                                        <?php echo $formatted_time; ?>
                                    </strong>
                                </div>
                                <div class="info-row">
                                    <span>Trainer:</span>
                                    <strong>
                                        <?php echo $trainer['name']; ?>
                                    </strong>
                                </div>
                                <div class="info-row">
                                    <span>Category:</span>
                                    <strong>
                                        <?php echo $category['name']; ?>
                                    </strong>
                                </div>
                                <div class="info-row">
                                    <span>Duration:</span>
                                    <strong>
                                        <?php echo $duration_mins; ?> Minutes
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Feedback Form -->
                    <div class="col-lg-8">
                        <div class="form-card">

                            <?php if ($success_msg): ?>
                                <div class="alert alert-success">
                                    <?php echo $success_msg; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($error_msg): ?>
                                <div class="alert alert-danger">
                                    <?php echo $error_msg; ?>
                                </div>
                            <?php endif; ?>

                            <div class="section-title">
                                <h2>Magic Of Skills Feedback Form</h2>
                                <p>Thank you for participating in Magic Of Skills workshops. We hope you are having a great learning
                                    experience with us so far. Your valuable feedback will help us improve our future
                                    workshops.</p>
                            </div>

                            <form action="" method="POST">
                                <h4 class="mb-4">Your Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Full Name *</label>
                                            <input type="text" name="full_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>School/Institution Name *</label>
                                            <input type="text" name="school_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City *</label>
                                            <input type="text" name="city" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number *</label>
                                            <input type="tel" name="phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Email Address *</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mb-4 mt-4">Workshop Feedback</h4>

                                <div class="form-group">
                                    <label>How would you rate this workshop? *</label>
                                    <div class="rating-input">
                                        <input type="radio" name="rating" id="star5" value="5" required><label
                                            for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star4" value="4"><label for="star4"
                                            title="4 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star3" value="3"><label for="star3"
                                            title="3 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star2" value="2"><label for="star2"
                                            title="2 stars"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star1" value="1"><label for="star1"
                                            title="1 star"><i class="fas fa-star"></i></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>What did you like most about this workshop? *</label>
                                    <textarea name="liked_most" class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>What topics would you like covered in future workshops?</label>
                                    <textarea name="future_topics" class="form-control"></textarea>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn-submit">Submit Feedback</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include "include/footer.php"; ?>

    <!-- JS here -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>