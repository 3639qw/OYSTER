<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$stuid = $_GET['stuid'];
$sql = "delete from student where stuid ='$stuid';";
$result = mysqli_query($con, $sql);
mysqli_close($con);
header('Location: /academy/student');
?>