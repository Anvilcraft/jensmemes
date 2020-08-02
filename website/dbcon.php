<?php

$con = mysqli_connect("SQLHost", "SQLUser", "SQLPasswor"t, "SQLDatenbank");

// Check connection
if (mysqli_connect_errno())
  {
  echo "<b style='color: #9c4b4b; text-decoration: underline;'>Failed to connect to <i >" .$SQLHost."</i> </b> :: " . mysqli_connect_error();
  }
?>
