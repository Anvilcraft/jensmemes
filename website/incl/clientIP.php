<?php

include ('../dbcon.php');

$clientIP =$_SERVER['REMOTE_ADDR'];
$tk = $_COOKIE['token'];
$sql = "UPDATE `token` SET `latest-ip` = '$clientIP' WHERE `token` = '$tk';
";
if(!mysqli_query($con, $sql)){
    echo "Err_ Sending Client IP".mysqli_error($con);
}
?>
