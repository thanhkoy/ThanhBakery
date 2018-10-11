<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sql = "select * from bill_detail inner join product on bill_detail.prd_id = product.prd_id   WHERE bill_id = {$id}";
$rs = mysqli_query($conn, $sql);

$sql1 = "select * from bill WHERE bill_id = {$id}";
$rs1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($rs1);

$used = '<span class="label label-success">Used</span>';
$unused = '<span class="label label-danger">Unused</span>';
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Bill</h3>
    </div>
    <form class="form-horizontal" method="post" action="include/function/bill/process.php?a=edit" id="bill-view">
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Customer username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['cust_username']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Receiver</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['bill_receiver']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Order date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['bill_oderdate']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['bill_address']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Discount</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name"
                           value="<?php echo $row1['coupon_value'] . '%'; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Total cost</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name"
                           value="<?php echo $row1['bill_total'] . ' VND'; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <select class="form-control" name="status" <?php if ($row1['bill_status'] == 2) {
                        echo 'disabled';
                    } else {
                        echo '';
                    } ?> onchange="document.getElementById('submit-change').click();">
                        <option <?php if ($row1['bill_status'] == 0) {
                            echo 'selected';
                        } else {
                            echo '';
                        } ?> value="0">Cancel
                        </option>
                        <option <?php if ($row1['bill_status'] == 1) {
                            echo 'selected';
                        } else {
                            echo '';
                        } ?> value="1">Pending
                        </option>
                        <option <?php if ($row1['bill_status'] == 2) {
                            echo 'selected';
                        } else {
                            echo '';
                        } ?> value="2">Delivered
                        </option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" id="submit-change" style="display: none;"></button>
    </form>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bill detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td><?php echo $row['prd_name']; ?></td>
                            <td><?php echo $row['prd_price'] . ' VND'; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>