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
        <Title>Register</Title>
    </head>
    
    <body>

        <section class="section-form">
            <div class="row">
                <h2>Member Register</h2>
            </div>
             <div class="row">
                <form method="post" action="member_insert.php" name="MEMBER" class="contact-form">
                    <?php if(isset($_SESSION['reg_fail'])){?>
                        <div>
                            <?php 
                                echo $_SESSION['reg_fail'];
                                unset($_SESSION['reg_fail']);
                            ?>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="name">Name</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="Name" placeholder="Your name" required>
                        </div>
                    </div>

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
                            <input type="password" name="Password" id="Password" placeholder="8 character password" minlength="8" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="Phone">Phone</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="tel" name="Phone" id="Phone" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="BIRTH_DATE">Birth Date</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="date" name="BIRTH_DATE" id="BIRTH_DATE" placeholder="Your Birth Date" required>
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