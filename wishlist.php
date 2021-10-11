<?php
include 'inc/header.php';
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">
			<div class="cartpage">
			    	<h2 style="width: 100%;text-align: center;">Wishlist</h2>
						<table class="tblone">
							<tr>
								<th width="10%">No.</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Action</th>
							</tr>
							<?php
								$customer_id = Session::get('customer_id');
								$get_wishlist = $product->get_wishlist($customer_id);
								if ($get_wishlist) {
    								$i = 0;
    								while ($result = $get_wishlist->fetch_assoc()) {
       									 $i++;
        					?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></td>
								<td>
									<a  href="?page=wishlist&action=wishlist&proid=<?php echo $result['productId'] ?>">Remove</a> ||
									<a  href="?page=details&action=detailscreen&proid=<?php echo $result['productId'] ?>">Buy Now</a>
								</td>
							</tr>
							<?php
    								}
								}
							?>
						</table>
					</div>
					<div class="shopping" style="width: 100%;text-align: center;">
						<div class="shopleft" style="width: 100%">
							<a href="?page=home" style="display: inline-block;"> <img src="images/shop.png" alt="" /></a>
						</div>

					</div>
    	</div>
       <div class="clear"></div>
    </div>
</div>
<?php
include 'inc/footer.php';
?>