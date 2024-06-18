<?php
session_start();
include "../include/connect.php";

if($_POST['cart_id']==$_SESSION['cart_id']){
    $cartid = $_POST['cart_id'];
    $userid = $_SESSION['userid'];
    
    // Getting User Details
    $sql = "SELECT * FROM users where id=$userid";
    $results = $connect->query($sql);
    $final = $results->fetch_assoc();
    
    // Getting Workshop Details
    $sql2 = "SELECT * FROM carts where id=$cartid";
    $results2 = $connect->query($sql2);
    $cart = $results2->fetch_assoc();
    if($cart['payment_status']==1){
        // Already Bought Workshop Condition
        echo "<script>alert('Payment for this cart workshops already completed.')
            window.location.href='../enrolled-courses.php';
                </script>
                ";
    }else if($cart['price']<9){
        // Free Workshop Condition
        // echo "AAA";
        $token = rand(1000000000000,9999999999999999);
        $token1 = rand(9000000000009,9999999999999999);
        $order_id = $response['payment_request']['id'];
        $amount =  $response['payment_request']['amount'];
        $longurl =  $response['payment_request']['longurl'];
        
        $data_array =  array(
            "cart_id" => $cartid,
            "token" => $_SESSION['token'],
            "amount" => $cart['price'],
            "order_id" => $token1,
            "payment_id" => "Free Workshop",
            "verify_token" => $token,
            "url" => NULL
        );
        // echo "efjc";
        $make_call = callAPI1('POST', 'cartPaymentFree', $data_array,null);
        $response = json_decode($make_call, true);
        // print_r($response);
        // echo ($response);
        if($response['status']==true){
            session_start();
            $_SESSION['cart_id'] = $response['cart'];
            echo "<script>alert('".$response['message']."');
            window.location.href='../enrolled-courses.php';
            </script>";
        }else{
            echo "<script>alert('".$response['message']."');
            window.history.back();
            </script>";
        }
    }else{
        // echo "AAA";
        $price = $cart['price'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("X-Api-Key: 0c7802aae2cb271a656b36e0071d85d0",
                      "X-Auth-Token: 4d8d5cbfc51796caa87dc1b6ededfa9a"));
    $token = rand(1000000000000,9999999999999999);
    $redirect = 'https://magicofskills.com/controller/validatecart.php?token='.$token;
    $payload = Array(
        'purpose' => 'Magic Of Skills | Workshop Payment',
        'amount' => $price,
        'phone' => $_SESSION['mobile'],
        'buyer_name' => $_SESSION['name'],
        'redirect_url' => $redirect,
        'send_email' => true,
        'webhook' => 'https://magicofskills.com/controller/validatewebhook.php',
        'send_sms' => true,
        'email' => $_SESSION['email'],
        'allow_repeated_payments' => false
    );
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($response, true);
    
    // print_r($response);
    if($response['success']==1){
       
        $order_id = $response['payment_request']['id'];
        $amount =  $response['payment_request']['amount'];
        $longurl =  $response['payment_request']['longurl'];
        
        $data_array =  array(
            "cart_id" => $cartid,
            "token" => $_SESSION['token'],
            "amount" => $amount,
            "order_id" => $order_id,
            "verify_token" => $token,
            "url" => $longurl
        );
        // echo "efjc";
        $make_call = callAPI1('POST', 'cartPaymentInitiate', $data_array,null);
        $response = json_decode($make_call, true);
        // echo ($response);
        if($response['message']){
            echo "<script>
            window.location.href='". $longurl."';
            </script>
            ";
            
        } 
    }
    }
}








?>