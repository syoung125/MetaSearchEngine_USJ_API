<?php  require("db.php"); session_start(); ?>
<html>

   <head>
       <title>Warcraft Char Shop</title>
       <link rel="stylesheet" href="main2.css">
   </head>
   
   <body bgcolor="#E5D2CE">
    <div class= "main">
    <header>
       <nav>
        <h1>BUY MORE</h1>
        <ul>
      
         <li><a href="login.php">Login</a></li>
         <li><a href="signin.php">Sign up</a></li>

         <?php 
         	if(isset($_SESSION['id'])){
 			 echo "<li><a href=\"cart.php\">MY CART</a></li>";
         		 echo "<li><a href=\"logout.php\">LOG OUT</a></li>";
 			}
         ?>
         
          </ul>
       </nav>
    </header>
    <div class="sidenav">
        <h2>Filters</h2>


<form action="neuroticalyours.php">
<p>Class selections:</p>
 <?php 
	$query = "SELECT * FROM class";
         if ($result = $mysqli->query($query)) {
              while ($row = $result->fetch_assoc()) {
                  $class = $row["name"];
                  $class_id = $row["class_id"];
                 
                  echo '<input type="radio" name="class" value=" '.$class_id .'"> '.$class.'<br>' ;
              }
          
          } 

      echo '<p>Please select race:</p>';

      $query = "SELECT * FROM race";
         if ($result = $mysqli->query($query)) {
              while ($row = $result->fetch_assoc()) {
                  $race = $row["name"];
                  $race_id = $row["race_id"];
                 
                  echo '<input type="radio" name="race" value=" '.$race_id .'"> '.$race.'<br>';
              }
          
          } 


 ?>
   

<p>Please select the age range you want to view:</p>

  <input type="radio" name="age" value="10"> 0 - 10<br>
  <input type="radio" name="age" value="20"> 11 - 20<br>
  <input type="radio" name="age" value="30"> 21 - 30<br> 
  <input type="radio" name="age" value="40"> 31 - 40<br> 

 <p>Genders:</p>

  <input type="radio" name="gender" value="Female"> Female<br>
  <input type="radio" name="gender" value="Male"> Male <br>
  <input type="radio" name="gender" value="Attack_Helicopter"> Attack_Helicopter<br> 
  <input type="radio" name="gender" value="Queer"> Queer<br>  
  <input type="radio" name="gender" value="Non-Binary"> Non-Binary<br>  
  <input type="submit" value="Submit">
</form>

    </div>
    
    <div class="row">
      <?php
      if(isset($_GET['age'])){
 		 $key = $_GET['age'];
 		 //echo $key;
 		 if($key==10){$subkey=0;}
 		  if($key==20){$subkey=11;}
 		   if($key==30){$subkey=21;}
 		    if($key==40){$subkey=31;}
 		 $query = "SELECT * FROM product WHERE age BETWEEN ".$subkey." AND ".$key."";
           
          if ($result = $mysqli->query($query)) {
              while ($row = $result->fetch_assoc()) {
                  $product_id = $row["product_id"];
                  $name = $row["name"];
                  $class_id = $row["class_id"];
                  $race_id = $row["race_id"];
                  $im_id = $row["img"];
                  $price = $row["price"];
                  $gender = $row["gender"];
                  $age = $row["age"];
                  $quantity = $row["quantity"];
                  
                  $query2 = "SELECT name FROM class WHERE class_id = " . $class_id;
                  $result2 = $mysqli->query($query2);
                  $classname = $result2->fetch_assoc();

                  $query3 = "SELECT name FROM race WHERE race_id = " . $race_id;
                  $result3 = $mysqli->query($query3);
                  $racename = $result3->fetch_assoc();

                  //echo '<div id="item">'.$classname["name"].'<br>'.$price.'</div>';
                  echo ' <div class="col"><a href="index.php?product='.$product_id.'  ">Name:'. $classname["name"] .'><img src="'. $im_id . '"width="50" height="60"/><br>Race:'. $racename["name"] . '<br>$'. $price.'<br>Gender:'. $gender. '<br>Age:'. $age. '<br>Quantity:'. $quantity. '<br></div>';
              }
          
          } 


      }
      if(isset($_GET['gender'])){
 		 $key = $_GET['gender'];
 		// echo $key;

 		 $query = "SELECT * FROM product WHERE class_id =".$key."";
           
          if ($result = $mysqli->query($query)) {
              while ($row = $result->fetch_assoc()) {
                  $product_id = $row["product_id"];
                  $name = $row["name"];
                  $class_id = $row["class_id"];
                  $race_id = $row["race_id"];
                  $im_id = $row["img"];
                  $price = $row["price"];
                  $gender = $row["gender"];
                  $age = $row["age"];
                  $quantity = $row["quantity"];
                  
                  $query2 = "SELECT name FROM class WHERE class_id = " . $class_id;
                  $result2 = $mysqli->query($query2);
                  $classname = $result2->fetch_assoc();

                  $query3 = "SELECT name FROM race WHERE race_id = " . $race_id;
                  $result3 = $mysqli->query($query3);
                  $racename = $result3->fetch_assoc();

                  //echo '<div id="item">'.$classname["name"].'<br>'.$price.'</div>';
                  echo ' <div class="col"><a href="index.php?product='.$product_id.'  ">Name:'. $classname["name"] . '><img src="'. $im_id . '"width="50" height="60"/><br>Race:'. $racename["name"] . '<br>$'. $price.'<br>Gender:'. $gender. '<br>Age:'. $age. '<br>Quantity:'. $quantity. '<br></div>';
              }
          
          } 


      }
       if(isset($_GET['race'])){
 		 $key = $_GET['race'];
 		// echo $key;

 		 $query = "SELECT * FROM product WHERE race_id =".$key."";
           
          if ($result = $mysqli->query($query)) {
              while ($row = $result->fetch_assoc()) {
                  $product_id = $row["product_id"];
                  $name = $row["name"];
                  $class_id = $row["class_id"];
                  $race_id = $row["race_id"];
                  $im_id = $row["img"];
                  $price = $row["price"];
                  $gender = $row["gender"];
                  $age = $row["age"];
                  $quantity = $row["quantity"];
                  
                  $query2 = "SELECT name FROM class WHERE class_id = " . $class_id;
                  $result2 = $mysqli->query($query2);
                  $classname = $result2->fetch_assoc();

                  $query3 = "SELECT name FROM race WHERE race_id = " . $race_id;
                  $result3 = $mysqli->query($query3);
                  $racename = $result3->fetch_assoc();

                  //echo '<div id="item">'.$classname["name"].'<br>'.$price.'</div>';
                  echo ' <div class="col"><a href="index.php?product='.$product_id.'  ">Name:'. $name . '><img src="'. $im_id . '"width="50" height="60"/><br>Class:'. $classname["name"] . '<br>Race:'. $racename["name"] . '<br>$'. $price.'<br>Gender:'. $gender. '<br>Age:'. $age. '<br>Quantity:'. $quantity. '<br></div>';
              }
          
          } 


      }
       

      else{
        $query = "SELECT * FROM product";
           
          if ($result = $mysqli->query($query)) {
              while ($row = $result->fetch_assoc()) {
              	$product_id = $row["product_id"];
                  $name = $row["name"];
                  $class_id = $row["class_id"];
                  $race_id = $row["race_id"];
                  $im_id = $row["img"];
                  $price = $row["price"];
                  $gender = $row["gender"];
                  $age = $row["age"];
                  $quantity = $row["quantity"];
                  
                  $query2 = "SELECT name FROM class WHERE class_id = " . $class_id;
                  $result2 = $mysqli->query($query2);
                  $classname = $result2->fetch_assoc();

                  $query3 = "SELECT name FROM race WHERE race_id = " . $race_id;
                  $result3 = $mysqli->query($query3);
                  $racename = $result3->fetch_assoc();

                  //echo '<div id="item">'.$classname["name"].'<br>'.$price.'</div>';
                  echo ' <div class="col"><a href="index.php?product='.$product_id.'  "><img src="'. $im_id . '"width="50" height="60"/>Name:'. $name . '><br>Class:'. $classname["name"] . '<br>Race:'. $racename["name"] . '<br>$'. $price.'<br>Gender:'. $gender. '<br>Age:'. $age. '<br>Quantity:'. $quantity. '<br></div>';
              }
          
          } 

        }
          ?>
        
         <div class="col"><a href="https://www.marvel.com/captainmarvel/">I liked this website</a><br></div>
       <div class="col"><a href="https://www.boredbutton.com/">If you are bored, click</a></div>
       <div class="col"><a href="https://www.spacejam.com/archive/spacejam/movie/jam.htm">Hi</a></div>
    </div>

</div>


   
   </body>




</html>