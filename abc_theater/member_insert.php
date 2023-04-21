<?php
require('connect.php');
session_start();

$Name		  = $_POST['Name'];
$Email		  = $_POST['Email'];
$Password	  = $_POST['Password'];
$Phone	  	  = $_POST['Phone'];
$BIRTH_DATE	  = $_POST['BIRTH_DATE'];

$check_email = "SELECT * FROM member WHERE email = '$Email';";
$rowEmail = mysqli_query($conn,$check_email);
$check_phone = "SELECT * FROM member WHERE phone = '$Phone';";
$rowPhone = mysqli_query($conn,$check_phone);
if(mysqli_num_rows($rowEmail) > 0){
	$_SESSION['reg_fail'] = 'Register Fail';
	header('location: member_register.php');
}
elseif($rowPhone->num_rows > 0){
	$_SESSION['reg_fail'] = 'Register Fail';
	header('location: member_register.php');
}


$sql = "
	INSERT INTO member (member_name,member_pw,email,phone,birth_date)
	VALUES ('$Name','$Password','$Email','$Phone','$BIRTH_DATE');
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	$_SESSION['reg_succ'] = 'Register Successfully';
	header('location:login.php');
} else {
	$_SESSION['reg_fail'] = 'Register Fail';
	header('location: member_register.php');
}

mysqli_close($conn);

?>