<?php
$id = $_GET['id'];

$sql = "select * from employee where emp_id = {$id}";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Change the employee property</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="include/function/employee/process.php?a=edit">
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Username</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?php echo $row['emp_username']; ?>" readonly>
                    <input type="hidden" value="<?php echo $row['emp_id']; ?>" name="id">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <select class="form-control" name="access">
                        <option <?php if ($row['emp_access'] == 1) {
                            echo 'selected';
                        } else {
                            echo '';
                        } ?> value="1">Admin
                        </option>
                        <option <?php if ($row['emp_access'] == 0) {
                            echo 'selected';
                        } else {
                            echo '';
                        } ?> value="0">Moderator
                        </option>
                    </select>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Save change</button>
                <button type="button" class="btn btn-default pull-right" onclick="history.back(-1);">Cancel</button>
            </div>
            <!-- /.box-footer -->
    </form>
</div>