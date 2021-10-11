<?php 
class PaymentController{
    function payment(){
        $login_check = Session::get('customer_login');
	    if ($login_check == false) {
            header('Location:?page=login&action=login');
            Session::set('login_cart', true);
	}
        require 'payment.php';
    }

    function offlinepayment(){
        $ct = new cart();
        $cs = new customer();
        if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
            $customer_id = Session::get('customer_id');
            $insertOrder = $ct->insertOrder($customer_id);
            $delCart = $ct->del_all_data_cart();
            $id = Session::get('customer_id');
            $get_customers = $cs->get_mail($id);
            header('Location:?page=payment&action=success');
        }
        require 'offlinepayment.php';
    }

    function success(){
        require 'success.php';
    }
}

?>