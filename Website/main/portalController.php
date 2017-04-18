<?php
  // include 'controller.php';
  include 'model/portalDAL.php';
  include 'model/trainDAL.php';

  function updateEmployeeInfo($user, $first_name, $last_name, $status, $rank, $hours){
    $conn = connectDB();
    q_updateEmployeeInfo($conn, $user, $first_name, $last_name, $status, $rank, $hours);
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

  function updateCar(){
    $conn = connectDB();
    $serial = $_POST['serial_num'];
    $load = $_POST['load'];
    $type = $_POST['type'];
    $location = $_POST['locationOfCar'];
    $price = $_POST['price'];
    $train = $_POST['train_num'];
    $customer = $_POST['customer_id'];
    q_updateEquipment($conn, 'car', $serial, $load, $type, $location, $price, $train, 0, 0, 0, $customer);
    echo "car updated";
  }

  function getAllCars($conn){
    $result = q_getAllCars($conn);
    echo "<div class='row'><div id='carsTable' class='col-md-10'><label>Number of total cars:</label> $result->num_rows";
    echo "<table class='table table-responsive table-hover table-bordered'><thead><tr>";

    if($result->num_rows > 0){
      while($fieldName = mysqli_fetch_field($result)){
        echo "<th>" . $fieldName->name . "</th>";
      }
      echo '<th>Update</th>';
      echo "</tr></thead><tbody>";
      while($row = $result->fetch_array(MYSQLI_NUM)){
        echo "<tr>";
        foreach ($row as $data) {
        echo "<td>" . $data . "</td>";
        }
        $serial_num = "'" . $row[0] . "'";
        echo '<td><button id="reserveCar" class="btn btn-primary" onclick="editCar('.$serial_num.')">Edit this car</button></td>';
        echo "</tr>";
      }
    }
    echo "</tbody></table></div></div>";
  }

  function printCarsTable($conn, $company_id, $location){
    // too buggy
    // echo '<div id="locationSelect">
    //         <div class="form-group">
    //           <label for="sel1">Locations:</label>
    //           <select onchange="getVal(this)" class="form-control" id="city_name">
    //             <option value="St. Louis">St. Louis</option>
    //             <option value="Cape Girardeau">Cape Girardeau</option>
    //             <option value="Columbia">Columbia</option>
    //             <option value="Jefferson City">Jefferson City</option>
    //             <option value="Joplin">Joplin</option>
    //             <option value="Kansas City">Kansas City</option>
    //             <option value="Sedalia">Sedalia</option>
    //             <option value="Springfield">Springfield</option>
    //             <option value="Branson">Branson</option>
    //           </select>
    //         </div>
    //       </div>';
    $result = q_printCarsTable($conn, $company_id, 'all');
    if($result->num_rows > 0){
      // output data of each row
      echo "<div id='carsTable' class='row'><label>Number of total cars:</label> $result->num_rows";
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
          if($data == '0'){
            $serial_num = "'" . $row[0] . "'";
            echo '<td><button id="reserveCar" class="btn btn-primary" onclick="reserveCar('.$serial_num.')">Reserve this car</button></td>';
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
          </div>
          <input id="typeOfUser" type="hidden" name="typeOfUser" value="">';
  }

  function getCarInfo($conn, $serial, $type){
    $carInfo = q_getCarInfo($conn, $serial, $type);
    switch ($type) {
      case 'form':
        echo '<div class="">
                <div class="col-md-offset-1 col-md-10">
                  <div class="form-group">
                    <label for="serial">Serial Number:</label>
                    <input value="'.$serial.'" type="text" class="form-control" id="serial_num" readonly>
                  </div>
                  <div class="form-group">
                    <label for="serial">Load Capacity:</label>
                    <input value="'.$carInfo[0].'" type="text" class="form-control" id="load_capacity" readonly>
                  </div>
                  <div class="form-group">
                    <label for="serial">Type:</label>
                    <input value="'.$carInfo[1].'" type="text" class="form-control" id="type" readonly>
                  </div>
                  <div class="form-group">
                    <label for="serial">Location:</label>
                    <input value="'.$carInfo[2].'" type="text" class="form-control" id="location" readonly>
                  </div>
                  <div class="form-group">
                    <label for="serial">Price:</label>
                    <input value="'.$carInfo[3].'" type="text" class="form-control" id="price" readonly>
                  </div>
                </div>
              </div>';
        break;

      case 'form_admin':
      $trainsResult = q_getTrainNumbers($conn);
      $customersResult = q_getCustomerID($conn);
      $locationsResult = q_getLocations($conn);
      $typesResult = q_getTypes($conn);
      echo '<div class="">
              <div class="col-md-offset-1 col-md-10">
                <div class="form-group">
                  <!-- serial_num -->
                  <label for="serial">Serial Number:</label>
                  <input value="'.$serial.'" type="text" class="form-control" id="serial_num" readonly>
                </div>
                <!-- load_capacity -->
                <div class="form-group">
                  <label for="serial">Load Capacity:</label>
                  <input value="'.$carInfo[0].'" type="text" class="form-control editMe" id="load_capacity" readonly>
                </div>
                <!-- type -->
                <div class="form-group">
                  <label for="serial">Type:</label>
                  <select class="form-control editMe" id="type">
                    <option value="'.$carInfo[1].'">'.$carInfo[1].'</option>';
                    while($typeRow = $typesResult->fetch_array(MYSQLI_NUM)){
                      foreach($typeRow as $type){
                        echo '<option value="'.$type.'">'.$type.'</option>';
                      }
                    }
            echo '</select></div>
                <!-- location -->
                <div class="form-group">
                  <label for="serial">Location:</label>
                  <select class="form-control editMe" id="location">
                    <option value="'.$carInfo[2].'">'.$carInfo[2].'</option>';
                    while($locationRow = $locationsResult->fetch_array(MYSQLI_NUM)){
                      foreach($locationRow as $location){
                        echo '<option value="'.$location.'">'.$location.'</option>';
                      }
                    }
            echo '</select></div>
                <!-- price -->
                <div class="form-group">
                  <label for="serial">Price:</label>
                  <input value="'.$carInfo[3].'" type="text" class="form-control editMe" id="price" readonly>
                </div>
                <!-- train_num -->
                <div class="form-group">
                  <label for="serial">Train Number:</label>
                  <select class="form-control editMe" id="train_num">
                    <option value="'.$carInfo[4].'">'.$carInfo[4].'</option>';
                    while($trainRow = $trainsResult->fetch_array(MYSQLI_NUM)){
                      foreach($trainRow as $train){
                        echo '<option value="'.$train.'">'.$train.'</option>';
                      }
                    }
                    echo '<option value="-1">No Train</option>';
            echo' </select></div>
                <!-- customer_id -->
                <div class="form-group">
                  <label for="serial">Customer ID:</label>
                  <select class="form-control editMe" id="assignedCustomerID">
                    <option value="'.$carInfo[8].'">'.$carInfo[8].'</option>';
                  while($customerRow = $customersResult->fetch_array(MYSQLI_NUM)){
                    foreach($customerRow as $customer){
                      echo '<option value="'.$customer.'">'.$customer.'</option>';
                    }
                  }
                  echo '<option value="0">No Customer</option>';
          echo  '</select></div>
                <!-- date -->
                <div class="form-group">
                  <label for="serial">Date:</label>
                  <input value="'.$carInfo[5].'" type="text" class="form-control" id="date" readonly>
                  <p>*** Use View Schedule to Change ***</p>
                </div>
                <!-- depart_time -->
                <div class="form-group">
                  <label for="serial">Departure Time:</label>
                  <input value="'.$carInfo[6].'" type="text" class="form-control" id="depart_time" readonly>
                  <p>*** Use View Schedule to Change ***</p>
                </div>
                <!-- dest_time -->
                <div class="form-group">
                  <label for="serial">Destination Time:</label>
                  <input value="'.$carInfo[7].'" type="text" class="form-control" id="dest_time" readonly>
                  <p>*** Use View Schedule to Change ***</p>
                </div>
              </div>
            </div>';

        break;

      default:
        echo "Error: $type is not specified correctly to controller";
        break;
    }

  }

  function reserveCarsForm($conn, $serial){
    $carInfo = q_getCarInfo($conn, $serial);
    // [0] = load_capacity [1] = type [2] = location [3] = price
    echo '<div class="">
            <div class="col-md-offset-1 col-md-10">
              <div class="form-group">
                <label for="serial">Serial Number:</label>
                <input value="'.$serial.'" type="text" class="form-control" id="serial_num" readonly>
              </div>
              <div class="form-group">
                <label for="serial">Load Capacity:</label>
                <input value="'.$carInfo[0].'" type="text" class="form-control" id="load_capacity" readonly>
              </div>
              <div class="form-group">
                <label for="serial">Type:</label>
                <input value="'.$carInfo[1].'" type="text" class="form-control" id="type" readonly>
              </div>
              <div class="form-group">
                <label for="serial">Location:</label>
                <input value="'.$carInfo[2].'" type="text" class="form-control" id="location" readonly>
              </div>
              <div class="form-group">
                <label for="serial">Price:</label>
                <input value="'.$carInfo[3].'" type="text" class="form-control" id="price" readonly>
              </div>
            </div>
          </div>';

  }

  function reserveCar($conn, $customer_id, $serial){
    q_reserveCar($conn, $customer_id, $serial);
    echo '<h2 style="text-align: center;">Reservation Confirmed</h2>';
  }

  function getMyReservations($conn, $user){
    $result = q_getMyReservations($conn, $user);
    echo "<div class='row'><label>Total Number of Reservations:</label> $result->num_rows";
    echo "<table class='table table-responsive table-hover table-bordered'><thead><tr>";
    while($fieldName = mysqli_fetch_field($result)) {
        echo "<th>" . $fieldName->name . "</th>";
    }
    echo "</tr></thead><tbody>";
    while($row = $result->fetch_array(MYSQLI_NUM)) {
      echo "<tr>";
      foreach ($row as $data) {
        echo "<td>" . $data . "</td>";
      }
      echo "</tr>";
    }
    echo "</tbody></table></div>";
  }?>
