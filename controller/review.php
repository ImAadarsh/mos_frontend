<?php
session_start();
include '../include/connect.php';

// Ensure the callAPI function is included from your included file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the JSON data from the request
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    // Extract the data from the decoded JSON
    $rating = $data['rating'];
    $review = $data['review'];
    $workshop_id = $data['workshop_id'];
    $token = $_SESSION['token'];
    $user_id = $_SESSION['userid'];
    $trainer_id = $data['trainer_id'];

    $data_array = array(
        "user_id" => $user_id,
        "remember_token" => $token,
        "workshop_id" => $workshop_id,
        "rating" => $rating,
        "comment" => $review,
        "trainer_id" => $trainer_id
    );

    // Call the API
    $make_call = callAPI('POST', 'insertReview', json_encode($data_array), NULL);
    $response = json_decode($make_call, true);

    // Set content type to JSON
    header('Content-Type: application/json');

    // Echo the response as JSON
    return json_encode($response);
}
?>
