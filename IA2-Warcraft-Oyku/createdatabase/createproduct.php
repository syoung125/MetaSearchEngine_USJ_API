<?php 

    require("../db.php");

    $gender = array(
        'Female',
        'Male',
        'Non-Binary',
        'Queer',
        'Attack_Helicopter'
    );
    $imgs = array(
        'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png',
        'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png',
        'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png',
        'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png',
        'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png',
        'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png',
        'http://pngimg.com/uploads/warcraft/warcraft_PNG79.png',
        'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png',
        'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png',
        'https://ya-webdesign.com/transparent250_/wow-png-wow-character-8.png',
        'https://ya-webdesign.com/transparent250_/wow-png-warcraft-heroes-3.png',
        'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png'

    );
    $names = array(
        'Albus',
        'Batman',
        'Sylvannas',
        'Arthas',
        'Jaina',
        'Guldan',
        'Lupin',
        'Garrosh',
        'Malfurion',
        'Tyrande',
        'Varian',
        'Dumbledore',
        'Tremblay',
        'Peltier',
        'Keanu',
        'Merve',
        'Dia',
        'Harry',
        'Dumbledore',
        'McGonagall',
        'Snape',
        'Muddy',
        'Longbottom',
        'Filch',
        'Scamender',
        'Lockhart',
        'Sprout',
        'Quirrel',
        'Walker',
        'Pomfrey',
        'Wayne',
        'Johnson',
        'Tremblay',
        'Love',
        'Show',
        'Mercury',
        'Malfoy',
        'Santiago'
    );
    
    $randarr = array();
    $bool=true;

    for($i=0; $i<1000; $i++){
        $randnum=rand();

        for($j=0; $j<sizeof($randarr);$j++){
            if($randnum==$randarr[$j]){
                $bool=false;
            }
        }

        if($bool==true){
            $randarr[$i]=$randnum;
            //$bool=false;
        }else if($bool=false){
            $randnum=rand();
            $randarr[$i]=$randnum;
            $bool=true;
        }

    }

   


    
   for($i=0; $i<100; $i++){

        $random_name = $names[mt_rand(0, sizeof($names) - 1)];
        $random_img = $imgs[mt_rand(0, sizeof($imgs) - 1)];
        $random_gen = $gender[mt_rand(0, sizeof($gender) - 1)];
        $id = $randarr[$i];
        $quant= rand(0,200);
        $price = rand(1,999);
        $race_id = rand(1,14);
        $class_id = rand(1,11);
        $age = rand(0,40);
        //$nandomame = $subjects[mt_rand(0, sizeof($surnames) - 1)];

        $queryInsert = "INSERT INTO product(product_id,name,price,img,quantity,class_id,race_id,age,gender) VALUES ($id, '$random_name','$price','$random_img','$quant','$class_id','$race_id','$age','$random_gen')";
        $result = $mysqli->query($queryInsert);

        if(!$result)
            die($mysqli->error);

        echo "<p>".$mysqli->insert_id."</p>";
        echo "<p>".$mysqli->affected_rows."</p>";
        
    }


?>