<?php
  function q_getSchedule($conn){
    $query = "SELECT * FROM schedule ORDER BY `date` DESC";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
  }

  function q_createSchedule($conn, $depart_city, $dest_city, $depart_time, $dest_time, $date, $train){
    $query = "INSERT INTO schedule (depart_city, dest_city, depart_time, dest_time, `date`, train_num)
    VALUES (?,?,?,?,?,?)";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("sssssi", $depart_city, $dest_city, $depart_time, $dest_time, $date, $train);
    $stmt->execute();
    $result = $stmt->get_result();
  }

  function q_getDepartCity($conn, $train){
    $query = "SELECT dest_city FROM schedule WHERE train_num = ?
    ORDER BY `date` DESC, dest_time DESC LIMIT 1";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("s", $train);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  function q_getTrainNumbers($conn){
    $query = "SELECT train_num FROM train";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
  }

  function q_getCompanies($conn){
    $query = "SELECT company_id FROM company";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
  }

  function q_getTrainSchedules($conn){
    $query = "SELECT train.train_num, train.company_id, company.name AS 'Company Name',
    company.address AS 'Company Address', company.email AS 'Email', company.phone_number
    AS 'Phone Number' FROM train INNER JOIN company ON (train.company_id = company.company_id)";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
  }

  function q_trainNumber($conn, $location){
    $query = "SELECT train_num FROM schedule WHERE depart_city = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("s", $location);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
  }

  function q_createTrain($conn, $train, $company){
    $query = "INSERT INTO train (train_num, company_id) VALUES(?, ?)";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("is",$train, $user);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  function q_editTrain($conn, $train, $newTrain_num, $company){
    $query = "UPDATE train SET train_num = ?, company_id = ? WHERE train_num = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("isi",$newTrain_num, $user, $company_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  function q_getLocation($conn, $train){
    $query = "SELECT location FROM car WHERE train_num = ?";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("i", $train);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_array(MYSQLI_NUM);
    $location = $row[0];
    //This is to test that all the cars in the train are in the same location
    //If they are not I am not sure what action we want to take.
    while($row = $result->fetch_array(MYSQLI_NUM)){
      if($location != $row[0]){
        //Some Error Checking???
      }
    }

    return $location;
  }
 ?>
