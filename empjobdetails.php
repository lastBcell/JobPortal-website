<?php
session_start();
include 'config.php';
$sessid = $_SESSION['SESSION_jobid'];
$sessemail = $_SESSION['SESSION_EMAIL'];
// // echo $sessemail;
// extract($_POST);
// $data = '';
// $newarray = array();
// foreach ($_POST as $k => $v) {

//     $newarray[$k] = $v;
//     // echo $newarray[$v];
// }
// $id = $newarray['jobid'];
// echo $id;


$msg = "";


if (isset($_POST['update'])) {
    $jobtittle = mysqli_real_escape_string($conn, $_POST['jobtittle']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $shift = $_POST['shift'];
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $requirements = mysqli_real_escape_string($conn, $_POST['requirements']);
    $aboutrole = mysqli_real_escape_string($conn, $_POST['aboutrole']);
    $responsibilities = mysqli_real_escape_string($conn, $_POST['responsibilities']);
    $candrequirement = mysqli_real_escape_string($conn, $_POST['candrequirement']);

    $query1 = mysqli_query($conn, "UPDATE jobs SET jobtittle ='{$jobtittle}', location='{$location}',shift ='{$shift}', salary ='{$salary}' , requirements='{$requirements}', aboutrole='{$aboutrole}',responsibilities='{$responsibilities}',candrequirement='{$candrequirement}' WHERE id='{$_SESSION['SESSION_jobid']}'");
    // $sql = "INSERT INTO apply ( applyname,email,applydob,applygender,applycountry, sessid ,compemail,jobtittle)VALUES ('{$applyname}','{$sessemail}','{$applydob}','{$applygender}','{$applycountry}','{$sessid}','{$compemail}','{$jobtittle}')";
    // $result = mysqli_query($conn, $sql);
    // $msg = "<div class='alert'='start'>Job Applied Successfully!</div>";
    if ($query1) {
        $msg = "<div class='alert'='start'>Updated Successfully!</div>";
    } else {
        $msg = "<div class='alert'='start'>Updation Failed!</div>";
    }
}

if (isset($_POST['delete'])) {
    $msg = $sessid;
    $query = mysqli_query($conn, "DELETE  FROM jobs WHERE id='{$sessid}'");
    if ($query) {
        header("Location: employer.php");
    } else {
        $msg = "<div class='alert'='start'>deletion failed</div>";
    }
}



$query = mysqli_query($conn, "SELECT * FROM jobs WHERE id='{$sessid}'");
$row = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Settings UI Design</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="employee.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <style>
        .alert {

            margin-top: 5px;
            padding: 2px;
            text-align: left;
            color: crimson;
            font-weight: 400;
            border-radius: 2px;

        }
    </style>
    <section class="py-5 my-5">
        <div class="container">

            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">


                        <a class="nav-link active" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="true">
                            <i class="fa fa-book text-center mr-1"></i>
                            Job Details
                            <a class="nav-link" id="logout-tab" data-toggle="pill" href="#logout" role="tab" aria-controls="notification" aria-selected="false">
                                <i class="fa fa-warning text-center mr-1"></i>
                                Logout
                            </a>
                    </div>
                </div>

                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">



                    <!-- details of job-->
                    <div class="tab-pane fade show active" id="application" role="tabpanel" aria-labelledby="application-tab">
                        <h3 class="mb-4">Job details</h3>
                        <form action="" method="post" id="postajob">
                            <div id="error_msg2"><?php echo $msg; ?></div>
                            <div class="row">
                                <div id="error_msg2"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Job tittle</label>
                                        <textarea class="form-control" name="jobtittle" rows="1"><?php echo $row["jobtittle"]; ?></textarea>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <textarea class="form-control" name="location" rows="1"><?php echo $row["location"]; ?></textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Shift</label>
                                        <select name="shift" class="form-control">
                                            <option value="<?php echo $row["shift"]; ?></option>"><?php echo $row["shift"]; ?></option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Remote">Remote</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <textarea class="form-control" name="salary" rows="1"><?php echo $row["salary"]; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Requirement</label>
                                        <textarea class="form-control" name="requirements" rows="4"><?php echo $row["requirements"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About the role</label>
                                        <textarea class="form-control" name="aboutrole" rows="4"><?php echo $row["aboutrole"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Responsibilities</label>
                                        <textarea class="form-control" name="responsibilities" rows="4"><?php echo $row["responsibilities"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Candidate Requirement</label>
                                        <textarea class="form-control" name="candrequirement" rows="4"><?php echo $row["candrequirement"]; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button name="update" class="button">Update</button>
                                <!-- <button name="delete" class="btn btn-light">Delete</button> -->
                        </form>
                    </div>
                </div>


                <!-- logouut -->
                <div class="tab-pane fade" id="logout" role="tabpanel" aria-labelledby="logout-tab">
                    <h3 class="mb-4">Logout</h3>

                    <div>
                        <p>Do you want to logout?</p>
                    </div>
                    <div>
                        <a href="logout.php"><button class="button">logout</button></a>
                        <a href="welcome.php"><button class="btn btn-light">go back</button></a>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script></script>
</body>

</html>