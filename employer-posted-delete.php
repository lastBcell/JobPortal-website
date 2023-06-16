<?php
session_start();
$email = $_SESSION['SESSION_EMAIL'];
echo $email;
echo "data recievedd";
include 'config.php';
extract($_POST);
$data = '';
$newarray = array();
foreach ($_POST as $k => $v) {

    $newarray[$k] = $v;
    echo $newarray[$v];
}
$id = $newarray['jobid'];
echo $id;

// echo $data;
// $query = mysqli_query($conn, "DELETE  FROM jobs WHERE id='{$id}'");
// if ($query) {
//     echo "Deleted";
// } else {
//     echo "not deleted";
// }
