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
        <Title>Login</Title>
    </head>
    
    <body>

        <section class="section-form">
            <div class="row">
                <h2>Login</h2>
            </div>
             <div class="row">
                <form method="post" action="login_process.php" name="Login" class="contact-form">

                    <?php if(isset($_SESSION['error'])){?>
                        <div>
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="Email" placeholder="Your email" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="password">Password</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="password" name="Password" placeholder="8 character password" minlength="8" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </form>
             </div>
        </section>
        
      
    </body>
</html>