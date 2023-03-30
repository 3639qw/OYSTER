<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
	include "../school_db_info.php";


    $id = $_POST['id'];
	$kor = $_POST['kor'];
	$math = $_POST['math'];
	$eng = $_POST['eng'];
	$kor_history = $_POST['kor_history'];
	$sub1 = $_POST['sub1'];
	$sub2 = $_POST['sub2'];

	$sql = "INSERT INTO korean_sat (id, kor, math, eng, kor_history, sub1, sub2)";
	$sql.="VALUES('$id','$kor','$math','$eng','$kor_history','$sub1','$sub2')";
	$result = mysqli_query($con, $sql);	

	if($result){
		echo '입력 성공 :<br>'.$result;
        header('Location:'.$prevPage);
	}else{
		echo '입력 실패 :<br>'.mysqli_error($con);
        header('Location:'.$prevPage);
    }

 ?>
