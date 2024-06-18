<?php
session_start();
include("../include/connect.php");
$newid=$_GET['id'];

$sql="DELETE from reviews where id='$newid'";
if(mysqli_query($connect,$sql)){
    header('location: ../review.php');
}else{
    echo "Not Delete";
} 


?>