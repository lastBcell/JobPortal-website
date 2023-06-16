<?php
session_start();
include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_emid']}'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

    $fname = $row["name"];
    // echo $username;
    // $useremail = $row["email"];
}
$msg = "";


$blah = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_emid']}'");
$vrow = mysqli_fetch_assoc($blah);
// $value = $vrow["empemail"];
// echo $value;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee</title>
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
            text-align: center;
            color: crimson;
            font-weight: 400;
            border-radius: 2px;

        }
    </style>
    <section class="py-5 my-5">
        <div class="container">
            <h1 class="mb-5"><?php echo $fname; ?></h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <!-- <div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="img/user2.jpg" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php echo $fname; ?></h4>
					</div> -->
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                            <i class="fa fa-user text-center mr-1"></i>
                            Employee details
                        </a>

                        <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                            <i class="fa fa-book text-center mr-1"></i>
                            Professional qualification
                        </a>
                        <a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
                            <i class="fa fa-book text-center mr-1"></i>
                            Academic qualification
                        </a>

                        <a class="nav-link" id="logout-tab" data-toggle="pill" href="#logout" role="tab" aria-controls="notification" aria-selected="false">
                            <i class="fa fa-warning text-center mr-1"></i>
                            Logout
                        </a>
                    </div>
                </div>
                <!-- employ -->
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <form action="" method="post">
                            <h3 class="mb-4">Employee</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input readonly type="text" name="fname" class="form-control" value="<?php $vfname = $vrow["name"];
                                                                                                                echo $vfname ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>D.O.B</label>
                                        <input readonly type="date" name="fdate" class="form-control" value="<?php $vfdate = $vrow["dob"];
                                                                                                                echo $vfdate ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input readonly type="text" name="femail" class="form-control" value="<?php $vfemail = $vrow["empemail"];
                                                                                                                echo $vfemail; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input readonly type="text" name="fnum" class="form-control" value="<?php $vfnum = $vrow["pnumber"];
                                                                                                            echo $vfnum ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input readonly type="text" name="fgend" class="form-control" value="<?php $vfgend = $vrow["gender"];
                                                                                                                echo $vfgend ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input readonly type="text" name="fcntry" class="form-control" value="<?php $vcntry = $vrow["counrty"];
                                                                                                                echo $vcntry ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City/Town</label>
                                        <input readonly type="text" name="fcity" class="form-control" value="<?php $vfcity = $vrow["city"];
                                                                                                                echo $vfcity ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Zip code</label>
                                        <input readonly type="text" name="fzip" class="form-control" value="<?php $vfzip = $vrow["zip"];
                                                                                                            echo $vfzip ?>">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About me</label>
                                        <textarea readonly class="form-control" name="ftxt" rows="4"><?php $vftxt = $vrow["txt"];
                                                                                                        echo $vftxt ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- pass -->




                    <!-- proff quali -->
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <h3 class="mb-4">Professional qualification</h3>
                        <form action="" method="post" id="proquali">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" name="company" class="form-control" value="<?php $qcomp = $vrow["company"];
                                                                                                        echo $qcomp ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="designation" class="form-control" value="<?php $qdesig = $vrow["designation"];
                                                                                                            echo $qdesig ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" name="position" class="form-control" value="<?php $qpos = $vrow["position"];
                                                                                                        echo $qpos ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input type="text" name="experience" class="form-control" value="<?php $qexp = $vrow["experience"];
                                                                                                            echo $qexp ?>" readonly>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- academin quali -->
                    <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
                        <h3 class="mb-4">Academic Qalification</h3>
                        <form action="" method="post" id="acaquali">
                            <div class="row">
                                <div id="error_msg"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input type="text" name="qualification" class="form-control" value="<?php $aquali = $vrow["qualification"];
                                                                                                            echo $aquali ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institution</label>
                                        <input type="text" name="institution" class="form-control" value="<?php $ainst = $vrow["institution"];
                                                                                                            echo $ainst ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Year of passing</label>
                                        <input type="number" name="yearofpassing" class="form-control" value="<?php $ayop = $vrow["yearofpassing"];
                                                                                                                echo $ayop ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Precentage</label>
                                        <input type="float" name="precentage" class="form-control" value="<?php $aprec = $vrow["precentage"];
                                                                                                            echo $aprec ?>" readonly>
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="app-check">
										<label class="form-check-label" for="app-check">
										App check
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
										<label class="form-check-label" for="defaultCheck2">
										Lorem ipsum dolor sit.
										</label>
									</div>
								</div>
							</div>
						</div> -->

                        </form>
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
    <script src="action.js"></script>
</body>

</html>