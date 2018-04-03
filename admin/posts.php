<?php include "./header.php"; ?>

	<div class="content-wrapper">
	<div class="container-fluid">

		<!-- Example DataTables Card-->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i> Users </div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Category</th>
							<th>Title</th>
							<th>Content</th>
							<th>Post Image</th>
							<th>Active</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$sql_users    = "SELECT id, username FROM users";
						$result_users = mysqli_query($conn, $sql_users);
						$row_users    = mysqli_fetch_all( $result_users );
						//var_dump($row_users);

						//echo "<br><br>";

						$sql_categories    = "SELECT * FROM categories";
						$result_categories = mysqli_query($conn, $sql_categories);
						$row_categories    = mysqli_fetch_all( $result_categories );
						//var_dump($row_categories);

						$sql = "SELECT * FROM posts";
						$result = mysqli_query($conn, $sql);

						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
								?>
								<tr>
									<td> <?php echo $row['id']; ?> </td>
									<td>
										<?php
											foreach($row_users as $rusers){
												if($row['user_id'] == $rusers[0]){
													echo $rusers[1];
													break;
												}
											}
										?>
									</td>
									<td>
										<?php
											foreach($row_categories as $rcategories){
												if($row['category_id'] == $rcategories[0]){
													echo $rcategories[1];
													break;
												}
											}
										?>
									</td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo substr($row['content'], 0, 100) . "..."; ?></td>
									<td>
                                        <img src="./img/<?php echo $row['postimage'];?>" alt="<?php echo $row['postimage'];?>" width="100px">
                                    </td>
									<td><?php echo $row['active']; ?></td>

									<td><a href="#">Edit</a></td>
									<td><a href="#">Delete</a></td>
								</tr>
								<?php
							}
						}
						?>

						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>
	</div>
	<!-- /.container-fluid-->
	<!-- /.content-wrapper-->

<?php include "./footer.php"; ?>
<?php mysqli_close($conn); ?>