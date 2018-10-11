<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li class="treeview">
                <a href="">
                    <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=cat">List all category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <span>Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=prd">List all product</a></li>
                    <li><a href="index.php?f=prd&a=add">Add new product</a></li>
                </ul>
            </li>
            <li class="treeview" <?php if ($_SESSION['access'] == 0) {
                echo "style='display: none'";
            } ?>>
                <a href="">
                    <span>Employee</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=emp">List all employee</a></li>
                    <li><a href="index.php?f=emp&a=add">Add new employee</a></li>
                </ul>
            </li>
            <li class="treeview" <?php if ($_SESSION['access'] == 0) {
                echo "style='display: none'";
            } ?>>
                <a href="">
                    <span>Customer</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=cust">Manage customer account</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <span>Bill</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=bill">Show all bill</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <span>Feedback</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=feedback">Show all feedback</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <span>News manage</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=news">Show all news</a></li>
                    <li><a href="index.php?f=news&a=add">Add news</a></li>
                </ul>
            </li>
            <li class="treeview" <?php if ($_SESSION['access'] == 0) {
                echo "style='display: none'";
            } ?>>
                <a href="">
                    <span>Activity log</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?f=log">Show all activity log</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <span><?php echo $_SESSION['admin']; ?></span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="include/process/logout.php">Sign out</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>