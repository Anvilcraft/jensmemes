<?php
include ('../dbcon.php');
?>
<h2>JensMemes</h2>
    <?php
    $sqlJens = "SELECT * FROM images";
    $db_ergJens = mysqli_query( $con, $sqlJens);
    if ( ! $db_ergJens )
    {
        die('Ungültige Abfrage: ' . mysqli_error());
    }
    while ($zeile = mysqli_fetch_array( $db_ergJens, MYSQLI_ASSOC))
    {
        if($zeile[cat]=="jens"){
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
                        <a href="'.$zeile[path].'"><img class="Bilder_" src="'.$zeile[path].'"></a>
                        </div>
                        
                    ';
        }

        }

    }
    mysqli_free_result( $db_ergJens );
    ?>
<h2>randomMemes</h2>
<?php
$sqlrandom = "SELECT * FROM images";
$db_ergrandom = mysqli_query( $con, $sqlrandom);
if ( ! $db_ergrandom )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_ergrandom, MYSQLI_ASSOC))
{
    if($zeile[cat]=="random"){
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
                        <a href="'.$zeile[path].'"><img class="Bilder_" src="'.$zeile[path].'"></a>
                        </div>
                        
                    ';
        }

    }

}
mysqli_free_result( $db_ergrandom );
?>
<h2>realtoxMemes</h2>
<?php
$sqlrealtox = "SELECT * FROM images";
$db_ergrealtox = mysqli_query( $con, $sqlrealtox);
if ( ! $db_ergrealtox )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_ergrealtox, MYSQLI_ASSOC))
{
    if($zeile[cat]=="realtox"){
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
                        <a href="'.$zeile[path].'"><img class="Bilder_" src="'.$zeile[path].'"></a>
                        </div>
                        
                    ';
        }

    }

}
mysqli_free_result( $db_ergrealtox );
?>
    <h2>hendrikMemes</h2>
<?php
$sqlhendrik = "SELECT * FROM images";
$db_erghendrik = mysqli_query( $con, $sqlhendrik);
if ( ! $db_erghendrik )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_erghendrik, MYSQLI_ASSOC))
{
    if($zeile[cat]=="hendrik"){
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
                        <a href="'.$zeile[path].'"><img class="Bilder_" src="'.$zeile[path].'"></a>
                        </div>
                        
                    ';
        }

    }

}
mysqli_free_result( $db_erghendrik );
?>