<?php
//require('header.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-touch-icon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">
</head>


<body class="bg-white">
  <?php
  require('header.php');
  if (isset($_SESSION['loginType']))
    if ($_SESSION['loginType'] === 'admin') {
      header('location:index.php');
      exit();
    }
  if (isset($_POST['loginButton'])) {
    $email = $_POST['email'];
    $password =$_POST['password'];  
    $sql = "SELECT * FROM passenger LEFT OUTER JOIN employee ON employee.emp_email='$email' WHERE passenger.Email_ID='$email' AND passenger.password='$password' OR employee.emp_email='$email' AND employee.password='$password' UNION SELECT * FROM passenger RIGHT OUTER JOIN employee ON employee.emp_email='$email' WHERE passenger.Email_ID='$email' AND passenger.password='$password' OR employee.emp_email='$email' AND employee.password='$password';";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
      if ($row = $result->fetch_assoc()) {
        if ($row['Empid'] == NULL) {
          $_SESSION['uid'] = $row['P_id'];
          $_SESSION['loginType'] = 'admin';
          $_SESSION['utype'] = 'Passenger';
          $_SESSION['fname']=$row['F_name'];
        } else {
          $_SESSION['uid'] = $row['Empid'];
          $_SESSION['loginType'] = 'admin';
          $_SESSION['utype'] = 'Employee';
          $_SESSION['fname']=$row['Emp_name'];
        }
      } else $_SESSION['flag'] = 'Incorrect Credentials.';
    }
    header('location:index.php');
  }
  ?>
  <div class="main-content">
    <div class="header bg-gradient-primary py-4 py-lg-4 pt-lg-4">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-12 p-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Please Login to Access your Account.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt--9 pb-5 text-gray">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-7 col-sm-12">
          <div class="card border border-soft mb-0">
            <div class="card-header bg-transparent">
              <div class="text-center mt-2 mb-3">
                <h1>Login</h1>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-asterisk"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="text-center">
<button type="submit" class="btn btn-primary btn-block my-4" name="loginButton" id="loginButton">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>