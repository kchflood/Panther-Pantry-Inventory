<?php
session_start();
?>
<html>
    <style>
     
 body {
    background-image: url("background.jpg");
}
h1 {
    color : black;
    text-align : center;
}
div {
        text-align: center;
        border-radius: 15px;
        background-color : #f2f2f2;
        padding: 10px;
    }
    input[type=submit] {
    background-color: blue;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    width: 100px;
}
        </style>

<body>
<?php
include("config.php");



echo "<h1>Shopping Cart</h1>";
echo "<div>";
echo "<br>";
echo "<pre>Item     Quantity</pre>";

$sql = "SELECT * FROM inventory";
$result = mysql_query($sql);
if(mysql_num_rows($result)>0) {
    while($row = mysql_fetch_assoc($result))
    {
       
        $pname = $row["name"];
        $pquant = $row["quantity"];
        $added = $row["added"];

        if($added == 1) {
            echo "<pre>$pname   $pquant</pre>";
       }
    }
     
}
?>
<br>
<form action="confirmation.php">
    <input type="submit" value="Order">
</form>
</div>
</form>
</body>
</html>