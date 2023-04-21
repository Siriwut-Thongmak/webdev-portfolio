<?php 
    require('connect.php');
    session_start();
    $Member_ID = $_GET['member_id'];
    $_SESSION['member_id'] = $Member_ID;
    $sql_string = "select * from member where member_id = '$Member_ID' ";
    $objQuery = mysqli_query($conn, $sql_string);
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
        <Title>Update Member Data</Title>
    </head>
    
    <body>
        <section class="section-form">
            <div class="row">
                <h2>Update Member Data</h2>
            </div>
             <div class="row">
                <form method="GET" action="member_update_process.php" name="Member" class="contact-form">

                <?php if(isset($_SESSION['update_fail'])){?>
                    <div class = "alert">
                    <?php 
                        echo $_SESSION['update_fail'];
                        unset($_SESSION['update_fail']);
                    ?>
                    </div>
                <?php } ?>

                <?php if(isset($_SESSION['update_succ'])){?>
                    <div class = "alert">
                    <?php 
                        echo $_SESSION['update_succ'];
                        unset($_SESSION['update_succ']);
                    ?>
                    </div>
                <?php } ?>

                    <?php 
                        while($row = mysqli_fetch_assoc($objQuery)){
                    ?>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="name">Name</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="Name" id="Name" value="<?php echo $row['member_name']; ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="email" name="Email" id="Email" value="<?php echo $row['email']; ?>" required>
                            <?php $_SESSION['email'] = $row['email']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="password">Password</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="password" name="Password" id="Password" value="<?php echo $row['member_pw']; ?>" minlength="8" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="Phone">Phone</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="tel" name="Phone" id="Phone" value="<?php echo $row['phone']; ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                            <?php $_SESSION['phone'] = $row['phone']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3">
                            <label for="BIRTH_DATE">Birth Date</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="date" name="BIRTH_DATE" value="<?php echo $row['birth_date']; ?>" id="BIRTH_DATE" required>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                    
                    <div class="row">
                        <div class="col span-1-of-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" value="Update">
                        </div>
                    </div>
                </form>
             </div>
        </section>
        
    </body>
</html>
 
