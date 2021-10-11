<?php
	include 'inc/header.php';
?>
<style>
	.btn{
		display:inline-block;
		height:60px;
		max-width : 250px;
		background-color: #CD853F;
		font-size: 14px;
		color: white;
		border: #CD853F;
		font-weight: bold;
		border-bottom-right-radius: 10px;
		border-bottom-left-radius: 10px;
		border-top-right-radius: 10px;
		border-top-left-radius: 10px;
	}
	.btn:hover{
		transform: scale(1.2);
	}
</style>

 <div class="main">
    <div class="content">
    	<div class="cartoption">
			<div class="cartpage">
			    		<h2 style="width: 100%;text-align: center;">Your Details Ordered</h2>
						<table class="tblone">
							<tr>
								<th width="10%">ID</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="10%">Date</th>
								<th width="10%">Status</th>
								<th width="10%">Action</th>
							</tr>
							<?php
								$customer_id = Session::get('customer_id');
								$get_cart_ordered = $ct->get_cart_ordered_1($customer_id);
								if ($get_cart_ordered) {
									$i = 0;
									$qty = 0;
									$total = 0;
									while ($result = $get_cart_ordered->fetch_assoc()) {
										$i++;
										$total = $result['price'] * $result['quantity'];
        					?>
							<tr>
								<td class="check_sendmail"><?php echo $i; ?></td>
								<td><?php echo $result['ProductName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $fm->formatDate($result['date_order']) ?></td>
								<td>
									<?php
										if ($result['status'] == '0') {
											echo 'Pending';
										} elseif ($result['status'] == 1) {
            						?>
									<span>Shifting</span>
									<?php
										}
        							?>
								</td>

								<?php
									if ($result['status'] == '0') {
            					?>

								<td><?php echo 'N/A'; ?></td>

								<?php
        							} elseif ($result['status'] == '1') {
            					?>

								<td><a href="?page=order&action=order&confirmid=<?php echo $result['id'] ?>">Confirmed</a></td>
								<?php
									} else {
            					?>
								<td><?php echo 'Received'; ?></td>
								<?php
									}
        						?>
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
						<div>
							<form action="?page=sendmail&action=sendmail" method="POST" id="mail_form">
								<input type="submit" id="sendMail" value="Receive Your Order Bill On Email" class="btn">
							</form>
						</div>
					</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
 <script src="js/sendmail.js"></script>
 
<?php
include 'inc/footer.php';
?>