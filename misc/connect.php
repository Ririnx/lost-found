<?php
    $server="localhost";
    $user="root";
    $pass="";
    $dbname="lost&found";

    $conn=new mysqli($server,$user,$pass,$dbname);
        if ($conn->connect_error){
            die("<script>alert('Connection Failed: " . $conn->connect_error . "');</script>");
        }
        
?>