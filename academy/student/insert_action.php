<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Student Insert</title>
</head>
<?php

    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장

	include "../school_db_info.php";

    $stuid = $_POST['stuid'];
	$name = $_POST['name'];
	$gen = $_POST['gender'];
	$birth = $_POST['birth'];
    
    $zip = $_POST['zip'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];

    $high_sch = $_POST['high_sch'];
    $mid_sch = $_POST['mid_sch'];
    $dept = $_POST['dept'];
    //$class = $_POST['class'];

    // 학번에 학교 이니셜 삽입위한 쿼리
    $init_query = "select name, initial from high_sch where name ='$high_sch'";

    $init_result = mysqli_query($con, $init_query);

    $row = mysqli_fetch_array($init_result);

    $initial = $row['initial'];
    echo $row['initial'].'<br>';

    // 입력한 학교정보가 학교테이블과 일치하지않으면 인적사항 테이블에 입력된거 삭제
    //$err_query = "delete from student where stuid ='$stuid'";

    $sql = "insert into student (stuid, name, gender, birth, zip, addr1, addr2, mid_sch, high_sch, dept)";
    $sql.="VALUES('$stuid-$initial','$name','$gen','$birth', '$zip', '$addr1','$addr2','$mid_sch','$high_sch','$dept')";

    echo $sql.'<br>';

    //$sql2 = "insert into student_sch (stuid, mid_sch, high_sch)";
    //$sql2 .= "VALUES('$stuid-$initial','$mid_sch','$high_sch')";

    //echo $sql2;

    /*
    $result = mysqli_query($con, $sql);
    
    if($result){
        $result2 = mysqli_query($con, $sql2);
    }
    if(!$result2){
        $result = mysqli_query($con, $err_query);
    }

    if($result && $result2){
        echo '입력 성공 :<br>'.$result;
        header('location:'.$prevPage);
        
    }else{
        echo '입력 실패 : '.mysqli_error($con).'<br>';
        header('location:'.$prevPage);
    }
    */
    
    $result = mysqli_query($con, $sql);

    if($result){
        echo '입력성공 :<br>'.$result;
        header('location: '.$prevPage);
    }else{
        echo $sql.'<br>';
        echo '입력 실패 : '.mysqli_error($con);
        header('location: '.$prevPage);
    }

 ?>
