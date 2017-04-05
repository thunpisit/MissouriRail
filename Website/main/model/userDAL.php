<?php
  function q_checkUser($conn, $user){
    $query = "SELECT * FROM authentication WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
    } else {
    mysqli_stmt_bind_param($stmt, "s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $numberReturned = $result->num_rows;
    return $numberReturned;
    }
  }

  function q_loginUser($conn, $user, $pass){
    $query = "SELECT * FROM authentication WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare($query)){
      exit();
    }

    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_array(MYSQLI_NUM)){
      if($row[0] == $user && password_verify($pass, $row[1])){
        return 1;
      }
    }
    return 0;
  }

  function q_signUp($conn, $user, $pass, $add_equipment, $add_conductor, $monitor_train, $add_train, $add_engineer, $reset_pass, $edit_user, $ssn){
    $query = "INSERT INTO authentication(user_id, password, add_equipment, add_conductor, monitor_train, add_train, add_engineer, reset_pass, edit_user, ssn)
    VALUES(?,?,?,?,?,?,?,?,?,?);";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
    } else {
    $password = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssiiiiiiis", $user, $password, $add_equipment, $add_conductor, $monitor_train, $add_train, $add_engineer, $reset_pass, $edit_user, $ssn);
    $stmt->execute();
    $result = $stmt->get_result();
    }
  }?>
