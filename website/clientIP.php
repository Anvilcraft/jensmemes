<?php

  $clientIP = $_SERVER['REMOTE_ADDR'];
  $sql = "UPDATE token SET latest-ip='$clientIP' WHERE token='$tokenpost' OR token='$tokencookie'";
  $result = mysqli_query($con,$sql);

 ?>
