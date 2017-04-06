<!DOCTYPE html>
<?php
  include("../controller.php");
  topStart();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="scripts.js"></script>
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
                  <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
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
                  <!-- <li id="authentication"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
                </ul>
              </div>
            </nav>
          </div>
        </div>

        <form class="form-horizontal" action="signup.php" method="post">

          <!-- user_id -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="usr">User:</label>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="user" value="">
            </div>
          </div><hr>

          <!-- password -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="pwd">Password:</label>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="password" name="pwd" value="">
            </div>
          </div><hr>

          <!-- add_equipment -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="add_equipment">Add Equipment Permission:</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="add_equipment">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div><hr>

          <!-- add_conductor -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="add_conductor">Add Conductor Permission:</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="add_conductor">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div><hr>

          <!-- monitor_train -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="monitor_train">Monitor Train Permission:</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="monitor_train">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div><hr>

          <!-- add_train -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="add_train">Add Train Permission:</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="add_train">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div><hr>

          <!-- add_engineer -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="add_engineer">Add Engineer Permission:</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="add_engineer">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div><hr>

          <!-- reset_pass -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="reset_pass">Reset Password Permission:</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="reset_pass">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div><hr>

          <!-- edit_user -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="edit_user">Edit User Permission:</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="edit_user">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </div>
          </div><hr>

          <!-- ssn -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="ssn">Social Security:</label>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="ssn" value="">
            </div>
          </div><hr>
          <div class="row">
            <div class="col-md-offset-2 col-md-7">
              <div class="alert alert-info">
                <strong>Info!</strong> Do not include dashes. Sample Input: 123456789
              </div>
            </div>
          </div>

          <!-- submit -->
          <div class="row">
            <div class="col-md-offset-2 col-md-7">
              <input type="submit" name="submit" class="btn btn-success btn-block">
            </div>
          </div>
        </form><?php
          if(isset($_POST['submit'])){
            $conn = connectDB();
            $user = htmlspecialchars($_POST['user']);
            $pass = htmlspecialchars($_POST['pwd']);
            $add_equipment = htmlspecialchars($_POST['add_equipment']);
            $add_conductor = htmlspecialchars($_POST['add_conductor']);
            $monitor_train = htmlspecialchars($_POST['monitor_train']);
            $add_train = htmlspecialchars($_POST['add_train']);
            $add_engineer = htmlspecialchars($_POST['add_engineer']);
            $reset_pass = htmlspecialchars($_POST['reset_pass']);
            $edit_user = htmlspecialchars($_POST['edit_user']);
            $ssn = htmlspecialchars($_POST['ssn']);

            if(signUp($conn, $user, $pass, $add_equipment, $add_equipment,
            $add_conductor, $monitor_train, $add_train, $add_engineer,
            $reset_pass, $edit_user, $ssn) > 0){

            } else {
              echo "signup failed";
            }
            $conn->close();
          }?>
      </div>
    </div>
  </body>
</html>
