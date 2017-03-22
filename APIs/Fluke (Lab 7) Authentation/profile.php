<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
    </head>
    <body>
        <h2>Profile</h2><br>
        <?php
            
            include('../secure/database.php');
            $sessionUsername = $_SESSION["username"];
        
            if($sessionUsername == NULL){
                header("location: login.php");
            }
        
            echo "<h2>You're login as: ". $sessionUsername ."</h2>";
        
            if(isset($_POST['logout'])){
                session_unset(); 
                session_destroy();
                header("location: login.php");
            }
        ?>
        <form action="" method="post">
            <input type="submit" value="logout" name="logout">
        </form>
    </body>
</html>