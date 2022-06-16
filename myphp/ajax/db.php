<?php
// Create connection

// Check connection


function MYSQL_GETDATA($servername, $username, $password,$sql){
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn->query($sql);
}
?>