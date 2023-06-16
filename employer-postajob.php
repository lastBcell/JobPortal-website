<?php
session_start();
$email = $_SESSION['SESSION_EMAIL'];
// echo $email;
// echo "data recievedd";
include 'config.php';
// $newarray = array();
// "INSERT INTO jobs (email) VALUES ('{$email}')";
extract($_POST);
$data = '';
foreach ($_POST as $k => $v) {
    // $newarray[$k] = $v;

    if (empty($data)) {
        $data .= "$k = '$v'";
    } else {
        $data .= ", $k ='$v'";
    }
}
$data .= ", email = '$email'";
// $jobemail=$newarray['email'];

// echo $data;
$sql = "INSERT INTO  jobs SET $data";
$query = mysqli_query($conn, $sql);
// $sql2 = "SELECT * FROM users  where $data";
// $result2= mysqli_query($conn, $sql);


// $row2 = mysqli_fetch_assoc($result2);
// $row = mysqli_fetch_assoc($result);
// $id=$row['id'];

// echo $id;
// $jt= $newarray['jobtittle'] ;
// $loc =$newarray['location'] ;
// $sal =$newarray['salary'] ;
// $shift =$newarray['shift'] ;
// $req=$newarray['requirements'] ;
// $abr =$newarray['aboutrole'] ;
// $creq =$newarray['candrequirement'] ;
// //  echo $req,$creq,$shift;
// $query2 = mysqli_query($conn, "UPDATE jobs set email ='{$email}' where jobtittle='{$jt}' and location='{$loc}' and salary='{$sal}' and shift='{$shift}' and requirements='{$req}' and aboutrole='{$abr}' and candrequirement='{$creq}'");

// "UPDATE jobs set email ('{$email}')";
if ($query) {
    echo "Data Submitted Successfully";
} else {
    echo "Data submission has failed, Please Try Again";
}
