<?php

// Enable error reporting temporarily for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log errors to a file
ini_set('log_errors', 1);
ini_set('error_log', 'error_log.txt'); // Make sure this path is writable

// Include the database connection file
include('../include/connect.php');

// Check if the connection was successful
if (!$connect) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Connection failed");
}

// Query to get user data
$sql = "SELECT id, first_name, last_name, email, mobile, user_type, school, city, grade FROM users"; // Adjust the table and columns according to your database

// Query to get user data
$result = mysqli_query($connect, $sql);

if (!$result) {
    $errorMessage = "Query failed: " . mysqli_error($connect);
    error_log($errorMessage);
    die($errorMessage);
}


// Initialize an array to hold the data
$data = array();

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// Close the database connection
mysqli_close($connect);

// Output the data in JSON format
echo json_encode(array('data' => $data));

// Disable error reporting after debugging
error_reporting(0);
ini_set('display_errors', 0);
?>
