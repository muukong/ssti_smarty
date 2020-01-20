<?php

require('/usr/local/lib/php/Smarty/SmartyBC.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir('../smarty/templates');
$smarty->setCompileDir('../smarty/templates_c');
$smarty->setCacheDir('../smarty/cache');
$smarty->setConfigDir('../smarty/configs');

if ( isset($_POST["template"]) ) {
    $smarty->display('../smarty/templates/' . $_POST["template"]);
} else {
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';  // change accordingly

    header("Location: http://$host$uri/$extra");
}


