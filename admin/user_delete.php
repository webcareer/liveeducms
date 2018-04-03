<?php
include "connection.php";
ob_start();

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$sql = "DELETE FROM users WHERE id=$id";

	if(mysqli_query($conn, $sql)){
		header("Location: ./users.php");
	}
	else{
		echo "Error : " . mysqli_error($conn);
	}

	mysqli_close($conn);
}