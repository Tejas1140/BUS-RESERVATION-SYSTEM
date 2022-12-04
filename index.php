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
	<title>INDEX</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
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
			<li class="active"><a href="index.php">Home</a></li>
			<li><a class="#" href="search_pass.php" title="Search">Search</a></li>
			<li class="#"><a href="ticket_pass.php">My Ticket</a></li>
			<li class="#"> <a href="contact.php">Contact</a></li>
			<li class="#"><a href="gallery.php">Gallery</a></li>
			<li class="#"><a href="about.php">About Us</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }else{?>
				<li class="active"><a href="index.php">Home</a></li>
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
		</div>

		<div class="title">
		<h1>B.V.P.<span>TRAVELS</span></h1>
		<h2><?= "Welcome ".$_SESSION['fname']?><h2>
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

		<div class="co3">
			<a href="#" class="nav3">
			<div class="one"></div>
			</a>
		</div>


			<div class="title2">
						<h3>BUS BOOKING</h3>
			</div>
			
			<div class="title2-1">
				<h4 align="justify">An increase in bus booking in India with a better availability of bus tickets online than before is a travel trend to reckon with. India has the second largest road network in the world stretching to 56,03,293 km of road length which makes road travel all the more like it. Travelling by road is much more feasible especially for the routes and destinations with no air and train connectivity including far-flung villages and towns. Besides there are always people who prefer city to city bus travel than booking flights for a relaxed journey at a lesser price. At BVP Travels, we make your online bus booking a smooth experience. Find and book buses operating on several routes including both state-run and privately owned fleet at competitive prices.</h4>
			</div>

	<style>
		
		.maindiv{
			width: 60%;
			height: 300px;
			position: absolute;
			left: 50%;
			top: 185%;
			transform: translate(-50%,-50%);
			background-image: url(https://s3-us-west-2.amazonaws.com/paytm-travel/Marketing/BUSPASS_Ver002_TravelOffer.JPG);
			background-size: 100% 100%;
			box-shadow: 5px 10px 80px black;
			animation: slider 10s infinite linear;
		}
		.maindiv1{
			width: 100%;
			height:50px;
			position: absolute;
			left: 50%;
			top: 240%;
			transform: translate(-50%,-50%);
			background-size: 100% 100%;
			background-color: black;
			
		}
		.maindiv2{
			width: 15%;
			height: 30px;
			position: absolute;
			left: 50%;
			top: 228%;
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
			top: 250%;
			transform: translate(-50%,-50%);
			background-size: 100% 100%;
			background-color: yellow;
			
		}

		@keyframes slider{
			0%{ background-image: url(https://s3-us-west-2.amazonaws.com/paytm-travel/Marketing/BUSPASS_Ver002_TravelOffer.jpg);}

			45%{background-image: url(https://s3-us-west-2.amazonaws.com/paytm-travel/Marketing/TOURPASS-offer-page.jpg);  }

			75%{ background-image: url(https://www.jiomoney.com/images/offers/bus-ticketing-bms.jpg); }

			100%{ background-image: url(https://www.jiomoney.com/images/offers/bus-booking-with-jiomoney.jpg); }
		}
	</style>

	
	<div class="maindiv">		
	</div>
	<div class="title1">
						<h3>OFFERS</h3>
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