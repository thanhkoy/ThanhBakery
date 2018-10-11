<?php
$sql = "select * from employee where emp_access = 1";
$rs = mysqli_query($conn, $sql);

$sql1 = "select * from employee where emp_access = 0";
$rs1 = mysqli_query($conn, $sql1);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Username</th>
                        <th>Verify code</th>
                        <th>Edit</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td><?php echo $row['emp_username']; ?></td>
                            <td><?php echo $row['emp_verify']; ?></td>
                            <td>
                                <button class="btn btn-xs"><a
                                            href="index.php?f=emp&a=edit&id=<?php echo $row['emp_id'] ?>"><i
                                                class=" fa fa-edit"></i> Edit</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Moderator</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Username</th>
                        <th>Verify code</th>
                        <th>Edit</th>
                    </tr>
                    <?php
                    while ($row1 = mysqli_fetch_array($rs1)) {
                        ?>
                        <tr>
                            <td><?php echo $row1['emp_username']; ?></td>
                            <td><?php echo $row1['emp_verify']; ?></td>
                            <td>
                                <button class="btn btn-xs"><a
                                            href="index.php?f=emp&a=edit&id=<?php echo $row1['emp_id'] ?>"><i
                                                class=" fa fa-edit"></i> Edit</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>