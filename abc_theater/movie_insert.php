<?php
require('connect.php');
session_start();

$MoiveName	  = $_GET['MoiveName'];
$Duration	  = $_GET['Duration'];
$GetInDate	  = $_GET['GetInDate'];
$GetOutDate	  = NULL;
if(!empty($_GET['GetOutDate']))
	$GetOutDate = $_GET['GetOutDate'];



$sql = "
	INSERT INTO movie (movie_name,duration,get_in_date,get_out_date)
	VALUES ('$MoiveName','$Duration','$GetInDate','$GetOutDate');
	";

$reset = 'ALTER TABLE movie AUTO_INCREMENT = 1;';
mysqli_query($conn,$reset);
$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	$_SESSION['add_succ'] = "Movie Add to Database Successfully.";
	header('location:movie_list.php');
} else {
	echo "Error : Input";
}

mysqli_close($conn);

?>