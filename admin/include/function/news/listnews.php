<?php
$sql = "select * from news inner join employee on news.emp_id = employee.emp_id ORDER BY news_id DESC";
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
                        <th>Title</th>
                        <th>Date</th>
                        <th>Employee</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td>
                                <a href="index.php?f=news&a=detail&id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']; ?></a>
                            </td>
                            <td><?php echo $row['news_datetime']; ?></td>
                            <td><?php echo $row['emp_username']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Employee</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>