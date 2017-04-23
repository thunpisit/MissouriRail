<?php
# This is the Business Logic Layer to handle everything between the front end
# and the database connectivity in the model
include("model/userDAL.php");
include("model/customerDAL.php");
include("portalController.php");
include 'model/carDAL.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
  $action = $_POST['action'];
  switch($action) {
      case 'printCustomers' : printCustomers(); break;
      case 'createCustomer' : createCustomer(); break;
      case 'getAllReservations':
        $conn = connectDB();
        getAllCars($conn);
        break;
      case 'reserveCarsForm':
        $serial_num = $_POST['serial_num'];
        $conn = connectDB();
        reserveCarsForm($conn, $serial_num);
        break;
      case 'createCustomerAuthentication':
        $conn = connectDB();
        $user = $_POST['user_id'];
        $pass = $_POST['password'];
        signUp($conn, 'customer', 'back', $user, $pass, 0,
        0, 0, 0, 0,
        0, 0, 0);
        break;
      case 'editCustomer' : editCustomer(); break;
      case 'deleteCustomer': deleteCustomer(); break;
      case 'updateCar': updateCar(); break;

      case 'getCars':
        $conn = connectDB();
        $company_id = $_POST['company_id'];
        $location = $_POST['location'];
        printCarsTable($conn, $company_id, $location);
        break;

      case 'updateInfo':
        session_start();
        // for admins
        if(isset($_POST['type'])){
          if($_POST['type'] == 'admin'){
            $user = $_SESSION['user_id'];
            $first_name = $_POST['fname'];
            $last_name = $_POST['lname'];
            $status = $_POST['status'];
            $job_title = $_POST['title'];
            updateEmployeeInfo($user, $first_name, $last_name, $status, $job_title, 0);
          }
        }
        // everyone else
        else {
          $user = $_SESSION['user_id'];
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $status = $_POST['status'];
          $rank = $_POST['rank'];
          $hours = $_POST['hours'];
          updateEmployeeInfo($user, $first_name, $last_name, $status, $rank, $hours);
        }
        break;

      case 'loginRedirect':
        session_start();
        session_unset();
        if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]);
        }
        session_destroy();
        break;

      case 'updatePassword':
        session_start();
        $user = $_POST['user'];
        $pwd = htmlspecialchars($_POST['pwd']);
        updatePassword($user, $pwd);
        echo "<h2 class='text-center'>Password successfully updated.</h2><br><br><h3 class='text-center'>Account Must Relogin.</h3>";
        break;

      case 'printLog':
        $conn = connectDB();
        printTable($conn, 'log');
        break;

      case 'getInfo' :
        session_start();
        $user = $_SESSION['user_id'];
        getEmployeeInfo($user);
        break;

      case 'reserveCar':
        session_start();
        $conn = connectDB();
        $customer_id = $_SESSION['user_id'];
        $serial = $_POST['serial_num'];
        reserveCar($conn, $customer_id, $serial);
        break;

      case 'getCarInfo':
        $serial_num = $_POST['serial_num'];
        $type = $_POST['type'];
        $conn = connectDB();
        getCarInfo($conn, $serial_num, $type);
        break;

      case 'getMyReservations':
        session_start();
        $conn = connectDB();
        $customer_id = $_SESSION['user_id'];
        getMyReservations($conn, $customer_id);
        break;

      default:
        echo "action post set and messed up your function call";
      break;
  }
}

  function topStart(){
    ob_start();
    session_start();
  }

  function connectDB(){
    require_once("secure/database.php");
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
  }

  function loginUser($conn, $user, $pass){
    if(q_checkUser($conn ,$user) > 0){
      if(q_loginUser($conn, $user, $pass) == 1){
        if(q_checkEngineer($conn, $user) == 1){
          $_SESSION['engineer'] = 1;
        } else {
          $_SESSION['engineer'] = NULL;
        }
        if(q_checkCustomer($conn, $user) == 1){
          $_SESSION['customer'] = 1;
        } else {
          $_SESSION['customer'] = NULL;
        }
        if(q_checkAdmin($conn, $user) == 1){
          $_SESSION['admin'] = 1;
        } else {
          $_SESSION['admin'] = NULL;
        }
        $permissions = q_getPermissions($conn, $user);
        $permissionsArray = $permissions->fetch_array();
        $counter = 0;
        while($fieldName = mysqli_fetch_field($permissions)) {
            $_SESSION[$fieldName->name] = $permissionsArray[$counter];
            $counter++;
        }
        $_SESSION['user_id'] = $user;
        getLog($conn, $user, 'login on ');
        if($_SESSION['reset_pass'] == 1){
          header("Location: dashboard-admin.php");
        } else if($_SESSION['monitor_train'] == 1){
          header("Location: dashboard-employee.php");
        } else {
          header("Location: dashboard-customer.php");
        }
      } else {
        echo "password incorrect";
      }
    } else {
      echo "user_id not found";
    }
  }

  // signs user up then returns 0 on fail
  function signUp($conn, $typeOfUser, $signUp, $user, $pass, $add_equipment,
  $add_conductor, $monitor_train, $add_train, $add_engineer,
  $reset_pass, $edit_user, $ssn){
    if(q_checkUser($conn, $user) < 1){
      switch ($typeOfUser) {
        case 'administrator':
          $fname = $_POST['first_name'];
          $lname = $_POST['last_name'];
          $status = $_POST['input3'];
          $title = $_POST['input4'];
          q_signUpAdmin($conn, $user, $fname, $lname, $status, $title);
          break;

        case 'conductor':
          $fname = $_POST['first_name'];
          $lname = $_POST['last_name'];
          $status = $_POST['input3'];
          $rank = $_POST['input4'];
          q_signUpConductor($conn, $user, $fname, $lname, $status, $rank);
          break;

        case 'engineer':
          $fname = $_POST['first_name'];
          $lname = $_POST['last_name'];
          $status = $_POST['input3'];
          $rank = $_POST['input4'];
          $hours = $_POST['input5'];
          q_signUpEngineer($conn, $user, $fname, $lname, $status, $rank, $hours);
          break;

        case 'customer':
          if($signUp == 'front'){
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $phone = $_POST['input3'];
            $address = $_POST['input4'];
            q_signUpCustomer($conn, $user, $fname, $lname, $phone, $address);
          }
          break;

        default:
          echo "Error: $typeOfUser is not specified in controller";
          break;
      }
      q_signUp($conn, $user, $pass, $add_equipment,
      $add_conductor, $monitor_train, $add_train, $add_engineer,
      $reset_pass, $edit_user, $ssn);

      $action = "signup for $typeOfUser account on ";
      getLog($conn, $user, $action);
    } else {
      return 0;
    }
  }

  function adminOnly(){
    if(!isset($_SESSION['user_id'])){
      header("Location: login.php");
    } else {
      if(!isset($_SESSION['reset_pass'])){
        header("Location: login.php");
      } else {
        if($_SESSION['reset_pass'] == 0){
          header("Location: dashboard.php");
        }
      }
    }
  }

  function menuBar(){
    if(isset($_SESSION['user_id'])){
      $currentPage = $_SERVER['PHP_SELF'];
      echo '<a class="btn btn-danger btn-md" href="logout.php?page='.$currentPage.'" role="button">Logout</a>';
    } else {
      echo '<a class="btn btn-default btn-md" href="login.php" role="button">Login</a>
            <a class="btn btn-primary btn-md" href="signup.php" role="button">Signup</a>';
    }
  }

  function printTable($conn, $table){
    $result = q_printTable($conn, $table);
    if($result->num_rows > 0){
      // output data of each row
      echo "<div class='row'><label>Number of rows in result:</label> $result->num_rows";
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
    }
  }

  function getLog($conn, $user, $action){
    $ip = ipAddress();
    $action = getAction($action);
    $date_time = getDateTime();
    // echo 'ip = ' . $ip . '<br />action = ' . $action . '<br />date_time = ' . $date_time . '<br />user = ' . $user;
    q_putLog($conn, $ip, $action, $date_time, $user);
  }

  function ipAddress(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  function getAction($action){
    // form submission on currentPage
    $currentPage = $_SERVER['PHP_SELF'];
    $actionString = $action . $currentPage;
    return $actionString;
    }

  function getDateTime(){
    $date = time();
    return $date;
  }

  function printCustomers(){

    $conn = connectDB();
    $result = q_getCustomers($conn);
    if($result->num_rows > 0){
      // output data of each row
      echo "<label>Total Customers:</label> $result->num_rows";
      echo "<table class='table table-responsive table-hover table-bordered'><thead><tr>";
      $x = 0;
      while($fieldName = mysqli_fetch_field($result)) {
        if($x == 1 || $x == 2){
          echo "<th>" . $fieldName->name . "</th>";
        }
        $x++;
      }
      echo "<th>Customer Information</th>";
      echo "<th>Reset Password</th>";
      echo "</tr></thead><tbody>";
      while($row = $result->fetch_array(MYSQLI_NUM)) {
        echo "<tr>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        $user_id = "'" . $row[0] . "'";
        $first_name = "'" . $row[1] . "'";
        $last_name = "'" . $row[2] . "'";
        $phone_number = "'" . $row[3] . "'";
        $address = "'" . $row[4] . "'";
        echo '<td>
                <button type="button" onclick="modalFill('.$user_id.','.$first_name.','.$last_name.','.$phone_number.','.$address.')" class="btn btn-info" data-toggle="modal" data-target="#myModal">View</button>
              </td>';
        echo '<td>
                <button type="button" onclick="resetPasswordAdmin('.$user_id.')" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Reset</button>
              </td>';
        }
        echo "</tr>";
      }
      echo "</tbody></table>";
    }


  function createCustomer(){
    $conn = connectDB();
    $id = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    q_createCustomer($conn, $id, $first_name, $last_name, $phone_number, $address);
    // used to be this at top
    // <div class="modal-content">
    //         <div class="modal-header">
    //           <button type="button" class="close" data-dismiss="modal">&times;</button>
    //           <h4 class="modal-title">Customer Information</h4>
    //         </div>
    //         <div class="modal-body">
    echo '<div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="usr">User:</label>
            </div>
            <div class="col-md-4">
              <input id="user_id" class="form-control" type="text" name="user_id" value="'.$id.'" readonly>
            </div>
          </div><hr>
          <div class="row">
            <div class="col-md-offset-2 col-md-3">
              <label for="usr">Password:</label>
            </div>
            <div class="col-md-4">
              <input id="password" class="form-control modalInput" type="pwd" name="password" value="">
            </div>
          </div><hr>';
          // used to be this at bottom
          // <div class="modal-footer">
          //   <button id="createAuthenticationBtn" style="text-align: center;" type="button" class="btn btn-success">Submit</button>
          //   <button id="closeModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          // </div>
          // </div>
          //   </div>
          // </div>
  }

  function editCustomer(){
    session_start();
    $conn = connectDB();
    echo "customer editted";
    if(isset($_POST['email'])){
      $id = $_POST['email'];
    } else {
      $id = $_SESSION['user_id'];
    }
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    q_editCustomer($conn, $id, $first_name, $last_name, $phone_number, $address);
    $conn->close();
  }

  function deleteCustomer(){
    $conn = connectDB();
    echo "customer editted";
    $id = $_POST['email'];
    q_deleteCustomer($conn, $id);
    $conn->close();
  }?>
