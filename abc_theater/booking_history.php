<?php
session_start();
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
    <Title>Booking History</Title>
</head>

<body>
    <section class="section-form">
        <div class="row">
            <h2>View Booking History</h2>
        </div>
        <div class="row">
            <form method="GET" action="viewdata.php" class="contact-form">

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>Phone Number:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="tel" name="Phone" placeholder=" e.g. 999-999-9999" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label>&nbsp;</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="submit" value="View">
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
