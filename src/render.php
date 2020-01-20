<?php

require('/usr/local/lib/php/Smarty/SmartyBC.class.php');

$smarty = new Smarty();
$smarty->setTemplateDir('../smarty/templates');
$smarty->setCompileDir('../smarty/templates_c');
$smarty->setCacheDir('../smarty/cache');
$smarty->setConfigDir('../smarty/configs');

if ( isset($_POST["template"]) ) {

    $fpath = '../smarty/templates/' . basename($_POST["template"]); 
    $fextension = pathinfo($fpath)['extension'];
    if ( $fextension == "tpl" && file_exists($fpath) ) {
        $smarty->display($fpath);
    } else {
        $html = <<<XYZ
            <html>
                <body>
                    This file does not exist. Go back to the <a href="index.php"> index page</a>.
                </body>
            </html>
        XYZ;
        echo $html;
    }
} else {
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';  // change accordingly
    header("Location: http://$host$uri/$extra");
}


