<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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
        <li class="#"><a href="index.php">Home</a></li>
			<li a class="active"><a href="searchbox.php" title="Search">Search</a></li>
            <li class="#"> <a href="passenger.php">Passenger</a></li>
			<li class="#"> <a href="ticket.php">Ticket</a></li>
			<li class="#"> <a href="employee.php">Employee</a></li>
			<li class="#"> <a href="enquiry.php">Enquiries</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About Us</a></li>
			<li class="#"> <a href="contact.php">Contact</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
		</ul>
		<div class="title">
		<h1>B.V.P.<span>TRAVELS</span></h1>
		<h2>SEARCH <span>RESULT</span> </h2>	
		</div>
        
        <div class="container">
		<form method='post' action='search_pass.php'>
			<div class="container" style="margin-top:250px" >
			<div>
			<table class="table table-bordered table-striped table-hover" style="width:90%;">
			<thead data-toggle="tooltip" title="Bus records">
			<tr>
					<th> BUS ID </th>
					<th> ARRIVAL TIME</th>
					<th> DEPARTURE TIME</th>
					<th> SCHEDULE DATE</th>
					<th> SOURCE</th>
                    <th> DESTINATION</th>
                    <th> BUS TYPE</th>
                    <th> CAPACITY</th>
                    <th> NO PLATE</th>
                    <th> PRICE</th>
			</tr>
			</thead>
			<tbody id="myTable">
			<?php
			$username = "root";
			$password = "";
			$database = "bus_management_system";
			$mysqli = new mysqli("localhost", $username, $password, $database);
            require('header.php');
            // echo Encrypt('12345');
    
            if (isset($_POST['search_bt'])) 
            {
                
                
            $date = $_POST['date'];
            $source = $_POST['source'];
            $destination = $_POST['destination'];
            $timestamp = strtotime($date);
            $new_date = date("y-m-d", $timestamp);
            if(!empty($source)){
			$query = "SELECT * FROM bus where bus.Source='$source' AND bus.Destination='$destination' or bus.Schedule_date='$new_date'";
        }else 
			if ($result = $mysqli->query($query)) {
			  while ($row = $result->fetch_assoc()) {
				  $field1name = $row["Bus_id"];
				  $field2name = $row["Arrival_time"];
				  $field3name = $row["Departure_time"];
				  $field4name = $row["Schedule_date"];
				  $field5name = $row["Source"];
                  $field6name = $row["Destination"];
				  $field7name = $row["Bus_type"];
				  $field8name = $row["Capacity"];
				  $field9name = $row["No_plate"];
				  $field10name = $row["Price"];
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
					<td><?= $field10name ?></td>
					<td><input type='checkbox' name='delete[]' value='<?= $field1name ?>' style="cursor:pointer;" ></td>
			 
				</tr>
				<?php
				 }
                }
			  $result->free();
            header('location:search_pass.php');
        }else
        {
            $_SESSION['flag'] = 'Incorrect Credentials.';
        }
				?>
			</tbody>
			</table>
			</div>
			
		</div>
    </header>
</body>
</html>