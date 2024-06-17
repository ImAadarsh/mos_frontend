<?php
session_start();
include "../include/connect.php";
if(isset($_GET['workshop_id'])&&isset($_SESSION['token'])){
    // No Payment for Active Membership User.
    $data_array =  array(
        "token" => $_SESSION['token'],
        "user_id" => $_SESSION['userid'],
        "workshop_id" => $_GET['workshop_id'],
        "del" => $_GET['del']
    );
        $make_call = callAPI1('POST', 'insertWishlist', $data_array,null);
        $response = json_decode($make_call, true);
        if($response['status'] == true) {
            echo "<script>alert('".$response['message']."');
            window.history.back();
            </script>";
        }else{
            echo "<script>alert('".$response['message']."');
            window.history.back();
            </script>";
        }
}else{
    echo "<script>alert('Please Login');
            window.history.back();
            </script>";
}

