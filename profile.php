<?php
include 'inc/header.php';
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top" style="text-align: center;">
	    		<h2 style="width: 100%;text-align: center;">Profile Customers</h2>
	    		<div class="clear"></div>
    		</div>
			<table class="tblone">
				<?php
					$id = Session::get('customer_id');
					$get_customers = $cs->show_customers($id);
					if ($get_customers) {
						while ($result = $get_customers->fetch_assoc()) {
        		?>
				<tr>
					<td>Name</td>
					<td>:</td>
					<td><?php echo $result['name'] ?></td>
				</tr>

				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><?php echo $result['phone'] ?></td>
				</tr>

				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email'] ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><?php echo $result['address'] ?></td>
				</tr>
				<tr>
					<td colspan="3"><a href="?page=profile&action=edit">Edit Profile</a></td>
				</tr>
				<?php
						}
					}
				?>
			</table>
 		</div>
 	</div>
<?php
include 'inc/footer.php';
?>
