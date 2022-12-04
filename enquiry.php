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
	<title>ENQUIRY</title>
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
			<li class="#"> <a href="contact.php">Contact</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }else{?>
				<li class="#"><a href="index.php">Home</a></li>
			<li><a class="#" href="searchbox.php" title="Search">Search</a></li>
			<li class="#"> <a href="passenger.php">Passenger</a></li>
			<li class="#"> <a href="ticket.php">Ticket</a></li>
			<li class="#"> <a href="employee.php">Employee</a></li>
			<li class="active"> <a href="enquiry.php">Enquiries</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About Us</a></li>
			<!-- <li class="#"> <a href="contact.php">Contact</a></li> -->
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }?>
		</ul>
		<div class="title">
		<h1>B.V.P.<span>TRAVELS</span></h1>
		<h2>Enquiry <span>Details</span> </h2>	
		</div>

        <div class="container">
		<form method='post' action='deletequery.php'>
			<div class="container" style="margin-top:250px" >
			<div>
			<table class="table table-bordered table-striped table-hover" style="width:90%;">
			<thead data-toggle="tooltip" title="Enquiry records">
			<tr>
					<th> ENQUIRY ID</th>
					<th> PASSENGER NAME</th>
					<th> SUBJECT</th>
					<th> MESSAGE</th>
					<th> EMAIL ID</th>
                    <th> PHONE NO</th>
                    <th> PASSENEGR ID</th>
                    <th> EMPLOYEE ID</th>
			</tr>
			</thead>
			<tbody id="myTable">
			<?php
			$username = "root";
			$password = "";
			$database = "bus_management_system";
			$mysqli = new mysqli("localhost", $username, $password, $database);
			$query = "SELECT * FROM BOOKING_ENQUIRY";
			
			if ($result = $mysqli->query($query)) {
			  while ($row = $result->fetch_assoc()) {
				  $field1name = $row["Query_id"];
				  $field2name = $row["Name"];
				  $field3name = $row["Subject"];
				  $field4name = $row["Message"];
				  $field5name = $row["Email_id"];
                  $field6name = $row["Phone_no"];
				  $field7name = $row["P_id"];
                  $field8name = $row["Empid"];
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
        <a href="#" class="float-del"><button  data-toggle="tooltip" title="Delete selected record"  type="submit" name="but_delete" id="del" class="btn btn-danger btn-rounded my-float float-del"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>

    </div>
    </form>

    <form method="post" action="insertquery.php">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Enquiry Record</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

        <div class="form-group">
        <label for="PASSENGER NAME">PASSENGER NAME</label>
        <input type="TEXT" class="form-control" id="Name" name="field2" data-toggle="tooltip" title="PASSENGER NAME" required>
        </div>

        <div class="form-group">
            <label for="SUBJECT">SUBJECT</label>
            <input type="TEXT" class="form-control" id="Subject" name="field3"  data-toggle="tooltip" title="SUBJECT" required>
        </div>

        <div class="form-group">
            <label for="Message">MESSAGE</label>
            <input type="TEXT" class="form-control" id="Message" name="field4"  data-toggle="tooltip" title="Message"  required>
        </div>

        <div class="form-group">
            <label for="EMAIL ID">EMAIL ID</label>
            <input type="TEXT" class="form-control" id="Email_id" name="field3"  data-toggle="tooltip" title="EMAIL ID"  required>
        </div>

        <div class="form-group">
            <label for="PHONE NO">PHONE NO</label>
            <input type="TEXT" class="form-control" id="Phone_no" name="field5"  data-toggle="tooltip" title="PHONE NO" required>
        </div>

        <div class="form-group">
            <label for="P_ID">PASSENGER ID</label>
            <input type="TEXT" class="form-control" id="P_id" name="field8"  data-toggle="tooltip" title="PASSENGER ID"  required>
        </div>

        <div class="form-group">
            <label for="EMPLOYEE ID">EMPLOYEE ID</label>
            <input type="TEXT" class="form-control" id="Empid" name="field9"  data-toggle="tooltip" title="EMPLOYEE ID"  required>
        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-toggle="tooltip" title="Cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" data-toggle="tooltip" title="Add record" class="btn btn-primary">Add</button>
                    </div>
                </div>  
            </div>
        </div>
    </form>
    </header>
</body>
</html>