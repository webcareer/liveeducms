<?php
$database   = "tr_livecmscourse";
$server     = "localhost";
$username   = "root";
$password   = "";

//Connection to the database
$conn = mysqli_connect($server, $username, $password, $database);

//Verifying whether we are connected to the database.
if(!$conn){
	die("Connection Failed : " . mysqli_connect_error());
}
?>