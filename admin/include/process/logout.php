<?php
session_start();

session_destroy();
//echo '<meta http-equiv="refresh" content="1;../../../index.php">';
//    header("Location:../../index.php");
echo "<script>history.back(-1)</script>";
?>