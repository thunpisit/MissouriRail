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

  public function __construct($serial, $load, $type, $location, $manufacturer, $price, $train, $customer){
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

function q_getAllCars($conn){
  $query = "SELECT * FROM car";
  $stmt = $conn->stmt_init();
  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}

function q_getLocations($conn){
  $query = "SELECT DISTINCT depart_city FROM schedule";
  $stmt = $conn->stmt_init();
  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}

function q_getTypes($conn){
  $query = "SELECT DISTINCT type FROM car";
  $stmt = $conn->stmt_init();
  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}

function q_getCarInfo($conn, $serial, $type){
  switch ($type) {
    case 'form':
        $query = "SELECT load_capacity, type, location, price FROM car
        WHERE serial_num=?";
        $stmt = $conn->stmt_init();

        if(!mysqli_stmt_prepare($stmt, $query)) {
            printf("Error: %s.\n", $stmt->error);
          return;
        }

        $stmt->bind_param("s", $serial);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array();
      break;

    case 'form_admin':
        $query = "SELECT car.load_capacity, car.type, car.location, car.price,
        car.train_num, schedule.date, schedule.depart_time, schedule.dest_time,
        car.customer_id FROM car, schedule WHERE car.train_num = schedule.train_num
        AND car.serial_num = ?";
        $stmt = $conn->stmt_init();

        if(!mysqli_stmt_prepare($stmt, $query)) {
            printf("Error: %s.\n", $stmt->error);
          return;
        }

        $stmt->bind_param("s", $serial);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_array();
      break;

    default:
      echo "Error: $type does not exist";
      break;
  }

}

function q_updateEquipment($conn, $method, $serial, $load, $type, $location, $price, $train, $date, $depart, $dest, $customer){
  switch ($method) {
    case 'car':
        $query = "UPDATE car SET load_capacity = ?, type = ?, location = ?,
        price = ?, train_num = ?, customer_id = ? WHERE serial_num = ?";
        $stmt = $conn->stmt_init();
        if(!mysqli_stmt_prepare($stmt, $query)) {
            printf("Error: %s.\n", $stmt->error);
          return;
        }
        $stmt->bind_param("sssssss", $load, $type, $location, $price, $train, $customer, $serial);
        $stmt->execute();
      break;

    case 'schedule':
        // $query = "";
        // $stmt = $conn->stmt_init();
        // if(!mysqli_stmt_prepare($stmt, $query)) {
        //     printf("Error: %s.\n", $stmt->error);
        //   return;
        // }
        // $stmt->bind_param("", );
        // $stmt->execute();
        // $result = $stmt->get_result();

      break;

    default:
      # code...
      break;
  }
}


function q_reserveCar($conn, $customer, $serial){
  $query = "UPDATE car SET customer_id = ? WHERE serial_num=?";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $stmt->bind_param("ss", $customer, $serial);
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

function q_getNewCarSerial($conn){
  $query = "SELECT serial_num FROM car ORDER BY serial_num DESC LIMIT 1";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }
  $stmt->execute();
  $result = $stmt->get_result();
  $array = $result->fetch_array();
  $newInt = $array[0] + 1;
  $newSerial = "00".$newInt;
  return $newSerial;
}

function q_getNewCarLocation($conn, $train){
  $query = "SELECT depart_city FROM schedule WHERE train_num = ?";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $stmt->bind_param("i", $train);
  $stmt->execute();
  $result = $stmt->get_result();
  $array = $result->fetch_array();
  $location = $array[0];
  return $location;
}

//when putting into this function both train and customer_id aren't inserted into because
//they only get values after reserved and that doesn't happen the moment the car is created
function q_createCar($conn, $serial, $load, $type, $location, $train, $customer, $price){
  $query = "INSERT INTO car (serial_num, load_capacity, type, location, price, train_num, customer_id)
  VALUES(?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $stmt->bind_param("ssssdis", $serial, $load, $type, $location, $price, $train, $customer);
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
