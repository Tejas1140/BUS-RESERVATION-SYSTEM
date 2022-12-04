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
		<h2>Manages <span>Details</span> </h2>	
		</div>
        
        <div class="container">
		<form method='post' action='deletemanages.php'>
			<div class="container" style="margin-top:250px" >
			<div>
			<table class="table table-bordered table-striped table-hover" style="width:90%;">
			<thead data-toggle="tooltip" title="Employee records">
			<tr>
					<th> EMPLOYEE ID</th>
					<th> BUS ID</th>
			</tr>
			</thead>
			<tbody id="myTable">
			<?php
			$username = "root";
			$password = "";
			$database = "bus_management_system";
			$mysqli = new mysqli("localhost", $username, $password, $database);
			$query = "select * from manages;
			";
			
			if ($result = $mysqli->query($query)) {
			  while ($row = $result->fetch_assoc()) {
				  $field1name = $row["Empid"];
                  $field2name = $row["Bus_id"];
				//   $field7name = $row["Designation"];
			?>
			<tr id="tr_<?= $field1name ?>">
			
					<td><?= $field1name ?></td>
					<td><?= $field2name ?></td>		
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

    <form method="post" action="insertmanages.php">
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
        <select name="field8" class="form-control" id ="Empid" data-toggle="tooltip" title="Select EMPLOYEE ID" required>
        <option value='null'> None </option>
        <?php

        $query = "SELECT * FROM EMPLOYEE";
        if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
          $field8name = $row["Empid"];
        ?>
          <option value='<?= $field8name ?>'><?= $field8name ?>  </option>
          <?php
        }
        $result->free();
        }
        ?>
        </select>
      </div>

      <div class="form-group">
        <label for="BUS ID">BUS ID</label>
        <select name="field9" class="form-control" id ="Bus_id" data-toggle="tooltip" title="Select BUS ID" required>
        <option value='null'> None </option>
        <?php

        $query = "SELECT * FROM BUS";
        if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
          $field9name = $row["Bus_id"];
        ?>
          <option value='<?= $field9name ?>'><?= $field9name ?>  </option>
          <?php
        }
        $result->free();
        }
        ?>
        </select>
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