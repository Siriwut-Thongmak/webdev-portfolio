<?php
require('connect.php');
session_start();

$movie_id   = $_SESSION['movie_id'];
$an_id      = $_SESSION['an_id'];
$slt_id     = $_SESSION['slt_id'];
$book_date  = date('Y-m-d');
$pay        = 'NO';
$price      = $_SESSION['price'];
$seat_id    = $_SESSION['seat_id'];
$hall_id    = $_SESSION['hall_id'];

$member_id = '';
if(isset($_SESSION['user_login'])){
    $member_id = $_SESSION['user_login'];
}
if($member_id == NULL){
    $q =    "INSERT INTO ticket
        (booking_date, total_price, pay_status, annoucement_id, slot_time_id, seat_id, hall_id)
        VALUES('$book_date', '$price', '$pay', '$an_id', '$slt_id', '$seat_id', '$hall_id');";
    $ticketQuery = mysqli_query($conn, $q);
}else {
    $q =    "INSERT INTO ticket
        (booking_date, total_price, pay_status, annoucement_id, slot_time_id, seat_id, hall_id, member_id)
        VALUES('$book_date', '$price', '$pay', '$an_id', '$slt_id', '$seat_id', '$hall_id', '$member_id');";
    $ticketQuery = mysqli_query($conn, $q);
}

if($ticketQuery) {
    $_SESSION['booking_succ'] = 'Booking Successfully';
    header('location: index.php');
}else {
    $_SESSION['booking_fail'] = 'Booking Fail';
    header('location: ticket_booking.php');
}
?>