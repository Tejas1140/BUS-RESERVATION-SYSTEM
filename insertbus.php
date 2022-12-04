<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style2_1.css">
</head>
<body>
<?php
session_start();
$username = "root";
$password = "";
$database = "bus_management_system";

$mysqli = new mysqli("localhost", $username, $password, $database);

$Bus_id = $_POST['field1'];
$Arrival_time = $mysqli->real_escape_string($_POST['field2']);
$Departure_time = $mysqli->real_escape_string($_POST['field3']);
$Schedule_date = $mysqli->real_escape_string($_POST['field4']);
$Source = $mysqli->real_escape_string($_POST['field5']);
$Destination = $mysqli->real_escape_string($_POST['field6']);
$Bus_type = $mysqli->real_escape_string($_POST['field7']);
$Capacity = $_POST['field8'];
$No_plate = $mysqli->real_escape_string($_POST['field9']);
$Price = $_POST['field10'];



$original_date = "$Schedule_date";

$timestamp = strtotime($original_date);

$new_date = date("y-m-d", $timestamp);


$user_check = "SELECT * FROM bus";
    $res = $mysqli->query($user_check);
   
        $query = "INSERT INTO bus(Bus_id,Arrival_time ,Departure_time , Schedule_date, Source ,Destination,Bus_type,Capacity,No_plate,Price)
        VALUES ('{$Bus_id}','{$Arrival_time}','{$Departure_time}','{$new_date}','{$Source}','{$Destination}','{$Bus_type}','{$Capacity}',
        '{$No_plate}','{$Price}')";

      $result = $mysqli->query($query);
      if($result)
      {
      $_SESSION['fieldinsert'] = "  Successfully inserted!";
      }


$mysqli->close();

header('Location: searchbox.php');
?>
</body>
</html>