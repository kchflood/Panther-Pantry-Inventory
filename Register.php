<!DOCTYPE html>
<html>
<style>
        body {
        background:url("https://www.planwallpaper.com/static/images/Alien_Ink_2560X1600_Abstract_Background_1.jpg");
    }
    </style>
    <body>
        <?PHP
        include("config.php");

        $remail = $_POST['remail'];
        $fname = $_POST['rfirstname'];
        $lname = $_POST['rlastname'];
        $rpass = $_POST['regipass'];
        $rpass2 = $_POST['regipass2'];
     
        $sql = "SELECT * FROM accountlist";
        $result = mysql_query($sql);
        if(mysql_num_rows($result)>0) {
            while($row = mysql_fetch_assoc($result))
            {
            $dbuser=$row["username"];
             }
        }
       
        if (!isset($_POST['regusername'])) {
            echo "Please enter username";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
        }else if ($rpass == $rpass2) {
            $sql2 = 'INSERT INTO `accountlist` (`firstName`,`lastName`,`email`,`password`,`admin`)
            VALUES ("'.$fname.'","'.$lname.'","'.$remail.'","'.$rpass.'");';
            mysql_query($sql2);
            header("Location: home.html"); die;
        } else if ($dbuser == $remail) {
            echo "Email/Username is taken!!";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
        }else {
            echo "Error: Please fill in each blank or passwords do not match";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
        }
        ?>
    </body>
</html>