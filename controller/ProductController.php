<?php 
    class ProductController{
        function product(){
            $ct = new cart();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'];
                $quantity = $_POST['quantity'];
                $insertCart = $ct->add_to_cart($quantity, $id);
            }
            require 'products.php';
        }
    }
?>