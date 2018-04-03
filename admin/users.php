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
					<th>First Name</th>
					<th>Last Name</th>
					<th>City</th>
					<th>Country
                    <th>Image</th>
					<th>Active</th>
					<th>Permission</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				</thead>
				<tbody>
					<?php
                    $sql_users_rights    = "SELECT * FROM users_rights";
					$result_users_rights = mysqli_query($conn, $sql_users_rights);
					$row_users_rights = mysqli_fetch_all( $result_users_rights );

					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn, $sql);

					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['fname']; ?></td>
						<td><?php echo $row['lname']; ?></td>
						<td><?php echo $row['city']; ?></td>
						<td><?php echo $row['country']; ?></td>
                        <td><img src="./img/<?php echo $row['userimage'];?>" alt="<?php echo $row['userimage']; ?>" width="50px"> </td>
						<td><?php echo ($row['active']==1)? "Active" . "<br>" : "Inactive" . "<br>"; ?> </td>

						<td>
                            <?php
                                $rights_id = $row['rights'];
                                //echo $row['rights'] . "<br>";
                                echo $row_users_rights[$rights_id - 1][1];
                            ?>
                        </td>

						<td><a href="./user_edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
						<td><a href="./user_delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
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