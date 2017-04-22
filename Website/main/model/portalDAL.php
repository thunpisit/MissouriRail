<?php
  function q_getEmployeeInfo($conn, $user){
    $query = "SELECT first_name, last_name, status, employee_rank FROM conductor
    WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  function q_getEngineer($conn, $user){
    $query = "SELECT first_name, last_name, status, employee_rank, hours_traveling FROM engineer
    WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  function q_getCustomer($conn, $user){
    $query = "SELECT first_name, last_name, phone_number, address FROM customer
    WHERE email=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  function q_getAdmin($conn, $user){
    $query = "SELECT first_name, last_name, status, job_title FROM administrator
    WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  function q_updateAdminInfo($conn, $user, $fname, $lname, $status, $job_title){
    $query = "UPDATE administrator SET first_name=?, last_name=?, status=?, job_title=?  WHERE user_id = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("sssss", $fname, $lname, $status, $job_title, $user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;

  }


  function q_updateEmployeeInfo($conn, $user, $first_name, $last_name, $status, $rank, $hours){
    if($hours == 0){
      $query = "UPDATE conductor SET first_name=?, last_name=?, status=?, employee_rank=?  WHERE user_id = ?";
      $stmt = $conn->stmt_init();

      if(!mysqli_stmt_prepare($stmt, $query)) {
          printf("Error: %s.\n", $stmt->error);
        return;
      }

      $stmt->bind_param("sssss", $first_name, $last_name, $status, $rank, $user);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result;
  } else {
    $query = "UPDATE engineer SET first_name=?, last_name=?, status=?, employee_rank=?, hours_traveling=?  WHERE user_id = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("ssssss", $first_name, $last_name, $status, $rank, $hours, $user);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
  }
  }
 ?>
