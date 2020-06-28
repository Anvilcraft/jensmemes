<!DOCTYPE html>
<html>

<head>
  <title>JensMemes v2</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link id="theme" rel="stylesheet" href="themes/lama.css" />
  <script defer src="script.js"></script>
  <script defer src="button.js"></script>
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
        <li><a href="https://www.a-hoefler.eu/sites/social-media/">ITbyHF</a> - Website</li>
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

    <div class="col-lg-12">
      <h2>
        <center></center>
      </h2>
      <div class="bar-main">
        <button data-modal-target="#modal" class="btn-modal"></button>
        <div id="themediv">
          <p>Theme:</p>
          <select name="Themes" id="themeswitcher">
            <option value="lama">Lama</option>
            <option value="light">LordMZTE</option>
	          <option value="old">Old</option>
            <option value="retro">Retro</option>
          </select>
        </div>
        <script src="switcher.js"></script>
        <?php
        $tokencookie = $_COOKIE['token'];
        if (!empty($tokencookie)) {
          echo '<b style="color:red;">Authentifiziert</b>';
        } ?>
        <form method='post' action='#' enctype='multipart/form-data'>
          <input type="file" id="real-file" hidden="hidden" name="file[]" multiple="" />
          <button type="button" id="custom-button">Browse...</button>
          <span id="custom-text">_</span>
          <?php
          if (empty($tokencookie)) {
            echo '
         <input type="text" name="token" id="token" placeholder="Token">';
          } else {
          }
          ?>
          <center><input type='submit' name='submit' id="btn-close-CSS" value=''></center>
        </form>
      </div>
      <br>
      <br>

      <?php
      //UPLOAD
      if (isset($_POST['submit'])) {
        include('uploadOK.php');
        $home_dir = "images/" . md5($tokencookie) . "/";
        if ($home_dir == "images//") {
          $home_dir = "images/" . md5($_POST['token']) . "/";
        }
        mkdir($home_dir);

        $resultMaxUpl = mysqli_query($con, "select * from token WHERE token='$tokencookie' OR token='$tokenpost'") or die('Error In Session');
        $rowMaxUpl = mysqli_fetch_array($resultMaxUpl);
        $MaxUpl = $rowMaxUpl['uploadsLast24H'];
        $MaxUpl++;
        $sqlMaxUpl = "UPDATE token SET uploadsLast24H='$MaxUpl' WHERE token='$tokencookie' OR token='$tokenpost'";
        mysqli_query($con, $sqlMaxUpl);


        if ($uploadOK) {
          if ($MaxUpl <= 20) {
            $countfiles = count($_FILES['file']['name']);
            for ($i = 0; $i < $countfiles; $i++) {
              $filename = $_FILES['file']['name'][$i];
              move_uploaded_file($_FILES['file']['tmp_name'][$i], $home_dir . $filename);
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




      //BILDER ANZEIGEN
      $files = glob("images/*/*");
      for ($i = 0; $i < count($files); $i++) {
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
          echo '<a href="' . $image . '"><video src=' . $image . ' controls class="Videos_" ></video></a>';
          echo "</div>";
        } else {
          continue;
        }
      }
      ?>
    </div>


</body>

</html>