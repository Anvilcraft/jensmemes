<!DOCTYPE html>
<html>

<head>
    <title>HOME | JensMemes v2</title>
    <meta charset="utf-8" />
    <!-- Das neueste kompilierte und minimierte CSS -->



</head>

<body class="">

<?php

    if(!empty($_COOKIE['token'])){
        include('site.php');
    } else{
        header('location:../index.php');
        echo "UMLEITUNG! GG";
    }

?>
</body>

</html>
