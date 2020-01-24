<?php  require("db.php"); session_start(); ?>
<html>

   <head>
       <title>AAR Path:12</title>
       <link rel="stylesheet" href="main2.css">
   </head>
   
   <body bgcolor="#E5D2CE">
    <header>
       <nav>
        <h1>Product View</h1>
        
       </nav>
    </header>
    <?php

     if(isset($_GET['product'])){
      $key = $_GET['product'];
      $query = "SELECT * FROM product WHERE product_id = ".$key."";
           
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
                    $id= rand(1,1000);
                    $user_id = $_SESSION["id"];

                    $query5 = "INSERT INTO shopping_list (shopping_id, product_id,  quantity,  user_id)
                          VALUES ('$id', '$product_id','$quantity','$user_id')";


                    


                   

                  //echo '<div id="item">'.$classname["name"].'<br>'.$price.'</div>';
                  echo ' <div class="col"><a href="">Name:'. $product_id . '<img src="'. $im_id . '"width="50" height="60"/><br>Class:'. $classname["name"] . '<br>Race:'. $racename["name"] . '<br>$'. $price.'<br>Gender:'. $gender. '<br>Age:'. $age. '<br>Quantity:'. $quantity. '<br></div>';

                  echo ' <div class="col"><a href="neuroticalyours.php">Add to cart and go back to shopping'. $result5 = $mysqli->query($query5)  .' <br></div>';

                   echo ' <div class="col"><a href="cart.php">Add to cart and go to your cart'.$result5 = $mysqli->query($query5).' <br></div>';


                   
                   }
                    }
                  }
     ?>

  

<head>
<meta charset="utf-8">
<title>CSS Custom Cursor</title>
<style type="text/css">       
    * {
        cursor: url("http://www.rw-designer.com/cursor-view/32373.gif"), url("/examples/images/custom.cur"), default;
    }
    b {
        margin: 20px;
        -webkit-transition: color 1s; 
        transition: color 1s; 
    }
    b:hover {
        color: yellow;
    }
</style>





<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}


.column {
 background:#333;
  border-radius: 5px;
  color:  yellow;
  padding: 10px .5%;
  width: 22%;
  float: left;
  margin: .5%;
}

.containerTab {
  background:#333;
  border-radius: 5px;
  color:  #4169E1;
  padding: 10px .5%;
  width: 22%;
  float: left;
  margin: .5%;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


.closebtn {
  float: right;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
</style>
</head>
<body>




<script>
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}
</script>

</body>
</html> 





   
   </body>






</html>