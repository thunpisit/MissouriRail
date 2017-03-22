<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Signup</title>
    </head>
    <body>
        <h2>Create an account</h2><br>
        <form action="" method="post">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="signup" name="submit">
        <?php
            
            include('../secure/database.php');

            $connection = mysqli_connect(host,username,password,dbname) or die("Connection error" . mysqli_error($connection));
            
            if(isset($_POST['submit'])){
                
                $username = strtolower($_POST["username"]);
                $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
                
                $addsql = "insert into customers (username,password) values ('" . $username . "','" . $password . "');";
                $addresult = $connection->query($addsql);
                
                if($addresult == 1){
                    echo "Successfully created user account.";
                } else {
                    echo "Account already existed.";
                }
            }
        ?>
        </form>
        <br><a href="login.php">Login</a>
    </body>
</html>