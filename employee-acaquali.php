<?php
session_start();
$email= $_SESSION['SESSION_EMAIL'];
// echo $email;
// echo "data recievedd";
include 'config.php';
extract($_POST);
$data = '';
foreach($_POST as $k => $v) {
    if(empty($data)) {
        $data .= "$k = '$v'";
    } else {
        $data .= ", $k ='$v'";
    }
}
// echo $data;
$query = mysqli_query($conn, "UPDATE users SET $data WHERE email='{$email}'");
if($query) {
    echo "Data Submitted Successfully";
} else {
    echo "Data submission has failed, Please Try Again";
}
