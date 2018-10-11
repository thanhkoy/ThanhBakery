<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thanh's Bakery | Admin</title>
    <link rel="shortcut icon" href="dist/img/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">

    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php

    include('connect.php');

    if (isset($_SESSION['admin']) && isset($_SESSION['verify'])) {
        include('include/header.php');
        include('include/menu.php');
        include('include/content.php');
        include('include/footer.php');
    } elseif (isset($_SESSION['admin']) && !isset($_SESSION['verify'])) {
        header("Location:include/verify.php");
    } else {
        header("Location:../index.php");
    }
    ?>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="bower_components/ckeditor/ckeditor.js"></script>
<script>
    $(function () {
        CKEDITOR.replace('editor1');
        $('.textarea').wysihtml5()
    })
</script>

<script>
    $(function () {
        $('#example1').DataTable();
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>

<script>
    $(function () {

        'use strict';

        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        // -----------------------
        // - MONTHLY SALES CHART -
        // -----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
//            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            labels: [<?php
                for ($i = 6; $i > 0; $i--) {
                    echo "'" . date('M', mktime(0, 0, 0, date('m') - $i)) . "'";
                    echo ', ';
                }
                ?>],
            datasets: [
                {
                    label: 'Revenue',
                    fillColor: 'rgba(60,141,188,0.9)',
                    strokeColor: 'rgba(60,141,188,0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php
                        for ($i = 6; $i > 0; $i--) {
                            $date = date('m', mktime(0, 0, 0, date('m') - $i));
                            $sale = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(bill_total) as data from bill where MONTH(bill_oderdate) = {$date}"));
                            if ($sale['data'] == 0)
                                $sale['data'] = 0;
                            echo $sale['data'] . ", ";
                        }
                        ?>]
                }
            ]
        };

        var salesChartOptions = {
            // Boolean - If we should show the scale at all
            showScale: true,
            // Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            // String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            // Number - Width of the grid lines
            scaleGridLineWidth: 1,
            // Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            // Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            // Boolean - Whether the line is curved between points
            bezierCurve: true,
            // Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            // Boolean - Whether to show a dot for each point
            pointDot: false,
            // Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            // Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            // Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            // Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            // Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            // String - A legend template
            legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            // Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        // Create the line chart
        salesChart.Line(salesChartData, salesChartOptions);

        // ---------------------------
        // - END MONTHLY SALES CHART -
        // ---------------------------

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        <?php
        $rs1 = mysqli_num_rows(mysqli_query($conn, "select * from bill"));
        $rs2 = mysqli_num_rows(mysqli_query($conn, "select * from bill where bill_status = 2"));

        ?>
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
            {
                value: <?php echo $rs1; ?>,
                color: '#f56954',
                highlight: '#f56954',
                label: 'Total bill'
            },
            {
                value: <?php echo $rs2; ?>,
                color: '#00a65a',
                highlight: '#00a65a',
                label: 'Bill successfully'
            }
        ];
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: false,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        // -----------------
        // - END PIE CHART -
        // -----------------


        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#billChart').get(0).getContext('2d');
        var barChart = new Chart(barChartCanvas);
        var barChartData = {
            labels: [<?php
                for ($i = 6; $i > 0; $i--) {
                    echo "'" . date('M', mktime(0, 0, 0, date('m') - $i)) . "'";
                    echo ', ';
                }
                ?>],
            datasets: [
                {
                    label: 'Total bill',
                    fillColor: '#f56954',
                    data: [<?php
                        for ($i = 6; $i > 0; $i--) {
                            $date1 = date('m', mktime(0, 0, 0, date('m') - $i));
                            $sale1 = mysqli_num_rows(mysqli_query($conn, "SELECT * from bill where MONTH(bill_oderdate) = {$date1}"));
                            echo $sale1 . ", ";
                        }
                        ?>]
                },
                {
                    label: 'Bill successfully',
                    data: [<?php
                        for ($i = 6; $i > 0; $i--) {
                            $date2 = date('m', mktime(0, 0, 0, date('m') - $i));
                            $sale2 = mysqli_num_rows(mysqli_query($conn, "SELECT * from bill where bill_status = 2 and MONTH(bill_oderdate) = {$date2}"));
                            echo $sale2 . ", ";
                        }
                        ?>]
                }
            ]
        };
        barChartData.datasets[1].fillColor = '#00a65a';
        barChartData.datasets[1].strokeColor = '#00a65a';
        barChartData.datasets[1].pointColor = '#00a65a';
        var barChartOptions = {
            //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
            scaleBeginAtZero: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            //String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - If there is a stroke on each bar
            barShowStroke: true,
            //Number - Pixel width of the bar stroke
            barStrokeWidth: 2,
            //Number - Spacing between each of the X value sets
            barValueSpacing: 5,
            //Number - Spacing between data sets within X values
            barDatasetSpacing: 1,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
            //Boolean - whether to make the chart responsive
            responsive: true,
            maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions)
    });

</script>
</body>
</html>
