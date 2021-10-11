<!-- ---------------------------------------- Insert header , slider vao web------------------------>
<?php
include 'inc/header.php';
?>

<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Main----------------------------------------------- -->

<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2 style="width: 100%;text-align: center;">Your Cart</h2>
                <?php
                    if (isset($update_quantity_cart)) {
                        echo $update_quantity_cart;
                    }
                ?>
                <?php
                    if (isset($delcart)) {
                        echo $delcart;
                    }
                ?>
                <table class="tblone" id="list_cart">
                    <tr>
                        <th width="20%">Product Name</th>
                        <th width="10%">Image</th>
                        <th width="15%">Price</th>
                        <th width="25%">Quantity</th>
                        <th width="20%">Total Price</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php
                        $get_product_cart = $ct->get_product_cart();
                        if ($get_product_cart) {
                            $subtotal = 0;
                            $qty = 0;
                            while ($result = $get_product_cart->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $result['productName'] ?></td>
                        <td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
                        <td><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></td>
                        <td>
                            <form action="?page=cart&action=updatecart" method="post">
                                <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" />
                                <input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>" />
                                <input type="submit" name="submit" value="Update" />
                            </form>
                        </td>
                        <td>
                            <?php
                                $total = $result['price'] * $result['quantity'];
                                echo $fm->format_currency($total) . " " . "VNĐ";
                            ?>
                        </td>
                        <td>
                        <a onclick="return confirm('Do you want to delete this product?');" href="?page=cart&action=cart&cartid=<?php echo $result['cartId'] ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                        $subtotal += $total;
                        $qty = $qty + $result['quantity'];
                            }
                        }
                    ?>
                </table>
                <?php
                    $check_cart = $ct->check_cart();
                    if ($check_cart) {
                ?>
                <table style="float:right;text-align:left;" width="40%">
                    <tr>
                        <th>Sub Total : </th>
                        <td>
                            <?php
                                echo $fm->format_currency($subtotal) . " " . "VNĐ";
                                //Tạo ra biến sum có giá trị bằng $subtotal trong 1 phiên làm việc xác định
                                Session::set('qty', $qty);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>VAT : </th>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td>
                            <?php
                                $vat = $subtotal * 0.1;
                                $gtotal = $subtotal + $vat;
                                echo $fm->format_currency($gtotal) . " " . "VNĐ";
                                Session::set('sum', $gtotal);
                            ?>
                        </td>
                    </tr>
                </table>
                <?php
                    } else {
                        echo 'Cart is empty';
                    }
                ?>
            </div>
            <div style="display:flex">
                    <a style="width:50%;margin: 0px;text-align:right" href="?page=home"> <img src="images/shop.png" alt="" /></a>
                    <a style="width:50%;margin: 0px;text-align:left;width:250px;height:100px;" href="?page=payment&action=payment"> <img src="images/check.png" alt="" /></a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Insert footer vao web------------------------------------>
<?php
include 'inc/footer.php';
?>