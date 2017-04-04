<?php
  function q_checkUser($conn, $user){
    echo "<br />q_checkuser() in userDAL";
    $query = "SELECT * FROM authentication WHERE user_id=?";
    $stmt = $conn->stmt_init();
    if(!mysqli_stmt_prepare($stmt, $query)) {
        print "Failed to prepare statement\n";
    } else {
    mysqli_stmt_bind_param($stmt, "s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $numberReturned = $result->num_rows;
    echo "<br />numberReturned = $numberReturned";
    return $numberReturned;
    }
  }

  function q_loginUser($conn, $user, $pass){
    echo "<br />q_loginUser() in userDAL";
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

 ?>
