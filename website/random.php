<?php
$json = file_get_contents("https://jensmemes.tilera.xyz/api.php/random");
$obj = json_decode($json, false, 512, JSON_UNESCAPED_UNICODE);
$file = $obj->link;
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
if ($ext == "mp4") {
echo "<a href='$file'><video src='$file' controls ></video></a>";
} else {
echo "<a href='$file'><img src='$file' /></a>";
}
?>

