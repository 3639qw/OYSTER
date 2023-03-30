<?php

$prevPage = $_SERVER['HTTP_REFERER'];
include "../school_db_info.php";

$stuid = $_GET['stuid'];

$sql = "delete from score where stuid = '$stuid'";
$result = mysqli_query($con, $sql);
mysqli_close($con);

header('Location: /academy/score');
?>