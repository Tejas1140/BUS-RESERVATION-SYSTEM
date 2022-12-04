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

$Empid = $_POST['field1'];
$Emp_name = $mysqli->real_escape_string($_POST['field2']);
$emp_email = $mysqli->real_escape_string($_POST['field3']);
$password = $mysqli->real_escape_string($_POST['field4']);
$salary = $_POST['field5'];
$Joining_date = $mysqli->real_escape_string($_POST['field6']);
$Designation = $mysqli->real_escape_string($_POST['field7']);

$user_check = "SELECT * FROM EMPLOYEE";
    $res = $mysqli->query($user_check);
   
        $query = "INSERT INTO EMPLOYEE(Empid,Emp_name,emp_email,password,salary,Joining_date,Designation)
        VALUES ('{$Empid}','{$Emp_name}','{$emp_email}','{$password}','{$salary}','{$Joining_date}','{$Designation}')";
      $result = $mysqli->query($query);
      if($result)
      {
      $_SESSION['fieldinsert'] = "  Successfully inserted!";
      }
$mysqli->close();
header('Location: employee.php');


?>
</body>
</html>