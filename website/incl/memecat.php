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
echo '
      if(this.value=="all"){';
    foreach ($cats as $catall){
        echo '$("#'.$catall->id.'").show();
    ';
    }
    echo '}';
foreach ($cats as $cate){
    if($c2==0){
        echo '
           else if(this.value=="'.$cate->id.'"){
               ';

        foreach ($cats as $catdis) {
            if($catdis->id!=$cate->id){
                $cat_dis = str_replace(" ", '_', $catdis->id);
                echo '$("#'.$cat_dis.'").hide();';
            }
        }
        echo '
        $("#'.$cate->id.'").show();
       }';
        $c2=1;
    }else{
        echo '
           else if(this.value=="'.$cate->id.'"){
               ';

        foreach ($cats as $catdis) {
            if($catdis->id!=$cate->id){
                echo '$("#'.$catdis->id.'").hide();';
            }
        }
        echo '
        $("#'.$cate->id.'").show();
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
echo '<option value="all" selected>All</option>';
foreach ($cats as $cate) {
    if($c==0){
        echo '<option value="'.$cate->id.'">'.$cate->id.'</option>';
        $c=1;
    }else{
        echo '<option value="'.$cate->id.'">'.$cate->id.'</option>';
    }
}

echo '</select></div>';

?>
