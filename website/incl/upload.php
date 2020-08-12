<?php
if (isset($_POST['submit'])) {
    include('uploadOK.php');
    if(empty($tokencookie)) {
        $tokencookie = $_POST['token'];
    }
    $home_dir = "images/" . md5($tokencookie) . "/";
    mkdir($home_dir);

    $resultMaxUpl = mysqli_query($con, "select * from token WHERE token='$tokencookie' OR token='$tokenpost'") or die('Error In Session');
    $rowMaxUpl = mysqli_fetch_array($resultMaxUpl);
    $MaxUpl = $rowMaxUpl['uploadsLast24H'];
    $MaxUpl++;
    $sqlMaxUpl = "UPDATE token SET uploadsLast24H='$MaxUpl' WHERE token='$tokencookie' OR token='$tokenpost'";
    mysqli_query($con, $sqlMaxUpl);


    $resultToken=mysqli_query($con, "select * from token WHERE token='$tokencookie' OR token='$tokenpost'")or die('ERR_resultToken');
    $rowToken=mysqli_fetch_array($resultToken);



    if ($uploadOK) {
        if ($MaxUpl <= 20) {
            $countfiles = count($_FILES['file']['name']);
            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES['file']['name'][$i];
                move_uploaded_file($_FILES['file']['tmp_name'][$i], $home_dir . $filename);

                $memecat = $_POST['type'];
                $user = $rowToken['name'];
                $path = $home_dir.$filename;
                $clientIP =$_SERVER['REMOTE_ADDR'];;
                $sqlType = "INSERT INTO images (user, path, cat, ip) VALUES ('$user', '$path', '$memecat', '$clientIP')";
                $resultType = mysqli_query($con,$sqlType);
                if(!$resultType){
                    echo 'Error ' .mysqli_error($con);
                }
                

            }
            if (empty($_COOKIE['token'])) {
                $setCookie = $_POST['token'];
                setcookie("token", $setCookie, time() + (3600 * 720));
                echo "Cookie mit Inhalt gesetzt: " . $setCookie;
            } else {
            }
        } else echo "Heutiges Upload-Limit erreicht!";
    } else {
        echo "Unautorized!";
    }
}
?>