<?php
$sql = "select * from bill ORDER BY bill_id DESC";
$rs = mysqli_query($conn, $sql);

$used = '<span class="label label-success">Used</span>';
$unused = '<span class="label label-danger">Unused</span>';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Bill</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Receiver</th>
                        <th>Order date</th>
                        <th>Address</th>
                        <th>Total cost</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td>
                                <a href="index.php?f=bill&a=detail&id=<?php echo $row['bill_id']; ?>"><?php echo $row['bill_receiver']; ?></a>
                            </td>
                            <td><?php echo $row['bill_oderdate']; ?></td>
                            <td><?php echo $row['bill_address']; ?></td>
                            <td><?php echo $row['bill_total'] . ' VND'; ?></td>
                            <td><?php if ($row['bill_status'] == 1) {
                                    echo 'Pending';
                                } elseif ($row['bill_status'] == 2) {
                                    echo 'Delivered';
                                } else {
                                    echo 'Cancel';
                                } ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>receiver</th>
                        <th>Order date</th>
                        <th>Address</th>
                        <th>Total cost</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>