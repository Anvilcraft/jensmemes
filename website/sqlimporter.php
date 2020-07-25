<!DOCTYPE html>
<html>

<head>
  <title>SQL Script</title>
</head>

<body>

<h1>SQL importer</h1>
<form method="post" action="#">
    <input type="submit" name="submit" value="Start">
</form>
<?php
if(isset($_POST['submit'])){

    include('dbcon.php');

    $files = glob('images/*/*', GLOB_BRACE);
    foreach ($files as $file) {

        $stmt = "INSERT INTO images(user,path, cat) VALUES ('System', '$file', 'jens')";
        $result = mysqli_query($con, $stmt);
        if($result){
            echo "<b>IMG STORED: </b>".$file.'<br>';
        }

    }
}
?>
</body>

</html>
