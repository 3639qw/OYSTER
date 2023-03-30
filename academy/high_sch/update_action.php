<head>
<title>HighSchool Update</title>
</head>
<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $id = $_POST['initial'];

	$name = $_POST['name']; //학교명
	$founder = $_POST['founder']; //설립유형
	$type = $_POST['type']; //학교특성
	$gender = $_POST['gender']; //성별
	$est = $_POST['est']; //설립일
	$office_edu = $_POST['office_edu']; //관할 교육청
    
    $zip = $_POST['zip']; //우편번호
    $addr1 = $_POST['addr1']; //주소
    $addr2 = $_POST['addr2']; //상세주소


    $sql = "update high_sch set name='$name', founder='$founder', type='$type', gender='$gender',";
    $sql .= "est='$est', office_edu='$office_edu', zip='$zip', addr1='$addr1', addr2='$addr2' where initial='$id';";

    $result = mysqli_query($con, $sql);

    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/high_sch');
    }else{
        echo '입력 실패 : '.mysqli_error($con);
        header('location: /academy/high_sch');
    }
 ?>
