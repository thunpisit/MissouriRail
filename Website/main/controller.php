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

  function login($user, $pass){
    if(q_checkUser($conn ,$user) > 0){
      q_loginUser($conn, $user, $pass);
    } else {
      echo "account not found";
    }
  }



 ?>
