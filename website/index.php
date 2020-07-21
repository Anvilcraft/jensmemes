<!DOCTYPE html>
<html>

<head>
  <title>JensMemes v2</title>
  <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link id="theme" rel="stylesheet" href="themes/llama.css" />
  <script defer src="/script/modal.js"></script>
  <script defer src="/script/button.js"></script>
  <script defer src="/script/switcher.js"></script>

</head>

<body class="">

  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Informationen</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      Das Token für das Login kannst du im Discord von Jens bzw. in Anvilcraft -Discord über den Befehl !register erhalten. Es wird nach der Eingabe für 30 Tage im Browser gespeichert - dannach muss es neu eingegeben werden. Durch den Logout-Button rechts kann mann es löschen.<br><b>Made by</b>
      <ul>
        <li><a href="https://itbyhf.eu">ITbyHF</a> - Website</li>
        <li><a href="http://tilera.xyz/">tilera</a> - Hosting</li>
        <li><a href="https://twitter.com/LordMZTE">LordMZTE</a> - Theme 2 und Theme Switch</li>
        <li><a href="https://jonasled.de/">jonasled</a> - Discord Bot</li>
        <li><a href="https://www.twitch.tv/knautschzon3">Knautschzon3</a> - Website</li>
      </ul>
    </div>
  </div>
  <div id="overlay"></div>
  <div class="col-lg m-auto">
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
      if(!empty($_COOKIE['token'])){
          echo '      <form action="#" method="post" enctype="multipart/form-data">
                      <input type="submit"name="home" class="btn-home" value="">
                      </form>
          ';
          if (isset($_POST['home'])) {
              header('Location: /home');
          }
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
        <?php
        $tokencookie = $_COOKIE['token'];
        if (!empty($tokencookie)) {
          echo '<b style="color:red;">Authentifiziert</b>';
        } ?>
        <form method='post' action='#' enctype='multipart/form-data'>
          <input type="file" id="real-file" hidden="hidden" name="file[]" multiple="" />
          <button type="button" id="custom-button">Browse...</button>
          <span id="custom-text"></span>
          <?php
          if (empty($tokencookie)) {
            echo '
         <input type="text" name="token" id="token" placeholder="Token">';
          } else {
          }
          ?>
            <label for="type">Memetype</label>
            <select id="type" name="type">
                <option value="jens">JensMeme</option>
                <option value="hendrik">HendrikMeme</option>
                <option value="realtox">RealtoxMeme</option>
                <option value="random">RandomMeme</option>
            </select>

          <center><input type='submit' name='submit' id="btn-close-CSS" value=''></center>
        </form>
      </div>
      <br>
      <br>

      <?php

      include "dbcon.php";
      include "incl/uploadOK.php";
      include "incl/upload.php";
      include 'incl/img.php';
      include 'incl/clientIP.php';
      ?>
    </div>


</body>

</html>
