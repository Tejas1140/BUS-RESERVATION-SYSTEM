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


$Name = $mysqli->real_escape_string($_POST['name']);
$Subject = $mysqli->real_escape_string($_POST['subject']);
$Message = $mysqli->real_escape_string($_POST['message']);
$Email_id = $mysqli->real_escape_string($_POST['email']);
$Phone_no = $mysqli->real_escape_string($_POST['phone']);

$user_check = "SELECT * FROM booking_enquiry";
    $res = $mysqli->query($user_check);
   
        $query = "INSERT INTO booking_enquiry(Name, Subject ,Message , Email_id, Phone_no)
        VALUES ('{$Name}','{$Subject}','{$Message}','{$Email_id}','{$Phone_no}')";

      $result = $mysqli->query($query);
      if($result)
      {
          $_SESSION['fieldinsert'] = "Successfully inserted!";
      }


$mysqli->close();
header('Location: contact.php');
?>
</body>
</html>