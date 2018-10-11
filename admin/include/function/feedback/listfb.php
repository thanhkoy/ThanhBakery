<?php
$sql = "select * from feedback inner join customer on feedback.cust_username = customer.cust_username ORDER BY fb_id DESC";
$rs = mysqli_query($conn, $sql);

$used = '<span class="label label-success">Used</span>';
$unused = '<span class="label label-danger">Unused</span>';
?>
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
                        <th>Username</th>
                        <th>Date time</th>
                        <th>Content</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td>
                                <a href="index.php?f=feedback&a=reply&id=<?php echo $row['cust_id']; ?>"><?php echo $row['cust_username']; ?></a>
                            </td>
                            <td><?php echo $row['fb_datetime']; ?></td>
                            <td><?php echo $row['fb_content']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Date time</th>
                        <th>Content</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>