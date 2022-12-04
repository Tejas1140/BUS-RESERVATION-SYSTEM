<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2_1.css">
</head>
<body>
<?php
session_start();
$username = "root";
$Bus_id = "";
$database = "bus_management_system";

$mysqli = new mysqli("localhost", $username, $Bus_id, $database);

$Empid = $_POST['field8'];
$Bus_id = $_POST['field9'];
$user_check = "SELECT * FROM manages";
    $res = $mysqli->query($user_check);
   
        $query = "INSERT INTO manages(Empid,Bus_id)
        VALUES ('{$Empid}','{$Bus_id}')" ;
      $result = $mysqli->query($query);
      if($result)
      {
      $_SESSION['fieldinsert'] = "  Successfully inserted!";
      }
$mysqli->close();
header('Location: manages.php');
?>
</body>
</html>