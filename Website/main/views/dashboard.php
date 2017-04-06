<!DOCTYPE html>
<?php
  include '../controller.php';
  topStart();
  if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
  }
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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
                  <li class="active"><a href="#">Dashboard</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                  <li id="#text-white"><?php primaryMenuBar();?></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Welcome back <?= $_SESSION['user_id'] ?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-2 col-md-8">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Dashboard Menu</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Dashboard</a></li>
                  <li><?php secondaryMenuBar();?></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>


      </div>
    </div>
  </body>
</html>
