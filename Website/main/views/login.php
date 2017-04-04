<!DOCTYPE html>
<?php
  include("../controller.php");
  topStart();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Login</h1>

        <form class="form-horizontal" action="login.php" method="post">
          <div class="row">
            <div class="col-md-2">
              <label for="usr">User:</label>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="user" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label for="pwd">Password:</label>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="password" name="pwd" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </div>
          </div>
        </form>
        <?php
          if(isset($_POST['submit'])){
            $conn = connectDB();
            login($conn, htmlspecialchars($_POST['user']), htmlspecialchars($_POST['pwd']));

          }
         ?>
      </div>
    </div>
  </body>
</html>
