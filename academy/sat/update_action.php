<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $id = $_POST['id'];
    $kor = $_POST['kor'];
    $math = $_POST['math'];
    $eng = $_POST['eng'];
    $kor_history = $_POST['kor_history'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];


    $sql = "update korean_sat set kor=$kor, math=$math, eng=$eng, kor_history=$kor_history, sub1=$sub1, sub2=$sub2 where id = '$id';";    
    
    $result = mysqli_query($con, $sql);

    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/sat');
    }else{
        echo '<br>입력 실패 : '.mysqli_error($con);
        // header('location: /academy/sat');
    }


?>
