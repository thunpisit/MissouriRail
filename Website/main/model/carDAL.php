<?php
class Car{
  public $serial_num;
  public $load_capacity;
  public $type;
  public $location;
  public $manufacturer;
  public $price;
  public $train_num;
  public $customer_id;

  public __construct($serial, $load, $type, $location, $manufacturer, $price, $train, $customer){
    $this->$serial_num = $serial;
    $this->$load_capacity = $load;
    $this->$type = $type;
    $this->$location = $location;
    $this->$manufacturer = $manufacturer;
    $this->$price = $price;
    $this->$train_num = $train;
    $this->$customer_id = $customer;
  }
}

function q_reserveCar($conn, $serial, $train, $customer){
  $query = "UPDATE car SET train_num = ?, customer_id = ? WHERE serial_num=?";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $stmt->bind_param("iss", $train, $customer, $serial);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result;
}

function q_carInfo($conn, $serial){
  $query = "SELECT * FROM car WHERE serial_num = ?";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $stmt->bind_param("s", $serial);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_array(MYSQLI_NUM);

  $carInfo = new Car($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
  return $carInfo;

}

//when putting into this function both train and customer_id aren't inserted into because
//they only get values after reserved and that doesn't happen the moment the car is created
function q_createCar($conn, $serial, $load, $type, $location, $manufacturer, $price){
  $query = "INSERT INTO car (serial_num, load_capacity, type, location, manufacturer, price) VALUES(?, ?, ?, ?, ?, ?)";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $stmt->bind_param("sssssd", $serial, $load, $type, $location, $manufacturer, $price);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result;
}

function q_editCar($conn, $serial, $load, $type, $location, $manufacturer, $price){
  $query = "UPDATE car SET load_capacity = ?, type = ?, location = ?, manufacturer = ?, price = ? WHERE serial_num = ?";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $stmt->bind_param("ssssds", $load, $type, $location, $manufacturer, $price, $serial);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result;
}
 ?>
