<?php
require('header.php');
if(!isset($_SESSION['loginType']))
{
	header('location:login1.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ticket</title>
	<link rel="stylesheet" type="text/css" href="css/style2_1.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="logo.png">
			</div>
		</div>
		<ul>
		<?php if($_SESSION['utype']=='Passenger'){?>
			<li class="#"><a href="index.php">Home</a></li>
			<li><a class="#" href="search_pass.php" title="Search">Search</a></li>
			<li class="active"><a href="ticket_pass.php">My Ticket</a></li>
			<li class="#"> <a href="contact.php">Contact</a></li>
			<li class="#"> <a href="gallery.php">Gallery</a></li>
			<li class="#"> <a href="about.php">About Us</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }else{?>
				<li class="#"><a href="index.php">Home</a></li>
			<li><a class="#" href="searchbox.php" title="Search">Search</a></li>
			<li class="#"> <a href="passenger.php">Passenger</a></li>
			<li class="active"> <a href="ticket.php">Ticket</a></li>
			<li class="#"> <a href="employee.php">Employee</a></li>
			<li class="#"> <a href="enquiry.php">Enquiries</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About Us</a></li>
			<!-- <li class="#"> <a href="contact.php">Contact</a></li> -->
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }?>
		</ul>
		<div class="title">
		<h1>B.V.P.<span>TRAVELS</span></h1>
		<h2>My <span>TICKETS</span> </h2>	
		</div>
<div class="container">
    <form method='post' action='deleteticket1.php'>
      <div class="container" style="margin-top:250px" >
      <div>
      <table class="table table-bordered table-striped table-hover" style="width:90%;">
      <thead data-toggle="tooltip" title="Ticket records">
      <tr>
          <th> TICKET NO</th>
          <th> TOTAL PRICE</th>
          <th> SEAT NO</th>
          <th> PAYMENT MODE</th>
          <th> TRAVEL DATE</th>
          <th> PAYMENT ID</th>
          <th> PURCHASE DATE</th>
          <th> PASSENGER ID</th>
          <th> BUS ID</th>
      </tr>
      </thead>
      <tbody id="myTable">
      <?php
      $username = "root";
      $password = "";
      $database = "bus_management_system";
      $mysqli = new mysqli("localhost", $username, $password, $database);
      $query = "SELECT * FROM ticket WHERE P_id='$_SESSION[uid]'";
      
      if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
          $field1name = $row["Ticket_no"];
          $field2name = $row["Total_Price"];
          $field3name = $row["Seat_No"];
          $field4name = $row["Payment_mode"];
          $field5name = $row["Travel_Date"];
          $field6name = $row["Payment_ID"];
          $field7name = $row["Purchase_date"];
          $field8name = $row["P_id"];
          $field9name = $row["Bus_id"];
      ?>
      <tr id="tr_<?= $field1name ?>">
      
          <td><?= $field1name ?></td>
          <td><?= $field2name ?></td>
          <td><?= $field3name ?></td>
          <td><?= $field4name ?></td>
          <td><?= $field5name ?></td>
          <td><?= $field6name ?></td>
          <td><?= $field7name ?></td>
          <td><?= $field8name ?></td>
          <td><?= $field9name ?></td>
          <td><input type='checkbox' name='delete[]' value='<?= $field1name ?>' style="cursor:pointer;" ></td>
       
        </tr>
        <?php
         }
        $result->free();
      }
        ?>
      </tbody>
      </table>
      </div>
      
    </div>
        
        </header>
    
    <div class="btn1">
        <a href="#" class="float-del"><button  data-toggle="tooltip" title="Delete selected record"  type="submit" name="but_delete" id="del" class="btn btn-danger btn-rounded my-float float-del"><span class="glyphicon glyphicon-trash"></span> CANCEL TICKET</button></a>
    </div>
    </form>
    </header>
</body>
</html>