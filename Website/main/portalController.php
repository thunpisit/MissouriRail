<?php
  // include 'controller.php';
  include 'model/portalDAL.php';

  function updateEmployeeInfo($user, $first_name, $last_name, $status, $rank){
    $conn = connectDB();
    q_updateEmployeeInfo($conn, $user, $first_name, $last_name, $status, $rank);
    q_getEmployeeInfo($conn, $user);
    $conn->close();
  }

  function getEmployeeInfo($user){

    if($_SESSION['engineer'] == 1){
      $conn = connectDB();
      $result = q_getEngineer($conn, $user);

      foreach ($result as $key) {
        $items[] = $key;
      }

      $first_name = "'" . $items[0] . "'";
      $last_name = "'" . $items[1] . "'";
      $status = "'" . $items[2] . "'";
      $rank = "'" . $items[3] . "'";
      $hours = "'" . $items[4] . "'";

      echo '<button id="basicInfoBtn" onclick="fillModalInfoEngineer('. $first_name .','. $last_name .','. $status .','. $rank .','. $hours. ')" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">View Basic Information</button><br><br>';
      $conn->close();
    } else if($_SESSION['customer'] == 1){
      $conn = connectDB();
      $result = q_getCustomer($conn, $user);

      foreach ($result as $key) {
        $items[] = $key;
      }

      $first_name = "'" . $items[0] . "'";
      $last_name = "'" . $items[1] . "'";
      $phone_number = "'" . $items[2] . "'";
      $address = "'" . $items[3] . "'";

      echo '<button id="basicInfoBtn" onclick="fillModalInfoCustomer('. $first_name .','. $last_name .','. $phone_number .','. $address .')" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">View Basic Information</button><br><br>';
      $conn->close();

    }
    else {
    $conn = connectDB();
    $result = q_getEmployeeInfo($conn, $user);

    foreach ($result as $key) {
      $items[] = $key;
    }

    $first_name = "'" . $items[0] . "'";
    $last_name = "'" . $items[1] . "'";
    $status = "'" . $items[2] . "'";
    $rank = "'" . $items[3] . "'";

    echo '<button id="basicInfoBtn" onclick="fillModalInfo('. $first_name .','. $last_name .','. $status .','. $rank .')" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">View Basic Information</button><br><br>';
    $conn->close();
    }
  }

  function printCarsTable($conn, $company_id, $location){
    echo '<div id="locationSelect">
            <div class="form-group">
              <label for="sel1">Locations:</label>
              <select onchange="getVal(this)" class="form-control" id="city_name">
                <option value="St. Louis">St. Louis</option>
                <option value="Cape Girardeau">Cape Girardeau</option>
                <option value="Columbia">Columbia</option>
                <option value="Jefferson City">Jefferson City</option>
                <option value="Joplin">Joplin</option>
                <option value="Kansas City">Kansas City</option>
                <option value="Sedalia">Sedalia</option>
                <option value="Springfield">Springfield</option>
                <option value="Branson">Branson</option>
              </select>
            </div>
          </div>';
    $result = q_printCarsTable($conn, $company_id, $location);
    if($result->num_rows > 0){
      // output data of each row
      echo "<div class='row'><label>Number of total cars:</label> $result->num_rows";
      echo "<table class='table table-responsive table-hover table-bordered'><thead><tr>";
      while($fieldName = mysqli_fetch_field($result)) {
        if($fieldName->name == 'customer_id'){
          echo "<th>Reserved</th>";
        } else{
          echo "<th>" . $fieldName->name . "</th>";
        }
      }
      echo "</tr></thead><tbody>";
      while($row = $result->fetch_array(MYSQLI_NUM)) {
        echo "<tr>";
        foreach ($row as $data) {
          if($data == ''){
            echo "<td><button>Reserve this car</button></td>";
          } else {
            echo "<td>" . $data . "</td>";
          }
        }
        echo "</tr>";
      }
      echo "</tbody></table></div>";
    }
  }

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
                      <input id="email" class="form-control" type="text" name="email" value="" readonly>
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
                  <!--<div class="row">
                    <div class="col-md-offset-2 col-md-3">
                      <label for="usr">Email:</label>
                    </div>
                    <div class="col-md-4">
                      <input id="email" class="form-control modalInput" type="text" name="email" value="" readonly>
                    </div>
                  </div><hr> -->
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

  function printModalEmployeeHTML(){
    echo '<div class="modal fade" id="myModal" role="dialog">
            <div id="dialog" class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Customer Information</h4>
                </div>
                <div class="modal-body">
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
                  </div><hr>';
                  if($_SESSION['customer'] == NULL){
                    echo '<!-- status -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">Status:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="status" class="form-control modalInput" type="text" name="status" value="" readonly>
                      </div>
                    </div><hr>';
                  }

                echo '<!-- rank -->
                  <div class="row">
                    <div class="col-md-offset-2 col-md-3">
                      <label for="usr">';
                      if($_SESSION['customer'] == 1){
                        echo 'Phone Number:</label>';
                      }else{
                        echo 'Rank:</label>';
                      }

              echo '</div>
                    <div class="col-md-4">';
                    if($_SESSION['customer'] == 1){
                    echo '<input id="phone_number" class="form-control modalInput" type="text" name="phone_number" value="" readonly>';
                    } else {
                      echo '<input id="rank" class="form-control modalInput" type="text" name="rank" value="" readonly>';
                    }
              echo '</div>
                  </div><hr>';
            if($_SESSION['engineer'] == 1){
              echo '<!-- hours -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">Total Hours:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="hours" class="form-control modalInput" type="text" name="hours" value="" readonly>
                      </div>
                    </div><hr>';
            } else if($_SESSION['customer'] == 1){
              echo '<!-- address -->
                    <div class="row">
                      <div class="col-md-offset-2 col-md-3">
                        <label for="usr">Address:</label>
                      </div>
                      <div class="col-md-4">
                        <input id="address" class="form-control modalInput" type="text" name="address" value="" readonly>
                      </div>
                    </div><hr>';
            }

          echo '</div>
                <div class="modal-footer">
                    <button id="editBtn" type="button" class="btn btn-info">Edit</button>
                    <button id="closeModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>';
  }

 ?>
