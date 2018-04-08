<?php
include "connection.php";
ob_start();

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql = "DELETE FROM posts WHERE id=$id";
	if(mysqli_query($conn, $sql)){
		header('Location: ./posts.php');
	}
	else{
		echo "Error : " . mysqli_error($conn);
	}

	echo "The id is : " . $id;
}
else{
	header("Location: ./posts.php");
}