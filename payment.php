<?php
	include 'inc/header.php';
?>
<style>
	h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
	}
	.wrapper_method {
	text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    /* margin: 20px; */
    background: cornsilk;
	}
	.wrapper_method a {
    padding: 10px;
    background: green;
    color: #fff;

	}
	.wrapper_method h3 {
   	 margin-bottom: 20px;
	}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3>Payment Method</h3>
	    		</div>
	    		<div class="clear"></div>
	    		<div class="wrapper_method">
		    		<h3 class="payment">Go to payment</h3>
					<a style="background:grey" href="?page=cart&action=cart"> << Go back</a>
		    		<a href="?page=payment&action=offlinepayment">Payment</a>
		    	</div>
    		</div>
 		</div>
 	</div>

<?php
	include 'inc/footer.php';
?>
