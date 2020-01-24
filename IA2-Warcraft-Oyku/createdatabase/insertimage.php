<?php 

    require("../db.php");
    
    //for($i=0; $i<11; $i++){
         //SQL Injection defence!
      //  $queryInsert = "INSERT INTO image(im_id,image) VALUES (4, '{$image}')";
        

        
    $path = ".\chars";
    $i=0;
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;
            echo $path;
           $file_='';
            $file_ .= $path;
            $file_ .= '/';
            $file_ .= $file;
            echo $file_;
            $image = addslashes(file_get_contents($file_));
            $queryInsert = "INSERT INTO image(im_id,im_name) VALUES ($i, '{$image}')";
            $result = $mysqli->query($queryInsert);
            $file_='';
            if(!$result)
                die($mysqli->error);

            echo "<p>".$mysqli->insert_id."</p>";
            echo "<p>".$mysqli->affected_rows."</p>";

            $i++;
        }
        closedir($handle);
    }


        
        
    //}


?>