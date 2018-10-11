<?php
$servername = "127.0.0.1:52891";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES utf8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/*Database=localdb;Data Source=127.0.0.1:52891;User Id=azure;Password=6#vWHD_$*/
?>