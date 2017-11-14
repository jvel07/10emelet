<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}
include_once 'mysqli_connection.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$name = mysqli_real_escape_string($con, $_POST['name']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result1 = mysqli_query($con, "SELECT * FROM user WHERE u_name = '" . $name. "' and u_password = '" . sha1($password) . "'");

	if ($row = mysqli_fetch_array($result1)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: index.php");
	} else {
		$errormsg = "Incorrect Name or Password!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- add header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"></a>
		</div>
		<!-- menu items -->
		<div class="collapse navbar-collapse" id="navbar1">
		<ul class="nav navbar-nav navbar-left">
		        <li><a href="index.php">Home</a></li>
		</ul>
			<ul class="nav navbar-nav navbar-right">
			
				<li class="active"><a href="login.php">Login</a></li>
				<!--<li><a href="register.php">Sign Up</a></li>-->
			</ul>
		</div>
	</div>
</nav>
<!-- menu items for users -->

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="nameform">
				<fieldset>
					<legend>Login</legend>

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Your name" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
<!--	
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		New User? <a href="register.php">Sign Up Here</a>
		</div>
	</div>
	-->
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
