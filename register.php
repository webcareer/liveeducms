<?php
    include('./admin/connection.php');

    if(isset($_POST['register'])){

        $username       = $_POST['username'];
	    $password       = $_POST['password'];
	    $cpassword      = $_POST['cpassword'];
	    $fname          = $_POST['fname'];
	    $lname          = $_POST['lname'];
	    $city           = $_POST['city'];
	    $country        = $_POST['country'];
	    $email          = $_POST['email'];

	    if($password === $cpassword){
	        $password = md5($password);

		    $sql = "INSERT INTO users (id, username, password, fname, lname, city, country, email, rights, active)
                    VALUES
                    (null, '{$username}', '{$password}', '{$fname}', '{$lname}', '{$city}', '{$country}', '{$email}', 2, 1)";
		    if(mysqli_query($conn, $sql)){
                $success = "The account is created.";
            }
            else{
		        $error = "Error : " . mysqli_error($conn);
            }
        }
        else{
	        $error = "The Password is not similar.";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LiveEduCMS | Register with LiveEduCMS </title>
  <!-- Bootstrap core CSS-->
  <link href="./admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="./admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="./admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" action="register.php">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="fname">First name</label>
                <input class="form-control" id="fname" name="fname" type="text" placeholder="First Name">
              </div>
              <div class="col-md-6">
                <label for="lname">Last name</label>
                <input class="form-control" id="lname" name="lname" type="text" placeholder="Last Name">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Username">
                </div>
                <div class="col-md-6">
                    <label for="email">Email Address</label>
                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter Email">
                </div>
            </div>
          </div>


          <div class="form-group">

          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="cpassword">Confirm password</label>
                <input class="form-control" id="cpassword" name="cpassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                    <label for="city">City</label>
                    <input class="form-control" id="city" name="city" type="text" placeholder="City">
                </div>
                <div class="col-md-6">
                    <label for="country">Country</label>
                    <input class="form-control" id="country" name="country" type="text" placeholder="Country">
                </div>
            </div>
          </div>
          <!-- Button to send Registration Request - Starts -->
            <input type="submit" class="btn btn-primary btn-block" id="registr" name="register" value="Register">
          <!-- Button to send Registration Request - End -->
        </form>
        <br>
          <?php
            if(isset($success)){
                echo "<div class='alert alert-primary' role='alert'>" . $success . "</div>";
            }
            elseif (isset($error)){
	            echo "<div class='alert alert-danger' role='alert'>" . $error . "</div>";
            }
          ?>

        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="./admin/vendor/jquery/jquery.min.js"></script>
  <script src="./admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="./admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
