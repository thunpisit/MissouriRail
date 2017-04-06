<!DOCTYPE html>
<?php
  include '../controller.php';
  topStart();
  if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
  } else {
    if(!isset($_SESSION['reset_pass'])){
      header("Location: login.php");
    } else {
      if($_SESSION['reset_pass'] == 0){
        header("Location: dashboard.php");
      }
    }
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

        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Admin Portal</h2>
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
                  <li><a href="dashboard.php">Dashboard</a></li>
                  <li class="active"><a href="#">Admin Portal</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
        <?php echo "reset_pass permission = " . $_SESSION['reset_pass']; ?>
        <?php echo "add_equipment permission = " . $_SESSION['add_equipment']; ?>
        <?php echo "add_conductor permission = " . $_SESSION['add_conductor']; ?>
        <?php echo "monitor_train permission = " . $_SESSION['monitor_train']; ?>
        <?php echo "add_train permission = " . $_SESSION['add_train']; ?>
        <?php echo "add_engineer permission = " . $_SESSION['add_engineer']; ?>
        <?php echo "edit_user permission = " . $_SESSION['edit_user']; ?>


      </div>
    </div>
  </body>
</html>
