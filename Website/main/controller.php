<?php
# This is the Business Logic Layer to handle everything between the front end
# and the database connectivity in the model
include("model/userDAL.php");
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

  function login($conn, $user, $pass){
    if(q_checkUser($conn ,$user) > 0){
      if(q_loginUser($conn, $user, $pass) == 1){
        $add_equipmentArray = q_addEquipment($conn, $user);
        $add_conductorArray = q_addConductor($conn, $user);
        $monitor_trainArray = q_monitorTrain($conn, $user);
        $add_trainArray = q_addTrain($conn, $user);
        $add_engineerArray = q_addEnginner($conn, $user);
        $reset_passArray = q_resetPass($conn, $user);
        $edit_userArray = q_editUser($conn, $user);

        $_SESSION['user_id'] = $user;
        $_SESSION['reset_pass'] = $reset_passArray[0];
        $_SESSION['add_equipment'] = $add_equipmentArray[0];
        $_SESSION['add_conductor'] = $add_conductorArray[0];
        $_SESSION['monitor_train'] = $monitor_trainArray[0];
        $_SESSION['add_train'] = $add_trainArray[0];
        $_SESSION['add_engineer'] = $add_engineerArray[0];
        $_SESSION['edit_user'] = $edit_userArray[0];
        $action = $_SESSION['action'];

        getLog($conn, $user, $action);
        header("Location: dashboard.php");
      } else {
        echo "password incorrect";
      }
    } else {
      echo "user_id not found";
    }
  }

  // signs user up then returns 1 on success and 0 on fail
  function signUp($conn, $user){
    // include("model/userDAL.php");
    if(q_checkUser($conn, $user) < 1){
      q_signUp($conn, $user, htmlspecialchars($_POST['pwd']), htmlspecialchars($_POST['add_equipment']),
      htmlspecialchars($_POST['add_conductor']), htmlspecialchars($_POST['monitor_train']),
      htmlspecialchars($_POST['add_train']), htmlspecialchars($_POST['add_engineer']),
      htmlspecialchars($_POST['reset_pass']), htmlspecialchars($_POST['edit_user']),
      htmlspecialchars($_POST['ssn']));

      $user = $_SESSION['signup_user'];
      $action = 'signup by user on ';
      getLog($conn, $user, $action);
      header("Location: login.php");
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
      echo "<label>Number of rows in result:</label> $result->num_rows";
      echo "<table class='table table-striped table-bordered'><thead><tr>";
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
      echo "</tbody></table>";
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
    include("model/customerBLL.php");
    $conn = connectDB();
    echo "<div class='row'>";
    $result = q_customerNames($conn);
    if($result->num_rows > 0){
      // output data of each row
      echo "<label>Number of rows in result:</label> $result->num_rows";
      echo "<table class='table table-striped table-bordered'><thead><tr>";
      while($fieldName = mysqli_fetch_field($result)) {
          echo "<th>" . $fieldName->name . "</th>";
      }
      echo "<th>Customer Information</th>";
      echo "</tr></thead><tbody>";
      while($row = $result->fetch_array(MYSQLI_NUM)) {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        $first_name = "'" . $row[0] . "'";
        $last_name = "'" . $row[1] . "'";
        echo '<td>
                <button type="button" onclick="modalFill('.$first_name.','.$last_name.')" class="btn btn-info" data-toggle="modal" data-target="#myModal">Customer Information</button>
              </td>';
        }
        echo "</tr>";
      }
      echo "</tbody></table>";
    echo "</div>";
    }


  function createCustomer(){
    include("model/customerBLL.php");
    $conn = connectDB();
    $id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    q_createCustomer($conn, $id, $first_name, $last_name, $email, $phone_number, $address);
  }?>
