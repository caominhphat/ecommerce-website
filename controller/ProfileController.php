<?php
class ProfileController
{
    public function profile()
    {
        $login_check = Session::get('customer_login');
        if ($login_check == false) {
            header('Location:/?page=home');
        }
        require 'profile.php';
    }

    public function edit()
    {
        spl_autoload_register(function ($class) {
            include_once "classes/" . $class . ".php";
        });
        $cs = new customer();
        $login_check = Session::get('customer_login');
        if ($login_check == false) {
            header('Location:?page=login&action=login');
        }
        $id = Session::get('customer_id');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
            $UpdateCustomers = $cs->update_customers($_POST, $id);
        }
        require 'editprofile.php';
    }

}
