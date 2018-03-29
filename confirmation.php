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

$uemail = $_SESSION["useremail"];

$query = mysql_query("SELECT * FROM accountlist WHERE email='$uemail'");
$row = mysql_fetch_array($query);
$username = $row['firstName'];

echo "<h1>Order Confirmation</h1>";
echo "<div>";
echo "<br>";
echo "<h1> Thank you '$username' for your order! A confirmation email will be sent to: $uemail";

?>
</div>
</form>
</body>
</html>