<?php 
    require "config/config.php";
    require "connectDB.php";

    $email = $_GET["email"];
    $sql = "SELECT * FROM tbl_customer WHERE email = '$email'";

    $result = $conn->query($sql);
    if ( $result->num_rows > 0) {
        echo "false";
    } else {
        echo "true";
    }   
?>