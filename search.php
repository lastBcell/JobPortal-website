<?php
include 'config.php';
// $data = stripslashes(file_put_contents("php://input"));
// $mydata = json_decode($data,true);
// $search = $mydata['sr'];
// echo $search;
session_start();
$email = $_SESSION['SESSION_EMAIL'];



extract($_POST);
$data = '';
$newarray = array();

foreach ($_POST as $k => $v) {
    $newarray[$k] = $v;
}

$search = $newarray['search'];
// $search .="%";
// echo $search;
$query = mysqli_query($conn, "SELECT * FROM jobs WHERE jobtittle like '%$search%'");
// $row = mysqli_fetch_assoc($query);

// $cquery = mysqli_query($conn, "SELECT cname FROM emp WHERE email='{$ce}'");
// $crow = mysqli_fetch_assoc($cquery);
// if($query){

if (mysqli_num_rows($query) > 0) {

?>
    <table>
        <thead>
            <tr>
                <th>Role</th>
                <th>Companyname</th>
                <th>shift</th>
                <th>Location</th>
                <th>salary</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                $ce = $row["email"];

                $cquery = mysqli_query($conn, "SELECT cname FROM emp WHERE email='{$ce}'");
                $crow = mysqli_fetch_assoc($cquery);
                $b = $crow["cname"];

                $a = $row["jobtittle"];
                $c = $row["shift"];
                $d = $row["location"];
                $e = $row["salary"];


            ?>

                <tr>

                    <td><?php echo $a ?></td>
                    <td><?php echo $b ?></td>
                    <td><?php echo $c ?></td>
                    <td><?php echo $d ?></td>
                    <td><?php echo $e ?></td>
                    <td>
                        <div>
                            <form action="" method="post">
                                <input type="hidden" name="detailid" value=<?php echo $row["id"]; ?>>
                                <button name="details" type="submit" class="btn2">details</button>
                                </a>
                            </form>
                        </div>
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo '<div class="center"><h1>No jobs found!</h1></div>';
}








// end   $row = mysqli_fetch_assoc($query);
//     $a = $row["jobtittle"];
//     $b = $row["shift"];
//     $d =$row["location"];
//     $c = $row["salary"];
//     echo $a;
//    echo $b;
//    echo $d;
//      echo $c;


//     echo "gid";
// <tr>
// <th>Role</th>
// <th>Companyname</th>
// <th>shift</th>
// <th>Location</th>
// <th>salary</th>
// <th></th>
// </tr>

// echo ' <tbody>
// <tr>
//   <td data-label="role">software-developer</td>
//   <td data-label="companyname">google</td>
//   <td data-label="shift">part-time</td>       
//   <td data-label="location">tvm</td>
//   <td data-label="salry">20000-30000</td>
//   <td data-label=""><button class="btn2">details</button></td>
// </tr>
// </tbody>';
// }
// else{
//     echo "bad";
// }
// }
?>