<?php
include 'config.php';


$data = isset($_REQUEST['myData']) ? $_REQUEST['myData'] : "";
// echo $data;
$query = mysqli_query($conn, "DELETE  FROM jobs WHERE id='{$data}'");
if ($query) {
    echo "Deleted";
} else {
    echo "not deleted";
}
