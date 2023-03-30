<?php

$prevPage = $_SERVER['HTTP_REFERER'];
include "../school_db_info.php";
$sql = "delete from score where stuid =".$_GET['stuid'];
$result = mysqli_query($con, $sql);
mysqli_close($con);

header('Location:'.$prevPage);
?>