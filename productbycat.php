<!-- ---------------------------------------- Insert header , slider vao web------------------------>

<?php
include 'inc/header.php';
?>
<!-- -------------------------------------------------------------------------------------------- -->

<!-- ---------------------------------------- Main----------------------------------------------- -->

 <div class="main">
    <div class="content">
		<?php
			$name_cat = $cat->get_name_by_cat($id);
			if ($name_cat) {
				while ($result_name = $name_cat->fetch_assoc()) {
        ?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Category : <?php echo $result_name['catName'] ?> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>

		<?php
				}
			}
		?>

	    <div class="section group">
			<?php
				$productbycat = $cat->get_product_by_cat($id);
				if ($productbycat) {
					while ($result = $productbycat->fetch_assoc()) {
        	?>
			<div class="grid_1_of_4 images_1_of_4">
				<div class="box">
					<img  style="width: 250px;height:250px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
					<div class="overlay">
					<a href="?page=details&action=detailscreen&proid=<?php echo $result['productId'] ?>"><i class="fas fa-info-circle"></i>  Detail</a>
						<form id="myform" method="post" action="?page=search&action=search">
							<input type="hidden" name="id" value="<?php echo $result['productId'] ?>" />
							<input type="hidden" class="buyfield" name="quantity" value="1" min="1"/>
							<a name="submit" href="javascript:;" ><i class="fas fa-cart-plus"></i>  Add to cart</a>
						</form>
					</div>
				</div>
				<h2><?php echo $result['productName'] ?></h2>
				<p><?php echo $fm->textShorten($result['product_desc'], 50); ?></p>
				<p><span class="price"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></span></p>
			</div>
			<?php
					}
				} else {
   					 echo 'The category has no products';
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