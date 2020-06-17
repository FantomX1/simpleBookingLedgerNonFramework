<!---->
<!---->
<!---->
<!---->
<!---->
<!--<div style="border: 2px solid red">-->
<!---->
<?php
//
//    echo $content;
//
//?>
<!---->
<!--</div>-->
<!---->
<!---->
<!---->
<!--<div>-->
<!---->
<!---->
<!---->
<!--</div>-->



<?php

ob_start();
include __DIR__."/../web/node_modules/startbootstrap-freelancer/dist/index.html";
$res = ob_get_clean();

$res = str_replace("assets/", "node_modules/startbootstrap-freelancer/dist/assets/", $res);
$res = str_replace("css/", "node_modules/startbootstrap-freelancer/dist/css/", $res);
$res = str_replace("js/", "node_modules/startbootstrap-freelancer/dist/js/", $res);



$res = str_replace(
    "<!-- Portfolio Grid Items-->",
    $content."<!-- Portfolio Grid Items-->",
    $res
);








echo $res;


?>
