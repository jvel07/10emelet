<?php
 $link = mysqli_connect('127.0.0.1','root','','advertising');
if(!$link ){
    echo "Connection failed: " . mysqli_connect_error();
    echo "Errno: " . mysqli_connect_errno();
}
//echo "Connection done!"

?>

