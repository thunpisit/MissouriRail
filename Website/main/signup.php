<!DOCTYPE html>
<?php
  include("controller.php");
  topStart();
  // adminOnly();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="assets/javascript/scripts.js"></script>
    <script src="assets/javascript/signUpScripts.js"></script>
    <link rel="icon"
      type="image/png"
      href="missourirail.png">
  </head>
  <body>
    <nav class="navbar navbar-default">
<!--              <div class="container-fluid">-->
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php">MissouriRail</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="about.php">About us</a></li>
                    <li><a href="fleets.php">Fleets</a></li>
                    <li><a href="reservation.php">Reservation</a></li>
                    <li><a href="contact.php">Contact us</a></li>
                  </ul>
                  <form class="navbar-form navbar-right">
                    <a class="btn btn-default btn-md" href="login.php" role="button">Login</a>
                    <a class="btn btn-primary btn-md" href="signup.php" role="button">Signup</a>
                  </form>
                </div><!-- /.navbar-collapse -->
<!--              </div> /.container-fluid -->
          </nav>


      </div>
    </div>

        <form class="form-horizontal" action="signup.php" method="post">

          <!-- user_id -->
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="usr">Email Address:</label>
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

          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="type">Type</label>
            </div>
            <div class="col-md-4">
              <select class="form-control" name="type" id="signupSelect">
                <option value="">Pick User Type</option>
                <option value="administrator">Admin</option>
                <option value="conductor">Conductor</option>
                <option value="engineer">Engineer</option>
                <option value="customer">Customer</option>
              </select>
            </div>
          </div><hr>

          <div id="userDetailsForm">
            <!-- first_name -->
            <div class="row">
              <div class="col-md-offset-2 col-md-3">
                <label for="usr">First Name:</label>
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="first_name" value="">
              </div>
            </div><hr>
            <!-- last_name -->
            <div class="row">
              <div class="col-md-offset-2 col-md-3">
                <label for="usr">Last Name:</label>
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="last_name" value="">
              </div>
            </div><hr>
            <!-- status / phone -->
            <div class="row">
              <div class="col-md-offset-2 col-md-3">
                <label id="input3" for="usr"></label>
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="input3" value="">
              </div>
            </div><hr>
            <!-- rank / title / address -->
            <div class="row">
              <div class="col-md-offset-2 col-md-3">
                <label id="input4" for="usr"></label>
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" name="input4" value="">
              </div>
            </div><hr>
            <div id="engineerSignUp">
              <!-- hours_traveling -->
              <div class="row">
                <div class="col-md-offset-2 col-md-3">
                  <label id="input5" for="usr">Hours Traveling:</label>
                </div>
                <div class="col-md-4">
                  <input class="form-control" type="text" name="input5" value="0">
                </div>
              </div><hr>
            </div><!-- end hours_traveling -->
          </div><!-- end userDetailsForm -->

           <!--ssn-->
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
              <input type="submit" name="submit" onclick="return form_submission()" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
        <?php
          if(isset($_POST['submit'])){
            $conn = connectDB();
            $user = htmlspecialchars($_POST['user']);
            $pass = htmlspecialchars($_POST['pwd']);
            $ssn = htmlspecialchars($_POST['ssn']);
            $type = $_POST['type'];
            $_SESSION['signup_user'] = $user;
            switch($type){
              case 'administrator':
                $add_equipment = 1;
                $add_conductor = 1;
                $monitor_train = 1;
                $add_train = 1;
                $add_engineer = 1;
                $reset_pass = 1;
                $edit_user = 1;
                break;
              case 'conductor':
                $add_equipment= 0;
                $add_conductor= 0;
                $monitor_train = 1;
                $add_train= 0;
                $add_engineer= 0;
                $reset_pass= 0;
                $edit_user= 0;
                break;
              case 'engineer':
                $add_equipment= 0;
                $add_conductor= 0;
                $monitor_train = 1;
                $add_train= 0;
                $add_engineer= 0;
                $reset_pass= 0;
                $edit_user= 0;
                break;
              case 'customer':
                $add_equipment = 0;
                $add_conductor = 0;
                $monitor_train = 0;
                $add_train = 0;
                $add_engineer = 0;
                $reset_pass = 0;
                $edit_user = 0;
                break;
            }

            if(signUp($conn, $type, 'front', $user, $pass, $add_equipment,
            $add_conductor, $monitor_train, $add_train, $add_engineer,
            $reset_pass, $edit_user, $ssn) > 0){

            } else {
            }
            $conn->close();
          }?>
      </div>
    </div>
  </body>
</html>
