<?php
include ("../include/connect.php");
session_start();
$data_array =  array(
    "remember_token" => $_SESSION["token"],
    "email" => $_POST["email"],
    "grade" => $_POST["grade"],
    "first_name" => $_POST["first_name"],
    "last_name" => $_POST["last_name"],
    "school" => $_POST["school"],
    "city" => $_POST["city"],
);
print_r($data_array);
    $make_call = callAPI1('POST', 'profilecreation', $data_array,null);
    $response = json_decode($make_call, true);
    // print_r($response);
    if ($response['status'] == true && $response['data']['remember_token']&&$response['data']['is_data']==1) {
        $_SESSION['email'] =  $response['data']['email'];
        $_SESSION['name'] = $response['data']['first_name'];
        $_SESSION['mobile'] = $response['data']['mobile'];
        $_SESSION['token'] = $response['data']['remember_token'];
        $_SESSION['userid'] = $response['data']['id'];
        $_SESSION['profile'] = $response['data']['icon'];
        $_SESSION['banner'] = $response['data']['banner'];
        $_SESSION['is_data'] = $response['data']['is_data'];
        $_SESSION['is_email'] = $response['data']['email_verified'];
        $_SESSION['type'] = 'user';
        
    if($response['data']['id']){
        echo "<script>alert('".$response['message']."')</script>";
    }
    
    if(!empty($ws_id)){
        header('location: ../../workshop-details.php?id='.$ws_id);
    } else {
        header('location: ../dashboard.php');
    }
        
}else{
    if($response['status'] == false && $response['code']=="email"){
        echo "<script>alert('".$response['message']."'); window.location.href='../registraion.php';</script>";
    }
    if($response['status'] == false){
        echo "<script>alert('".$response['message']."'); window.location.href='../login.php';</script>";
    }
}
    

?>