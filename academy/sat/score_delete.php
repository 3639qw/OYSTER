<?php

$prevPage = $_SERVER['HTTP_REFERER'];
include "../school_db_info.php";

$id = $_GET['id'];

$sql = "delete from korean_sat where id = '$id'";
$result = mysqli_query($con, $sql);
mysqli_close($con);

header('Location: /academy/sat');
?>