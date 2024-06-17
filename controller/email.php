<?php
include "../include/connect.php";

if(isset($_POST['newsletter'])){
    // No Payment for Active Membership User.
    $data_array =  array(
        "email" => $_POST['email'],
    );
        $make_call = callAPI1('POST', 'insertSubscriber', $data_array,null);
        $response = json_decode($make_call, true);
        if($response['status']==true){
            echo "<script>alert('".$response['message']."')
            window.history.back();
            </script>
            ";
        } 
}



?>