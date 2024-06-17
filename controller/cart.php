<?php
session_start();
include "../include/connect.php";
if(isset($_GET['workshop_id'])&&isset($_SESSION['cart_id'])){
    // No Payment for Active Membership User.
    $data_array =  array(
        "token" => $_SESSION['token'],
        "cart_id" => $_SESSION['cart_id'],
        "workshop_id" => $_GET['workshop_id'],
    );
        $make_call = callAPI1('POST', 'addItemCart', $data_array,null);
        $response = json_decode($make_call, true);
        if($response['status'] == true) {
            echo "<script>alert('".$response['message']."');
            window.history.back();
            </script>";
        }else if($response['m'] == "purchased") {
            echo "<script>alert('".$response['message']."');
            window.location.href='../user-workshops.php';
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

