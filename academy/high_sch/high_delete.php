<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$id = $_GET['id'];

$sql = "delete from high_sch where initial = '$id'";
$result = mysqli_query($con, $sql);
mysqli_close($con);
header('Location: /academy/high_sch');

?>