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
	<title>MY FIRST WEBPAGE</title>
	<link rel="stylesheet" type="text/css" href="css/style6.css">
</head>

	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<header>
		<div class="main">
			<div class="logo">
				<img src="logo.png">
			</div>
		<ul>
		<?php if($_SESSION['utype']=='Passenger'){?>
			<li class="#"><a href="index.php">Home</a></li>
			<li><a class="#" href="search_pass.php" title="Search">Search</a></li>
			<li class="#"><a href="ticket_pass.php">My Ticket</a></li>
			<li class="#"> <a href="contact.php">Contact</a></li>
			<li class="#"><a href="gallery.php">Gallery</a></li>
			<li class="active"><a href="about.php">About Us</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }else{?>
				<li class="#"><a href="index.php">Home</a></li>
			<li><a class="#" href="searchbox.php" title="Search">Search</a></li>
			<li class="#"> <a href="passenger.php">Passenger</a></li>
			<li class="#"> <a href="ticket.php">Ticket</a></li>
			<li class="#"> <a href="employee.php">Employee</a></li>
			<li class="#"> <a href="enquiry.php">Enquiries</a></li>
			<li class="#"><a href="gallery.html">Gallery</a></li>
			<li class="active"><a href="about.html">About Us</a></li>
			<!-- <li class="#"> <a href="contact.php">Contact</a></li> -->
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }?>
		</ul>
		</div>

		<div class="title">
		<h1>B.V.P.<span>TRAVELS</span></h1>	
		</div>
		
		</header>

				
		<div class="co">	
			<div class="co" data-stellar-background-ratio="0.5" style="background-image: url(images/2.jpg);">
	    	</div>
		</div>


		<div class="co1">
			<a href="#" class="nav1">
			<div class="one"></div>
			</a>
		</div>

		<div class="co2">
			<a href="#" class="nav2">
			<div class="one"></div>
			</a>
		</div>

			<div class="title2">
						<h3>Our Mission & Vision</h3>
			</div>
			
			<div class="title2-1">
				<h3 align="justify">Our Mission is to provide online ticket booking and simplify the customer needs, the customer can book bus ticket online and pay online. By booking ticket online the customer saves a lot of time. We understand your concern about the security of your transactions over the internet. To ensure a safe transaction, we employs the best-in-class security. In addition the credit card information is processed over secure gateways which are certified by Visa.
				</h3>
			</div>

	<style>
		
		.maindiv1{
			width: 100%;
			height:50px;
			position: absolute;
			left: 50%;
			top: 165%;
			transform: translate(-50%,-50%);
			background-size: 100% 100%;
			background-color: black;
			
		}
		.maindiv2{
			width: 15%;
			height: 30px;
			position: absolute;
			left: 50%;
			top: 154%;
			transform: translate(-50%,-50%);
			background-size: 100% 100%;
		
			background-color: black;
			border-radius: 25px;			
			transition-property: transparent;
		}
		.maindiv3{
			width: 100%;
			height: 50px;
			position: absolute;
			left: 50%;
			top: 175%;
			transform: translate(-50%,-50%);
			background-size: 100% 100%;
			background-color: yellow;
			
		}

		
	</style>

	
	<div class="maindiv">		
	</div>
	

	<div class="maindiv1">
	</div>

	<div class="maindiv2">
		<div class="title4">
						<h3>#CelebrateLife</h3>
		</div>
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
	</div>										
</body>
</html>