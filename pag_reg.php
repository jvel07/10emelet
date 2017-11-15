<?php
session_start();

if(isset($_SESSION['u_id'])!="") {
	header("Location: index.php");
}
include_once 'mysqli_connection.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$text = mysqli_real_escape_string($con, $_POST['text']);
	
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO page(p_id,u_id,p_title,p_text,u_date) VALUES(NULL,'" . $_SESSION['u_id'] "','" . $name . "','" . $title . "', '" . $text . "',NOW())")) {
			$successmsg = "Successfully Registered! ;
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
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
					<?php if (isset($_SESSION['usr_id'])) { ?>
						<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
						<li><a href="logout.php">Log Out</a></li>
					<?php } else { ?>
						<li><a href="login.php">Login</a></li>

					<?php } ?>
				</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Sign Up Administration</legend>

					<div class="form-group">
						<label for="name">Title</label>
						<input type="text" name="title" placeholder="Enter Full Name" class="form-control" />	
					</div>
					
					<div class="form-group">
						<label for="name">Text</label>
						<input type="text" name="text" placeholder="Enter Full Name" class="form-control" />	
					</div>
				
					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>