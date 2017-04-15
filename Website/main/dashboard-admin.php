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
    <script src="assets/javascript/logScripts.js"></script>
    <style>
      .modal-body {
        position: relative;
        overflow-y: auto;
        max-height: 400px;
        padding: 15px;
      }
    </style>
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
                    <a class="btn btn-danger btn-md" href="logout.php" role="button">Logout</a>
                  </form>
                </div><!-- /.navbar-collapse -->
<!--              </div> /.container-fluid -->
          </nav>
        
        <div class="container">
            <div class="alert alert-info text-center" role="alert">
                <a href="#" class="alert-link">Hello!, Admin: <?= $_SESSION['user_id'] ?></a>
            </div>
        </div>
        <?php printModalHTML();?>
        <div class="container">
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h2 class="panel-title">Customer Widget</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <button id="createCustomerBtn" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Create Customer</button>
                        </div><br>
                        <div class="row">
                            <?php printAllCustomersHTML();?><!-- button also located here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h2 class="panel-title">Employee Widget</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <button id="logBtn" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">View User Logs</button>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h2 class="panel-title">Equipment Widget</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <button id="logBtn" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Create Equipment</button><br><br>
                            <button id="logBtn" type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal">View Equipments</button>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h2 class="panel-title">Schedule Widget</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <button id="logBtn" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Create Schedule</button><br><br>
                            <button id="logBtn" type="button" class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModal">View Schedules</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        

        
      </div>
    </div>
  </body>
</html>
