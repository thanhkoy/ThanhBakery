<?php
$sql = "select * from category";
$rs = mysqli_query($conn, $sql);
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Add product</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="include/function/product/process.php?a=add"
          enctype="multipart/form-data">
        <div class="box-body">
            <div class="form-group">
                <img id="prdimage" src="#" class="col-xs-12"
                     style="max-height: 500px; object-fit: cover; display: none;"
                     onclick="document.getElementById('file').click();">
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="txtname">
                    <input type="file" id="file" name="file" onchange="readURL(this);">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="price">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Product description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="desc">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <select class="form-control" name="cat">
                        <?php
                        while ($row = mysqli_fetch_array($rs)) {
                            ?>
                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info">Add</button>
                <button type="reset" class="btn btn-default pull-right">Cancel</button>
            </div>
            <!-- /.box-footer -->
    </form>
</div>
<script>
    function readURL(input) {
        document.getElementById('prdimage').style.display = 'block';
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