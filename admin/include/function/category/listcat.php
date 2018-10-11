<?php
$sql = "select * from category";
$rs = mysqli_query($conn, $sql);

$used = '<span class="label label-success">Used</span>';
$unused = '<span class="label label-danger">Unused</span>';
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add category</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="include/function/category/process.php?a=add">
        <div class="box-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="txtname">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Add</button>
            </div>
            <!-- /.box-footer -->
    </form>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All category</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Category name</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><?php if ($row['cat_status'] == 1) {
                                    echo $used;
                                } else {
                                    echo $unused;
                                } ?></td>
                            <td>
                                <button class="btn btn-xs"><a
                                            href="index.php?f=cat&a=edit&id=<?php echo $row['cat_id'] ?>"><i
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