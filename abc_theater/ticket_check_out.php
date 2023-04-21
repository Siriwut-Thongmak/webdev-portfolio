<?php
require('connect.php');
session_start();

$movie_id     = $_SESSION['movie_id'];
$date		  = $_GET['date'];
$timestart    = $_GET['showtime'];
$hall	      = $_GET['hall'];
$seat	  	  = $_GET['seat'];


$tier_seat =    "SELECT ts.tier_name, ts.tier_price
                 FROM seat s
                 JOIN tier_seat ts ON s.tier_seat_id = ts.tier_seat_id
                 WHERE s.seat_id = '".$seat."' AND s.hall_id = '".$hall."';";

$tierQuery = mysqli_query($conn, $tier_seat);
$tier = mysqli_fetch_assoc($tierQuery);

$titleQuery =  mysqli_query($conn,"SELECT movie_name FROM movie WHERE movie_id = $movie_id");
$title = mysqli_fetch_assoc($titleQuery);

$stQuery = "SELECT * 
            FROM show_time 
                JOIN show_annoucement ON show_time.annoucement_id = show_annoucement.annoucement_id
                JOIN slot_time ON show_time.slot_time_id = slot_time.slot_time_id
            WHERE show_annoucement.movie_id = '$movie_id' AND UPPER(DATE_FORMAT('$date','%a')) = slot_time.day_of_week AND time_start = '$timestart'
            ORDER BY time_start;";
$showTime = mysqli_query($conn, $stQuery);
$row = mysqli_fetch_assoc($showTime);

$_SESSION['an_id']      = $row['annoucement_id'];
$_SESSION['slt_id']     = $row['slot_time_id'];
$_SESSION['seat_id']    = $seat;
$_SESSION['hall_id']    = $hall;
$_SESSION['price']      = $tier['tier_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Check Out</title>
</head>
<body>
<section class="section-form">
            <div class="row">
                <h2>Check Out</h2>
            </div>
             <div class="row">
                <form method="get" action="ticket_insert.php" name="TICKET" class="contact-form">

                    <div class = "row">
                        <div class="col span-1-of-3">
                            <label for="TITLE">Movie Title:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <?php echo $title['movie_name']; ?>
                        </div>
                    </div>

                    <div class = "row">
                        <div class="col span-1-of-3">
                            <label for="date">Choose Date:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <?php echo $date; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for ="showtime">Choose ShowTime:</label>
                        </div>
                        <div class="col span-2-of-3">
                                <?php echo $timestart?> 
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="hall">Choose Hall:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <?php echo $hall?>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Choose Seat:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <?php echo $seat?>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Seat Type:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <?php echo $tier['tier_name']?>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Seat Price:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <?php echo $tier['tier_price'] ?>
                    </div>

                        <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <a class='btn-table' href="ticket_booking.php?movie_id=<?php echo $movie_id;?>">Back</a>
                            <input type="submit" value="Confirm">
                        </div>
                    </div>
                    </div>
                </form>
             </div>
        </section>
    </body>
</html>
</body>
</html>