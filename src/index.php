<?php

/*
require('/usr/local/lib/php/Smarty/SmartyBC.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('../smarty/templates');
$smarty->setCompileDir('../smarty/templates_c');
$smarty->setCacheDir('../smarty/cache');
$smarty->setConfigDir('../smarty/configs');

if ( isset($_POST["template"]) ) {
    $smarty->display('../smarty/templates/' . $_POST["template"]);
    
}*/

#$smarty->enableSecurity();

#$smarty->display('../smarty/templates/index.tpl');

/*
class My_Security_Policy extends Smarty_Security {
    // disable all PHP functions
    public $php_functions = null;
    // remove PHP tags
    public $php_handling = Smarty::PHP_REMOVE;
    // allow everthing as modifier
    public $modifiers = array();
    // allow       
}*/


#$smarty->enableSecurity('My_Security_Policy');

#$smarty->enableSecurity();

#$smarty->assign('name', 'a{*hello*}b');

#$smarty->display('string:{$self::getStreamVariable("file:///proc/self/loginuid")}');

#print_r($smarty);
?>

<html>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Smarty template file to upload:<br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type ="submit" value="Upload Template" name="submit">
    </form> 
</html>

<br></br>

<form method="post" action="render.php">
    Enter the name of an upload template that you want to render:<br>
    <input type="text" name="template" id="cmd"><br>
    <input type="submit" value="template" id="template">
</form>

