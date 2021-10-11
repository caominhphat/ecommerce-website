<?php 
class LoginController {
    function login(){
        $cs = new customer();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $insertCustomers = $cs->insert_customers($_POST);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $login_Customers = $cs->login_customers($_POST);
        }
        require 'login.php';
    }
}


?>