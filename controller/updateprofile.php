
<?php
session_start();
include '../include/connect.php';

// Initialize data array
$data_array = array(
    "token" => $_SESSION['token'],
    "school" => $_POST['school'],
    "city" => $_POST['city'],
    "grade" => $_POST['grade'],
    "first_name" => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'about' => $_POST['about']
);

// Check if image file is uploaded
if(isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
    $data_array['icon'] = curl_file_create($_FILES['profile_photo']['tmp_name'], $_FILES['profile_photo']['type'], $_FILES['profile_photo']['name']);
}

if(isset($_FILES['cover_photo']) && $_FILES['cover_photo']['error'] === UPLOAD_ERR_OK) {
    $data_array['banner'] = curl_file_create($_FILES['cover_photo']['tmp_name'], $_FILES['cover_photo']['type'], $_FILES['cover_photo']['name']);
}

// Make API call
$make_call = callAPI1('POST', 'userupdate', $data_array, null);
$response = json_decode($make_call, true);

// print_r($response);
if(isset($response['icon'])){
    $_SESSION['icon'] = $response['icon'];
} 
if(isset($response['banner'])){
    $_SESSION['banner'] = $response['banner'];
}
if(isset($response['message'])){
    echo "<script>alert('" . $response['message'] . "');
    window.location.href='../setting.php';
    </script>";
} 

?>

