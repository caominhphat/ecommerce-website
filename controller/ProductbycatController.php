<?php 
  class ProductbycatController{
    function productbycatscreen() { 
      if (!isset($_GET['catid']) || $_GET['catid'] == null) {
        echo "<script>window.location ='404.php'</script>";
      } else {
        $id = $_GET['catid'];
      }   

      $ct = new cart();
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addcart'])) {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $insertCart = $ct->add_to_cart($quantity, $id);
        header('Location:?page=cart&action=cart');
      }
        require "productbycat.php";
    }
  }
?>