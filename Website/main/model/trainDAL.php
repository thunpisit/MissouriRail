<?php
  function q_createTrain($conn, $train, $company){
    $query = "INSERT INTO train (train_num, company_id) VALUES(?, ?)";
    $stmt = $conn->stmt_init();

    if(!mysqli_stmt_prepare($stmt, $query)) {
        printf("Error: %s.\n", $stmt->error);
      return;
    }

    $stmt->bind_param("ss",$train, $user);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result;
  }

  function q_editTrain($conn, $train, $company){
    
  }
 ?>
