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
    <title>Contact</title>
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
                  <li><a href="train.php">Our Fleets</a></li>
                  <li><a href="schedule.php">Schedules</a></li>
                  <li class="active"><a href="#">Contacts</a></li>
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
    <div class="formwrapper" name="form-control">
      <form method="POST" action="contact.php">
        Name:
        <input type="text" name="name" value="" /><br />
        Email:
        <input type="text" name="email" value=""/><br />
        Subject:
        <input type="text" name="subject" value=""/><br />
        Message:
        <input type="text" name="message" value="" style="height:150px;" /><br />
        <input type="submit" name="submit" value="Send" />
      </form>
    </div>
    <? php
      if(isset($_POST['submit'])){
        form_submission();

        // if(empty($name) && empty($email) && empty($subject) && empty($message)){
        //     echo "Please fill in all the field.";
        // }
        // elseif(empty($name)){
        //   echo "Please enter a name.";
        // }
        // elseif(empty($email)){
        //   echo "Please enter an email.";
        // }
        // elseif(empty($subject)){
        //   echo "Please enter a subject";
        // }
        // elseif(empty($message)){
        //   echo "Please add a message.";
        // }
        // else{
        //   mail("support@missourirail.com",$subject,$message);
        // }


      }

    ?>
  </body>
</html>
