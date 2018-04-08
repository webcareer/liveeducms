<?php include "./header.php"; ?>
<?php
if(isset($_POST['submit'])){
	$categoryname = $_POST['categoryname'];

	$sql = "INSERT INTO categories (id, categoryname) VALUES (null, '{$categoryname}')";
	if(mysqli_query($conn, $sql)){
		$message = "New Category is Added";
	}
	else{
		$error = "Error : " . mysqli_error($conn);
	}
}
?>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-register mx-auto mt-5">
					<div class="card-header">Add New Category</div>
					<div class="card-body">
						<form method="POST" action="post_categories.php">
							<div class="form-group">
								<label for="categoryname">Category Name</label>
								<input class="form-control" id="categoryname" name="categoryname" type="text" placeholder="Category Name" required>
							</div>
							<input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary btn-block">
						</form>
						<br>

						<?php
						if(isset($message)){
							echo "<div class='alert alert-primary' role='alert'>" . $message . "</div>";
						}

						if(isset($error)){
							echo "<div class='alert alert-danger' role='alert'>" . $error . "</div>";
						}
						?>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="card mb-3">
					<div class="card-header">
						<i class="fa fa-table"></i> Category
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
								<tr>
									<th>ID</th>
									<th>Rights</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$sql    = "SELECT * FROM categories";
								$result = mysqli_query( $conn, $sql );
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_assoc($result)){
										?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['categoryname']; ?></td>
										</tr>
										<?php
									}
								}
								else{
									echo "<tr><td colspan='2'>Categories are not yet created.</td></tr>";
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include  "./footer.php"; ?>
