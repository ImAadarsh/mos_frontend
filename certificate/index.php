<?php
include "../include/connect.php";

if (isset($_GET['certificate'])) {
    $cert_id = $_GET['certificate'];
    $order_id = str_replace('MOS_', '', $cert_id);

    $query = "SELECT u.first_name, u.last_name, w.name as workshop_name, w.start_time, t.name as trainer_name 
              FROM payments p
              JOIN users u ON p.user_id = u.id
              JOIN workshops w ON p.workshop_id = w.id
              LEFT JOIN trainers t ON w.trainer_id = t.id
              WHERE p.order_id = ? AND p.payment_status = 1";

    $stmt = $connect->prepare($query);
    $stmt->bind_param('s', $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        die("Invalid Certificate ID");
    }

    $recipient_name = $data['first_name'] . ' ' . $data['last_name'];
    $workshop_topic = $data['workshop_name'];
    $conductor_name = $data['trainer_name'] ? $data['trainer_name'] : "Mr. Gaurava Yadav";
    $workshop_date = date('jS F Y', strtotime($data['start_time']));
} else {
    die("Certificate ID missing");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1120, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Certificate of Completion - <?php echo $recipient_name; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="certificate-container">
        <!-- Decorative Elements -->
        <div class="left-decoration-container">
            <img src="left_side_vertical_line.svg" alt="" class="decorative-left">
        </div>

        <!-- Top Right Section -->
        <div class="top-right-decoration">
            <img src="Cloud.svg" alt="" class="cloud-bg">
            <img src="right_side_logo.svg" alt="Magic of Skills Logo" class="brand-logo">
        </div>

        <!-- Main Content -->
        <main class="certificate-body">
            <h1 class="title">Certificate</h1>
            <h2 class="subtitle">of Completion</h2>

            <p class="certify-text">This is to proudly certify that</p>

            <div class="recipient-name" id="recipientName"><?php echo $recipient_name; ?></div>

            <div class="divider-line"></div>

            <p class="description">
                Has successfully completed the Magic of Skills online workshop<br>
                on the topic <strong id="workshopTopic">'<?php echo $workshop_topic; ?>'</strong>, conducted by<br>
                <strong id="conductorName"><?php echo $conductor_name; ?></strong> on <strong
                    id="workshopDate"><?php echo $workshop_date; ?></strong>.
            </p>
        </main>

        <!-- Footer Section -->
        <footer class="certificate-footer">
            <div class="date-section">
                <div id="qrcode" class="qr-code"></div>
                <div class="date-value" id="issueDate"><?php echo $workshop_date; ?>.</div>
                <div class="footer-line"></div>
                <div class="label">Date</div>
            </div>

            <div class="signature-section">
                <img src="signature.svg" alt="Signature" class="signature-img">
                <div class="footer-line"></div>
                <div class="signatory-name"><?php echo 'Mr. Gaurav Yadav' ?></div>
                <div class="signatory-title">Founder and Moderator<br>IPN Forum</div>
            </div>
        </footer>

        <!-- Decoration Dots -->
        <div class="dots-middle"></div>
        <div class="dots-bottom"></div>

        <!-- Watermark -->
        <div class="watermark">MAGIC SKILLS</div>

        <!-- Premium Glow Border -->
        <div class="premium-border"></div>

        <!-- Holographic Gradient Overlay -->
        <div class="holographic-overlay"></div>
    </div>

    <!-- Enhanced Controls for testing -->
    <div class="no-print controls">
        <button onclick="downloadPDF()" class="btn-download">
            <i class="fas fa-file-pdf"></i> Save as PDF
        </button>
        <button onclick="window.print()" class="btn-print">
            <i class="fas fa-print"></i> Print
        </button>
        <div class="share-buttons">
            <button onclick="shareLinkedIn()" class="btn-share btn-linkedin" title="Share on LinkedIn">
                <i class="fab fa-linkedin"></i>
            </button>
            <button onclick="shareTwitter()" class="btn-share btn-twitter" title="Share on Twitter">
                <i class="fab fa-twitter"></i>
            </button>
            <button onclick="shareWhatsApp()" class="btn-share btn-whatsapp" title="Share on WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </button>
            <button onclick="shareWhatsAppStatus()" class="btn-share btn-whatsapp-status"
                title="Share to WhatsApp Status">
                <i class="fab fa-whatsapp"></i>
                <span class="status-badge">📱</span>
            </button>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>