<!DOCTYPE html>
<?php
  include("../controller.php");
  topStart();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../assets/javascript/scripts.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <!-- navbar -->
        <div class="row">
          <div class="col-lg-12">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">MissouriRail</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="../index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="#">Our Fleets</a></li>
                  <li><a href="schedule.php">Schedules</a></li>
                  <li><a href="contact.php">Contacts</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                  <li id="#text-white"><?php primaryMenuBar();?></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>

        <form class="form-horizontal" action="login.php" method="post">
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="usr">User:</label>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="user" value="">
            </div>
          </div><hr>
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="pwd">Password:</label>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="password" name="pwd" value="">
            </div>
          </div><hr>
          <div class="row">
            <div class="col-md-offset-2 col-md-7">
              <input type="submit" name="submit" onclick="return form_submission()" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
        <?php
          if(isset($_POST['submit'])){
            $conn = connectDB();
            // for getLog action in controller
            $_SESSION['action'] = 'login on ';
            login($conn, htmlspecialchars($_POST['user']), htmlspecialchars($_POST['pwd']));
            $conn->close();
          }
         ?>
      </div>
    </div>
  </body>
</html>
