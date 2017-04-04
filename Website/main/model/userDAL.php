<?php
  function q_checkUser($conn, $user){
    $query = "SELECT * FROM users WHERE user_name=?";
    $stmt = $conn->stmt_init();
    // failsafe for sql query
    if(!$stmt->prepare($query)){
      exit();
    }

    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $numberReturned = $result->num_rows;
    return $numberReturned;
  }

  function q_loginUser($conn, $user, $pass){
    
  }

 ?>
