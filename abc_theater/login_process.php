<?php
    require('connect.php');
    session_start();
    $email = $_POST["Email"];
    $pass = $_POST["Password"];
    $qry=mysqli_query($conn,"select * from member where email='$email' and member_pw='$pass';");
    if($qry->num_rows > 0){
        $row = mysqli_fetch_assoc($qry);
        if($row['role'] === 'admin'){
            $_SESSION['admin_login'] = $row['member_id'];
            header("location:admin.php");
        }
        else{
            $_SESSION['user_login'] = $row['member_id'];
            header("location:index.php");
        }
    }
    else{
        $_SESSION['error']="Login Failed!";
	    header("location:login.php");
    }
?>