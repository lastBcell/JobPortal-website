<?php
include 'config.php';


$data = isset($_REQUEST['empData']) ? $_REQUEST['empData'] : "";
// echo $data;
$query = mysqli_query($conn, "DELETE  FROM apply WHERE id='{$data}'");
if ($query) {
    echo "Deleted";
} else {
    echo "not deleted";
}
