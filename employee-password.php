<?php
session_start();
$email= $_SESSION['SESSION_EMAIL'];
// echo $email;
// echo "data recieved";
include 'config.php';
extract($_POST);
$data = '';
$newarray = array();

foreach($_POST as $k => $v) {
$newarray[$k] = $v;
}
$query = mysqli_query($conn, "SELECT password FROM users WHERE email='{$email}'");
$row = mysqli_fetch_assoc($query);
$password=$row['password'];
// echo $password;
$oldpass=md5($newarray['oldpass']);
$newpass=md5($newarray['newpass']);
$confpass=md5($newarray['confpass']);
// echo $newpass;
// echo $confpass;
// echo $oldpass;
if($oldpass === $password ){
if($newpass === $confpass ){
   {
$query = mysqli_query($conn, "UPDATE users SET password='{$newpass}' WHERE email='{$_SESSION['SESSION_EMAIL']}'");
  echo "Password changed";
 }
} 
else{
    echo "Confirm password dont match";
}
}
else {
  echo "Old password dont match";
}            
//     }
      
// }
// print_r($newarray);
// $query = mysqli_query($conn, "UPDATE jobs SET $data WHERE email='{$email}'");
// if($query) {
// //     echo "Data Submitted Successfully";
// // } else {
// //     echo "Data submission has failed, Please Try Again";
// // }
?>