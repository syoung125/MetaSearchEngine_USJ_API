<?php 

    require("../db.php");

   
    $names = array(
        'Death_Knight',
        'Demon_Hunter',
        'Hunter',
        'Druid',
        'Mage',
        'Monk',
        'Paladin',
        'Priest',
        'Rogue',
        'Shaman',
        'Warlock',
        'Warrior'
    );

    $desc = array(
        'Former minions of The Lich King, Death Knights (or DKs) are constructs of undeath that utilize undead minions, plagues, the chill of the grave, and even the blood of their enemies to enhance their combat performance.',
        'Trained by Illidan Stormrage himself, Demon Hunters (or DHs) are trained for the sole purpose of tracking and destroying the Burning Legion no matter the cost. Using their enhanced eyesight, warglaives, and the demonic energy of their enemies, demon hunters are a force to be reckoned with by any who stand in their way.',
        'Trained with the sole purpose to protect and preserve the balance of nature, druids are master shapeshifters that can take on the form of numerous animals and creatures in order to assist their allies.',
        'Hunters come from a variety of backgrounds ranging from trackers to tamers to deadly marksmen.',
        'Adepts of the magical arts, mages are a scholarly class that have origins dating as far back as the Well of Eternity.',
        'Trained with the teachings of the Four August Celestials, monks are paragons of peace, harmony, and brewing.',
        'Champions of the Light and crusaders of justice, Paladins seek to walk the path of righteousness in all things they do.',
        'Scions of the Light or master wielders of the Void, priests utilize their holy and void powers to heal allies and destroy enemies.',
        'Thieves, cutthroats, spies, master poisoners, assassins. These are but few of the many words that describe rogues',
        'Disciples and wielders of elemental magic, shamans seek to harness and live in harmony with the Elements. ',
        'In the face of demonic power, most heroes see only death, whereas Warlocks see opportunity.',
        'Weapon masters, bloodthirsty berserkers, and defenders of the weak, warriors are a force to be reckoned with on the battlefield. With their raw strength, determination, and pure hatred, warriors seek to vanquish any foe who stands in their way.'
    );

    
    for($i=0; $i<11; $i++){

		$name_ = $names[$i];        
		$desc_ =$desc[$i];
        $alu = $i+1;

        $queryInsert = "INSERT INTO class(class_id,name,description) VALUES ($alu, '$name_','$desc_')";
        $result = $mysqli->query($queryInsert);

        

        if(!$result)
            die($mysqli->error);

        echo "<p>".$mysqli->insert_id."</p>";
        echo "<p>".$mysqli->affected_rows."</p>";
        
    }


?>