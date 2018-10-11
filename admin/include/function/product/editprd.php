<?php
$id = $_GET['id'];

$sql = "select * from product where prd_id = {$id}";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit product</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="include/function/product/process.php?a=edit"
          enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <img id="prdimage" src="../views/assets/images/product/<?php echo $row['prd_image']; ?>"
                     class="col-xs-12"
                     style="max-height: 500px; object-fit: cover;" onclick="document.getElementById('file').click();">
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row['prd_name']; ?>"
                           name="txtname">
                    <input type="hidden" value="<?php echo $row['prd_id']; ?>" name="id">
                    <input type="hidden" value="<?php echo $row['prd_image']; ?>" name="txtimage">
                    <input type="file" id="file" name="file" onchange="readURL(this);" style="display:none;">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row['prd_price']; ?>"
                           name="price">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $row['prd_description']; ?>"
                           name="desc">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <select class="form-control" name="status">
                        <option <?php if ($row['prd_status'] == 1) {
                            echo 'selected';
                        } else {
                            echo '';
                        } ?> value="1">Used
                        </option>
                        <option <?php if ($row['prd_status'] == 0) {
                            echo 'selected';
                        } else {
                            echo '';
                        } ?> value="0">Unused
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
<script>
    function readURL(input) {
        document.getElementById('prdimage').src = '#';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#prdimage')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>