<?php
	session_start();
    require("connect.php");
    $id = $_SESSION['user_login'];
	$is_ok = true;
    $check = mysqli_query($conn,'select * FROM member WHERE member_id = "'.$id.'";');
	if ($check->num_rows === 0) $is_ok = false;
	else {
            $sql = '
                    SELECT *,movie_name,day_of_week,time_start
                    FROM ticket t
                    JOIN show_annoucement sa ON t.annoucement_id = sa.annoucement_id
                    JOIN movie m ON sa.movie_id = m.movie_id
                    JOIN slot_time st ON t.slot_time_id = st.slot_time_id
                    WHERE member_id = "'.$id.'";
                    ';
            $objQuery = mysqli_query($conn, $sql);
	}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <Title>Booking History</Title>
</head>
<body>
    <?php 
        if($is_ok === true){ 
    ?>
    <section class="section-form">
        <div class="row">
            <h2>View Booking History</h2>
        </div>
        <div class="row">
        <table>
            <tr>
                <th width="70">
                    <div>No</div>
                </th>

                <th width="125">
                    <div>Ticket_ID</div>
                </th>

                <th width="150">
                    <div>Booking Date</div>
                </th>

                <th width="150">
                    <div>Title</div>
                </th>

                <th width="200">
                    <div>Show Time</div>
                </th>

                <th width="100">
                    <div>Seat</div>
                </th>

                <th width="100">
                    <div>Hall</div>
                </th>

                <th width="125">
                    <div>Price</div>
                </th>

                <th width="125">
                    <div>Pay Status</div>
                </th>
            </tr>

            <?php
                $i = 1;
                while ($objResult = mysqli_fetch_assoc($objQuery)) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $objResult["ticket_id"]; ?></td>
                <td><?php echo $objResult["booking_date"]; ?></td>
                <td class='left_a'><?php echo $objResult["movie_name"]; ?></td>
                <td class='left_a'><?php echo $objResult["day_of_week"].' '.$objResult["time_start"];?></td>
                <td><?php echo $objResult["seat_id"]; ?></td>
                <td><?php echo $objResult["hall_id"]; ?></td>
                <td><?php echo $objResult["total_price"]; ?></td>
                <td><?php echo $objResult["pay_status"]; ?></td>
            </tr>
            <?php
                $i++;
                }
            ?>
        </table>
        </div>
        <?php
            $objQuery->free_result();
            mysqli_close($conn);
        ?>
        
        <div class="row">
            <div class="col span-2-of-3">
                 <a class="btn btn-std back_button" href="index.php">Back</a>
            </div> 
        </div>
        <?php  }
        else{?>
             <div class="row">
                <h2>This phone number is not registerd</h2>
            </div>
        <?php } ?>
    </section>
</body>

</html>
