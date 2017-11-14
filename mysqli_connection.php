<?php
 $con= mysqli_connect('127.0.0.1','root','','kopaj_10');
if(!$con){
    echo "Connection failed: " . mysqli_connect_error();
    echo "Errno: " . mysqli_connect_errno();
}
//echo "Connection done!"

?>

