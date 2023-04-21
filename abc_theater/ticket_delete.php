<?php
require('connect.php');
session_start();
$delete_ID  = $_GET['ticket_id'];


$sql = '
    DELETE FROM ticket
    WHERE ticket_id = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    $_SESSION['del_succ'] = 'Delete Successfully.';
    header('location:ticket_dashboard.php');
}

mysqli_close($conn);
?>
