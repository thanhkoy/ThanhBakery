<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Revenue Monthly Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">
                            <strong>REVENUE: <?php echo date('M/Y', mktime(0, 0, 0, date("m") - 6)) . " - " . date('M/Y', mktime(0, 0, 0, date("m"))); ?>
                                (vnd)</strong>
                        </p>
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 180px;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Bill</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <!-- BAR CHART -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Bill Monthly Report</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="billChart" style="height:230px"></canvas>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>