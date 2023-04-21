<?php

$conn = mysqli_connect('localhost', 'root', '', 'abc_theater');
if ($conn->connect_error): 
    die ("Could not connect to db: " . $conn->connect_error); 
endif;	

?>