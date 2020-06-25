<!DOCTYPE html>
<html>

<head>
    <title>JensMemes v2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.css">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="">

<div class="col-lg m-auto">


<div class="col-lg-12">
    <center>Eine zentrale Seite für alle Jens Memes!</center><br>
    <div class="form-control m-auto bg-dark text-light" style="max-width:100%">
      <form method='post' action='' enctype='multipart/form-data'>
       <input type="file" name="file[]" id="file" multiple>
       <?php
        $tokencookie = $_COOKIE['token'];
        if(empty($tokencookie)){
          echo '
         <input type="text" name="token" id="token" placeholder="Token">';
       } else{
         echo '<b style="color:red;">Authentifiziert.</b>';
       }
        ?>
       <input type='submit' name='submit' value='Upload'>
      </form>
    </div>
<br>
    <br>

<?php
//UPLOAD
if(isset($_POST['submit'])){
  include('uploadOK.php');
  $home_dir = "images/".md5($tokencookie)."/";
  if($home_dir=="images//"){
  $home_dir = "images/".md5($_POST['token'])."/";
  }
  mkdir($home_dir);

  $resultMaxUpl=mysqli_query($con, "select * from token WHERE token='$tokencookie' OR token='$tokenpost'")or die('Error In Session');
  $rowMaxUpl=mysqli_fetch_array($resultMaxUpl);
  $MaxUpl = $rowMaxUpl['uploadsLast24H'];
  $MaxUpl++;
  $sqlMaxUpl = "UPDATE token SET token='$MaxUpl' WHERE token='$tokencookie' OR token='$tokenpost'";
  mysqli_query($con, $sqlMaxUpl);

  if($uploadOK){
    if($MaxUpl<=20){
       $countfiles = count($_FILES['file']['name']);
       for($i=0;$i<$countfiles;$i++){
        $filename = $_FILES['file']['name'][$i];
        move_uploaded_file($_FILES['file']['tmp_name'][$i],$home_dir.$filename);
       }
       if(empty($_COOKIE['token'])){
         $setCookie = $_POST['token'];
         setcookie("token",$setCookie,time()+(3600*720));
         echo "Cookie mit Inhalt gesetzt: ".$setCookie;
       }else{
         echo "Cookie auf neustem Stand.";
       }
    } else{
        echo "Maximales Upload Limit für heute erreicht. Bitte warten...";
    }
} else{
  echo "Unautorized!";
}
}




//BILDER ANZEIGEN
$files = glob("images/*/*");
for ($i=0; $i<count($files); $i++)
{
    $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
    );

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if (in_array($ext, $supported_file)) {
        echo "<div class='kasten'>";
        echo "
        <a href='$image'><img class='Bilder_' src='$image' /></a>\n
        ";
        echo "</div>";
    } elseif ($ext == "mp4") {

    // echo basename($image);

    echo "<div class='kasten'>";
    echo '<a href="'.$image.'"><video src=' . $image . ' controls class="Videos_" ></video></a>';
    echo "</div>";
    }
    else {
        continue;
    }
}
?>
</div>


</body>

</html>
