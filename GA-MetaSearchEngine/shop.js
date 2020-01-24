function getProduct(link) {
  var str = document.getElementById('searchStr').value;

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET", link+"?query="+str, false);
  xmlhttp.send();
  return JSON.parse(xmlhttp.responseText);
}

function filterByPrice(link){
    var min = document.getElementById('min').value;
    var max = document.getElementById('max').value;

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET",link+"?min="+min+"&max="+max, false);
    xmlhttp.send();
    return JSON.parse(xmlhttp.responseText);
}

function mergeProuct(func){
  var wandlink = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/getWandList.php";
  var pokemonlink = "https://apispamuk.000webhostapp.com/IA2/giveData/pokemonToJson.php";
  var characterlink = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/encode.php";
  var wand_arr = func(wandlink);
  var pokemon_arr = func(pokemonlink);
  var character_arr = func(characterlink);

  var mergedArr = wand_arr.concat(pokemon_arr, character_arr);

  var pTable = makeProductTable(mergedArr);

  document.getElementById("productListDiv").innerHTML = pTable;
}


function makeProductTable(mergedArr){
  var i;
  var table="<table><tr><th>Name</th><th>Price</th><th>Quantity</th></tr>";
  for (i = 0; i <mergedArr.length; i++) { 
    table += "<tr><td><a onclick=\"loadDetailPage('"+mergedArr[i].category+"', "+ mergedArr[i].id+")\">" +
    mergedArr[i].name +
    "</a></td><td>" +
    mergedArr[i].price +
    " €</td><td>" +
    mergedArr[i].quantity +
    "</td></tr>";
  }
  table += "</table>";
  return table;
}


///////////////////////////////////////
/* Function for Detail Page          */
///////////////////////////////////////

function loadDetailPage(category, id) {
  var str = document.getElementById('searchStr').value;

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET", "./detailPage.php?category="+category+"&id="+id, false);
  xmlhttp.send();
  document.getElementById("productListDiv").innerHTML = xmlhttp.responseText;

}


function getProductDetail(category, id) {
  var link = "";
  if(category == 'wand'){
    link = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/getWandDetail.php";
  }else if(category == 'pokemon'){
    link = "https://apispamuk.000webhostapp.com/IA2/giveData/getPokemonDetail.php";
  }else if(category == 'warcraft'){
    link = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/detail.php";
  }

  if (window.XMLHttpRequest) {
   // code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET", link+"?id="+id, false); //it will give id for get product
  xmlhttp.send();
  console.log(xmlhttp.responseText);
  var product = JSON.parse(xmlhttp.responseText);
  // console.log(product);
  document.getElementById("pName").innerHTML = product.name;
  document.getElementById("pimg").src = product.img;
  document.getElementById("pPrice").innerHTML = "price: "+product.price+"€";
  document.getElementById("pQuantity").innerHTML = "quantity: "+product.quantity;
  var detail = "";
  if(category == 'wand'){
    detail = "wood_id: "+product.wood_id+"<br>core_id: "+product.core_id+"<br>flexibility: "+product.flexibility+"<br>length: "+product.length;
  }else if(category == 'pokemon'){
    detail = "shiny: "+product.shiny+"<br>health_point: "+product.health_point
    +"<br>attack_power: "+product.attack_power+"<br>defense_power: "+product.defense_power+"<br>gender: "+product.gender; 
  }else if(category == 'warcraft'){
    detail = "class_id: "+product.class_id+"<br>race_id: "+product.race_id+"<br>age: "+product.age+"<br>gender: "+product.gender;
  }
  document.getElementById("detail").innerHTML = detail;
}


function reduceStock(link, mseid, id){
  // Buying quantity
  var quantity = document.getElementById('bQuantity').value;
  console.log('rlink: '+link + ', mseid: '+mseid +', id: '+id +',quantity: '+quantity);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // blbabla = JSON.parse(this.responseText);
      document.getElementById("giveMessage").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", link+"?mseid="+mseid+"&id="+id+"&quantity="+quantity, true);
  xhttp.send();

}

function showCategoryFilters(){
  var cat = document.getElementById('category').value;
  //console.log(cat);

  if(cat == "wand"){
    var link = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/getFilters.php";
  }
  else if(cat == "pokemon"){
    var link = "https://apispamuk.000webhostapp.com/IA2/giveData/getFilters.php";
  }
  else if(cat == "warcraft"){
    var link = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/getFilters.php";
  }

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET", link, false);
  xmlhttp.send();
  //document.getElementById("left").innerHTML += xmlhttp.responseText;
  return JSON.parse(xmlhttp.responseText);
}

function createFilters(){
    var json_arr = showCategoryFilters();

    var str = "";

    for(var i = 0; i < json_arr.length; i++){
        str += "<a onclick=\"filterBy(" + json_arr[i].id + ")\">" + json_arr[i].name + "</a><br>";
    }

    document.getElementById("ctgList").innerHTML = str;   
}

function filterBy(id){
    var cat = document.getElementById('category').value;

    if(cat == "wand"){
      var link = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/getWandList.php";
    }
    else if(cat == "pokemon"){
      var link = "https://apispamuk.000webhostapp.com/IA2/giveData/pokemonToJson.php";
    }
    else if(cat == "warcraft"){
      var link = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/encode.php";
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET",link+"?id="+id, false);
    xmlhttp.send();
    
    var result = JSON.parse(xmlhttp.responseText);
    var pTable = makeProductTable(result);

    document.getElementById("productListDiv").innerHTML = pTable;
}


///////////////////////////////////////
/* Function for cart                 */
///////////////////////////////////////

function getBasket(link, userId){
    console.log(link+"?mseid="+userId);
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET", link+"?mseid="+userId, false);
  xmlhttp.send();
  var arr = [];
  arr.push(JSON.parse(xmlhttp.responseText));
  return arr;
}


function mergeBasket(userId){
  var wandlink = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/viewCart.php";
  var pokemonlink = "https://apispamuk.000webhostapp.com/IA2/giveData/viewCart.php";
  var characterlink = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/viewCart.php";
  var wand_arr = getBasket(wandlink, userId);
  var pokemon_arr = getBasket(pokemonlink, userId);
  var character_arr = getBasket(characterlink, userId);
  
  var basket_arr = wand_arr.concat(pokemon_arr, character_arr);
    console.log(basket_arr);
    for(var i=0;i<basket_arr.length;i++){
        if(basket_arr[i].length <= 0) basket_arr.splice(i, 1);
    }
  var cols = ["index", "name", "img", "quantity", "price"];
  var basketTable = createTable(cols, basket_arr);
  var totalPrice = calTotalPrice(basket_arr);

  document.getElementById("basketTable").innerHTML = basketTable;
  document.getElementById("totalPrice").innerHTML = totalPrice + "€";
}


function createTable(cols, data_arr)
{
  var table = "<table>";
  table += "<tr>";
  for(var i=0;i<cols.length;i++){
    table += "<th>"+cols[i]+"</th>";
  }
  table += "</tr>";
  var i = 0;
  var row;
  for(var i=0;i<data_arr.length;i++){
    row = data_arr[i];
    table += "<tr><td>"+(i+1)+"</td>";  // index for easy to see
    for(var j=1;j<cols.length;j++){
      if(cols[j] == "img"){
        table += "<td><img src = "+row[cols[j]]+" width='100'></td>";
      }else{
        table += "<td>"+row[cols[j]]+"</td>";
      }
    }
    table += "</tr>";
  }
  table += "</table>";
  return table;
}

function calTotalPrice(data_arr){
  var price = 0;
  for(var i=0;i<data_arr.length;i++){
    row = data_arr[i];
    price += parseInt(row['price']);
  }
  return price;
}

///////////////////////////////////////
/* Function for Order                */
///////////////////////////////////////

function createOrder(link, mseid){
    //var id = document.getElementById('basketTable').value;
    console.log(link+'?mseid='+mseid);
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.open("GET",link+'?mseid='+mseid, false);
    xmlhttp.send();
    
    var str = xmlhttp.responseText;
    var check = false;
    
    for(var i = 0; i < str.length; i++){
        console.log(str.charAt(i));
        if((str.charAt(i) == 1)){
            check = true;
        }
        else
            check = false;
    }
    return check;
}

function mergeOrder(mseid){
    var wandlink = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/createOrder.php";
    var pokemonlink = "https://apispamuk.000webhostapp.com/IA2/giveData/createOrder.php";
    var characterlink = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/createOrder.php";
    var wandres = createOrder(wandlink, mseid);
    var pokemonres = createOrder(pokemonlink, mseid);
    var characterres = createOrder(characterlink, mseid);
    if(pokemonres && wandres && characterres){
        document.getElementById("buyResult").innerHTML = 'Your order has been placed!';
    }
    else{
        document.getElementById("buyResult").innerHTML = 'Something went wrong...';
    }
}

//show orders

function getOrder(link, userId){
    console.log(link+"?mseid="+userId);
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.open("GET", link+"?mseid="+userId, false);
  xmlhttp.send();
  var arr = [];
  arr.push(JSON.parse(xmlhttp.responseText));
  return arr;
}


function mergeOrders(userId){
  var wandlink = "http://apiwandshop.000webhostapp.com/API-IA2/give-data/viewOrders.php";
  var pokemonlink = "https://apispamuk.000webhostapp.com/IA2/giveData/viewOrders.php";
  var characterlink = "https://oykuyamako.000webhostapp.com/IA2/Warcraft/viewOrders.php";
  var wand_arr = getOrder(wandlink, userId);
  var pokemon_arr = getOrder(pokemonlink, userId);
  var character_arr = getOrder(characterlink, userId);
  
  var order_arr = wand_arr.concat(pokemon_arr, character_arr);
    console.log(order_arr);
    for(var i=0;i<order_arr.length;i++){
        if(order_arr[i].length <= 0) order_arr.splice(i, 1);
    }
  var cols = ["index", "name", "img", "price", "date"];
  var orderTable = createTable(cols, order_arr);

  document.getElementById("orderTable").innerHTML = orderTable;
}