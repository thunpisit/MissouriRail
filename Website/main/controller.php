<?php
# This is the Business Logic Layer to handle everything between the front end
# and the database connectivity in the model
include("model/userDAL.php");
include("model/customerDAL.php");
include("portalController.php");
if(isset($_POST['action']) && !empty($_POST['action'])) {
  $action = $_POST['action'];
  switch($action) {
      case 'printCustomers' : printCustomers(); break;
      case 'createCustomer' : createCustomer(); break;
      case 'editCustomer' : editCustomer(); break;
      case 'deleteCustomer': deleteCustomer(); break;
      case 'getCars':
        $conn = connectDB();
        $company_id = $_POST['company_id'];
        $location = $_POST['location'];
        printCarsTable($conn, $company_id, $location);
        break;

      case 'updateInfo':
        session_start();
        $user = $_SESSION['user_id'];
        echo "user = " . $user;
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $status = $_POST['status'];
        $rank = $_POST['rank'];
        updateEmployeeInfo($user, $first_name, $last_name, $status, $rank);
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

  // signs user up then returns 1 on success and 0 on fail
  function signUp($conn, $user, $pass, $add_equipment,
  $add_conductor, $monitor_train, $add_train, $add_engineer,
  $reset_pass, $edit_user, $ssn){
    if(q_checkUser($conn, $user) < 1){
      q_signUp($conn, $user, $pass, $add_equipment,
      $add_conductor, $monitor_train, $add_train, $add_engineer,
      $reset_pass, $edit_user, $ssn);

      $user = $_SESSION['signup_user'];
      $action = 'signup by user on ';
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

  function primaryMenuBar(){
    if(isset($_SESSION['user_id'])){
      echo '<form action="../model/logout.php" method="post">
              <span class=navbar-btn>
                <input id="height100" type="submit" name="submit" class="btn btn-danger" value="Logout">
              </span>
            </form>';
    } else {
      echo '<a id="text-white" class="btn btn-success" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>';
    }
  }

  function secondaryMenuBar(){
    if($_SESSION['reset_pass'] != 1){
      echo '<a href="#">Portal</a>';
    } else {
      echo '<a href="adminlog.php">Admin Portal</a>';
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
                <button type="button" onclick="modalFill('.$user_id.','.$first_name.','.$last_name.','.$phone_number.','.$address.')" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal">Customer Information</button>
              </td>';
        }
        echo "</tr>";
      }
      echo "</tbody></table>";
    }


  function createCustomer(){
    $conn = connectDB();
    echo "customer created";
    $id = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    q_createCustomer($conn, $id, $first_name, $last_name, $phone_number, $address);
  }

  function editCustomer(){
    $conn = connectDB();
    echo "customer editted";
    $id = $_POST['email'];
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
