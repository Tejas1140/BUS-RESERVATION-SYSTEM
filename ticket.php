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
			<li class="act#ive"><a href="index.php">Home</a></li>
			<li><a class="#" href="search_pass.php" title="Search">Search</a></li>
			<li class="#"> <a href="contact.php">Contact</a></li>
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
		<h2>Ticket <span>Details</span> </h2>	
		</div>
<div class="container">
    <form method='post' action='deleteticket.php'>
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
      $query = "SELECT * FROM TICKET";
      
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
        <a href="#myModal" class="float-add" data-toggle="modal"><button name="add" id="add" class="btn btn-success btn-rounded my-float float-add" data-toggle="tooltip" title="Add record"><span class="glyphicon glyphicon-plus"></span> Add</button></a>

        <a href="#" class="float-del"><button  data-toggle="tooltip" title="Delete selected record"  type="submit" name="but_delete" id="del" class="btn btn-danger btn-rounded my-float float-del"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>

    </div>
    </form>

    <form method="post" action="insertticket.php">
        <div id="myModal" class="modal fade">
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
        <option value="A1">A1</option>
        <option value="B1">B1</option>
        <option value="C1">C1</option>
        <option value="D1">D1</option>
        <option value="A1">A1</option>
        <option value="B1">B1</option>
        <option value="C1">C1</option>
        <option value="D1">D1</option>
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
            <input type="TEXT" class="form-control" id="Payment_ID" name="field6"  data-toggle="tooltip" title="PAYMENT_ID"  required>
        </div>

        <div class="form-group">
            <label for="P_DATE">PURCHASE DATE</label>
            <input type="date" class="form-control" id="Purchase_date" name="field7"  data-toggle="tooltip" title="P_DATE" required>
        </div>

      <div class="form-group">
        <label for="P_id">PASSENGER ID</label>
        <select name="field8" class="form-control" id ="P_id" data-toggle="tooltip" title="Select PASSENGER ID" required>
        <option value='null'> None </option>
        <?php

        $query = "SELECT * FROM TICKET";
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
    </header>
</body>
</html>