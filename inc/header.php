<?php 
	include_once 'lib/session.php';
	Session::init();
?>

<?php
	require_once "vendor/autoload.php";
	use Firebase\JWT\JWT;
	$key = "example_key";
?>
<?php 
    $db = new Database();
    $fm = new Format();
    $ct = new cart();
    $us = new user();
    $br = new brand();
    $cat = new category();
    $cs = new customer();
    $product = new product();
?>
<?php
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Electronic Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" type="image/png" href="images/favicon1.png"/> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/script-frontend.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<script type="text/javascript" src="js/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-4.5.0-dist/css/bootstrap.min.css"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
<div style="max-width: 1300px;margin-left: auto;margin-right: auto;">
  	<div style="width:100%" class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href=""><img style="height: 150px;max-width:350px;transform: translate(20px, 0);" src="images/logo_web.png" alt="" /></a>
			</div>
			<div class="header_top_right">
				<div style="transform: translate(5%, 0);">
					<div class="search_box">
				    	<form action="?page=search&action=search" method="POST">
							<input type="text" placeholder="Search for products" name="tukhoa" value = "<?=$_POST["tukhoa"] ?? ""?>">
				    		<input type="submit" name="search_product" value="Search">
				    	</form>
			    	</div>
			    	<div class="shopping_cart">
						<div class="cart">
							<a href="?page=cart&action=cart" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product">
									<?php
										$check_cart = $ct->check_cart();
										if ($check_cart) {
											$sum = 0;
											$qty = 0;
											while($result = $check_cart->fetch_assoc()){
												$product_sum = $result["price"]*$result["quantity"]*1.1 ;
												$sum = $sum + $product_sum;
												$qty += $result["quantity"];
											}
											echo $qty;
										} else {
											echo '0';
										}
									?>
								</span>
							</a>
						</div>
			      	</div>
				  	<?php
						if (isset($_GET['customer_id'])) {
							$customer_id = $_GET['customer_id'];
							// Khi logout xoa gio hang hien tai
							$delCart = $ct->del_all_data_cart();
							Session::destroy();
							setcookie('customer_name', null, time() - 36000);
							setcookie('customer_login', null, time() - 36000);
							setcookie('customer_id', null, time() - 36000);
						}
					?>
		   			<div class="login">
		    			<?php
							if (isset($_COOKIE['customer_login'])) {

								$decoded = JWT::decode($_COOKIE['customer_name'], $key, array('HS256'));
								$decoded1 = JWT::decode($_COOKIE['customer_id'], $key, array('HS256'));
								$decoded2 = JWT::decode($_COOKIE['customer_login'], $key, array('HS256'));

								Session::set('customer_name', $decoded->customer_name);
								Session::set('customer_id', $decoded1->customer_id);
								Session::set('customer_login', $decoded2->customer_login);

								$login_check = Session::get('customer_login');
								if ($login_check == false) {
									echo '<a href="?page=login&action=login" style="font-size:16px;text-align:center;line-height:35px;">Login</a></div>';
								} else {
									echo '<a href="?customer_id=' . Session::get('customer_id') . '" style="font-size:16px;text-align:center;line-height:35px;">Logout</a></div>';
								}
							} else {
								$login_check = Session::get('customer_login');
								if ($login_check == false) {
									echo '<a href="?page=login&action=login" style="font-size:16px;text-align:center;line-height:35px;">Login</a></div>';
								} else {
									echo '<a href="?customer_id=' . Session::get('customer_id') . '" style="font-size:16px;text-align:center;line-height:35px;">Logout</a></div>';
								}
							}
						?>
		   </div>
			  </div>

		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="?page=home">Home</a></li>
	  <li><a href="?page=product&action=product">Products</a> </li>
	  <li><a href="?page=cart&action=cart">Cart</a></li>
	  <?php
$login_check = Session::get('customer_login');

if ($login_check == false) {
    echo '';
} else {
    echo '<li><a href="?page=profile&action=profile">Profile</a> </li>';
    echo '<li><a href="?page=order&action=order">Order</a> </li>';
    echo '<li><a href="?page=wishlist&action=wishlist">Wishlist</a> </li>';
}
?>
	  <li><a href="?page=contact&action=contact">Contact</a> </li>
	  <div class="clear"></div>
	</ul>
</div>
<script>
	 $(window).scroll(function() {
		$( ".menu" ).css("opacity","0.7");
		if($(this).scrollTop() == 0){
			$( ".menu" ).css("opacity","1");
    }
});
</script>
