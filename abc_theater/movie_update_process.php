<?php
require('connect.php');
session_start();

$Movie_ID     = $_SESSION['movie_id'];
$MovieName	  = $_GET['MovieName'];
$Duration	  = $_GET['Duration'];
$GetInDate	  = $_GET['GetInDate'];
$GetOutDate	  = NULL;
if(!empty($_GET['GetOutDate']))
	$GetOutDate = $_GET['GetOutDate'];

$sql = "
	UPDATE movie
	SET
	movie_name = '" . $MovieName . "',  
	duration = '" . $Duration . "', 
	get_in_date = '" . $GetInDate . "', 
	get_out_date = '" . $GetOutDate ."'
	WHERE movie_id = " . $Movie_ID . " ;
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	$_SESSION['update_succ'] = 'Update Successfully';
	header("location: movie_list.php");
} else {
	$_SESSION['update_fail'] = 'Update Fail';
	header("location: movie_update_page.php?movie_id=$movie_id");
}
mysqli_close($conn);
?>