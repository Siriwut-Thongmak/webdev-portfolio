<?php
require('connect.php');
session_start();

$MEMBER_ID    = $_SESSION['member_id'];
$Name		  = $_GET['Name'];
$Email		  = $_GET['Email'];
$Password	  = $_GET['Password'];
$Phone	  	  = $_GET['Phone'];
$BIRTH_DATE	  = $_GET['BIRTH_DATE'];

if(!($Email === $_SESSION['email'])){
	$check_email = "SELECT * FROM member WHERE email = '$Email';";
	$rowEmail = mysqli_query($conn,$check_email);
	if($rowEmail->num_rows > 0){
		$_SESSION['update_fail'] = 'Update Fail';
		header("location: member_update_page.php?member_id=$MEMBER_ID");
	}
}elseif(!($Phone === $_SESSION['phone'])){
	$check_phone = "SELECT * FROM member WHERE phone = '$Phone';";
	$rowPhone = mysqli_query($conn,$check_phone);
	if($rowPhone->num_rows > 0){
		$_SESSION['update_fail'] = 'Update Fail';
		header("location: member_update_page.php?member_id=$MEMBER_ID");
	}
}


$sql = "
	UPDATE member
	SET
	member_name = '" . $Name . "',  
	email = '" . $Email . "', 
	member_pw = '" . $Password . "', 
	phone = '" . $Phone . "', 
	birth_date = '" . $BIRTH_DATE . "'
	WHERE member_id = $MEMBER_ID ; ";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	$_SESSION['update_succ'] = 'Update Successfully';
	header("location: member_dashboard.php");
} else {
	$_SESSION['update_fail'] = 'Update Fail';
	header("location: member_update_page.php?member_id=$MEMBER_ID");
}
mysqli_close($conn);
?>