<?php  require("db.php"); session_start(); ?>
<html>

   <head>
       <title>AAR Path:12</title>
       <link rel="stylesheet" href="main2.css">
   </head>
   
   <body bgcolor="#E5D2CE">
    <header>
       <nav>
        <h1>Cart View</h1>
        
       </nav>
    </header>
    <?php
      $key = array();
      $user_id = $_SESSION["id"];
      $query1 = "SELECT * FROM shopping_list WHERE user_id = ".$user_id."";
      $i =0;
         if ($result = $mysqli->query($query1)) {
           while ($row = $result->fetch_assoc()) {

              $key[$i++] = $row["product_id"];
              
            }
         }
         $size = count($key); //or $size = sizeOf($x);

        for ($i=0; $i<$size; $i++) {
    //...
        
         $query = "SELECT * FROM product WHERE product_id = ".$key[$i]."";
           
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

                    $query5 = "INSERT INTO orders (order_id,  user_id, product_id,  quantity,  price_total, ship_date, ship_adress, order_date)
                          VALUES ('$id', '$user_id',$product_id,'$quantity','$price',0,0,0)";


                    


                   

                  //echo '<div id="item">'.$classname["name"].'<br>'.$price.'</div>';
                  echo ' <div class="col"><a href="">Name:'. $name . '<img src="'. $im_id . '"width="50" height="60"/><br>Class:'. $classname["name"] . '<br>Race:'. $racename["name"] . '<br>$'. $price.'<br>Gender:'. $gender. '<br>Age:'. $age. '<br>Quantity:'. $quantity. '<br></div>';

                  echo ' <br><div class="col"><a href="neuroticalyours.php">Order now!'. $result5 = $mysqli->query($query5)  .' <br></div>';
                  if($query5){
                                    $query6 = "DELETE FROM shopping_list WHERE product_id =  ".$product_id."";
                                     $result6 = $mysqli->query($query6) ;

                                     $query7 = "DELETE FROM product WHERE product_id = ".$product_id."";
                                     $result7 = $mysqli->query($query7) ;
        
  
                              }


                   
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