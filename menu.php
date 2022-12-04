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
			<li class="active"> <a href="contact.php">Contact</a></li>
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
		
		<style>
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
		</style>
