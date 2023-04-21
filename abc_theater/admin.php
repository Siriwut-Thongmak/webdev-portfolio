<?php
    require('connect.php');
    session_start();
    $name=$_SESSION['admin_login'];
    if(!isset($_SESSION['admin_login']))
        header('location:login.php');
    $sql = mysqli_query($conn,"SELECT member_name FROM member WHERE member_id = $name;");
    $row = mysqli_fetch_assoc($sql);
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
    <Title>Admin Page</Title>
</head>

<body>
    <header>
        <div class="header-text-box">
            <h1>Welcome Admin <?php echo $row['member_name'] ?></h1>
                <a class="btn btn-std" href="member_dashboard.php">Manage User</a>
                <a class="btn btn-ghost" href="movie_list.php">Manage Movie</a>
                <a class="btn btn-green-ghost" href="ticket_dashboard.php">Manage Ticket</a>
                <a class="btn btn-ghost" href="logout.php">Logout</a>
        </div>
    </header>
</body>