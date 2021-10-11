<?php 
    // Create connection
    $conn = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    mysqli_set_charset($conn,"utf8");
?>