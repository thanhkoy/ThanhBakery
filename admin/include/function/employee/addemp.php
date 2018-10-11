<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add new employee</h3>
        <b style="color: red" id="err"></b>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="include/function/employee/process.php?a=add" id="form-add">
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Username</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" autofocus maxlength="30"
                           placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="pass" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass" maxlength="30"
                           placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="repass" class="col-sm-2 control-label">Repeat password</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" id="repass" name="repass" maxlength="30"
                           placeholder="Repeat Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <select class="form-control" name="access">
                        <option value="1">Admin</option>
                        <option value="0" selected>Moderator</option>
                    </select>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" id="submit" hidden></button>
                <button type="button" class="btn btn-info"
                        onclick="if (document.forms[0].pass.value != document.forms[0].repass.value){alert('Passwords do not match!'); document.forms[0].repass.focus();} else {document.getElementById('submit').click();}">
                    Add
                </button>
                <button type="reset" class="btn btn-default pull-right">Cancel</button>
            </div>
            <!-- /.box-footer -->
    </form>
</div>
<?php
if (isset($_GET['err'])) {
    $err = $_GET['err'];
} else {
    $err = "";
}

switch ($err) {
    case 'errpw':
        echo "<script>document.getElementById('err').innerHTML = 'Repeat password do not match!';</script>";
        break;
    case 'taken':
        echo "<script>document.getElementById('err').innerHTML = 'That username is taken!';</script>";
        break;
    default:
        echo '';
        break;
}
?>