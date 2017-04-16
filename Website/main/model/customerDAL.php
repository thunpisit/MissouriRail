<?php
  function q_createCustomer($conn, $id, $fName, $lName, $phone, $address){
    $query = "INSERT INTO customer (email, first_name, last_name, phone_number, address) VALUES(?, ?, ?, ?, ?)";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("sssis", $id, $fName, $lName, $phone, $address);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  function q_editCustomer($conn, $id, $fName, $lName, $phone, $address){
    $query = "UPDATE customer SET first_name=?, last_name=?, phone_number=?, address=?  WHERE email = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("ssiss", $fName, $lName, $phone, $address, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }


  function q_getCustomers($conn){
    $query = "SELECT email as 'Email', first_name as 'First Name', last_name as 'Last Name',
    phone_number as 'Phone Number', address as 'Address' FROM customer";
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
    $query = "DELETE FROM customer WHERE email=?";
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
