<?php
$prevPage = $_SERVER['HTTP_REFERER'];
include "stock_db_info.php";

echo 
$_GET['ticker'];

$sql = "delete from korea_stock where ticker =".$_GET['ticker'];
$result = mysqli_query($con, $sql);
mysqli_close($con);
header('Location:'.$prevPage);
?>