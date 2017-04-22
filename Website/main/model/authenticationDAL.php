<?php

function q_resetPassword($conn, $user, $newPassword){
  $query = "UPDATE authentication SET password=?  WHERE user_id = ?";
  $stmt = $conn->stmt_init();

  if(!mysqli_stmt_prepare($stmt, $query)) {
      printf("Error: %s.\n", $stmt->error);
    return;
  }

  $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

  $stmt->bind_param("ss", $hashedPasword, $user);
  $stmt->execute();
  $result = $stmt->get_result();

  return $result;
}

 ?>
