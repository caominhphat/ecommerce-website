<?php
class CartController
{
    public function cart()
    {
        spl_autoload_register(function ($class) {
            include_once "classes/" . $class . ".php";
        });
        $ct = new cart();
        if (isset($_GET['cartid'])) {
            $cartid = $_GET['cartid'];
            $delcart = $ct->del_product_cart($cartid);
        }
        require 'cart.php';
    }

    public function updatecart(){
        spl_autoload_register(function ($class) {
            include_once "classes/" . $class . ".php";
        });
        $ct = new cart();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $cartId = $_POST['cartId'];
            $quantity = $_POST['quantity'];
            $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
            if ($quantity <= 0) {
                $delcart = $ct->del_product_cart($cartId);
            }
        }
        require 'cart.php';
    }

    public function getcart(){
        
    }
}
