<?php
    session_start(); // 세션
    include "../lib/dblib.php"; // DB접속


    $stuid = $_POST['id']; // 학번 => 학교 이니셜 제외한 부분
    $name = $_POST['name']; // 성명
    $birth = $_POST['birth']; // 생년얼일
    $initial = $_POST['sch']; // 소속 학교 이니셜
    $level = $_POST['level']; // 학생 교사 여부

    // 학생정보 대조
    $sql = "
    select b.stuid, b.name, a.type, b.dept, b.birth, substr(b.gender, 1, 1)gender, b.dept, b.status, b.admit_date, substr(b.admit_date, 1, 4) admit_year, b.graduate_date
    from score a, student b
    where a.stuid = b.stuid and b.name = '".$name."' and b.stuid = '".$stuid."-".$initial."' and b.birth = '".$birth."';
    ";
    $result = mysqli_query($con, $sql);
    $stu_row = mysqli_fetch_assoc($result);

    // 학교정보 대조
    $sch_sql = "
    select a.initial, a.name sch, a.addr1 sch_addr1 from academy.high_sch a where a.initial = '".$initial."' 
    ";
    $sch_row = mysqli_fetch_assoc(mysqli_query($con, $sch_sql));


    if("$stuid-$initial"==$stu_row['stuid'] && $birth==$stu_row['birth'] && $name==$stu_row['name'] && $initial == $sch_row['initial']){ // id와 pw가 맞다면 login
        $stu_row['id'] = $stuid; // 이니셜 없는 학번
        $stu_row['level_string'] = '학생';
        $stu_row['level'] = '0';

        foreach ($stu_row as $key => $value){ // 학생 인적 사항 세션변수로 복사
            $_SESSION[$key] = $value;
        }
        foreach ($sch_row as $key => $value){ // 학교 학적 사항 세션변수로 복사
            $_SESSION[$key] = $value;
        }





//        echo '<pre>';
//        print_r($_SESSION);
//        echo '</pre>';


        echo "<script>location.href='../';</script>";
    }else{
        echo "<script>window.alert('인적사항이 학적과 틀립니다.');</script>";
        echo "<script>location.href=history.back();</script>";
    }
?>
