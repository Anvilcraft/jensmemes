<?php
$files = glob("images/*/*");
$random = rand(0, count($files) - 1);
$file = $files[$random];
echo "https://jensmemes.tilera.xyz/" . $file;
?>