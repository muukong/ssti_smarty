<?php
    
    if ( isset($_FILES["fileToUpload"]) && isset($_FILES["fileToUpload"]["name"]) ) {
        $target_dir = "../smarty/templates/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if ( file_exists($target_file) ) {
            $html = <<<XYZ
                <html>
                    <body>
                        File already exists. Go back to the <a href="index.php"> index page</a>.
                    </body>
                </html>
            XYZ;

            echo $html;
            exit;
        }

        if ( $fileType !== "tpl" ) {
            $html = <<<XYZ
                <html>
                    <body>
                        Invalid file type. Go back to the <a href="index.php"> index page</a>.
                    </body>
                </html>
            XYZ;

            echo $html;
            exit;
        }

        if ( move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ) {
            $html = <<<XYZ
                <html>
                    <body>
                        File upload successful. Go back to the <a href="index.php"> index page</a>.
                    </body>
                </html>
            XYZ;

            echo $html;
            exit;
        } else {
            $html = <<<XYZ
                <html>
                    <body>
                        File upload error. Go back to the <a href="index.php"> index page</a>.
                    </body>
                </html>
            XYZ;
            echo $html;
            exit;
        }
    } else {
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'index.php';  // change accordingly
        header("Location: http://$host$uri/$extra");
    }

?>
