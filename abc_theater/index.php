<?php
require('connect.php');
session_start();
$qry = mysqli_query($conn,"select * from movie WHERE get_out_date IS NULL");
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
        <Title>ABC THEATER</Title>
    </head>
    
    <body>
    <header>
        <nav>
            <div class="row">
            <ul class="main-nav">
						<?php if(isset($_SESSION['user_login'])){
			  		   		$us=mysqli_query($conn,"select * from member where member_id='".$_SESSION['user_login']."'");
        					$user=mysqli_fetch_array($us);
						?>
							<li><a href="viewdata.php"><?php echo $user['member_name'];?></a></li>
							<li><a href="logout.php">Logout</a></li>
						<?php }
							else{
						?>
							<li><a href="login.php">Login</a> </li>
							<li><a href="member_register.php">Register</a><?php }?></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <section class="head">
            <div class="row">
                <h2>Now Showing</h2>
            </div>
    </section>
    <section>
        <?php while($m=mysqli_fetch_assoc($qry)) 
        { ?>
            <div class="row">
                <div class="col span-1-of-4 box">
                    <figure>
                        <a class="moive-btn" href="ticket_booking.php?movie_id=<?php echo $m['movie_id']; ?>"><img src="img/<?php echo $m['movie_id'];?>.jpg"></a>
                    </figure>
                    <div>
                        <h3><?php echo $m['movie_name'] ?></h3>
                        <p><?php echo $m['duration'] ?> minute</p>
                    </div>
                </div>
        <?php } ?>
            </div>
    </section>
    <footer>

    </footer>
    </body>

    
</html>
 
