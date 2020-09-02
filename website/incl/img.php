<div id="all">
<?php
global $cats;
foreach ($cats as $cate) {

    $parts = explode(":", $cate);
    $cname = str_replace(' ', '_', $cate->name);
    echo '
        <div id="' . $cname . '">
            <h2>' . $cate->name . '</h2>';
            $memeobj = json_decode(file_get_contents("https://jensmemes.tilera.xyz/api/memes?category=" . $cate->id));
            $memes = $memeobj->memes;
                if ( $memeobj->status != 200 )
                {
                    die('Ungültige Abfrage: ' . $memeobj->error);
                }
                foreach ($memes as $meme)
                {
                    $ext = strtolower(pathinfo($meme->link, PATHINFO_EXTENSION));
                    if($ext=="mp4"){
                        echo '

                            <div class="kasten">
                            <a href="'.$meme->link.'"><video src="'.$meme->link.'" controls class="Videos_"></video> </a>
                            </div>

                        ';
                    } else if($ext=="png" || $ext=="jpg" ||$ext=="jpeg"||$ext=="gif" ){
                        echo '
                                    <div class="kasten">
                                    <a href="'.$meme->link.'"><img class="Bilder_" src="'.$meme->link.'" loading="lazy"></a>
                                    </div>
                                ';
                    }
                }
        mysqli_free_result( $db_ergJens );
    echo '</div><br clear="all">';
}

?>
</div>
