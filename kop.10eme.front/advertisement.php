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

    <div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">
                        <h1 class="masthead-brand">Advertisements</h1>
                        <nav>
                            <ul class="nav masthead-nav">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="user.php">Users</a></li>
                                <li class="active"><a href="advertisement.php">Advertisements</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="inner cover">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Advertisement</th>
                                <th>User name</th>
                            </tr>
                        </thead>
                        <?php
                        require_once('mysqli_connection.php');
                        $queryUsers = "SELECT adTitle, user.userName FROM advertising.advertisement, advertising.user
                                where user_iduser = user.iduser;";

                        $response = mysqli_query($link , $queryUsers);
                        ?>

                        <tbody>
                            <?php
                            if ($response->num_rows > 0) {

                                while ($row = mysqli_fetch_array($response)) {
                                    echo '<tr>
                                    <th scope="row">' . $row["adTitle"] . '</th>
                                    <th scope="row">' . $row["userName"] . '</th>
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
