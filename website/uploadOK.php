<?php
include('dbcon.php');


$tokencookie = $_COOKIE['token'];
$resulttoken=mysqli_query($con, "select * from token WHERE token='$tokencookie'")or die('Error In Session');
$rowtoken=mysqli_fetch_array($resulttoken);

$tokenpost = $_POST['token'];
$resultpost=mysqli_query($con, "select * from token WHERE token='$tokenpost'")or die('Error In Session');
$rowpost=mysqli_fetch_array($resultpost);


if(!empty($rowtoken) || !empty($rowpost)){
  $uploadOK = true;
  //echo "<b>Authenticated.</b>";
}else{
  $uploadOK = false;
  echo "unauthenticated.";
}
 ?>
