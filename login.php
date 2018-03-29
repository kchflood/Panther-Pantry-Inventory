<?php
session_start();
?>
<html>
    <style>
        body {
        background : url(background.jpg);
    }
    </style>

    <body>
        <?php

include("config.php");
session_unset();


$sql = "SELECT * FROM shoppinguser";
$result = mysql_query($sql);
if(mysql_num_rows($result)>0) {
    while($row = mysql_fetch_assoc($result))
    {
        $dbpass=$row["password"];
        $dbun=$row["username"];
    }
}

$username = $_POST['un'];
$pwd = $_POST['pw'];

if(($username == $dbun) && ($pwd == $dbpass)) {
    $_SESSION["useremail"] = $username; 
    header("Location: browse.php"); die;
}else if ((!isset($username)) && (!isset($pwd))) {
    header("Location: home.html"); die;
}else{
    echo "invalid username or password";
    echo "<br>";
    echo '<a href="home.html">Return Home</a>';
}
        ?>
    </body>
</html>
