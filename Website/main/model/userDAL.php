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

    // $result = $stmt->get_result();
    }
  }

  function q_getPermissions($conn, $user){
    $query = "SELECT add_equipment, add_conductor, monitor_train, add_train, add_engineer, reset_pass, edit_user
    FROM authentication WHERE user_id = ?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
    } else {
    mysqli_stmt_bind_param($stmt, "s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
    }
  }

  function q_checkEngineer($conn, $user){
    $query = "SELECT * FROM engineer WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        die("something went wrong");
    } else {
      mysqli_stmt_bind_param($stmt, "s", $user);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->num_rows;
    }
  }

  function q_printTable($conn, $table){
    $query = "SELECT * FROM $table";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        die("table does not exist");
    } else {
      $stmt->execute();
      $result = $stmt->get_result();
      return $result;
    }
  }

  function q_printCarsTable($conn, $company_id, $location){
    if($location == 'all'){
      $query = "SELECT `car`.`serial_num`, `car`.`load_capacity`, `car`.`type`, `car`.`location`, `car`.`price`, `car`.`customer_id`
      FROM `car`, `train`  WHERE `train`.`company_id` = ? AND `train`.`train_num` = `car`.`train_num`";
      $stmt = $conn->stmt_init();
      if(!mysqli_stmt_prepare($stmt, $query)) {
          die("table does not exist");
      } else {
        mysqli_stmt_bind_param($stmt, "s", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
      }
    } else {
      $query = "SELECT `car`.`serial_num`, `car`.`load_capacity`, `car`.`type`, `car`.`location`, `car`.`price`, `car`.`customer_id`
      FROM `car`, `train`  WHERE `train`.`company_id` = ? AND `train`.`train_num` = `car`.`train_num`
      AND `car`.`location` = ?";
      $stmt = $conn->stmt_init();
      if(!mysqli_stmt_prepare($stmt, $query)) {
          die("table does not exist");
      } else {
        mysqli_stmt_bind_param($stmt, "ss", $company_id, $location);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
      }
    }
  }

  function q_putLog($conn, $ip, $action, $date_time, $user_id){
    $query = "INSERT INTO log (ip_address, action, date_time, user_id) VALUES(?, ?, FROM_UNIXTIME(?), ?)";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("ssis", $ip, $action, $date_time, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;

    $result = $stmt->get_result();
    }

  function q_checkCustomer($conn, $user){
    $query = "SELECT * FROM customer WHERE email=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        die("something went wrong");
    } else {
      mysqli_stmt_bind_param($stmt, "s", $user);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->num_rows;
    }
  }?>
