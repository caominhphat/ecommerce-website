<?php
	include 'inc/header.php';
?>
<div class="main">
    <div class="content" id="login_content">
    	<div class="login_panel">
        	<h3>Existing Customers</h3>
        	<?php
				if (isset($login_Customers)) {
					echo $login_Customers;
				}
			?>
			<!-- Sign in -->
        	<form action="" method="post">
                <input  type="text" name="email" class="field" placeholder="Enter Email..">
                <input  type="password" name="password1" class="field"  placeholder="Enter Password.." >
                <div class="buttons"><div><input type="submit" name="login" class="grey" value="Sign In"></div></div>
            </form>
        </div>
		 <!-- Sign Up  -->
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<?php
				if (isset($insertCustomers)) {
					echo $insertCustomers;
				}
			?>
    		<form action="" method="POST" class="signup-form">
		   		<table>
		   			<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Enter Name..." >
								</div>

								<div>
									<input type="text" name="phone"  placeholder="Enter Phone..." >
								</div>

								<div>
									<input type="text" name="address"  placeholder="Enter Address..."  >
								</div>
							</td>

							<td>
								<div>
									<input type="text" name="email"  placeholder="Enter Email..."  >
								</div>

								<div>
									<input type="password" name="password" style="width:100%;height:33.6px;margin-top:5px;" placeholder="Enter Password..." >
								</div>

								<div class="form-group">
									<input class="form-control" type="password" name="password_confirmation" style="width:100%;height:33.6px;margin-top:5px;" placeholder="Confirm Password..." >
								</div>
							</td>
		    			</tr>
		    		</tbody>
				</table>
				<div class="search"><div><input type="submit" name="submit" class="grey" value="Create Account"></div></div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
				<div class="clear"></div>
		    </form>
    	</div>
       <div class="clear"></div>
    </div>
</div>
<script type="text/javascript" src="vendor/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="vendor/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
<script src="vendor/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/script-login.js"></script>

<?php
	include 'inc/footer.php';
?>
