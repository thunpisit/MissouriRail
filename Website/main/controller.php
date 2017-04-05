<?php
# This is the Business Logic Layer to handle everything between the front end
# and the database connectivity in the model

  function topStart(){
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
        $_SESSION['user_id'] = $user;
        // echo "trying to redirect";
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
    include("../model/userDAL.php");
    if(q_checkUser($conn, $user) < 1){
      q_signUp($conn, $user, htmlspecialchars($_POST['pwd']), htmlspecialchars($_POST['add_equipment']),
      htmlspecialchars($_POST['add_conductor']), htmlspecialchars($_POST['monitor_train']),
      htmlspecialchars($_POST['add_train']), htmlspecialchars($_POST['add_engineer']),
      htmlspecialchars($_POST['reset_pass']), htmlspecialchars($_POST['edit_user']),
      htmlspecialchars($_POST['ssn']));
      return 1;
    } else {
      return 0;
    }
  }




 ?>
