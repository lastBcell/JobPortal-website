<?php
session_start();
include 'config.php';

// $query = mysqli_query($conn, "SELECT * FROM  WHERE email='{$_SESSION['SESSION_EMAIL']}'");

// if (mysqli_num_rows($query) > 0) {
//     $row = mysqli_fetch_assoc($query);

//     // $fname = $row["name"];
// 	// echo $username;
//     // $useremail = $row["email"];
// }
$msg = "";
$mgs = "";
if (isset($_POST['info'])) {
	$sid = $_POST['jobid'];
	$_SESSION['SESSION_jobid'] =  $sid;
	header("Location: empjobdetails.php");
	// echo $_SESSION['SESSION_id'];
	// echo $sid;
}
if (isset($_POST['einfo'])) {
	$em = $_POST['empem'];
	$_SESSION['SESSION_emid'] =  $em;
	header("Location: employee-apply-info.php");
	// echo $_SESSION['SESSION_id'];
	// echo $sid;
}

if (isset($_POST['fsubmit'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$fdate = date('Y-m-d', strtotime($_POST['fdate']));
	$femail = mysqli_real_escape_string($conn, $_POST['femail']);
	$fnum = mysqli_real_escape_string($conn, $_POST['fnum']);
	$fgend = mysqli_real_escape_string($conn, $_POST['fgend']);
	$fcntry = mysqli_real_escape_string($conn, $_POST['fcntry']);
	$fcity = mysqli_real_escape_string($conn, $_POST['fcity']);
	$fzip = mysqli_real_escape_string($conn, $_POST['fzip']);


	$query = mysqli_query($conn, "UPDATE emp SET name ='{$fname}', dob='{$fdate}',cemail ='{$femail}', pnumber ='{$fnum}' , gender='{$fgend}', country='$fcntry',city='{$fcity}',zip='{$fzip}' WHERE email='{$_SESSION['SESSION_EMAIL']}'");
}

$blah = mysqli_query($conn, "SELECT * FROM emp WHERE email='{$_SESSION['SESSION_EMAIL']}'");
$vrow = mysqli_fetch_assoc($blah);
// $value = $vrow["empemail"];
// echo $value;
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
			text-align: center;
			color: crimson;
			font-weight: 400;
			border-radius: 2px;

		}
	</style>
	<section class="py-5 my-5">
		<div class="container">
			<!-- <h1 class="mb-5"> </h1> -->
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<!-- <div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="img/user2.jpg" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"></h4>
					</div> -->
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-user text-center mr-1"></i>
							Employer details
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i>
							Password
						</a>
						<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fa fa-book text-center mr-1"></i>
							Company details
						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-book text-center mr-1"></i>
							Post jobs
						</a>
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#postedjobs" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fa fa-bell text-center mr-1"></i>
							Posted Jobs
						</a>
						<a class="nav-link" id="logout-tab" data-toggle="pill" href="#empreq" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fa fa-warning text-center mr-1"></i>
							employee requests
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
							<h3 class="mb-4">Employer</h3>

							<div class="row">
								<div><?php echo $mgs; ?></div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="fname" class="form-control" value="<?php $vfname = $vrow["name"];
																									echo $vfname ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>D.O.B</label>
										<input type="date" name="fdate" class="form-control" value="<?php $vfdate = $vrow["dob"];
																									echo $vfdate ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="femail" class="form-control" value="<?php $vfemail = $vrow["cemail"];
																										echo $vfemail; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone number</label>
										<input type="text" name="fnum" class="form-control" value="<?php $vfnum = $vrow["pnumber"];
																									echo $vfnum ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Gender</label>
										<input type="text" name="fgend" class="form-control" value="<?php $vfgend = $vrow["gender"];
																									echo $vfgend ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Country</label>
										<input type="text" name="fcntry" class="form-control" value="<?php $vcntry = $vrow["country"];
																										echo $vcntry ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>City/Town</label>
										<input type="text" name="fcity" class="form-control" value="<?php $vfcity = $vrow["city"];
																									echo $vfcity ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Zip code</label>
										<input type="text" name="fzip" class="form-control" value="<?php $vfzip = $vrow["zip"];
																									echo $vfzip ?>">
									</div>
								</div>
							</div>
							<div>
								<button name="fsubmit" type="submit" class="button">Update</button>
							</div>
						</form>
					</div>
					<!-- pass -->
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Password Settings</h3>
						<?php echo $msg; ?>
						<form action="" method="post" id="passwordquali">
							<div id="error_msg3"></div>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label>Old password</label>
										<input type="password" name="oldpass" class="form-control" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>New password</label>
										<input type="password" name="newpass" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Confirm new password</label>
										<input type="password" name="confpass" class="form-control" required>
									</div>
								</div>
							</div>
							<div>
								<button class="button">Update</button>
						</form>
					</div>


				</div>
				<!-- company -->
				<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
					<h3 class="mb-4">Company details</h3>
					<form action="" method="post" id="companyquali">
						<div id="error_msg6"></div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Company name</label>
									<input type="text" name="cname" class="form-control" value="<?php $qcomp = $vrow["cname"];
																								echo $qcomp ?>">

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Company type</label>
									<input type="text" name="ctype" class="form-control" value="<?php $qexp = $vrow["ctype"];
																								echo $qexp ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Telephone</label>
									<input type="number" name="tel" class="form-control" value="<?php $qdesig = $vrow["tel"];
																								echo $qdesig ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mobile</label>
									<input type="number" name="mobile" class="form-control" value="<?php $qpos = $vrow["mobile"];
																									echo $qpos ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Postal adress</label>
									<input type="text" name="postaddr" class="form-control" value="<?php $qexp = $vrow["postaddr"];
																									echo $qexp ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Physical address</label>
									<input type="text" name="physicaladdr" class="form-control" value="<?php $qexp = $vrow["physicaladdr"];
																										echo $qexp ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<input type="text" name="compemail" class="form-control" value="<?php $qexp = $vrow["compemail"];
																									echo $qexp ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Website</label>
									<input type="text" name="website" class="form-control" value="<?php $qexp = $vrow["website"];
																									echo $qexp ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>About the company</label>
									<textarea class="form-control" name="aboutcompany" rows="4"><?php $vftxt = $vrow["aboutcompany"];
																								echo $vftxt ?></textarea>
								</div>
							</div>
						</div>
						<div>
							<button class="button">Update</button>
							<!-- <button class="btn btn-light">Cancel</button> -->
						</div>
					</form>
				</div>
				<!-- post a job -->
				<div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
					<h3 class="mb-4">Job details</h3>
					<form action="" method="post" id="postajob">
						<div id="error_msg2"></div>
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label>Job tittle</label>
									<input type="text" name="jobtittle" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Location</label>
									<input type="text" name="location" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Shift</label>
									<select name="shift" class="form-control">
										<option value="fulltime">Full-time</option>
										<option value="parttime">Part-time</option>
										<option value="remote">Remote</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Salary</label>
									<input type="number" name="salary" class="form-control">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>Requirement</label>
									<textarea class="form-control" name="requirements" rows="4"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>About the role</label>
									<textarea class="form-control" name="aboutrole" rows="4"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Responsibilities</label>
									<textarea class="form-control" name="responsibilities" rows="4"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Candidate Requirement</label>
									<textarea class="form-control" name="candrequirement" rows="4"></textarea>
								</div>
							</div>
						</div>

						<div>
							<button class="button">Post</button>
							<!-- <button class="btn btn-light">Cancel</button> -->
					</form>
				</div>
			</div>
			<!-- posted jobs -->
			<div class="tab-pane fade" id="postedjobs" role="tabpanel" aria-labelledby="notification-tab">
				<h3 class="mb-4">Posted Jobs</h3>
				<div id="error_msg4"></div>
				<div class="wrapper" id="scores3">
					<?php
					$query = mysqli_query($conn, "SELECT * FROM jobs WHERE email='{$_SESSION['SESSION_EMAIL']}'");
					$cquery = mysqli_query($conn, "SELECT cname FROM emp WHERE email='{$_SESSION['SESSION_EMAIL']}'");
					$crow = mysqli_fetch_assoc($cquery);
					$b = $crow["cname"];
					// if($query){
					if (mysqli_num_rows($query) > 0) { ?>
						<table id="table">
							<thead>
								<tr>
									<th>Role</th>
									<th>Company</th>
									<th>shift</th>
									<th>Location</th>
									<th>salary</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								while ($row = mysqli_fetch_assoc($query)) {
									$a = $row["jobtittle"];
									// $b = $row["email"];
									$c = $row["shift"];
									$d = $row["location"];
									$e = $row["id"];
									$f = $row["salary"];
								?>

									<tr>
										<td><?php echo $a ?></td>
										<td><?php echo $b ?></td>
										<td><?php echo $c ?></td>
										<td><?php echo $d ?></td>
										<td><?php echo $f ?></td>
										<form action="" method="post">

											<input type="hidden" name="jobid" value=<?php echo $e; ?>>
											<td><button name="info" class="btn2">edit</button></td>

										</form>

										<td><button setid="<?php echo $e; ?>" class="red">delete</button></td>


									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					<?php
					} else {
						$bl = "<h2 class='alert'='start'>no jobs posted !!</h2>";
						echo $bl;
					}
					?>

				</div>

			</div>
			<!-- employee req -->
			<div class="tab-pane fade" id="empreq" role="tabpanel" aria-labelledby="notification-tab">
				<h3 class="mb-4">Requests</h3>
				<div class="wrapper">
					<div id="error_msg5"></div>
					<?php
					$aquery = mysqli_query($conn, "SELECT * FROM apply WHERE compemail='{$_SESSION['SESSION_EMAIL']}'");

					if (mysqli_num_rows($aquery) > 0) { ?>
						<table id="table2">
							<thead>
								<tr>
									<th>Jobtitle</th>
									<th>Name</th>
									<th>Dob</th>
									<th>Gender</th>
									<th>Country</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								while ($arow = mysqli_fetch_assoc($aquery)) {

									$a = $arow["jobtittle"];
									$b = $arow["applyname"];
									$c = $arow["applydob"];
									$d = $arow["applygender"];
									$e = $arow["applycountry"];
									$f = $arow["id"];
								?>

									<tr>
										<td><?php echo $a ?></td>
										<td><?php echo $b ?></td>
										<td><?php echo $c ?></td>
										<td><?php echo $d ?></td>
										<td><?php echo $e ?></td>
										<form action="" method="post">
											<input type="hidden" name="empem" value=<?php echo $arow["email"]; ?>>
											<td><button name="einfo" class="btn2">info</button></td>
											<!-- <td><button class="btn2">delete</button></td> -->
										</form>
										<td><button getid="<?php echo $f;  ?>" class="red">delete</button></td>

									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					<?php
					} else {
						$bl = "<h2 class='alert'='start'>no requests!</h2>";
						echo $bl;
					}
					?>

				</div>

			</div>

			<!-- employee req end -->
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
	<script src="action2.js"></script>


</body>

</html>