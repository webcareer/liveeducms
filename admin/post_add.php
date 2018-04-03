<?php include "header.php"; ?>

<?php
if(isset($_POST['submit'])){
	$user_id        = $_POST['user_id'];
	$category_id    = $_POST['category_id'];
	$title          = $_POST['title'];
	$content        = $_POST['content'];
	//$postimage      = $_FILES['postimage'];
	$active         = $_POST['active'];

	$postimage  = $_FILES['postimage']['name'];
	$posttempimage = $_FILES['postimage']['tmp_name'];

	move_uploaded_file($posttempimage, "./img/$postimage");

	$sql = "INSERT INTO posts (id, user_id, category_id, title, content, postimage, active)
					  VALUES (null, '{$user_id}', '{$category_id}', '{$title}', '{$content}', '{$postimage}', '{active}')";

	if(mysqli_query( $conn, $sql )){
		header("Location: ./posts.php");
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
				<form method="POST" action="post_add.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="email">Post Title </label>
						<input class="form-control" id="title" type="text" name="title" placeholder="Post Title">
					</div>
					<div class="form-group">
						<label for="content">Post Content</label>
						<textarea name="content" id="content" rows="10" class="form-control" ></textarea>
					</div>
					<div class="form-group">
						<label for="content">Category ID</label>
						<input type="text" name="category_id" id="categort" class="form-control"  >
					</div>
					<div class="form-group">
						<div class="form-row">
							<label for="postimage">Image</label>
							<input class="form-control" id="postimage" name="postimage" type="file">
						</div>
					</div>
					<div class="form-group">
						<label for="content">active</label>
						<input type="text" name="active" id="active" class="form-control"  >
					</div>
					<div class="form-group">
						<label for="user_id">User</label>
						<input type="text" name="user_id" id="user_id" class="form-control" >
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
