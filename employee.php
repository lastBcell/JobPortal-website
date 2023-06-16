<?php
session_start();
include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
	$row = mysqli_fetch_assoc($query);

	$fname = $row["name"];
	// echo $username;
	// $useremail = $row["email"];
}
$msg = "";

if (isset($_POST['fsubmit'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$fdate = date('Y-m-d', strtotime($_POST['fdate']));
	$femail = mysqli_real_escape_string($conn, $_POST['femail']);
	$fnum = mysqli_real_escape_string($conn, $_POST['fnum']);
	$fgend = mysqli_real_escape_string($conn, $_POST['fgend']);
	$fcntry = mysqli_real_escape_string($conn, $_POST['fcntry']);
	$fcity = mysqli_real_escape_string($conn, $_POST['fcity']);
	$fzip = mysqli_real_escape_string($conn, $_POST['fzip']);
	$ftxt = mysqli_real_escape_string($conn, $_POST['ftxt']);

	$query = mysqli_query($conn, "UPDATE users SET name ='{$fname}', dob='{$fdate}',empemail ='{$femail}', pnumber ='{$fnum}' , gender='{$fgend}', counrty='$fcntry',city='{$fcity}',zip='{$fzip}',txt='{$ftxt}' WHERE email='{$_SESSION['SESSION_EMAIL']}'");
	//  echo $fname;
	//  echo $femail;	
	//  echo $fnum;
	//  echo $fgend;	 
	//  echo $fcntry;
	//  echo $fcity;
	//  echo $fzip;
	//  echo $fdate;
	//  echo $ftxt;
}

// if (isset($_POST['delete'])) {
// 	$id = $_POST['jobid'];
// 	// echo $id;
// 	$query = mysqli_query($conn, "DELETE  FROM apply WHERE id='{$id}'");
// 	if ($query) {
// 		$msg = "<div class='alert'='start'>Deleted Successfully!</div>";
// 	} else {
// 		$msg = "<div class='alert'='start'>Deletion Failed!</div>";
// 	}
// }



// 	$oldpass =  mysqli_real_escape_string($conn, md5($_POST['oldpass']));
// 	$newpass = mysqli_real_escape_string($conn, md5($_POST['newpass']));
// 	$confpass = mysqli_real_escape_string($conn ,md5($_POST['confpass']));
// 	// echo $oldpass;
// 	// ,$newpass,$confpass

// 	$prow =  mysqli_fetch_assoc($query);
// 	$pass = $prow["password"];
// 	// echo $pass,"";
// 	if ($pass === $oldpass) {
// 	  if ($newpass === $confpass) {
// 		$query = mysqli_query($conn, "UPDATE users SET password='{$newpass}' WHERE email='{$_SESSION['SESSION_EMAIL']}'");
// 	  }
// 	  else{
// 		$msg = "<div class='alert'> Confirm password dont match!</div>";
// 	  }

// 	}
// 	else{
// 		$msg ="<div class='alert'>old password dont match!</div>";
// 	}
// 	}

$blah = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
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
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i>
							Password
						</a>
						<a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fa fa-book text-center mr-1"></i>
							Professional qualification
						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-book text-center mr-1"></i>
							Academic qualification
						</a>
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fa fa-bell text-center mr-1"></i>
							applied jobs
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
										<input type="text" name="femail" class="form-control" value="<?php $vfemail = $vrow["empemail"];
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
										<input type="text" name="fcntry" class="form-control" value="<?php $vcntry = $vrow["counrty"];
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

								<div class="col-md-12">
									<div class="form-group">
										<label>About me</label>
										<textarea class="form-control" name="ftxt" rows="4"><?php $vftxt = $vrow["txt"];
																							echo $vftxt ?></textarea>
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
						<form action="" method="post" id="passwordquali">
							<?php echo $msg; ?>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<div id="error_msg3"></div>
										<label>Old password</label>
										<input type="password" name="oldpass" class="form-control" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>New password</label>
										<input type="password" name="newpass" class="form-control" value="" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Confirm new password</label>
										<input type="password" name="confpass" class="form-control" value="" required>
									</div>
								</div>
							</div>
							<div>
								<button class="button">Update</button>
						</form>
					</div>


				</div>
				<!-- proff quali -->
				<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
					<h3 class="mb-4">Professional qualification</h3>
					<form action="" method="post" id="proquali">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Company</label>
									<input type="text" name="company" class="form-control" value="<?php $qcomp = $vrow["company"];
																									echo $qcomp ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Designation</label>
									<input type="text" name="designation" class="form-control" value="<?php $qdesig = $vrow["designation"];
																										echo $qdesig ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Position</label>
									<input type="text" name="position" class="form-control" value="<?php $qpos = $vrow["position"];
																									echo $qpos ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Experience</label>
									<input type="text" name="experience" class="form-control" value="<?php $qexp = $vrow["experience"];
																										echo $qexp ?>">
								</div>
							</div>
						</div>
						<div>
							<button class="button">Update</button>
							<button class="btn btn-light">Cancel</button>
					</form>
				</div>

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
																									echo $aquali ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Institution</label>
								<input type="text" name="institution" class="form-control" value="<?php $ainst = $vrow["institution"];
																									echo $ainst ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Year of passing</label>
								<input type="number" name="yearofpassing" class="form-control" value="<?php $ayop = $vrow["yearofpassing"];
																										echo $ayop ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Precentage</label>
								<input type="float" name="precentage" class="form-control" value="<?php $aprec = $vrow["precentage"];
																									echo $aprec ?>">
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
					<div>
						<button class="button">Update</button>
						<!-- <button class="btn btn-light">Cancel</button> -->
				</form>
			</div>
		</div>
		<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
			<h3 class="mb-4">Applied Jobs</h3>

			<div class="wrapper">
				<div id="error_msg4"></div>
				<form action="" method="post" id="applydelete">
					<?php
					$aquery = mysqli_query($conn, "SELECT * FROM apply WHERE email='{$_SESSION['SESSION_EMAIL']}'");
					// $arow = mysqli_fetch_assoc($aquery);
					// $employeemail = $arow["email"];

					// $cquery = mysqli_query($conn, "SELECT * FROM emp WHERE email='{$employeemail}'");
					// $crow = mysqli_fetch_assoc($cquery);
					// $name = $crow["name"];
					// echo $name;

					// if($query){
					if (mysqli_num_rows($aquery) > 0) { ?>
						<table id="scores">
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
								?>

									<tr>
										<td><?php echo $a ?></td>
										<td><?php echo $b ?></td>
										<td><?php echo $c ?></td>
										<td><?php echo $d ?></td>
										<td><?php echo $e ?></td>

										<input type="hidden" name="jobid" value=<?php echo $arow["id"]; ?>>
										<td><button class="btn2">delete</button>
										</td>

				</form>
				</tr>
			<?php
								}
			?>
			</tbody>
			</table>
		<?php
					} else {
						echo '<h2>no data found</h2>';
					}
		?>

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
	<script src="action.js"></script>
</body>

</html>