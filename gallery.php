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
	<title>gallery</title>
	<link rel="stylesheet" type="text/css" href="css/style5.css">
	 
</head>
<body>
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
			<li class="active"><a href="gallery.php">Gallery</a></li>
			<li class="#"><a href="about.php">About Us</a></li>
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }else{?>
				<li class="#"><a href="index.php">Home</a></li>
			<li><a class="#" href="searchbox.php" title="Search">Search</a></li>
			<li class="#"> <a href="passenger.php">Passenger</a></li>
			<li class="#"> <a href="ticket.php">Ticket</a></li>
			<li class="#"> <a href="employee.php">Employee</a></li>
			<li class="#"> <a href="enquiry.php">Enquiries</a></li>
			<li class="active"><a href="gallery.php">Gallery</a></li>
			<li class="#"><a href="about.php">About Us</a></li>
			<!-- <li class="#"> <a href="contact.php">Contact</a></li> -->
			<li class="#"> <a href="logout.php">Logout</a></li>
			<?php }?>
		</ul>
		</div>
		<div class="title">
		<h1>B.V.P.<span>TRAVELS</span></h1>
			
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

		<div class="co4">
			<a href="#" class="nav4">
			<div class="one"></div>
		</a>
		</div>

		<div class="co5">
			<a href="#" class="nav5">
			<div class="one"></div>
		</a>
		</div>
		<style>
		
	
		.maindiv1{
			width: 100%;
			height:50px;
			position: absolute;
			left: 50%;
			top: 340%;
			transform: translate(-50%,-50%);
			background-size: 100% 100%;
			background-color: black;
			
		}
		.maindiv2{
			width: 15%;
			height: 30px;
			position: absolute;
			left: 50%;
			top: 330%;
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
			top: 350%;
			transform: translate(-50%,-50%);
			background-size: 100% 100%;
			background-color: yellow;
			
		}

		</style>

	
	<div class="maindiv">
		
	</div>
			<div class="title1">
						<h2>GALLERY</h2>
			</div>

			<div class="title2">
						<h3>OUR ADDRESS</h3>
			</div>

			<div class="title3">
						<h3>AC BUS</h3>
			</div>

			<div class="title3-1">
						<h3>NON-AC BUS</h3>
			</div>

			<div class="title3-2">
					<h3>SLEEPER COACH</h3>
			</div>

			<div class="title3-3">
					<h3>TEMPO</h3>
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

			<div class="bus1">
				<img src="ac bus.jpg">
				
			</div>

			<div class="bus2">
				<img src="non ac.png">
				
			</div>

			<div class="bus3">
				<img src="sleeper bus.png">
				
			</div>

			<div class="bus4">
				<img src="tempo.png">
				
			</div>


			

		
	</header>
	</div>
	
										
</body>
</html>