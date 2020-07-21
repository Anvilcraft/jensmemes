<!DOCTYPE html>
<html>

<head>
    <title>HOME | JensMemes v2</title>
    <meta charset="utf-8" />
    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="theme" rel="stylesheet" href="/themes/llama.css" />
    <script defer src="/script/modal.js"></script>
    <script defer src="/script/button.js"></script>
    <script defer src="/script/switcher.js"></script>



</head>

<body class="">

<div class="modal" id="modal">
    <div class="modal-header">
        <div class="title">Home</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">

        Im Home-Bereich kannst du deine Memes verwalten.

        <br><b>Made by</b>
        <ul>
            <li><a href="https://itbyhf.eu">ITbyHF</a> - Website/ Llama Theme</li>
            <li><a href="http://tilera.xyz/">tilera</a> - Hosting/ Old Theme</li>
            <li><a href="https://twitter.com/LordMZTE">LordMZTE</a> - Theme 2 und Theme Switch</li>
            <li><a href="https://jonasled.de/">jonasled</a> - Discord Bot / Dark Theme</li>
        </ul>
    </div>
</div>
<div id="overlay"></div>
<div>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type='submit' name='logout' class="btn-logout" value=''>
    </form>
    <?php
    if (isset($_POST['logout'])) {
        setcookie("token", "", time() - 3600);
        header('Location: ./');
    }
    ?>
    <?php
    echo '      <form action="#" method="post" enctype="multipart/form-data">
                      <input type=\'submit\' name=\'home\' class="btn-home" value=\'\'>
                      </form>
         ';
    if (isset($_POST['home'])) {
        setcookie("token", "", time() - 3600);
        header('Location: /');

    }
    ?>
    <div>
        <h2>
            <center></center>
        </h2>
        <div class="bar-main">
            <button data-modal-target="#modal" class="btn-modal"></button>
            <div id="themediv">
                <p>Theme:</p>
                <select name="Themes" id="themeswitcher">
                    <option value="llama">Llama</option>
                    <option value="light">LordMZTE</option>
                    <option value="old">Old</option>
                    <option value="retro">Retro</option>
                    <option value="dark">Dark</option>
                </select>
            </div>
            <h2>Meme Löschen</h2><br><br>
        </div>
        <br>
        <br>

        <?php
        include "../dbcon.php";
        echo 'Willst du wirklich folgendes Meme löschen? :<br>
              <div class="kasten">
                <img src="/'.$_GET['m'].' "class="Bilder_">      
              </div> 
                
';

        ?>
        <form action="#" method="post">
            <input type="submit" name="yes" class="btn btn-danger" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ja &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
        </form>
        <form action="#" method="post">
            <input type="submit" name="no" class="btn btn-success" value="Abbrechen&nbsp;">
        </form>
        <?php
        if(isset($_POST['no'])){
            header('Location: /home');
        }
        if(isset($_POST['yes'])){
            $m = $_GET['m'];
            $sql = "DELETE FROM images WHERE path='$m'";
            $result = mysqli_query($con, $sql);
            if($result){
                echo "Datei aus Datenbank gelöscht.";
            }
            if(unlink('../'.$m)){
                echo 'Datei von Server gelöscht.';
            }
        }
        ?>
</body>

</html>
