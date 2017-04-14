<!DOCTYPE html>
<?php
  include ("portalController.php");
  topStart();
  adminOnly();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/javascript/customerScripts.js"></script>
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

        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center"><?= $_SESSION['user_id'] ?>'s admin portal</h2>
          </div>
        </div>
        <?php printModalHTML();?>
        <div class="row">

          <!-- quadrant 2 -->
          <div class="col-md-6">

            <button id="createCustomerBtn" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Create Customer</button>
                                            <!-- onclick="modalFill('', '', '', '', '', '')" -->
            <?php printAllCustomersHTML();?><!-- button also located here -->
          </div>

          <!-- quadrant 1 -->
          <div class="col-md-6">

          </div>

        </div>
        <div class="row">

          <!-- quadrant 3 -->
          <div class="col-md-6">

          </div>

          <!-- quadrant 4 -->
          <div class="col-md-6">

          </div>
        </div>


        <?php
            // $conn = connectDB();
            // printTable($conn, "log");
            // $conn->close();
          ?>

      </div>
    </div>
  </body>
</html>
