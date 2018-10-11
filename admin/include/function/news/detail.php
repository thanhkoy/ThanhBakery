<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sql = "select * from news where news_id = {$id}";
$rs = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rs);
?>

<form action="include/function/news/process.php?a=edit" method="post" enctype="multipart/form-data">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">News title</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <div class="form-group">
                <img id="news_image" src="../views/assets/images/news/<?php echo $row['news_image']; ?>"
                     class="col-xs-12" style="max-height: 500px; object-fit: cover;"
                     onclick="document.getElementById('file').click();">
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="title"
                           value="<?php echo $row['news_title']; ?>">
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="file" id="file" name="file" onchange="readURL(this);" style="display: none">
                    <input type="hidden" name="id" value="<?php echo $row['news_id']; ?>">
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box-header">
            <h3 class="box-title">News content</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
            <textarea id="editor1" name="editor1" rows="10" cols="80"><?php echo $row['news_content']; ?></textarea>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-info">Edit</button>
        </div>
    </div>
</form>
<script>
    function readURL(input) {
        document.getElementById('news_image').src = '#';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#news_image')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>