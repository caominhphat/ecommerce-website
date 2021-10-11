<?php 
  class DetailsController{
    function detailscreen() {  
      $ct = new cart();
      $cs = new customer();
      $product = new product();
      if (!isset($_GET['proid']) || $_GET['proid'] == null) {
        echo "<script>window.location ='404.php'</script>";
      } else {
        $id = $_GET['proid'];
      }
      $customer_id = Session::get('customer_id');
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
        $productid = $_POST['productid'];
        $insertWishlist = $product->insertWishlist($productid, $customer_id);
      }
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $insertCart = $ct->add_to_cart($quantity, $id);
      }
      if (isset($_POST['binhluan_submit'])) {
        $product_id = $_GET['proid'];
        $comment = $_POST['binhluan'];
        $binhluan_insert = $cs->insert_binhluan($customer_id, $comment, $product_id);
      }      
        require "details.php";
    }
  }
?>

