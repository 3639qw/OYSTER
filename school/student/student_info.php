<?php
include "../school_db_info.php";
echo
$_GET['stuid'];
$sql="select * from student where stuid =".$_GET[''];
$result = mysqli_query($con, $sql);
mysqli_close($con);


?>