<?php
require('connect.php');
session_start();


$movie_id = $_GET['movie_id'];


$titleQuery =  mysqli_query($conn,"SELECT movie_name FROM movie WHERE movie_id = $movie_id");
$title = mysqli_fetch_assoc($titleQuery);

$date = date('Y-m-d');
$stQuery = "SELECT * FROM show_time JOIN show_annoucement ON show_time.annoucement_id = show_annoucement.annoucement_id
            JOIN slot_time ON show_time.slot_time_id = slot_time.slot_time_id
            WHERE show_annoucement.movie_id =$movie_id AND UPPER(DATE_FORMAT('$date','%a')) = slot_time.day_of_week ORDER BY time_start;";
$showTime = mysqli_query($conn,$stQuery);


$hallQuery = 'SELECT hall_id FROM hall;';
$hall = mysqli_query($conn,$hallQuery);

$seatQuery = 'SELECT distinct seat_id FROM seat;';
$seat = mysqli_query($conn,$seatQuery);

?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <Title>Booking Ticket</Title>
    </head>
    
    <body>
        <section class="section-form">
            <div class="row">
                <h2>Booking Ticket</h2>
            </div>
             <div class="row">
                <form method="get" action="ticket_check_out.php" name="TICKET" class="contact-form">

                    <div class = "row">
                        <div class="col span-1-of-3">
                            <label for="TITLE">Movie Title:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <?php echo $title['movie_name'];
                            $_SESSION['movie_id'] = $movie_id;?>
                        </div>
                    </div>

                    <div class = "row">
                        <div class="col span-1-of-3">
                            <label for="date">Choose Date:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="date" name="date" value="<?php echo $date; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="showtime">Choose ShowTime:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select id="showtime" name="showtime">
                                <?php while($timeList = mysqli_fetch_assoc($showTime)){ ?>
                                    <option>
                                        <?php echo $timeList['time_start'];
                                        ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                        <div class="col span-1-of-3">
                            <label for="hall">Choose Hall:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select id="hall" name="hall">
                                <?php while($hallList = mysqli_fetch_assoc($hall) ){ ?>
                                    <option>
                                        <?php echo $hallList['hall_id'];?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                        <div class="col span-1-of-3">
                            <label>Choose Seat:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select id="seat" name="seat">
                                <?php while($seatList = mysqli_fetch_assoc($seat) ){ ?>
                                    <option>
                                        <?php echo $seatList['seat_id'];?>
                                    </option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Check Out!">
                        </div>
                    </div>
                    </div>
                </form>
             </div>
        </section>
    </body>
</html>
 






