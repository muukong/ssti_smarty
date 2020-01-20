<?php
    
    #$host  = $_SERVER['HTTP_HOST'];
    #$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    #$extra = 'index.php';  // change accordingly
    #header("Location: http://$host$uri/$extra");

    $target_dir = "../smarty/templates/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    if ( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ) {
    #if ( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "./foo") ) {
        $html = <<<XYZ
            <html>
                <body>
                    The fil upload was successful. Go back to the <a href="index.php"> index page</a>.
                </body>
            </html>
        XYZ;

        echo $html;
    } else {
        echo "There was some error"; 
    }

    #$host  = $_SERVER['HTTP_HOST'];
    #$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    #$extra = 'index.php';  // change accordingly
    #header("Location: http://$host$uri/$extra");
?>
