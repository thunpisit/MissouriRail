<!DOCTYPE html>
<?php
  include '../controller.php';
  topStart();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <title>Train</title>
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
                  <li class="active"><a href="#">Our Fleets</a></li>
                  <li><a href="schedule.php">Schedules</a></li>
                  <li><a href="contact.php">Contacts</a></li>
                  <li><a href="dashboard.php">Dashboard</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                  <li>
                    <?php if(isset($_SESSION['user_id'])){
                      echo '<form action="../model/logout.php" method="post">
                              <span class=navbar-btn>
                                <input id="height100" type="submit" name="submit" class="btn btn-danger" value="Logout">
                              </span>
                            </form>';
                    } else {
                      echo '<a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>';
                    } ?>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>


      </div>
    </div>
  </body>
</html>
