<?php
    require('connect.php');
    session_start();
    $Movie_ID  = $_GET['movie_id'];
    $_SESSION['movie_id'] = $Movie_ID;
    $sql = 'select * from movie where movie_id = '.$Movie_ID.';';
    $objQuery = mysqli_query($conn,$sql);
?>
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
        <Title>Update Movie</Title>
    </head>
    
    <body>
        <section class="section-form">
            <div class="row">
                <h2>Edit Movie Information</h2>
            </div>
             <div class="row">
                <form method="get" action="movie_update_process.php?movie_id=<?php echo $Movie_ID; ?>" name="MOVIE" class="contact-form">
                <?php 
                        while($row = mysqli_fetch_assoc($objQuery)){
                ?>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="Title">Movie Title</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="MovieName" value="<?php echo $row['movie_name'] ?>"  required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="duration">Duration</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="number" name="Duration" value="<?php echo $row['duration'] ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="GetInDate">Get In Date</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="date" name="GetInDate" value="<?php echo $row['get_in_date'] ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="GetOutDate">Get Out Date</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="date" name="GetOutDate" value="<?php echo $row['get_out_date'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="UPDATE">
                        </div>
                    </div>
                    <?php } ?>
                </form>
             </div>
        </section>
        
    
    </body>
</html>
 






