<?php
 $link = mysqli_connect('192.168.1.119','root','','advertising');
if(!$link ){
    echo "Connection failed: " . mysqli_connect_error();
    echo "Errno: " . mysqli_connect_errno();
}
//echo "Connection done!"

?>

