<?php
  $dsn = 'mysql:host=localhost;dbname=S0329939';
  $user = 'S0329939';
  $password = 'BenchaterMarouane2020';

  try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
?>