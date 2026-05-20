<?php
$lifetime = 31536000; // 1 year in seconds
ini_set('session.cookie_lifetime', $lifetime);
ini_set('session.gc_maxlifetime', $lifetime);

$host = "82.25.121.166";
$user = "u954141192_mos";
$password = "Mos@2024";
$dbname = "u954141192_mos";

try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connect = mysqli_connect($host, $user, $password, $dbname);
} catch (mysqli_sql_exception $e) {
    header("HTTP/1.1 500 Internal Server Error");
    $client_ip = $_SERVER['REMOTE_ADDR'] ?? 'your local IP';
    echo "
    <div style='font-family: system-ui, -apple-system, sans-serif; max-width: 600px; margin: 50px auto; padding: 30px; border: 1px solid #ffccd5; border-radius: 12px; background-color: #fff5f5; color: #842029;'>
        <h2 style='margin-top: 0; color: #b7094c;'>Database Connection Error</h2>
        <p>Could not connect to the remote database at <strong>$host</strong>.</p>
        <p><strong>Error Details:</strong> " . htmlspecialchars($e->getMessage()) . "</p>
        <hr style='border: 0; border-top: 1px solid #f5c2c7; margin: 20px 0;'>
        <h3 style='color: #b7094c; font-size: 16px; margin-bottom: 8px;'>How to fix this:</h3>
        <ol style='padding-left: 20px; line-height: 1.6;'>
            <li>Log in to your hosting provider (e.g., Hostinger).</li>
            <li>Go to the <strong>Databases</strong> or <strong>Remote MySQL</strong> section.</li>
            <li>Whitelist your current IP address: <strong style='background: #fff; padding: 2px 6px; border: 1px solid #f5c2c7; border-radius: 4px;'>$client_ip</strong></li>
            <li>If you want to use a local database instead, configure your local MySQL server (XAMPP) and change the database credentials in <code>include/connect.php</code>.</li>
        </ol>
    </div>";
    exit;
}
$uri = 'https://api.magicofskills.com/storage/app/';
date_default_timezone_set('Asia/Kolkata');
$current_time = time();
function callAPI($method, $urlpoint, $data, $token){
    if (!isset($token)) {
        $token = "";
    }
    
    $url = 'https://api.magicofskills.com/public/api/'.$urlpoint.'';
    $curl = curl_init($url);
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
             
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
       $token
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_BINARYTRANSFER,TRUE);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
   //   echo $result;
    if(!$result){echo curl_error($curl);}
    curl_close($curl);
    return $result;
 }
function callAPI1($method, $urlpoint, $data, $token){
    if (!isset($token)) {
        $token = "";
    }
    
    $url = 'https://api.magicofskills.com/public/api/'.$urlpoint.'';
    $curl = curl_init($url);
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
             
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: multipart/form-data',
       $token
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_BINARYTRANSFER,TRUE);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
   //   echo $result;
    if(!$result){echo curl_error($curl);}
    curl_close($curl);
    return $result;
 }

