<?php
  session_start();
  if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] !='yes') {
    header('Location:login.php');
    exit;
  } else {
    header('Location:manage-items.php');
  }
?>