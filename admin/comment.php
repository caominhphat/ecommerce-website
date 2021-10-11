<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath . '/../classes/customer_comment.php';
?>
<?php
	$cs = new customer_comment();
	if (isset($_GET['commentid'])) {
		$id = $_GET['commentid'];
		$approveCmt = $cs->approve_comment($id);
		header('Location:?');
	}

	if (isset($_GET['delid'])) {
		$id = $_GET['delid'];
		$del = $cs->del_comment($id);
		header('Location:?');
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
						<th style="width:5%">No.</th>
						<th style="width:20%">Product Name</th>
						<th style="width:15%">Customer</th>
						<th style="width:40%">Comment</th>
						<th style="width:20%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$cs = new customer_comment();
						$get_comment = $cs->show_all_comment();
						if($get_comment) {
							$i = 0;
							while ($result = $get_comment->fetch_assoc()) {
								$i++;
        			?>
					<tr class="odd gradeX">
						<td><?php echo $i; ?></td>
						<td><?php echo $result['productName'] ?></td>
						<td><?php echo $result['name'] ?></td>
						<td><?php echo $result['comment'] ?></td>
						<td>
							<?php
								if ($result['status'] == 0) {
							?>
							<a href="?commentid=<?php echo $result['id'] ?>">Appove</a>
							<?php
								} elseif ($result['status'] == 1) {
							?>
							<?php
								echo 'Approved';
            				?>
							<?php
								}
        					?> || <a onclick = "return confirm('Do you want to delete ?')"  href="?delid=<?php echo $result['id'] ?>">Delete</a>
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
