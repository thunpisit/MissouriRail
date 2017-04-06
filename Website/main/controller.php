<?php
# This is the Business Logic Layer to handle everything between the front end
# and the database connectivity in the model

  function topStart(){
    ob_start();
    session_start();
  }

  function connectDB(){
    include("secure/database.php");
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
  }

  function login($conn, $user, $pass){
    include("../model/userDAL.php");
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
    include("model/userDAL.php");
    if(q_checkUser($conn, $user) < 1){
      q_signUp($conn, $user, htmlspecialchars($_POST['pwd']), htmlspecialchars($_POST['add_equipment']),
      htmlspecialchars($_POST['add_conductor']), htmlspecialchars($_POST['monitor_train']),
      htmlspecialchars($_POST['add_train']), htmlspecialchars($_POST['add_engineer']),
      htmlspecialchars($_POST['reset_pass']), htmlspecialchars($_POST['edit_user']),
      htmlspecialchars($_POST['ssn']));
      header("Location: login.php");
    } else {
      return 0;
    }
  }




 ?>
