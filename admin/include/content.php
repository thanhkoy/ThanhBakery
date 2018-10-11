<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <?php

        if (isset($_GET['f'])) {
            $f = $_GET['f'];
        } else {
            $f = '';
        }

        switch ($f) {
            case 'cat':
                include('include/function/category/content.php');
                break;
            case 'prd':
                include('include/function/product/content.php');
                break;
            case 'emp':
                include('include/function/employee/content.php');
                break;
            case 'log':
                include('include/function/log/content.php');
                break;
            case 'bill':
                include('include/function/bill/content.php');
                break;
            case 'feedback':
                include('include/function/feedback/content.php');
                break;
            case 'news':
                include('include/function/news/content.php');
                break;
            case 'cust':
                include('include/function/customer/content.php');
                break;
            default:
                include('include/default.php');
                break;
        }
        ?>
    </section>
</div>
