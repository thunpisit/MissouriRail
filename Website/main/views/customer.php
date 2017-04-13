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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../assets/javascript/scripts.js" charset="utf-8"></script>
    <title>Customer</title>
    <script>
      $(function(){
        $("#createCustomer").hide();
        $("#printCustomers").click(function(){
          $.ajax({
             url: '../controller.php',
             data: {action: 'printCustomers'},
             type: 'post',
             success: function(output) {
                          $("#customerTable").html(output);
                      }
          });
          $("#customerTable").toggle();
        });

        $("#createCustomerBtn").click(function(){
          $("#createCustomer").toggle(); });

        $("#submitCreate").click(function(){
          // alert("click");
          user_id = $("#user_idCreate").val();
          first_name = $("#first_nameCreate").val();
          last_name = $("#last_nameCreate").val();
          email = $("#emailCreate").val();
          phone_number = $("#phone_numberCreate").val();
          address = $("#addressCreate").val();

          $.ajax({
             url: '../controller.php',
             data: {action: 'createCustomer',
                    user_id: user_id,
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    phone_number: phone_number,
                    address: address},
             type: 'post',
             success: function(output) {
                          $("#createCustomer").hide();
                          console.log(output);
                      }
                  });
        });

        });

      function formToggle(id){
        console.log(id);
        $("#createCustomer").slideToggle("slow");
      }
    </script>
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
            <h2 class="text-center">Customers</h2><hr>
          </div>
        </div>

        <!-- buttons for hidden forms -->
        <div class="row center">
          <!-- create customer -->
          <div class="col-md-*">
            <button id="createCustomerBtn" type="button" class="btn btn-warning">Create Customer</button>
            <div id="createCustomer">
              <div class="panel panel-success">
                <div class="panel-body">


              <!-- <form class="form-horizontal" >
                <input type="hidden" name="formType" value="createCustomer"> -->
                <!-- user_id -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <label for="usr">User:</label>
                  </div>
                  <div class="col-md-4">
                    <input id="user_idCreate" class="form-control checkMe" type="text" name="user_id" value="">
                  </div>
                </div><hr>
                <!-- first_name -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <label for="usr">First Name:</label>
                  </div>
                  <div class="col-md-4">
                    <input id="first_nameCreate" class="form-control checkMe" type="text" name="first_name" value="">
                  </div>
                </div><hr>
                <!-- last_name -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <label for="usr">Last Name:</label>
                  </div>
                  <div class="col-md-4">
                    <input id="last_nameCreate" class="form-control checkMe" type="text" name="last_name" value="">
                  </div>
                </div><hr>
                <!-- email -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <label for="usr">Email:</label>
                  </div>
                  <div class="col-md-4">
                    <input id="emailCreate" class="form-control checkMe" type="text" name="email" value="">
                  </div>
                </div><hr>
                <!-- phone_number -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <label for="usr">Phone Number:</label>
                  </div>
                  <div class="col-md-4">
                    <input id="phone_numberCreate" class="form-control checkMe" type="text" name="phone_number" value="">
                  </div>
                </div><hr>
                <!-- address -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-3">
                    <label for="usr">Address:</label>
                  </div>
                  <div class="col-md-4">
                    <input id="addressCreate" class="form-control checkMe" type="text" name="address" value="">
                  </div>
                </div><hr>
                <!-- submit -->
                <div class="row">
                  <div class="col-md-*">
                    <button id="submitCreate" class="btn btn-success btn-block">Add Customer</button>
                  </div>
                </div>
              <!-- </form> -->
            </div>
          </div>
            </div>
          </div>

          <!-- edit customer -->
          <div class="col-md-*">
            <!-- this is now in the controller <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Customer Information</button> -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Customer Information</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">User:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="user_id" class="form-control" type="text" name="user_id" value="" readonly>
                      </div>
                    </div><hr>
                    <!-- first_name -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">First Name:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="first_name" class="form-control" type="text" name="first_name" value="" readonly>
                      </div>
                    </div><hr>
                    <!-- last_name -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">Last Name:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="last_name" class="form-control" type="text" name="last_name" value="" readonly>
                      </div>
                    </div><hr>
                    <!-- email -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">Email:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="email" class="form-control" type="text" name="email" value="" readonly>
                      </div>
                    </div><hr>
                    <!-- phone_number -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">Phone Number:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="phone_number" class="form-control" type="text" name="phone_number" value="" readonly>
                      </div>
                    </div><hr>
                    <!-- address -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">Address:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="address" class="form-control" type="text" name="address" value="" readonly>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- select customer aka view info -->
          <div class="col-md-*">

          </div>
        </div>

        <!-- print all customers -->
        <div class="row">
          <div class="col-md-12">
            <button id="printCustomers" type="button" class="btn btn-primary" name="button">Print Customers</button>
            <div id="customerTable">

            </div>
          </div>
        </div>

        <?php
          // replaced with ajax call
          // if(isset($_POST['submit'])){
          //   if($_POST['formType'] == 'createCustomer'){
          //     createCustomer();
          //   }
          // }
         ?>

      </div>
    </div>
  </body>
</html>
