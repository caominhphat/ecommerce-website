<?php

$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/database.php';
include_once $filepath . '/../helpers/format.php';
?>


<?php
/**
 *
 */
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // xử lí backend

    public function insert_product($data, $files)
    {

        // connect ten các trường moi them toi db
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);

// Kiểm tra và lấy hình ảnh truyền vào folder uploads trong admin
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $category == "" || $brand == "" || $product_desc == "" || $price == "" || $type == "" || $file_name == "") {
            $alert = "<span class='error'> Các thông tin về sản phẩm không được trống</span>";
            return $alert;
        } else {

            // load hihf ảnh vào foldẻ uploads
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName,catId ,brandId ,product_desc ,price ,type ,image) VALUES('$productName ', '$category' ,'$brand','$product_desc','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Thêm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Thêm thất bại</span>";
                return $alert;
            }
        }

    }

    public function show_product()
    {
        // $query = "SELECT * FROM tbl_product order by productId desc";

        $query = "SELECT tbl_product.*, tbl_category.catName ,tbl_brand.brandName
		FROM tbl_product

		INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId

		INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId

		order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product where productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_product($id)
    {
        $query = "DELETE FROM tbl_product where productId = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Xóa thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Xóa thất bại</span>";
            return $alert;
        }
    }

    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
        //Những file ảnh được phép up
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        // Tách file hình 123.png thành mảng gồm 123. và png
        $div = explode('.', $file_name);
        // Lấy ra extension của file ảnh , ví dụ là png
        $file_ext = strtolower(end($div));
        // random số từ 1 đến 10 để tạo ra 1 tên mới cho file ảnh khi đưa vào db
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $type == "") {
            $alert = "<span class='error'>Các trường dữ liệu không được trống</span>";
            return $alert;
        } else {
            //Nếu người dùng chọn thay đổi ảnh
            if (!empty($file_name)) {
                // Nếu đuôi file ảnh ko nằm trong $permitted : png,jpeg,gif,jpg
                if (in_array($file_ext, $permited) === false) {
                    // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    $alert = "<span class='success'>Bạn chỉ có thể chọn file ảnh có đuôi:-" . implode(', ', $permited) . "</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_product SET
					productName = '$productName',
					brandId = '$brand',
					catId = '$category',
					type = '$type',
					price = '$price',
					image = '$unique_image',
					product_desc = '$product_desc'
					WHERE productId = '$id'";

            } else {
                //Nếu người dùng không thay đổi ảnh mới
                $query = "UPDATE tbl_product SET
					productName = '$productName',
					brandId = '$brand',
					catId = '$category',
					type = '$type',
					price = '$price',
					product_desc = '$product_desc'
					WHERE productId = '$id'";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Sửa sản phẩm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Sửa sản phẩm thất bại</span>";
                return $alert;
            }

        }

    }

// xử lí front end
    public function getproduct_feathered()
    {
        $query = "SELECT * FROM tbl_product where type = '1' order by RAND() LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_new()
    {

        $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
        $result_new = $this->db->select($query);
        return $result_new;
    }

    public function get_details($id)
    {
        $query = "

			SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId

			INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
			WHERE tbl_product.productId = '$id'

			";

        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestDell()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '15' order by productId desc LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestOppo()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '5' order by productId desc LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestHuawei()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '8' order by productId desc LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestSamsung()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '3' order by productId desc LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertWishlist($productid, $customer_id)
    {
        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

        $check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
        $result_check_wlist = $this->db->select($check_wlist);

        if ($result_check_wlist) {
            $msg = "<span style='color:red; font-size:13px;'>Product Already Added to Wishlist</span>";
            return $msg;
        } else {

            $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();

            $productName = $result["productName"];
            $price = $result["price"];
            $image = $result["image"];

            $query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
            $insert_wlist = $this->db->insert($query_insert);

            if ($insert_wlist) {
                $alert = "<span style='color:green; font-size:13px;'>Added to Wishlist Successfully</span>";
                return $alert;
            } else {
                $alert = "<span style='color:red; font-size:13px;'>Added to Wishlist Not Success</span>";
                return $alert;
            }
        }
    }

    public function get_wishlist($customer_id)
    {
        $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_wlist($proid, $customer_id)
    {
        $query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function show_all_brand()
    {
        $query = "SELECT *
			FROM tbl_brand
			order by brandId desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_all_product_of_brand($id)
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '$id' order by productId desc LIMIT 4 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function search_product($tukhoa)
    {
        $count = 0;
        $tukhoa = $this->fm->validation($tukhoa);
        $queryBrand = "SELECT * FROM tbl_brand";
        $queryBrand = $this->db->select($queryBrand);
        if ($queryBrand) {
            while ($resultBrand = $queryBrand->fetch_assoc()) {
                if (strtolower($resultBrand['brandName']) == strtolower($tukhoa)) {
                    $brandId = $resultBrand['brandId'];
                    $query = "	SELECT tbl_product.*, tbl_brand.brandId
									FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
									WHERE tbl_product.brandId ='$brandId'  ";
                    $result = $this->db->select($query);
                    $count++;
                    return $result;
                }
            }
        }
        if ($count == 0) {
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;
        }

    }
}
?>