<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Class Insert</title>
</head>
<?php
    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $name = $_POST['name'];
    $sch = $_POST['sch'];
    $year = $_POST['year'];
    $type = $_POST['type'];
    $gender = $_POST['gender'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "insert into class (name, sch, year, type, gender, teacher_id) ";
    $sql .= "values('$name','$sch','$year','$type','$gender','$teacher_id');";

    $result = mysqli_query($con, $sql);
    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location:'.$prevPage);
    }else{
        echo '입력 실패 : '.mysqli_error($con);
        header('location:'.$prevPage);
    }

?>
