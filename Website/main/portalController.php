<?php
  include 'controller.php';

  function printAllCustomersHTML(){
    echo '<button id="printCustomers" type="button" class="btn btn-warning btn-md" data-toggle="collapse" data-target="#collapseMe" name="button">Show Customers</button>
          <div id="collapseMe" class="collapse">
            <div id="customerTable">

            </div>
          </div>';
  }

  function printModalHTML(){
    echo '<div class="modal fade" id="myModal" role="dialog">
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
                      <input id="first_name" class="form-control modalInput" type="text" name="first_name" value="" readonly>
                    </div>
                  </div><hr>
                  <!-- last_name -->
                  <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                      <label for="usr">Last Name:</label>
                    </div>
                    <div class="col-md-4">
                      <input id="last_name" class="form-control modalInput" type="text" name="last_name" value="" readonly>
                    </div>
                  </div><hr>
                  <!-- email -->
                  <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                      <label for="usr">Email:</label>
                    </div>
                    <div class="col-md-4">
                      <input id="email" class="form-control modalInput" type="text" name="email" value="" readonly>
                    </div>
                  </div><hr>
                  <!-- phone_number -->
                  <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                      <label for="usr">Phone Number:</label>
                    </div>
                    <div class="col-md-4">
                      <input id="phone_number" class="form-control modalInput" type="text" name="phone_number" value="" readonly>
                    </div>
                  </div><hr>
                  <!-- address -->
                  <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                      <label for="usr">Address:</label>
                    </div>
                    <div class="col-md-4">
                      <input id="address" class="form-control modalInput" type="text" name="address" value="" readonly>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <div style="float: left;">
                    <button id="deleteBtn" style="text-align: left;" type="button" class="btn btn-danger">Delete</button>
                  </div>
                  <button id="createBtn" style="text-align: center;" type="button" class="btn btn-success">Submit</button>
                  <div style="float: right;">
                    <button id="editCustomerBtn" type="button" class="btn btn-info"></button>
                    <button id="closeModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>';
  }

 ?>
