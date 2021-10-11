<?php 
	include 'inc/header.php';
?>
<div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
				<h2 style="width: 100%;text-align: center;">Edit Profile Customers</h2>
	    		<div class="clear"></div>
    		</div>
			<form action="" method="post" id="update_form">
				<table class="tblone">
					<tr>
						<?php
							if(isset($UpdateCustomers)){
								echo '<td colspan="3">'.$UpdateCustomers.'</td>';
							}
						?>
					</tr>
					<?php
						$id = Session::get('customer_id');
						$get_customers = $cs->show_customers($id);
						if($get_customers){
							while($result = $get_customers->fetch_assoc()){
					?>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input class="update_input" type="text" name="name" value="<?php echo $result['name'] ?>"></td>
					</tr>
					
					<tr>
						<td>Phone</td>
						<td>:</td>
						<td><input class="update_input" type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
					</tr>
				
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input class="update_input" type="text" name="email" value="<?php echo $result['email'] ?>"></td>
					</tr>

					<tr>
						<td>Address</td>
						<td>:</td>
						<td><input class="update_input" type="text" name="address" value="<?php echo $result['address'] ?>"></td>						
					</tr>

					<tr>
						<td>Old Password</td>
						<td>:</td>
						<td><input class="update_input" type="password" name="oldpassword" value=""></td>
					</tr>

					<tr>
						<td>New Password</td>
						<td>:</td>
						<td><input class="update_input" type="password" name="password" value=""></td>
					</tr>

					<tr>
						<td>Confirm New Password</td>
						<td>:</td>
						<td><input class="update_input" type="password" name="password_confirmation" value=""></td>
					</tr>

					<tr>
						<td colspan="3"><input type="submit" name="save" value="Save"></td>	
					</tr>
					
					<?php
							}
						}
					?>
				</table>
			</form>
 		</div>
 	</div>
<script src="vendor/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/script-login.js"></script>
<?php 
	include 'inc/footer.php';
?>
