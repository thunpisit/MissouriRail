<?php
  include "controller.php";
  topStart();
  ?>
  <?php
  if(isset($_SESSION['user_id'])){
    if($_SESSION['reset_pass']==1){
      header("Location: dashboard-admin.php");
    }else if($_SESSION['monitor_train']==1){
      header("Location: dashboard-employee.php");
    }else{
      header("Location: dashboard-customer.php");
    }
  }else{
    header("Location: login.php");
  }
  if(!isset($_SESSION['user_id'])){
    session_destroy();
  }
?>
