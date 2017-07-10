<?php

include './DbConnect.php';
$response = array();
$db = new DbConnect();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$contact = $_POST['contact'];
$password = $_POST['password'];

$check = mysqli_query($db->connect(), "select * from mobile_users where contact='$contact'");
$response = array();
if (mysqli_num_rows($check) > 0) {
    $response['message'] = "Account already exists";
    $response['error'] = TRUE;
} else {
    $insert = mysqli_query($db->connect(), "INSERT INTO mobile_users(firstName,lastName,contact,password) values('$firstName','$lastName','$contact','$password')");
    if ($insert) {
        $fetch = mysqli_query($db->connect(), "select * from mobile_users where contact='$contact'");
        $row = mysqli_fetch_assoc($fetch);
        $response['full_name'] = $row['firstName'] . " " . $row['lastName'];
        $response['user_id'] = $row['user_id'];
        $response['error'] = FALSE;
        $response['message'] = "Account created successfully";
    }
}
echo json_encode($response);
?>