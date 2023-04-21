<?php
require('connect.php');
session_start();
$delete_ID  = $_GET['movie_id'];


$sql = '
    DELETE FROM movie
    WHERE movie_id = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    $_SESSION['del_succ'] = 'Delete Successfully.';
    header('location: movie_list.php');
}

mysqli_close($conn);
?>
