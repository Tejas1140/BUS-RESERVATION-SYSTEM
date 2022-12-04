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

//$Total_Price = $_POST['field1'];
$Total_Price =$_POST['field2'];
$Seat_No = $mysqli->real_escape_string($_POST['Seat_No']);
$Payment_mode = $mysqli->real_escape_string($_POST['Payment_mode']);
$Travel_Date = $mysqli->real_escape_string($_POST['field5']);
$Payment_ID = $mysqli->real_escape_string($_POST['field6']);
$Purchase_date = $mysqli->real_escape_string($_POST['field7']);
$P_id = $_POST['field8'];
$Bus_id =$_POST['field9'];

$user_check = "SELECT * FROM ticket";
    $res = $mysqli->query($user_check);
   
        $query = "INSERT INTO ticket(Total_Price,Seat_No,Payment_mode,Travel_Date,Payment_ID,Purchase_date,P_id,Bus_id)
        VALUES ('{$Total_Price}','{$Seat_No}','{$Payment_mode}','{$Travel_Date}','{$Payment_ID}','{$Purchase_date}','{$P_id}',
        '{$Bus_id}')";

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