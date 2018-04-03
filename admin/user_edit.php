<?php include "./header.php"; ?>

<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql = "SELECT * FROM users WHERE id=$id";

	$result = mysqli_query( $conn, $sql );

	if( mysqli_num_rows($result) > 0 ){
		while( $row = mysqli_fetch_assoc($result) ){
			$username   =  $row['username'];
			$password   =  $row['password'];
			$fname      =  $row['fname'];
			$lname      =  $row['lname'];
			$email      =  $row['email'];
			$city       =  $row['city'];
			$country    =  $row['country'];
			$rights     =  $row['rights'];
			$active     =  $row['active'];
		}
	}
	else{
		header("location: ./users.php");
	}
}
else if(isset($_POST['update'])){
	$id   =  $_POST['id'];
	$username   =  $_POST['username'];
	$password   =  $_POST['password'];
	$fname      =  $_POST['fname'];
	$lname      =  $_POST['lname'];
	$email      =  $_POST['email'];
	$city       =  $_POST['city'];
	$country    =  $_POST['country'];
	$rights     =  $_POST['rights'];
	$active     =  $_POST['active'];

	$sql = "UPDATE users SET 
						username = '$username',
						password = '$password',
						email    = '$email',
						fname	 = '$fname',
						lname	 = '$lname',
						email	 = '$email',
						city	 = '$city',
						country	 = '$country',
						rights	 = '$rights',
						active   = '$active'
						WHERE id = $id";

	if(mysqli_query( $conn, $sql )){
		header("location: ./users.php");
	}
	else{
		echo "Errors : " . mysqli_error($conn);
	}
}
else{
	header("Location: ./users.php");

}
?>

<div class="content-wrapper">
	<div class="container-fluid">
		<div class="card card-register mx-auto mt-5">
			<div class="card-header">Add new User</div>
			<div class="card-body">
				<form method="POST" action="user_edit.php">
					<input type="hidden" value="<?php echo $id; ?>" name="id" id="id">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="username">Username</label>
								<input class="form-control" id="username" name="username" type="text" placeholder="Username" value="<?php echo $username; ?>" required >
							</div>
							<div class="col-md-6">
								<label for="password">Password</label>
								<input class="form-control" id="password" name="password" type="password" placeholder="Password" value="<?php echo $password; ?>" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="fname">First name</label>
								<input class="form-control" id="fname" name="fname" type="text" value="<?php echo $fname; ?>"  placeholder="First Name">
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input class="form-control" id="lname" name="lname" type="text" value="<?php echo $lname; ?>"  placeholder="Last Name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input class="form-control" id="email" type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter email">
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label for="city">City</label>
								<input class="form-control" id="city" name="city" type="text" value="<?php echo $city; ?>"  placeholder="City">
							</div>
							<div class="col-md-6">
								<label for="country">Country</label>
								<input class="form-control" id="country" name="country" type="text" value="<?php echo $country; ?>" placeholder="Country">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
                                <label for="rights">User Right</label>

                                <select id="rights" name="rights" class="form-control" >
									<?php
									$sql = "SELECT * from users_rights";
									$result = mysqli_query($conn, $sql);

									while($row = mysqli_fetch_assoc($result) ){
									    if($rights == $row['id']){
										    echo "<option selected value='{$row['id']}'>" .  $row['rights'] . "</option>";
                                        }
                                        else{
	                                        echo "<option value='{$row['id']}'>" .  $row['rights'] . "</option>";
                                        }
									}
									?>
                                </select>
							</div>
							<div class="col-md-6">
                                <label for="rights">Active</label>
                                <select class="form-control" id="active" name="active" >
                                    <option value="<?php echo $active; ?>"><?php echo ($active == 1)? "Active" : "Inactive"; ?></option>
                                    <?php
                                        if($active==1){
                                            echo "<option value='0'>Inactive</option>";
                                        }
                                        else{
                                            echo "<option value='1'>Active</option>";
                                        }
                                    ?>
                                </select>
							</div>
						</div>
					</div>
					<input type="submit" id="update" name="update" value="Update" class="btn btn-primary btn-block">
				</form>
			</div>
		</div>

	</div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->

<?php include "footer.php"; ?>
