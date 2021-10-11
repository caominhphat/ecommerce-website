<!-- ---------------------------------------- Insert header , slider vao web------------------------>

<?php
	include 'inc/header.php';
?>
<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Main----------------------------------------------- -->

 <div class="main">
    <div class="content">
		<?php
			$get_all_brand = $product->show_all_brand();
			if ($get_all_brand) {
				while ($result = $get_all_brand->fetch_assoc()) {
        ?>

    	<div class="content_bottom">
    		<div class="heading">
    			<h3>Latest from <?php echo $result["brandName"]; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>

	      <div class="section group">
		  	<?php
				$get_all_product_of_brand = $product->show_all_product_of_brand($result["brandId"]);
        		if ($get_all_product_of_brand) {
            		while ($result1 = $get_all_product_of_brand->fetch_assoc()) {
            ?>

			<div class="grid_1_of_4 images_1_of_4">
				<div class="box">
					<img  style="width: 250px;height:250px;" src="admin/uploads/<?php echo $result1['image'] ?>" alt="" />
					<div class="overlay">
						<a href="?page=details&action=detailscreen&proid=<?php echo $result1['productId'] ?>"><i class="fas fa-info-circle"></i>  Details</a>
						<form id="myform" method="post" action="?page=product&action=product">
							<input type="hidden" name="id" value="<?php echo $result1['productId'] ?>" />
							<input type="hidden" class="buyfield" name="quantity" value="1" min="1"/>
							<a name="submit" href="javascript:;" ><i class="fas fa-cart-plus"></i>  Add to cart</a>
						</form>
					</div>
				</div>
				<h2><?php echo $result1['productName'] ?></h2>
				<p><span class="price"><?php echo $fm->format_currency($result1['price']) . " " . "VNĐ" ?></span></p>
			</div>

			<?php
					}
        		}
        	?>
			</div>

			<?php
					}
				}
			?>
    </div>
 </div>
<!-- -------------------------------------------------------------------------------------------- -->

 <!-- ---------------------------------------- Insert footer vao web------------------------------------>
<?php
include 'inc/footer.php';
?>