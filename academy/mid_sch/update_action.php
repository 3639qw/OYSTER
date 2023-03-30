<head>
<title>MidSchool Update</title>
</head>
<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $id = $_POST['id'];
    $name = $_POST['name'];
    $est = $_POST['est'];
    $founder = $_POST['founder'];
    $office_edu = $_POST['office_edu'];
    $gender = $_POST['gender'];
    
    $zip = $_POST['zip'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    
    $sql = "update mid_sch set name='$name', founder='$founder', gender='$gender', est='$est', office_edu='$office_edu', zip='$zip', addr1='$addr1', addr2='$addr2' where id = $id;";
    
    $result = mysqli_query($con, $sql);
    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/mid_sch');
    }else{
        echo '입력 실패 : '.mysqli_error($con);
        header('location: /academy/mid_sch');
    }

?>
