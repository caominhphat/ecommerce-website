<?php 
    class OrderController{
        function order(){
            $login_check = Session::get('customer_login');
	        if ($login_check == false) {
		        header('Location:?page=login&action=login');
	        }
            $ct = new cart();
            if (isset($_GET['confirmid'])) {
                $id = $_GET['confirmid'];
                $shifted_confirm = $ct->shifted_confirm($id);
            }
            require 'orderdetails.php';
        }
    }
?>