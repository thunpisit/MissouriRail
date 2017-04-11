<?php

  class Customer{
    public $customer_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $address;

    function __construct($id, $fName, $mName, $lName, $em, $phone, $add){
      $this->$customer_id = $id;
      $this->$first_name = $fName;
      $this->$middle_name = $mName;
      $this->$last_name = $lName;
      $this->$email = $em;
      $this->$phone_number = $phone;
      $this->$address = $add;
    }

    public function get_customer_id(){
      return $this->$customer_id;
    }

    public function get_first_name(){
      return $this->$first_name;
    }

    public function get_middle_name(){
      return $this->$middle_name;
    }

    public function get_last_name(){
      return $this->$last_name;
    }

    public function get_email(){
      return $this->$email;
    }

    public function get_phone_number(){
      return $this->$phone_number;
    }

    public function get_address(){
      return $this->$address;
    }
  }//End of Class

  function q_customerInfo($conn, $customer_id){
    $query = "SELECT * FROM customer WHERE customer_id = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_NUM);

    $customerInfo = new Customer($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
    return $customerInfo;
  }

  function q_createCustomer($conn, $id, $fName, $mName, $lName, $email, $phone, $address){
    $query = "INSERT INTO customer (customer_id, first_name, middle_name, last_name, email, phone_number, address) VALUES(?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("sssssis", $id, $fName, $mName, $lName, $email, $pnone, $address);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  function q_editCustomer($conn, $id, $fName, $mName, $lName, $email, $phone, $address){
    $query = "UPDATE customer SET (first_name, middle_name, last_name, email, phone_number, address) VALUES(?, ?, ?, ?, ?, ?) wHERE customer_id = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("ssssiss", $fName, $mName, $lName, $email, $pnone, $address, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

?>
