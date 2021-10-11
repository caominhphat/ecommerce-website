<?php
class HomeController
{
    public function homescreen()
    {   
        $ct = new cart();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $quantity = $_POST['quantity'];
            $insertCart = $ct->add_to_cart($quantity, $id);
        }
        require "home.php";
    }

    public function detailscreen()
    {
        spl_autoload_register(function ($class) {
            include_once "classes/" . $class . ".php";
        });
        $cat = new category();
        if (!isset($_GET['proid']) || $_GET['proid'] == null) {
            echo "<script>window.location ='404.php'</script>";
        } else {
            $id = $_GET['proid'];
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $quantity = $_POST['quantity'];
            $insertCart = $ct->add_to_cart($quantity, $id);
        }
        require "details.php";
    }
}
