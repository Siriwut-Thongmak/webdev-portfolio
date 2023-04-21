<?php

$delete_ID  = $_REQUEST['member_id'];
session_start();

require('connect.php');

$sql = '
    DELETE FROM member
    WHERE member_id = ' . $delete_ID . ';
    ';
//$reset = 'ALTER TABLE member AUTO_INCREMENT = 1;';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    $_SESSION['del_succ'] = 'Delete Successfully';
    header('location:member_dashboard.php');
} else {
    $_SESSION['del_fail'] = 'Delete Fail';
    header('location:member_dashboard.php');
}
//mysqli_query($conn,$reset);
mysqli_close($conn);
?>
