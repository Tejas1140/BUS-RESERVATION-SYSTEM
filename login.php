<!DOCTYPE html>
<html lang="en" and dir="Itr">
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style7.css">
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
		</div>		
		<div class="title">
			<h1>B.V.P.<span>TRAVELS</span></h1>	
		</div>	
  
</body>
<form class="box" method="post">
	<h1>
		Login
	</h1>
	<input type="text" name="" placeholder="Enter Email ID" id="email">
	<input type="password" name="" placeholder="Enter Password" id="password">
	<input type="submit" name="" value="Login" id="loginButton" >
  <?php
  require('header.php');
  // echo Encrypt('12345');
  if (isset($_SESSION['loginType']))
    if ($_SESSION['loginType'] === 'admin') {
      header('location:index.php');
      exit();
    }
  if (isset($_POST['loginButton'])) {
    $email = $_POST['email'];
    $password =$_POST['password'];
    // gen_log($email);
    // $password = Encrypt($password);
    $sql = "SELECT * FROM passenger LEFT OUTER JOIN employee ON employee.emp_email='$email' WHERE passenger.Email_ID='$email' AND passenger.password='$password' OR employee.emp_email='$email' AND employee.password='$password' UNION SELECT * FROM passenger RIGHT OUTER JOIN employee ON employee.emp_email='$email' WHERE passenger.Email_ID='$email' AND passenger.password='$password' OR employee.emp_email='$email' AND employee.password='$password'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
      if ($row = $result->fetch_assoc()) {
        if ($row['Empid'] == NULL) {
          $_SESSION['uid'] = $row['P_id'];
          $_SESSION['loginType'] = 'admin';
          $_SESSION['utype'] = 'Passenger';
          
        } else {
          $_SESSION['uid'] = $row['Empid'];
          $_SESSION['loginType'] = 'admin';
          $_SESSION['utype'] = 'Employee';
        }
      } else $_SESSION['flag'] = 'Incorrect Credentials.';
    }
    header('location:index.php');
  }
  ?>
</html>



