<?php
session_start();

if(isset($_SESSION['u_id'])!="") {
	header("Location: index.php");
}

include_once 'mysqli_connection.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . ($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: index.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
if (isset($_POST['name'])) {

	$name = mysqli_real_escape_string($con, $_POST['name']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result1 = mysqli_query($con, "SELECT * FROM users WHERE name = '" . $name. "' and password = '" . ($password) . "'");

	if ($row = mysqli_fetch_array($result1)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: index.php");
	} else {
		$errormsg = "Incorrect Name or Password!!!";
	}
}
?>

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Advertising RabIT</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/cover.css" rel="stylesheet">

    </head>

    <body>

        <div class="site-wrapper">

            <div class="site-wrapper-inner">

                <div class="cover-container">

                    <div class="masthead clearfix">
                        <div class="inner">
                          <h1 class="masthead-brand">Users</h1>
                            <nav>
                                <ul class="nav masthead-nav">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active"><a href="user.php">Users</a></li>
                                    <li><a href="advertisement.php">Advertisements</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="inner cover">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>User name</th>
                                </tr>
                            </thead>
                            <?php
                            require_once('mysqli_connection.php');
                            $queryUsers = "SELECT iduser, username FROM user";
                            $response = mysqli_query($con , $queryUsers);
                            ?>
                            <tbody>
                                <?php
                                if ($response->num_rows > 0) {

                                    while ($row = mysqli_fetch_array($response)) {
                                        echo '<tr>
                                   <th>' . $row["iduser"] . '</th>
                                   <th>' . $row["username"] . '</th>
                                  </tr>';
                                    }
                                } else {
                                    echo "0 results!";
                                    echo mysqli_error($dbc);
                                }
                                ?>  
                            </tbody>
                        </table>
                    </div>

                    <div class="mastfoot">
                        <div class="inner">
                            <p>José Vicente Egas López, for <a href="https://rabit.hu">RabIT - Software Engineering</a>.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- May the page load faster when placed at the end of the doc ;) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"></script>
    </body>
</html>
