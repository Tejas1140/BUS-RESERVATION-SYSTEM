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
        <?php if($_SESSION['utype']=='Passenger'){?>
			<li class="#"><a href="index.php">Home</a></li>
			<li class="active"><a href="search_pass.php" title="Search">Search</a></li>
			<li class="#"><a href="ticket_pass.php">My Ticket</a></li>
			<li class="#"> <a href="contact.php">Contact</a></li>
            <li class="#"><a href="gallery.php">Gallery</a></li>
			<li class="#"><a href="about.php">About Us</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }else{?>
				<li class="#"><a href="index.php">Home</a></li>
			<li><a class="#" href="searchbox.php" title="Search">Search</a></li>
			<li class="#"> <a href="passenger.php">Passenger</a></li>
			<li class="#"> <a href="ticket.php">Ticket</a></li>
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
		<h2>SEARCH <span>BUSES</span> </h2>	
		</div>
        
		<div class="button">
        <form method='post' action='searchbox.php'>
			<div class="form-box">
				<input class="form" name="search" type="text" placeholder="SEARCH" id="myInput"/> 
				
				<input class="to" name="location" type="text" placeholder="TO" id="myInput2"/> 

				<input class="return" name="location" type="date" placeholder="RETURN DATE" id="myInput3"/>

				<!-- <button class="search-btn" type="button" id="search-bt">SEARCH BUSES</button> -->

                <button class="search-btn" onClick="history.go(0);">CLEAR</button>

			<</div>
		    </form>
        </div>

        <div class="container">
		<form method='post' action='deletebus.php'>
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
			$query = "SELECT * FROM bus";
			
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
			  $result->free();
			}
				?>
			</tbody>
			</table>
			</div>
			
		</div>
        
        </header>
    
    <div class="btn1">
        <a href="#myModal" class="float-add" data-toggle="modal"><button name="ADD" type="submit" id="ADD" class="btn btn-success btn-rounded my-float float-add" data-toggle="tooltip" title="ADD Bus"><span class="glyphicon glyphicon-plus"></span>ADD PASSENGER</button></a>

        <a href="#myModal2" class="float-add" data-toggle="modal"><button name="BOOK" type="submit" id="BOOK" class="btn btn-success btn-rounded my-float float-add" data-toggle="tooltip" title="Book Bus"><span class="glyphicon glyphicon-plus"></span>BOOK</button></a>
    </div>
    </form>

    </form>

    <form method="post" action="insertpass1.php">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Passenger Record</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

        <div class="form-group">
        <label for="P_id">PASSENGER ID</label>
        <input type="number" class="form-control" id="P_id" name="field1" data-toggle="tooltip" title="Give unique no to passanger"  required>
        </div>

        <div class="form-group">
            <label for="GENDER">GENDER</label>
            <!-- <input type="TEXT" class="form-control" id="Gender" name="field2"  data-toggle="tooltip" title="GENDER"  required> -->
            <select name="field2"  class="form-control" id="Gender">
        <option value="M">MALE</option>
        <option value="F">FEMALE</option>
      </select>
        </div>

        <div class="form-group">
            <label for="DOB">DATE OF BIRTH</label>
            <input type="date" class="form-control" id="DOB" name="field3"  data-toggle="tooltip" title="DOB" required>
        </div>

        <div class="form-group">
            <label for="FNAME">FIRST NAME</label>
            <input type="TEXT" class="form-control" id="F_name" name="field4"  data-toggle="tooltip" title="FIRST NAME"  required>
        </div>

        <div class="form-group">
            <label for="MNAME">MIDDLE NAME</label>
            <input type="TEXT" class="form-control" id="M_name" name="field5"  data-toggle="tooltip" title="MIDDLE NAME"  required>
        </div>

        <div class="form-group">
            <label for="LNAME">LAST NAME</label>
            <input type="TEXT" class="form-control" id="L_name" name="field6"  data-toggle="tooltip" title="LAST NAME"  required>
        </div>

        <div class="form-group">
            <label for="EMAIL">EMAIL ID</label>
            <input type="TEXT" class="form-control" id="Email_ID" name="field7"  data-toggle="tooltip" title="EMAIL ID"  required>
        </div>
    
        <div class="form-group">
            <label for="PASSWORD">PASSWORD</label>
            <input type="TEXT" class="form-control" id="password" name="field8"  data-toggle="tooltip" title="PASSWORD"  required>
        </div>

        <div class="form-group">
            <label for="PHONE">PHONE NO</label>
            <input type="TEXT" class="form-control" id="Phone_no" name="field9"  data-toggle="tooltip" title="PHONE NO"  required>
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

    <form method="post" action="insertticket1.php">
        <div id="myModal2" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Ticket Record</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

        <div class="form-group">
        <label for="T_P">TOTAL PRICE</label>
        <input type="number" class="form-control" id="Total_Price" name="field2" data-toggle="tooltip" title="Give unique no to ticket price" required>
        </div>

        <div class="form-group">
            <label for="SEAT NO">SEAT NO</label>
      <select name="Seat_No"  class="form-control" id="Seat_No">
        <option value="A1">A1</option>
        <option value="B1">B1</option>
        <option value="C1">C1</option>
        <option value="D1">D1</option>
        <option value="E1">E1</option>
        <option value="F1">F1</option>
        <option value="G1">G1</option>
        <option value="H1">H1</option>
        <option value="I1">I1</option>
        <option value="J1">J1</option>
        <option value="K1">K1</option>
        <option value="L1">L1</option>
        <option value="M1">M1</option>
        <option value="A2">A2</option>
        <option value="B2">B2</option>
        <option value="C2">C2</option>
        <option value="D2">D2</option>
        <option value="E2">E2</option>
        <option value="F2">F2</option>
        <option value="G2">G2</option>
        <option value="H2">H2</option>
        <option value="I2">I2</option>
        <option value="J2">J2</option>
        <option value="K2">K2</option>
        <option value="L2">L2</option>
        <option value="M2">M2</option>
      </select>
        </div>
<div class="form-group">
            <label for="P_M">PAYMENT MODE</label>
            <!-- <input type="TEXT" class="form-control" id="Payment_mode" name="field4"  data-toggle="tooltip" title="P_M"  required>  -->
      <select name="Payment_mode"  class="form-control" id="Payment_mode">
        <option value="UPI">UPI</option>
        <option value="DEBIT CARD">DEBIT CARD</option>
      </select>
        </div>

        <div class="form-group">
            <label for="T_DATE">TRAVEL DATE</label>
            <input type="date" class="form-control" id="Travel_Date" name="field5"  data-toggle="tooltip" title="T_DATE" required>
        </div>

        <div class="form-group">
            <label for="PAYMENT_ID">PAYMENT ID</label>
            <input type="TEXT" class="form-control" id="Payment_ID" name="field6"  data-toggle="tooltip" title="PAYMENT_ID"  value="eENXFR5HKo" required>
        </div>

        <div class="form-group">
            <label for="P_DATE">PURCHASE DATE</label>
            <input type="date" class="form-control" id="Purchase_date" name="field7"  data-toggle="tooltip" title="P_DATE" value=<?=date("Y-m-d")?> required>
        </div>

      <div class="form-group">
        <label for="P_id">PASSENGER ID</label>
        <select name="field8" class="form-control" id ="P_id" data-toggle="tooltip" title="Select PASSENGER ID" required>
        <option value='null'> None </option>
        <?php

        $query = "SELECT * FROM Passenger";
        if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
          $field8name = $row["P_id"];
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
    <script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>
    <script>
    $(document).ready(function(){
    $("#myInput2").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>
    <script>
    $(document).ready(function(){
    $("#myInput3").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>
    </header>
</body>
</html>
