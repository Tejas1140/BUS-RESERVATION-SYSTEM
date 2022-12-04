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
	<title>Employee</title>
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
			<li class="active"> <a href="employee.php">Employee</a></li>
			<li class="#"> <a href="enquiry.php">Enquiries</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="about.php">About Us</a></li>
			<!-- <li class="#"> <a href="contact.php">Contact</a></li> -->
			<li class="#"> <a href="logout.php">Logout</a></li>
			
			<?php }?>
		</ul>
		<div class="title">
		<h1>B.V.P.<span>TRAVELS</span></h1>
		<h2>Employee <span>Details</span> </h2>	
		</div>
        
        <div class="container">
		<form method='post' action='deleteemp.php'>
			<div class="container" style="margin-top:250px" >
			<div>
			<table class="table table-bordered table-striped table-hover" style="width:90%;">
			<thead data-toggle="tooltip" title="Employee records">
			<tr>
					<th> EMPLOYEE ID</th>
					<th> EMPLOYEE NAME</th>
					<th> EMAIL ID</th>
					<th> SALARY</th>
					<th> DESIGNATION</th>
                    <th> BUS ID</th>
			</tr>
			</thead>
			<tbody id="myTable">
			<?php
			
			$username = "root";
			$password = "";
			$database = "bus_management_system";
			$mysqli = new mysqli("localhost", $username, $password, $database);
			$query = "select Employee.Empid,Employee.Emp_name, Employee.emp_email, Employee.Salary, employee.Designation, Bus.Bus_id from ((Employee inner join Manages on Employee.Empid = Manages.Empid) inner join Bus on Bus.Bus_id = Manages.Bus_id);
			";
			
			if ($result = $mysqli->query($query)) {
			  while ($row = $result->fetch_assoc()) {
				  $field1name = $row["Empid"];
				  $field2name = $row["Emp_name"];
				  $field3name = $row["emp_email"];
				  $field4name = $row["Salary"];
				  $field5name = $row["Designation"];
                  $field6name = $row["Bus_id"];
				//   $field7name = $row["Designation"];
			?>
			<tr id="tr_<?= $field1name ?>">
			
					<td><?= $field1name ?></td>
					<td><?= $field2name ?></td>
					<td><?= $field3name ?></td>
					<td><?= $field4name ?></td>
					<td><?= $field5name ?></td>
                    <td><?= $field6name ?></td>
					
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
        <a href="#myModal" class="float-add" data-toggle="modal"><button name="add" id="add" class="btn btn-success btn-rounded my-float float-add" data-toggle="tooltip" title="Add record"><span class="glyphicon glyphicon-plus"></span> Add</button></a>

        <a href="#" class="float-del"><button  data-toggle="tooltip" title="Delete selected record"  type="submit" name="but_delete" id="del" class="btn btn-danger btn-rounded my-float float-del"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>

    </div>
    </form>

    <form method="post" action="insertemp.php">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Employee Record</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

        <div class="form-group">
            <label for="Empolyee ID">EMPLOYEE ID</label>
            <input type="number" class="form-control" id="Empid" name="field1" data-toggle="tooltip" title="Empolyee ID" required>
        </div>
        
        <div class="form-group">
        <label for="EMPLOYEE NAME">EMPLOYEE NAME</label>
        <input type="TEXT" class="form-control" id="Emp_name" name="field2" data-toggle="tooltip" title="EMPLOYEE NAME" required>
        </div>

        <div class="form-group">
            <label for="EMAIL ID">EMAIL ID</label>
            <input type="TEXT" class="form-control" id="emp_email" name="field3"  data-toggle="tooltip" title="EMAIL ID"  required>
        </div>

        <div class="form-group">
            <label for="PASSWORD">PASSWORD</label>
            <input type="TEXT" class="form-control" id="password" name="field4"  data-toggle="tooltip" title="PASSWORD"  required>
        </div>

        <div class="form-group">
            <label for="Salary">SALARY</label>
            <input type="NUMBER" class="form-control" id="Salary" name="field5"  data-toggle="tooltip" title="Salary" required>
        </div>

        <div class="form-group">
            <label for="JOINING DATE">JOINING DATE</label>
            <input type="date" class="form-control" id="Joining_date" name="field6"  data-toggle="tooltip" title="JOINING DATE" required>
        </div>

        <div class="form-group">
            <label for="Designation">DESIGNATION</label>
            <input type="TEXT" class="form-control" id="Designation" name="field7"  data-toggle="tooltip" title="Designation"  required>
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
