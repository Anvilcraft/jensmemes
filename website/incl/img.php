<div id="all">
<?php
include ('../dbcon.php');
global $cats;
foreach ($cats as $cate) {
    $parts = explode(":", $cate);
    echo '
        <div id="' . $parts[0] . '">
            <h2>' . $parts[1] . '</h2>';
            $sqlJens = "SELECT * FROM images";
            $db_ergJens = mysqli_query( $con, $sqlJens);
                if ( ! $db_ergJens )
                {
                    die('Ungültige Abfrage: ' . mysqli_error());
                }
                while ($zeile = mysqli_fetch_array( $db_ergJens, MYSQLI_ASSOC))
                {
                    if($zeile[cat]==$parts[0]){
                        $ext = strtolower(pathinfo($zeile['path'], PATHINFO_EXTENSION));

                    if($ext=="mp4"){
                        echo '

                            <div class="kasten">
                            <a href="'.$zeile[path].'"><video src="'.$zeile[path].'" controls class="Videos_"></video> </a>
                            </div>

                        ';
                    } else if($ext=="png" || $ext=="jpg" ||$ext=="jpeg"||$ext=="gif" ){
                        echo '
                                    <div class="kasten">
                                    <a href="'.$zeile[path].'"><img class="Bilder_" src="'.$zeile[path].'" loading="lazy"></a>
                                    </div>
                                ';
                    }

                    }
                }
        mysqli_free_result( $db_ergJens );
    echo '</div>';
}

?>
</div>