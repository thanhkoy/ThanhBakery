<?php
$sql = "select * from product INNER JOIN category on product.cat_id = category.cat_id";
$rs = mysqli_query($conn, $sql);

$used = '<span class="label label-success">Used</span>';
$unused = '<span class="label label-danger">Unused</span>';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($rs)) {
                                ?>
                                <tr>
                                    <td>
                                        <a href="index.php?f=prd&a=edit&id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a>
                                    </td>
                                    <td><?php echo $row['prd_price'] . 'đ'; ?></td>
                                    <td><?php if ($row['prd_status'] == 1) {
                                            echo $used;
                                        } else {
                                            echo $unused;
                                        } ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>