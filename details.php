<!-- ---------------------------------------- Insert header , slider vao web------------------------>
<?php
include 'inc/header.php';
?>

<style>
	.cmt-form{
		margin-left: 20px;
		width: 50%;
	}
	textarea{
		border-bottom-right-radius: 10px;
		border-bottom-left-radius: 10px;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
		width: 100%;
	}
	.comment{
		border: 1px solid black;
		width: 100%;
		border-bottom-right-radius: 10px;
		border-bottom-left-radius: 10px;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
		background-color : #f2f2f2;
	}
	.comment ul li:first-child{
		margin-top:20px;
	}
	.comment ul li{
		display:inline-block;
		border: 1px solid black;
		border-bottom-right-radius: 10px;
		border-bottom-left-radius: 10px;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
		padding:5px;
		width: 440px;
		margin-top:20px;
	}
	ul{
		margin-left: 20px;
		margin-right: 20px;
	}
	ul li{
		line-height:20px;
	}
	.btn{
		border-bottom-right-radius: 5px;
		border-bottom-left-radius: 5px;
		border-top-right-radius: 5px;
		border-top-left-radius: 5px;
		width: 20%;
		line-height:20px;
		background-color: #A75DCF;
		border: 1px solid #A75DCF;
		color: #FFFFFF;
	}
</style>

<!-- -------------------------------------------------------------------------------------------- -->


<!-- ---------------------------------------- Main----------------------------------------------- -->

<div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
				$get_product_details = $product->get_details($id);
				if ($get_product_details) {
					while ($result_details = $get_product_details->fetch_assoc()) {
        	?>
			<div class="cont-desc span_1_of_2">
				<div class="grid images_3_of_2">
					<img  style="width: 250px;height:250px;" src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?></h2>
					<p><?php echo $fm->textShorten($result_details['product_desc'], 150) ?></p>
					<div class="price">
						<p>Price: <span><?php echo $fm->format_currency($result_details['price']) . " " . "VNĐ" ?></span></p>
						<p>Category: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Brand:<span><?php echo $result_details['brandName'] ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
							<input type="submit" class="buysubmit" name="submit" style="background-color:#EE82EE" value="Add to cart"/>
						</form>
						<?php
							if (isset($insertCart)) {
								echo $insertCart;
							}
        				?>
					</div>
					<div class="add-cart">
						<div class="button_details">
							<form action="" method="POST">
								<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>
								<?php
									$login_check = Session::get('customer_login');
									if ($login_check) {
										echo '<input type="submit" class="buysubmit" name="wishlist" style="background-color: #EE82EE" value="Add to wishlist">';
									} else {
										echo '';
									}
								?>
							</form>
						</div>
						<div class="clear"></div>
						<p>
							<?php
								if (isset($insertWishlist)) {
									echo $insertWishlist;
								}
        					?>
						</p>
					</div>
				</div>
				<div class="product-desc">
					<h2>Comments</h2>
					<div class="comment">
						<ul>
							<?php
								$product_id = $_GET['proid'];
								$getall_comment = $cs->show_comment($product_id);
								if ($getall_comment) {
									while ($result = $getall_comment->fetch_assoc()) {
							?>
							<li>
								<div style="font-weight: bold;"><?php echo $result["name"]; ?></div>
								<div><?php echo $result["comment"]; ?></div>
							</li>
							<br>
							<?php
									}
								}
							?>
						</ul>
						<form action="?page=details&action=detailscreen&proid=<?=$_GET['proid']?>" id="comment" method="POST" class="cmt-form">
							<p><input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan"></p>
							<?php
								$login_check = Session::get('customer_login');
								if ($login_check == false) {
									echo '<p style="margin-left:20px;">Please login to comment <p>';
								} else {
									echo '<p name="binhluan"><textarea rows="5" style="resize: none;" placeholder="Leave a comment" class="form-control" id="cmt" name="binhluan"></textarea></p>
											<p><input type="submit" name="binhluan_submit" class="btn" value="Comment" id="btn">	</p>
											';
								}
							?>
						</form>
						<p name="response"></p>
					</div>
				</div>	
			</div>
			<?php
					}
				}
			?>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php
						$getall_category = $cat->show_category_frontend();
						if ($getall_category) {
							while ($result_allcat = $getall_category->fetch_assoc()) {
        			?>
				    <li><a href="?page=productbycat&action=productbycatscreen&catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
				    <?php
							}
						}
					?>
    			</ul>
 			</div>
 		</div>
 	</div>
	<script>
		function myFunction() {
			window.alert('Your comment will be post later');
		}
	</script>
	<!-- -------------------------------------------------------------------------------------------- -->

 <!-- ---------------------------------------- Insert footer vao web------------------------------------>
<?php
include 'inc/footer.php';
?>