<?php 
        class SearchController{
            function search(){
                $product = new product();
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_product'])) {
                    if ($_POST['tukhoa'] != null) {
                        $tukhoa = $_POST['tukhoa'];
                        $search_product = $product->search_product($tukhoa);
                    } else {
                        $tukhoa = "NOT FOUND";
                    }
                }
                $ct = new cart();
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $quantity = $_POST['quantity'];
                    $insertCart = $ct->add_to_cart($quantity, $id);
                }
                require 'search.php';
            }
        }
?>