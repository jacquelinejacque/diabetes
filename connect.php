<?php

    $conn = new mysqli('localhost','root','','diacare');
    if($conn->connect_error){
        die("connection failed" .$conn->connect_error);
    }else{
        // echo "connection successful";

    }
?>