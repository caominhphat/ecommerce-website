<!-- ---------------------------------------- Insert header , slider vao web------------------------>

<?php
	include 'inc/header.php';
	include 'inc/slider.php';
	$fm = new Format();
?>
<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Main----------------------------------------------- -->
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	    <div class="section group">
	      	<?php
				$product_feathered = $product->getproduct_feathered();
				if ($product_feathered) {
					while ($result = $product_feathered->fetch_assoc()) {
        	?>
			<div class="grid_1_of_4 images_1_of_4">
				<div class="box">
					<img  style="width: 250px;height:250px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
					<div class="overlay">
						<a href="?page=details&action=detailscreen&proid=<?php echo $result['productId'] ?>"><i class="fas fa-info-circle"></i>  Detail</a>
						<form id="myform" method="post" action="">
							<input type="hidden" name="id" value="<?php echo $result['productId'] ?>" />
							<input type="hidden" class="buyfield" name="quantity" value="1" min="1"/>
							<a name="submit" href="javascript:;" ><i class="fas fa-cart-plus"></i>  Add to cart</a>
						</form>
					</div>
				</div>
				<h2><?php echo $result['productName'] ?></h2>
				<p><span class="price"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></span></p>
			</div>
			<?php
					}
				}
			?>
		</div>
		<div class="content_bottom">
    		<div class="heading">
    			<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			<?php
				$product_new = $product->getproduct_new();
				if ($product_new) {
					while ($result_new = $product_new->fetch_assoc()) { 
        	?>
			<div class="grid_1_of_4 images_1_of_4">
				<div class="box">
					<img  style="width: 250px;height:250px;" src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" />
					<div class="overlay">
						<a href="?page=details&action=detailscreen&proid=<?php echo $result_new['productId'] ?>"><i class="fas fa-info-circle"></i>  Details</a>
						<form id="myform" method="post" action="?page=home">
							<input type="hidden" name="id" value="<?php echo $result_new['productId'] ?>" />
							<input type="hidden" class="buyfield" name="quantity" value="1" min="1"/>
							<a name="submit"  href="javascript:;" ><i class="fas fa-cart-plus"></i>  Add to cart</a>
						</form>
					</div>
				</div>
				<h2><?php echo $result_new['productName'] ?></h2>
				<p><span class="price"><?php echo $fm->format_currency($result_new['price']) . " " . "VNĐ" ?></span></p>
			</div>
			<?php
				}
				}
			?>
		</div>
    </div>
</div>

 <!-- -------------------------------------------------------------------------------------------- -->

 <!-- ---------------------------------------- Insert footer vao web------------------------------------>
<?php
include 'inc/footer.php';
?>