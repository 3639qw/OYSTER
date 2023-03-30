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
    
    $zip = $_POST['Pzip'];
    $addr1 = $_POST['Paddr1'];
    $addr2 = $_POST['Paddr2'];

    $high_sch = $_POST['high_sch'];
    $mid_sch = $_POST['mid_sch'];
    $isMid = $_POST['checkmid'];
    // var_dump($_POST['checkmid']);
    if($isMid == "isMid"){ // 중딩이면 1
        $type = 1;
    }else if($isMid != "isMid"){ // 고딩이면 0
        $type = 0;
    }



    //중고딩 판별용 1: 중딩 0: 고딩

    echo $type.'<br>';

    switch($type){
        
        case 0: // 고등학생이면
            $sql = "INSERT INTO student (stuid, name, gender, birth, zip, addr1, addr2, high_sch, mid_sch)";
            $sql.="VALUES('$stuid','$name','$gen','$birth', '$zip', '$addr1','$addr2', '$high_sch', '$mid_sch')";
            
            $result = mysqli_query($con, $sql);
            
            
            
            if($result){
                echo '입력 성공 :<br>'.$result;
                header('location:'.$prevPage);
                
            }else{
                echo '입력 실패 : '.mysqli_error($con).'<br>';
                echo $sql;
            }
        break;

        case 1: // 중딩이면
            $sql = "INSERT INTO student (stuid, name, gender, birth, zip, addr1, addr2, mid_sch)";
            $sql.="VALUES('$stuid','$name','$gen','$birth', '$zip', '$addr1','$addr2', '$mid_sch')";
            
            $result = mysqli_query($con, $sql);
            
            
            
            if($result){
                echo '입력 성공 :<br>'.$result;
                header('location:'.$prevPage);
                
            }else{
                echo '입력 실패 : '.mysqli_error($con).'<br>';
                echo $sql;
            }
        break;
        
        
    }


 ?>
