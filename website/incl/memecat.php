<?php
$catobj = json_decode(file_get_contents("https://jensmemes.tilera.xyz/api/categories"));
$cats = $catobj->categories;

echo '
<script>
$(document).ready(function(){
    $(\'#show\').on(\'change\', function() {
';
global $cats;
$c2 = 0;
foreach ($cats as $cate){
    $cname = str_replace(' ', '_',$cate->name);
    if($c2==0){
        echo '
           if(this.value=="'.$cname.'"){
               ';

        foreach ($cats as $catdis) {
            if($catdis->name!=$cate->name){
                $cat_dis = str_replace(" ", '_', $catdis->name);
                echo '$("#'.$cat_dis.'").hide();';
            }
        }
        echo '
        $("#'.$cname.'").show();
       }';
        $c2=1;
    }else{
        echo '
           else if(this.value=="'.$cname.'"){
               ';

        foreach ($cats as $catdis) {
            if($catdis->name!=$cate->name){
                $cat_dis = str_replace(" ", '_', $catdis->name);
                echo '$("#'.$cat_dis.'").hide();';
            }
        }
        echo '
        $("#'.$cname.'").show();
       }';
    }
}
echo '
    });
});
</script>';



echo '
<div id="themediv">
   <p>Anzeigen:</p>
  <select id="show">
   
';

global $cats;
$c = 0;
foreach ($cats as $cate) {
    $cname = str_replace(' ', '_', $cate->name);
    if($c==0){
        echo '<option value="'.$cname.'" selected>'.$cname.'</option>';
        $c=1;
    }
    echo '<option value="'.$cname.'">'.$cname.'</option>';
}

echo '</select></div>';

?>