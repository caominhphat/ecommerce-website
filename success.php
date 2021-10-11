<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>

<style type="text/css">
	h2.success_order {
		text-align: center;
		color: green;
	}
	p.success_note {
		text-align: center;
		padding: 8px;
		font-size: 17px;
	}
</style>

<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<h2 class="success_order">Success Order</h2>
			<p class="success_note">Current bill : 
				 <?php
					echo $fm->format_currency($_SESSION['current_cart']) . ' VNĐ';
				?>  
			</p>
			<?php
				$customer_id = Session::get('customer_id');
				$get_amount = $ct->getAmountPrice($customer_id);
				if ($get_amount) {
    				$amount = 0;
    				while ($result = $get_amount->fetch_assoc()) {
       					$price = $result['price'];
        				$amount += $price;			
    				}
				}
			?>
			<p class="success_note">Total bill (including bills which are not ordered up yet): 
				<?php
					$total = $amount;
					echo $fm->format_currency($total) . ' VNĐ';
				?> 
			</p>

			
			<p class="success_note">Tracking your order<a href="?page=order&action=order"> Click Here</a></p>
 		</div>
 	</div>
 </div>
</form>

<?php
include 'inc/footer.php';
?>
