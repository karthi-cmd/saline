<?php

session_start();

include('./firebase/dbcon.php');

if(isset($_POST['save'])){
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $unit = $_POST['unit'];
  $deviceid = $_POST['deviceid'];

  $postData = [
    'name' => $name,
    'desc' => $desc,
    'unit' => $unit,
    'deviceid' => $deviceid,
  ];

  $ref_table = 'variables';  //table Name

  $postRef = $database->getReference($ref_table)->push($postData);

  if($postRef)
  {
    $_SESSION['success'] = 'Variable Created Successfully';
    header('Location: variables.php');
    exit();
  }
  else
  {
    $_SESSION['error'] = 'Variable not created';
    header('Location: variables.php');
    exit();
  }

}

?>