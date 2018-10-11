<form action="include/function/news/process.php?a=add" method="post" enctype="multipart/form-data">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">News title</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <div class="form-group">
                <img id="news-image" src="#" class="col-xs-12"
                     style="max-height: 500px; object-fit: cover; display: none;"
                     onclick="document.getElementById('file').click();">
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="title">
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="file" id="file" name="file" onchange="readURL(this);">
                </div>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box-header">
            <h3 class="box-title">News content</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
            <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-info">Add</button>
        </div>
    </div>
</form>
<script>
    function readURL(input) {
        document.getElementById('news-image').style.display = 'block';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#news-image')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>