<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Student Update</title>
</head>
<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $stuid = $_POST['stuid'];
    $stuid_num = explode('-', $stuid);
	$name = $_POST['name'];
	$gen = $_POST['gender'];
	$birth = $_POST['birth'];
    
    $zip = $_POST['zip'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];

    $high_sch = $_POST['high_sch'];
    $mid_sch = $_POST['mid_sch'];
    $dept = $_POST['dept'];
    
    // 학번에 학교 이니셜 삽입위한 쿼리
    $init_query = "select name, initial from high_sch where name ='$high_sch'";
    $init_result = mysqli_query($con, $init_query);
    $row = mysqli_fetch_array($init_result);
    $initial = $row['initial'];

    /*
    $sql = "update student, student_sch set student.stuid='$stuid_num-$initial', student.name='$name', student.gender='$gen', student.birth='$birth', student.zip='$zip', 
    student.addr1='$addr1', student.addr2='$addr2', student_sch.mid_sch='$mid_sch', student_sch.high_sch='$high_sch', student_sch.dept='$dept'
    where student.stuid='$stuid';";
    */
    
    $sql = "update student set stuid='$stuid_num[0]-$initial', name='$name', gender='$gen', birth='$birth',
            zip='$zip', addr1='$addr1', addr2='$addr2', mid_sch='$mid_sch', high_sch='$high_sch', dept='$dept' where stuid='$stuid';";

    echo $sql;

    $result = mysqli_query($con, $sql);
    

    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/student');
    }else{
        echo $sql;
        echo '<br>입력 실패 : '.mysqli_error($con);
        header('location: /academy/student');
    }

 ?>
