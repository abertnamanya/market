<?php

include './DbConnect.php';
$contact = $_POST['contact'];
$password = $_POST['password'];
$response = array();
$db = new DbConnect();

$query = mysqli_query($db->connect(), "select * from mobile_users where contact='$contact' and password='$password'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $response['full_name'] = $row['firstName'] . " " . $row['lastName'];
    $response['user_id'] = $row['user_id'];
    $response['error'] = FALSE;
    $response['message'] = "Login successfull";
} else {
    $response['message'] = "wrong contact and password  try again";
    $response['error'] = TRUE;
}
echo json_encode($response);
?>