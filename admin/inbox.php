<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath . '/../classes/cart.php';
	include_once $filepath . '/../helpers/format.php';
?>
<?php
	$ct = new cart();
	if (isset($_GET['shiftid'])) {
		$id = $_GET['shiftid'];
		$shifted = $ct->shifted($id);
		header('Location:?');
	}

	if (isset($_GET['delid'])) {
		$id = $_GET['delid'];
		$del_shifted = $ct->del_shifted($id);
	}
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
						<thead>
							<tr>
								<th>No.</th>
								<th>Order Time</th>
								<th>Product</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Cs Id</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$ct = new cart();
								$fm = new Format();
								$get_inbox_cart = $ct->get_inbox_cart();
								if ($get_inbox_cart) {
									$i = 0;
									while ($result = $get_inbox_cart->fetch_assoc()) {
										$i++;
							?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $fm->formatDate($result['date_order']) ?></td>
								<td><?php echo $result['ProductName'] ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $result['price'] . ' ' . 'VNĐ' ?></td>
								<td><?php echo $result['customer_id'] ?></td>
								<td><a href="customer.php?customerid=<?php echo $result['customer_id'] ?>">View Customer</a></td>
								<td>
									<?php
										if ($result['status'] == 0) {
									?>
									<a href="?shiftid=<?php echo $result['id'] ?>">Pending</a>
									<?php
										} elseif ($result['status'] == 1) {
									?>
									<?php
										echo 'Shifting..';
									?>
									<?php
										}
									?>
								</td>
							</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
