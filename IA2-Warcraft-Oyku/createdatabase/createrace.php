<?php 

    require("../db.php");

   
    $names = array(
        'Human',
        'Dranei',
        'Druid',
        'Dwarf',
        'Gnomes',
        'Night_Elves',
        'Pandaren',
        'Worgen',
        'Blood_Elf',
        'Orcs',
        'Undead',
        'Goblins',
        'Troll',
        'Tauren',
        'Pandaren'
    );

    $desc = array(
        'Recent discoveries have shown that humans are descended from the barbaric vrykul, half-giant warriors who live in Northrend. Early humans were primarily a scattered and tribal people for several millennia, until the rising strength of the troll empire forced their strategic unification. Thus the nation of Arathor was formed, along with its capital, the city-state of Strom.',
        'Long before the fallen titan Sargeras unleashed the Legion on Azeroth, he conquered the world of Argus and its inhabitants, the eredar. Believing that this gifted race would be crucial in his quest to undo all of creation, Sargeras contacted the eredar’s leaders – Kil’jaeden, Archimonde, and Velen, offering them knowledge and power in exchange for their loyalty.',
        'Druids harness the vast powers of nature to preserve balance and protect life. With experience, druids can unleash natures raw energy against their enemies.',
        'The bold and courageous dwarves are an ancient race descended from the earthen—beings of living stone created by the titans when the world was young. Due to a strange malady known as the Curse of Flesh, the dwarves’ earthen progenitors underwent a transformation that turned their rocky hides into soft skin. Ultimately, these creatures of flesh and blood dubbed themselves dwarves and carved out the mighty city of Ironforge in the snowy peaks of Khaz Modan.',
        'Gnomes are a diminutive, wiry race of tinkers who live underground. In the Second War, they built gadgets and vehicles, such as submarines and flying machines, for the Alliance to combat the Horde.',
        'Night elves (or kaldorei, for "Children of the Stars" in Darnassian), are a powerful and mystical race whose origins extend back to ancient times.',
        'Pandaren are the first "neutral" race in World of Warcraft. After completing a series of quests, you can decide whether to join the Horde or Alliance. Denizens of a wondrous and fertile land, the pandaren once labored under the oppressive thumb of a monstrous race of ancient warlords known as the mogu.',
        'Worgen [ˈwɔɹgɛn] are large, lupine humanoids that walk upright, but lope on all fours to run. They primarily inhabit forests and are natural hunters.',
        'The Blood Elves or Sindorei in Thalassian (children of the blood), are a race composed of former high elves who renamed themselves in honor of their people who were killed during the siege of Quel Thalas by the Scourge during the Third War. ',
        'The orcs are a prolific and physically powerful race hailing from the once-lush world of Draenor, now known as the shattered realm of Outland.',
        'The undead are beings that have died and have had their souls trapped between life and death. They derive power from necromantic magic. Most common examples being zombies or ghosts, undead are typically mindless, bloodthirsty fiends hostile toward any living thing that comes across their path.',
        'Shrewd, greedy, and ruthless, goblins have a long-standing reputation for being neutral in the rest of the world, despite the Steamwheedle Cartel allying with the Old Horde during the Second War and the Bilgewater Cartel joining the Horde after the Cataclysm.',
        'They are highly tribally spiritual. The center of a tribes spirit is the tribes priest or superior hunter. Other than tribes such as the Darkspear, most trolls will attack outsiders on sight, even trolls of other tribes. Uncivilized trolls live all across Kalimdor and the Eastern Kingdoms.',
        'Tauren (shuhalo in their native language of Taur-ahe) are huge nomadic creatures who live on the grassy, open plains of Mulgore in central Kalimdor. Tauren are large, muscular humanoids and bovine in appearance, complete with hooves and horns.',
        'Pandaren are the first "neutral" race in World of Warcraft. After completing a series of quests, you can decide whether to join the Horde or Alliance. Denizens of a wondrous and fertile land, the pandaren once labored under the oppressive thumb of a monstrous race of ancient warlords known as the mogu.'
    );

    
    for($i=0; $i<14; $i++){

		$name_ = $names[$i];        
		$desc_ =$desc[$i];
        $alu = $i+1;
        if($i<7){
            $faction= 'Alliance';
        }else if($i>=7){
            $faction= 'Horde';
        }

        $queryInsert = "INSERT INTO race(race_id,name,faction,description) VALUES ($alu, '$name_','$faction', '$desc_')";
        $result = $mysqli->query($queryInsert);

        

        if(!$result)
            die($mysqli->error);

        echo "<p>".$mysqli->insert_id."</p>";
        echo "<p>".$mysqli->affected_rows."</p>";
        
    }


?>