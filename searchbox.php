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
			<li class="active"><a href="searchbox.php" title="Search">Search</a></li>
			<li class="#"> <a href="contact.php">Contact</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }else{?>
				<li class="#"><a href="index.php">Home</a></li>
			<li class="active"><a  href="searchbox.php" title="Search">Search</a></li>
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
        <a href="#myModal" class="float-add" data-toggle="modal"><button name="add" id="add" class="btn btn-success btn-rounded my-float float-add" data-toggle="tooltip" title="Add record"><span class="glyphicon glyphicon-plus"></span> Add</button></a>

        <a href="#" class="float-del"><button  data-toggle="tooltip" title="Delete selected record"  type="submit" name="but_delete" id="del" class="btn btn-danger btn-rounded my-float float-del"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>

    </div>
    </form>

    <form method="post" action="insertbus.php">
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Bus Record</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

<div class="form-group">
            <label for="Bus_id">BUS ID</label>
            <input type="number" class="form-control" id="Bus_id" name="field1" data-toggle="tooltip" title="Give unique no to bus" required>
        </div>
        <div class="form-group">
            <label for="Arrival_time">ARRIVAL TIME</label>
            <input type="time" class="form-control" id="Arrival_time" name="field2"  data-toggle="tooltip" title="ARRIVAL TIME"  required>
        </div>

        <div class="form-group">
            <label for="Departure_time">DEPARTURE TIME</label>
            <input type="time" class="form-control" id="Departure_time" name="field3" data-toggle="tooltip" title="DEPARTURE TIME" required>
        </div>
        <div class="form-group">
            <label for="Schedule_date">SCHEDULE DATE</label>
            <input type="date" class="form-control" id="Schedule_date" name="field4"  data-toggle="tooltip" title="SCHEDULE DATE" required>
        </div>
        <div class="form-group">
            <label for="Source">SOURCE</label>
            <input type="TEXT" class="form-control" id="Source" name="field5"  data-toggle="tooltip" title="SOURCE"  required>
        </div>
        <div class="form-group">
            <label for="Destination">DESTINATION</label>
            <input type="TEXT" class="form-control" id="Destination" name="field6"  data-toggle="tooltip" title="DESTINATION"  required>
        </div>
        <div class="form-group">
        <label for="Bus_type">BUS TYPE</label>
            <!-- <input type="TEXT" class="form-control" id="Bus_type" name="field7"  data-toggle="tooltip" title="DESTINATION"  required> -->
            <select name="field7"  class="form-control" id="Bus_type">
        <option value="A/C Sleeper">A/C Sleeper</option>
        <option value="Non A/C Sleeper">Non A/C Sleeper</option>
        <option value="A/C Seater">A/C Seater</option>
        <option value="NON A/C Seater">NON A/C Seater</option>
      </select>
        </div>
        <div class="form-group">
            <label for="Capacity">CAPACITY</label>
            <input type="number" class="form-control" id="Capacity" name="field8" placeholder="e.g. 20" data-toggle="tooltip" title="CAPACITY OF BUS" min="0" required>
        </div>
        <div class="form-group">
            <label for="No_plate">NO PLATE</label>
            <input type="TEXT" class="form-control" id="No_plate" name="field9"  data-toggle="tooltip" title="CAPACITY OF BUS" required>
        </div>
        <div class="form-group">
            <label for="Price">PRICE</label>
            <input type="number" class="form-control" id="Price" name="field10"  data-toggle="tooltip" title="CAPACITY OF BUS"  required>
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