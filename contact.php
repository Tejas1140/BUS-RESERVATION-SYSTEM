<?php
require('header.php');
require('menu.php');
if(!isset($_SESSION['loginType']))
{
	header('location:contact.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="css/style8.css">
	<script src="scripts.js"></script>
</head>
<body>
	
	
	<div class="maindiv">
	</div>
			<div class="title2">
						<h3>OUR ADDRESS</h3>
			</div>

			<div class="title2-1">
						<h3>•	Address: 11, Almeida Rd, Shastri Nagar, Vasai West, Vasai-Virar,401202.</h3>
						<h3>•	Tel: 0250-2334291,2340019</h3>
						<h3>•	Email: vbvpolytechnic@rediffmail.com</h3>
						<h3>•	https://www.vartakpolytechnic.org/</h3>
			</div>

	<div class="maindiv1">
	</div>
	<div class="maindiv2">
		<div class="title4">
						<h3>#CelebrateLife</h3>
		</div>
	</div>

	<div class="title5">
						<h5>At BVP Travels, we believe in celebrating life and that is what makes us the absolute best.</h5>
	</div>
			
			<div class="maindiv3">
				<h6 align>Copyright © 2022 B.V.P Trans Corpo Pvt. Ltd.</h6>
			</div>

			<div class="logo1">
				<img src="logo.png">
			</div>
	</header>

	<div class="wrapper">
	  <h2>Contact us</h2>
	  <div id="error_message"></div>
	  <form id="myform" name="myform" method="post" action="insertquery.php">
	    <div class="input_field">
	        <input type="text" placeholder="Name" id="name" name="name">
	    </div>
	    <div class="input_field">
	        <input type="text" placeholder="Subject" id="subject" name="subject">
	    </div>
	    <div class="input_field">
	        <input type="text" placeholder="Phone" id="phone" name="phone">
    	</div>
	    <div class="input_field">
    	    <input type="text" placeholder="Email" id="email" name="email">
	    </div>
    	<div class="input_field">
	        <textarea placeholder="Message" id="message" name="message"></textarea>
    	</div>
	    <div class="btn">
	        <input type="submit" id="button" >
	    </div>
  	  </form>
	</div>	
<?php





if (isset($_POST['button'])) 
{
	$Name = $_POST['name'];
$Subject = $_POST['subject'];
$Message = $_POST['message'];
$Email_id = $_POST['email'];
$Phone_no = $_POST['phone'];

   
        $query = "INSERT INTO booking_enquiry(`Name`,`Subject`,`Message`,`Email_id`,`Phone_no`)
        VALUES ('$Name','$Subject','$Message','$Email_id','$Phone_no')";

      $result = $mysqli->query($query);
      if($result)
      {
      echo "<script>alert('Successfully inserted!')</script>";
      }
	  $mysqli->close();
	  header('Location: contact.php');
	}
?>
</body>
</html>
</html>