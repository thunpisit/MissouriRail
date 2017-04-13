<?php
  function q_createCustomer($conn, $id, $fName, $lName, $email, $phone, $address){
    $query = "INSERT INTO customer (user_id, first_name, last_name, email, phone_number, address) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("ssssis", $id, $fName, $lName, $email, $phone, $address);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  function q_editCustomer($conn, $id, $fName, $lName, $email, $phone, $address){
    $query = "UPDATE customer SET first_name=?, last_name=?, email=?, phone_number=?, address=?  WHERE user_id = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("sssiss", $fName, $lName, $email, $phone, $address, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }


  function q_getCustomers($conn){
    $query = "SELECT user_id, first_name as 'First Name', last_name as 'Last Name', email, phone_number, address  FROM customer";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
  }

  function q_deleteCustomer($conn, $id){
    $query = "DELETE FROM customer WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
  }


?>
