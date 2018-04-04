<?php include "header.php"; ?>

<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql_get    = "SELECT * FROM posts WHERE id=$id";
	$result_get = mysqli_query($conn, $sql_get);

	if(mysqli_num_rows($result_get) > 0){
		while($row = mysqli_fetch_assoc($result_get) ){
			$user_id        = $row['user_id'];
			$category_id    = $row['category_id'];
			$title          = $row['title'];
			$content        = $row['content'];
			$postimage      = $row['postimage'];
			$active         = $row['active'];
		}
	}
	else{
		header('Location: ./posts.php');
	}
}
else if(isset($_POST['update'])){
		$id             = $_POST['id'];
		$user_id        = $_POST['user_id'];
		$category_id    = $_POST['category_id'];
		$title          = $_POST['title'];
		$content        = $_POST['content'];
		$active         = $_POST['active'];

		$postimage  = $_FILES['postimage']['name'];
		$posttempimage = $_FILES['postimage']['tmp_name'];

		move_uploaded_file($posttempimage, "./img/$postimage");

		$sql = "UPDATE posts SET
					user_id			=	$user_id,
					category_id		=	$category_id,
					title			=	'{$title}',
					content			=	'{$content}',
					postimage		=	'{$postimage}',
					active			=	$active
					WHERE id = $id";

		if(mysqli_query( $conn, $sql )){
			header("Location: ./posts.php");
		}
		else{
			echo "Errors : " . mysqli_error($conn);
		}

}
else{
	header('Location: ./posts.php');
}

?>

<div class="content-wrapper">
	<div class="container-fluid">

		<div class="card card-register mx-auto mt-5">
			<div class="card-header">Add new User</div>
			<div class="card-body">
				<form method="POST" action="post_edit.php" enctype="multipart/form-data">
					<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
					<div class="form-group">
						<label for="title">Post Title </label>
						<input class="form-control" id="title" type="text" name="title" value="<?php echo $title; ?>">
					</div>
					<div class="form-group">
						<label for="content">Post Content</label>
						<textarea name="content" id="content" rows="10" class="form-control" ><?php echo $content; ?></textarea>
					</div>
					<div class="form-group">
						<label for="category_id">Category ID</label>
						<select name="category_id" id="category_id" class="form-control">
							<?php
							$sql_categories = "SELECT * from categories";
							$result_categories = mysqli_query($conn, $sql_categories);

							while($row = mysqli_fetch_assoc($result_categories) ){
								if($row['id'] == $category_id){
									echo "<option selected value='{$row['id']}'>" .  $row['categoryname'] . "</option>";
								}
								else{
									echo "<option value='{$row['id']}'>" .  $row['categoryname'] . "</option>";
								}
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<div class="form-row">
							<label for="postimage">Image</label>
							<img src="./img/<?php echo $postimage; ?>" alt="<?php echo $postimage; ?>" height="50px" class="clearfix">
							<input class="form-control" id="postimage" name="postimage" type="file">
						</div>
					</div>
					<div class="form-group">
						<label for="content">active</label>
						<select id="active" name="active" class="form-control" >
							<?php
								if($active == 0){
									echo '<option value="1">Active</option>
										  <option selected value="0">Inactive</option>';
								}
								else{
									echo '<option selected value="1">Active</option>
										  <option value="0">Inactive</option>';
								}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="user_id">User</label>
						<input type="text" name="user_id" id="user_id" class="form-control" value="<?php echo $user_id; ?>">
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
