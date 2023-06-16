<?php
session_start();
include 'config.php';
$sessid = $_SESSION['SESSION_id'];
$sessemail = $_SESSION['SESSION_EMAIL'];
// echo $sessemail;

$query = mysqli_query($conn, "SELECT * FROM jobs WHERE id='{$_SESSION['SESSION_id']}'");
$row = mysqli_fetch_assoc($query);
$compemail = $row["email"];
$jobtittle = $row["jobtittle"];
// echo $jobtittle;
// print $jobtittle;
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row1 = mysqli_fetch_assoc($query);
    $applyname = $row1["name"];
    $applydob = $row1["dob"];
    $applygender = $row1["gender"];
    $applycountry = $row1["counrty"];

    // echo $username;
    // $useremail = $row["email"];
}

//     // $useremail = $row["email"];
// }
$msg = "";
if ($row1["choice"] == 1) {
    $msg = "<div class='alert'='start'>employers cant apply</div>";
} else {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM apply WHERE email='{$sessemail}' and sessid = '{$sessid}'")) > 0) {
        $msg = "<div class='alert'='start'>already applied once!</div>";
    } else {
        if (isset($_POST['apply'])) {
            $sql = "INSERT INTO apply ( applyname,email,applydob,applygender,applycountry, sessid ,compemail,jobtittle)VALUES ('{$applyname}','{$sessemail}','{$applydob}','{$applygender}','{$applycountry}','{$sessid}','{$compemail}','{$jobtittle}')";
            $result = mysqli_query($conn, $sql);
            $msg = "<div class='alert'='start'>Job Applied Successfully!</div>";
        }
    }
}

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

                                        <input type="text" name="jobtittle" class="form-control" value=<?php echo $row["jobtittle"]; ?> readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" readonly name="location" class="form-control" value=<?php echo $row["location"]; ?>>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Shift</label>
                                        <input type="text" name="shift" class="form-control" value=<?php echo $row["shift"]; ?> readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="number" name="salary" class="form-control" value=<?php echo $row["salary"]; ?> readonly>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Requirement</label>
                                        <textarea readonly class="form-control" name="requirements" rows="4"><?php echo $row["requirements"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About the role</label>
                                        <textarea readonly class="form-control" name="aboutrole" rows="4"><?php echo $row["aboutrole"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Responsibilities</label>
                                        <textarea readonly class="form-control" name="responsibilities" rows="4"><?php echo $row["responsibilities"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Candidate Requirement</label>
                                        <textarea readonly class="form-control" name="candrequirement" rows="4"><?php echo $row["candrequirement"]; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button name="apply" class="button">Apply</button>
                                <!-- <button class="btn btn-light">Cancel</button> -->
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
    <!-- <script src="action2.js"></script> -->
</body>

</html>