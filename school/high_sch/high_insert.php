<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>HighSchool Insert</title>
</head>
<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $name = $_POST['name']; //학교명
    $founder = $_POST['founder']; //설립유형
    $type = $_POST['type']; //학교특성
    $gender = $_POST["gender"]; //성별
    $est = $_POST['est']; //설립일
    $zip = $_POST['Hzip']; // 우편번호
    $addr1 = $_POST['Haddr1']; //주소
    $addr2 = $_POST['Haddr2']; //상세주소
    $office_edu = $_POST['office_edu']; //관할교육청




	$sql = "INSERT INTO high_sch (name, founder, est, type, gender, zip, addr1, addr2, office_edu)";
	$sql.="VALUES('$name','$founder', '$est', '$type','$gender','$zip','$addr1','$addr2','$office_edu')";

	$result = mysqli_query($con, $sql);



	if($result){
		echo '입력 성공 :<br>'.$result;
        header('location:'.$prevPage);


	}else{
		echo '입력 실패 : '.mysqli_error($con);
    }



 ?>
