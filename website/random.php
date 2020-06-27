<?php
$files = glob("images/*/*");
$random = rand(0, count($files) - 1);
$file = $files[$random];
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
if ($ext == "mp4") {
echo '<a href="' . $file . '"><video src=' . $file . ' controls ></video></a>';
} else {
echo "<a href='$file'><img src='$file' /></a>";
}
?>

