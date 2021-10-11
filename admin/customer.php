<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath . '/../classes/customer_comment.php';
    include_once $filepath . '/../helpers/format.php';
?>
<?php
    if (!isset($_GET['customerid']) || $_GET['customerid'] == null) {
        echo "<script>window.location ='inbox.php'</script>";
    } else {
        $id = $_GET['customerid'];
    }
    $cs = new customer_comment();
?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Sửa danh mục</h2>
            <div class="block copyblock">
                <?php
                    $get_customer = $cs->show_customers($id);
                    if ($get_customer) {
                        while ($result = $get_customer->fetch_assoc()) {
                ?>
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <?php echo $result['name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <?php echo $result['phone'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <?php echo $result['address'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <?php echo $result['email'] ?>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>