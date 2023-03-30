<link rel="stylesheet" type="text/css" href="style.css">
<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
	include "../school_db_info.php";


    $stuid = $_POST['stuid'];
	$sub1 = $_POST['sub1'];
	$sub2 = $_POST['sub2'];
	$sub3 = $_POST['sub3'];
	$sub4 = $_POST['sub4'];
	$sub5 = $_POST['sub5'];
	$sub6 = $_POST['sub6'];
	$name = $_POST['name'];

	$sum = $sub1+$sub2+$sub3+$sub4+$sub5+$sub6;	//합계 계산
	$avg = $sum/6;  //평균 계산
	$sql = "INSERT INTO score ( stuid, sub1, sub2, sub3, sub4, sub5, sub6, sum, avg)";
	$sql.="VALUES('$stuid','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6', '$sum','$avg')";

	$result = mysqli_query($con, $sql);




	if($result){
		echo '입력 성공 :<br>'.$result;
        header('Location:'.$prevPage);
	}else{
		echo '입력 실패 :<br>'.mysqli_error($con);
    }



 ?>
