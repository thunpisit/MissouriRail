<!DOCTYPE html>
<?php
  include 'controller.php';
  topStart();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../assets/javascript/scripts.js"></script>
    <title>Contact</title>
    <style>
        .formwrapper{
          margin:auto;
          text-align: center;
          width:500px;
          clear:both;
        }
        .formwrapper input{
          width: 100%;
          clear: both;
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
              <a class="btn btn-default btn-md" href="login.php" role="button">Login</a>
              <a class="btn btn-primary btn-md" href="signup.php" role="button">Signup</a>
            </form>
          </div><!-- /.navbar-collapse -->
<!--              </div> /.container-fluid -->
    </nav>
      
      <div class="container">
            <div class="jumbotron text-center">
                <h2>Your voice matters!</h2><br>
                <p>We promise that we will not re-accomadate you like U***ted Airlines did<br>
                    We will not turn your rail experience into fight club. :P</p><br>
            </div>
        </div>
      
    <div class="formwrapper container">
      <form method="POST" action="contact.php">
        Name:
        <input type="text" name="name" value="" class="form-control"/><br />
        Email:
        <input type="text" name="email" value="" class="form-control"/><br />
        Subject:
        <input type="text" name="subject" value="" class="form-control"/><br />
        Message:
        <input type="text" name="message" value="" style="height:150px;" class="form-control" /><br />
        <input type="submit" name="submit" value="Send" onclick="form_submission()" />
      </form><br><br>
    </div>
    <?php
    if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $subject=$_POST['subject'];
      $message=$_POST['message'];
      mail("support@mail.missourirail.com",$subject,$message);
    }

    ?>
  </body>
</html>
