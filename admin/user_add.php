<?php include "header.php"; ?>

<?php
	if(isset($_POST['submit'])){
		$username   = $_POST['username'];
		$password   = $_POST['password'];
		$fname      = $_POST['fname'];
		$lname      = $_POST['lname'];
		$email      = $_POST['email'];
		$city       = $_POST['city'];
		$country    = $_POST['country'];
		$rights     = $_POST['rights'];

		$userimage  = $_FILES['userimage']['name'];
		$usertempimage = $_FILES['userimage']['tmp_name'];

		move_uploaded_file($usertempimage, "./img/$userimage");

		$sql = "INSERT INTO users (id, username, password, fname, lname, email, city, country, userimage, rights)
					VALUES (null, '$username', '$password', '$fname', '$lname', '$email', '$city', '$country', '$userimage', '$rights')";

		if(mysqli_query( $conn, $sql )){
			header("Location: ./users.php");
		}
		else{
			echo "Errors : " . mysqli_error($conn);
		}
	}

?>

<div class="content-wrapper">
	<div class="container-fluid">


		<div class="card card-register mx-auto mt-5">
			<div class="card-header">Add new User</div>
			<div class="card-body">
				<form method="POST" action="user_add.php" enctype="multipart/form-data">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="username">Username</label>
								<input class="form-control" id="username" name="username" type="text" placeholder="Username" required >
							</div>
							<div class="col-md-6">
								<label for="password">Password</label>
								<input class="form-control" id="password" name="password" type="password" placeholder="Password" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="fname">First name</label>
								<input class="form-control" id="fname" name="fname" type="text" placeholder="First Name">
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input class="form-control" id="lname" name="lname" type="text" placeholder="Last Name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input class="form-control" id="email" type="email" name="email" placeholder="Enter email">
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

                    <div class="form-group">
                        <div class="form-row">
                            <label for="userimage">Image</label>
                            <input class="form-control" id="userimage" name="userimage" type="file">
                        </div>
                    </div>

					<div class="form-group">
						<div class="form-row">
								<label for="rights">User Right</label>
                                <select id="rights" name="rights" class="form-control" >
                                    <?php
                                        $sql = "SELECT * from users_rights";
                                        $result = mysqli_query($conn, $sql);

                                        while($row = mysqli_fetch_assoc($result) ){
                                            echo "<option value='{$row['id']}'>" .  $row['rights'] . "</option>";
                                        }
                                    ?>
                                </select>
								<!-- <input class="form-control" id="rights" name="rights" type="text" placeholder="User Rights"> -->
						</div>
					</div>
					<input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary btn-block">
				</form>
			</div>
		</div>

	</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->

<?php include "footer.php"; ?>
