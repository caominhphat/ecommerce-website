<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/database.php';
include_once $filepath . '/../helpers/format.php';
?>


<?php
/**
 *
 */
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function add_to_cart($quantity, $id)
    {
        // Kiểm tra giá trị của quantity có hợp lệ không
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();
        $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId ='$sId'";
        $result_check_cart = $this->db->select($check_cart);
        if ($result_check_cart) {
            while($result = $result_check_cart->fetch_assoc()){
                $oldquantity = $result['quantity'];

                $query_product_available = " UPDATE tbl_cart
                SET quantity = $quantity + quantity
                WHERE productId = '$id' AND sId ='$sId' ";
               
                $result_product_available = $this->db->update($query_product_available);

                if($result_product_available){
                    $msg = "<span style='color:green; font-size:13px;'>Add product successfully</span>";
                    return $msg;
                }
            }
        } else {
            //Lấy data của sản phẩm trong DB product ra
            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query)->fetch_assoc();

            $image = $result["image"];
            $price = $result["price"];
            $productName = $result["productName"];

            // đưa vào DB cart
            $query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
            $insert_cart = $this->db->insert($query_insert);
            if ($insert_cart) {
                $msg = "<span style='color:green; font-size:13px;'>Add product successfully</span>";
                return $msg;
            } else {header("Location:?page=undefinedpage&action=undefinedpage");}
        }

    }

    public function get_product_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_quantity_cart($quantity, $cartId)
    {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "UPDATE tbl_cart SET
					quantity = '$quantity'
					WHERE cartId = '$cartId'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span style='color:green;font-size:18px;' class='success'>Update Succesfully</span>";
            return $msg;
        } else {
            $msg = "<span style='color:red;font-size:18px;' class='error'>Update Failed</span>";
            return $msg;
        }

    }

    public function del_product_cart($cartid)
    {
        $cartid = mysqli_real_escape_string($this->db->link, $cartid);
        $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "<span style='color:green;font-size:18px;' class='success'>Delete Successfully</span>";
            return $msg;
        }
    }

    public function check_cart()
    {
        // Lấy ra cart của phiên làm việc hiện tại
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_compare($customer_id)
    {
        $sId = session_id();
        $query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id'";
        $result = $this->db->delete($query);
        return $result;
    }
    public function del_all_data_cart()
    {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->delete($query);
    }

    public function insertOrder($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $get_product = $this->db->select($query);
        if ($get_product) {
            while ($result = $get_product->fetch_assoc()) {
                $productid = $result['productId'];
                $productName = $result['productName'];
                $quantity = $result['quantity'];
                $price = ($result['price'] * $quantity) + ($result['price'] * $quantity) * 0.1;
                $image = $result['image'];
                $customer_id = $customer_id;
                $query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
                $insert_order = $this->db->insert($query_order);
            }
        }
    }
    public function getAmountPrice($customer_id)
    {
        $query = "SELECT price, quantity FROM tbl_order WHERE customer_id = '$customer_id' AND status = 0";
        $get_price = $this->db->select($query);
        return $get_price;
    }

    public function get_cart_ordered($customer_id)
    {
        $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' AND status = 0";
        $get_cart_ordered = $this->db->select($query);
        return $get_cart_ordered;
    }
    public function get_cart_ordered_1($customer_id)
    {
        $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
        $get_cart_ordered = $this->db->select($query);
        return $get_cart_ordered;
    }

    public function get_inbox_cart()
    {
        $query = "SELECT * FROM tbl_order ORDER BY date_order";
        $get_inbox_cart = $this->db->select($query);
        return $get_inbox_cart;
    }

    public function shifted($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE tbl_order SET
					status = '1'
					WHERE id = '$id' ";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Update Order Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Update Order Failed</span>";
            return $msg;
        }
    }

    public function del_shifted($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_order
					WHERE id = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>Detele Order Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Delete Order Failed</span>";
            return $msg;
        }
    }

    public function shifted_confirm($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_order WHERE id = '$id'";
        $result = $this->db->delete($query);

    }

}
?>