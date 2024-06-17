
<?php
session_start();
include '../include/connect.php';

// Initialize data array
$data_array = array(
    "email" => $_POST['email'],
    "mobile" => $_POST['mobile'],
    "name" => $_POST['name'],
    "subject" => $_POST['subject'],
    'query' => $_POST['query']
);

// Make API call
$make_call = callAPI1('POST', 'insertContact', $data_array, null);
$response = json_decode($make_call, true);

// print_r($response);

if(isset($response['message'])){
    echo "<script>alert('" . $response['message'] . "');
    window.location.href='../contact.php';
    </script>";
} 

?>

