<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Teacher Insert</title>
</head>
<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $tid = $_POST['tid'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $sch = $_POST['sch'];
    $joindate = $_POST['joindate'];
    $sub = $_POST['sub'];
    $sub2 = $_POST['sub2'];
    $dept = $_POST['dept'];
    $position = $_POST['position'];
    $title = $_POST['title'];
    $step = $_POST['step'];
    $lilevel = $_POST['lilevel'];


    $sql = "insert into teacher (tid, name, gender, birth, sch, joindate, sub, sub2, dept, position, title, step, lilevel)";
    $sql .= "values ('$tid','$name','$gender','$birth','$sch','$joindate','$sub','$sub2','$dept','$position','$title','$step','$lilevel');";

    $result = mysqli_query($con, $sql);
    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/teacher');
    }else{
        echo '입력 실패 : '.mysqli_error($con);
    }



?>
