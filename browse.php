<?php
session_start();
?>

<html>
<head>
<style>

.topnav {
    overflow: hidden;
    background-color: #0e58ce;
  }
  
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }
  
  .topnav a.active {
    background-color: #00235e;
    color: white;
  }
     
  body {
    color:black;
    text-align:left;
    font-size: 14px;
  }

  .image1{
    vertical-align: top;
    text-align: center;
    width: 200px;
    float: right;
    padding-right: 200px;
  }

  img {
    width: 150px;
    height: 150px;
  }

  .logo {
  float: left;
  margin-right: -150px;
  }

  .caption {
    display: block;
  }

  h1 {
    font-size: 50px;  
    font-family: "Arial"
  }

  h2 {
    color:#0e58ce;
    font-size: 15px;
    font-family: "Lucida Console";
  }

  h3 {
    color:#0e58ce;
    text-align: left;
    font-size: 30px;
    font-family: "Lucida Console"
  }

  .icon {
    height: 40px;
    width: 40px;
    border: 0;
  }
  button {
    background-color : green;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    cursor: pointer;
    float : right;
    height : 30px;
    text-align: center;
    line-height: 0px;
  }
  p {
    width: 50%;
  }
  .caption {
    display: block;
  }
  
  .image1{
    vertical-align: top;
    text-align: center;
    float: right;
    padding-right: 200px;
  }

  .img2 {
      width:300px;
      height:300px;
  }
  figure {
      display: inline-block;
      border: 5px;
      margin: 20px;
  }
  figure img {
      vertical-align: top;
  }
figure figcaption {
    text-align: center;
}
a {
  text-decoration : none;
  color : white;
}
input[type=submit] {
    background-color: #0e58ce;
    border: none;
    color: white;
    text-decoration: none;
    cursor: pointer;
    height: 25px;
}

</style>
</head>
<body>
<?php
include("config.php");
$cartnum = $_SESSION["cart"];

if(!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = 0;
} else {
  $_SESSION["cart"] = $_SESSION["cart"];
}
/*
$sql = "SELECT * FROM inventory";
$result = mysql_query($sql);
if(mysql_num_rows($result)>0) {
    while($row = mysql_fetch_assoc($result))
    {
        $invname = $row['name'];
        $invquant = $row['quantity'];
    }
}

$addCart = 1;

$soup_quant = $_POST['soup'];
$shirts_name = "T-shirt";
$shirts_price = 4.49;

if(!empty($_POST['shirtsq'])) {
    $sql2 = 'INSERT INTO `cart` (`name`,`price`,`quantity`,`added`)
    VALUES ("'.$shirts_name.'","'.$shirts_price.'","'.$shirts_quant.'","'.$addCart.'");';
    mysql_query($sql2);    
    }
*/
$query = mysql_query("SELECT * FROM inventory WHERE name='apples'");
$row = mysql_fetch_array($query);
$appleQuant = $row['quantity'];

$query = mysql_query("SELECT * FROM inventory WHERE name='cheerios'");
$row = mysql_fetch_array($query);
$cheeriosQuant = $row['quantity'];

$query = mysql_query("SELECT * FROM inventory WHERE name='soup'");
$row = mysql_fetch_array($query);
$soupQuant = $row['quantity'];

if(!isset($_SESSION["useremail"])) {
echo "<button type='button'><a href='login.php'>Log in</a></button>";
} else {
echo "<button type='button'><a href='home.html'>Log in</a></button>";
}

?>
<br>
<br>
<img src="pantherpantry.jpg" align="left" class="logo"> <h1><center> Panther's Pantry </center> </h1>
<h2> <center> Nonprofit Organization in Atlanta, Georgia</center> </h2>
  <div class="topnav">
    <a href="index.html">Home</a>
    <a class="active" href="browse.php">Browse Inventory</a>
    <a href="cart.php" style="float:right"> <img src="cart.png" style="width:15px; height:15px;"> Shopping Cart <?php echo "($cartnum)";?> </a>
  </div>

<h1 style="text-align:center">Inventory</h1>
<form action="" method="post">
<figure>
        <img class="img2" src="soup.jpg" length="300px" width="300px">
        <figcaption>
            <br>
            <h4 style="font-size:20px;">Canned Soup</h4>
            Quantity: <?php 
            if ($soupQuant != 0){
            echo "$soupQuant"; 
            } else {
              echo "OUT OF STOCK";
            }
            ?>
            <br>
            <input type="text" size="2" maxlength="2" name="soup">
            <br>
            <br>
            <input type="submit" value="Add to Cart">
        </figcaption>
</figure>
<figure>
        <img class="img2" src="apples.jpg" length="300px" width="300px">
        <figcaption>
            <br>
            <h4 style="font-size:20px;">Apples</h4>
            Quantity: <?php 
            if ($appleQuant != 0){
            echo "$appleQuant"; 
            } else {
              echo "OUT OF STOCK";
            }
            ?>
            <br>
            <input type="text" size="2" maxlength="2" name="apple">
            <br>
            <br>
            <input type="submit" value="Add to Cart">
        </figcaption>
</figure>
<figure>
        <img class="img2" src="cheerios.jpg" length="300px" width="300px">
        <figcaption>
            <br>
            <h4 style="font-size:20px;">Cheerios</h4>
            Quantity: <?php 
            if ($cheeriosQuant != 0){
            echo "$cheeriosQuant"; 
            } else {
              echo "OUT OF STOCK";
            }
            ?>
            <br>
            <input type="text" size="2" maxlength="2" name="cheerios">
            <br>
            <br>
            <input type="submit" value="Add to Cart">
        </figcaption>
</figure>
  </form>

  <?php
$addedcart = 1;  

if(!empty($_POST['soup'])) {
$souporderquant = $_POST['soup'];
$query = mysql_query("UPDATE inventory SET added='$addedcart' WHERE name='soup'");
$query2 = mysql_query("UPDATE inventory SET orderquant='$souporderquant' WHERE name='soup'");
mysql_query($query);
mysql_query($query2);
$_SESSION["cart"] = $_SESSION["cart"] + 1;
}

if(!empty($_POST['apple'])) {
$appleorderquant = $_POST['apple'];
$query = mysql_query("UPDATE inventory SET added='$addedcart' WHERE name='apples'");
$query2 = mysql_query("UPDATE inventory SET orderquant='$appleorderquant' WHERE name='apples'");
mysql_query($query);
mysql_query($query2);
$_SESSION["cart"] = $_SESSION["cart"] + 1;
}

if(!empty($_POST['cheerios'])) {
$cheeriosorderquant = $_POST['cheerios'];
$query = mysql_query("UPDATE inventory SET added='$addedcart' WHERE name='cheerios'");
$query2 = mysql_query("UPDATE inventory SET orderquant='$cheeriosorderquant' WHERE name='cheerios'");
mysql_query($query);
mysql_query($query2);
$_SESSION["cart"] = $_SESSION["cart"] + 1;
}
?>



</body>
</html>