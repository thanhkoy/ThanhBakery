<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sql1 = "select * from customer WHERE cust_id = {$id}";
$rs1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($rs1);

$used = '<span class="label label-success">Used</span>';
$unused = '<span class="label label-danger">Unused</span>';
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $row1['cust_username']; ?></h3>
    </div>
    <form class="form-horizontal" method="post" action="" id="bill-view">
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Phone number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['cust_phonenum']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['cust_email']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['cust_address']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Accumulate</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row1['cust_accumulate']; ?>">
                </div>
            </div>
    </form>
</div>