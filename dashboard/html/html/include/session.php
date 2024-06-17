<?php
session_start();
if(empty($_SESSION['email'] AND $_SESSION['usertoken'])){
    header('location: index.php');
}