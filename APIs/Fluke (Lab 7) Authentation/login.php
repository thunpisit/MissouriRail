<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2><br>
        <form action="" method="post">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="login" name="submit">
        <?php
            
            include('../secure/database.php');
            
            if(isset($_SESSION['login_user'])){
                header("location: profile.php");
            }

            $connection = mysqli_connect(host,username,password,dbname) or die("Connection error" . mysqli_error($connection));
            
            if(isset($_POST['submit'])){
                
                $username = strtolower($_POST["username"]);
                $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
                
                if($username && $password != NULL){
                    $match = 0;
                
                    $searchsql = "select username,password from customers";
                    $searchresult = $connection->query($searchsql);

                    if($searchresult->num_rows > 0){
                        while($row = $searchresult->fetch_assoc()){
                            echo "Hi there";
                            echo password_verify($password, $row["password"]);
                            if($username == $row["username"] && password_verify($password, $row["password"]) == 0){
                                $match = 1;
                                break;
                            } else
                                $match = 0;
                            }
                        }

                    if($match == 1){
                        $_SESSION['username'] = $username;
                        header("location: profile.php");
                    } else {
                        echo "User doesnt exist";
                    }
                }
            }
        ?>
        </form>
        <br><a href="index.php">Create an account</a>
    </body>
</html>