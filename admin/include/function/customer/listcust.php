<?php
$sql = "select * from customer";
$rs = mysqli_query($conn, $sql);

$normal = '<span class="label label-success">Normal</span>';
$premium = '<span class="label label-info">Premium</span>';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Customer account manager</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Account type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td>
                                <a href="index.php?f=cust&a=detail&id=<?php echo $row['cust_id'] ?>"><?php echo $row['cust_username']; ?></a>
                            </td>
                            <td><?php echo $row['cust_phonenum']; ?></td>
                            <td><?php echo $row['cust_email']; ?></td>
                            <td><?php if ($row['cust_level'] == 1) {
                                    echo $premium;
                                } else {
                                    echo $normal;
                                } ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Account type</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>