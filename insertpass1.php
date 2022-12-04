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

$P_id = $_POST['field1'];
$Gender = $mysqli->real_escape_string($_POST['field2']);
$DOB = $mysqli->real_escape_string($_POST['field3']);
$F_name = $mysqli->real_escape_string($_POST['field4']);
$M_name = $mysqli->real_escape_string($_POST['field5']);
$L_name = $mysqli->real_escape_string($_POST['field6']);
$Email_ID = $mysqli->real_escape_string($_POST['field7']);
$password = $mysqli->real_escape_string($_POST['field8']);
$Phone_no = $mysqli->real_escape_string($_POST['field9']);

$user_check = "SELECT * FROM passenger";
    $res = $mysqli->query($user_check);
   
        $query = "INSERT INTO passenger(P_id,Gender,DOB,F_name,M_name,L_name,Email_ID,password,Phone_no)
        VALUES ('{$P_id}','{$Gender}','{$DOB}','{$F_name}','{$M_name}','{$L_name}','{$Email_ID}',
        '{$password}','{$Phone_no}')";

      $result = $mysqli->query($query);
      if($result)
      {
      $_SESSION['fieldinsert'] = "  Successfully inserted!";
      }


$mysqli->close();

header('Location: search_pass.php');
?>
</body>
</html>