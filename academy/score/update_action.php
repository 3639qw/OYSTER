<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $stuid = $_POST['stuid'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];
    $sub4 = $_POST['sub4'];
    $sub5 = $_POST['sub5'];

    $sql = "update score set sub1=$sub1, sub2=$sub2, sub3=$sub3, sub4=$sub4, sub5=$sub5 where stuid = '$stuid';";    
    
    $result = mysqli_query($con, $sql);

    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/score');
    }else{
        echo '<br>입력 실패 : '.mysqli_error($con);
        header('location: /academy/score');
    }


?>
