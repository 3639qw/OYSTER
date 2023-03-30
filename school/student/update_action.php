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
    $isMid = $_POST['checkmid'];
    var_dump($_POST['checkmid']);

    // 중딩이면 1 고딩이면 0
    if($isMid == "isMid"){
        $type = 1;
    }else if($isMid != "isMid"){
        $type = 0;
    }

    echo $type.'<br>';

    switch($type){
        
        case 0: // 고딩이면
            $sql = "update student set name='$name', gender='$gen', birth='$birth', zip='$zip', 
            addr1='$addr1', addr2='$addr2', mid_sch='$mid_sch', high_sch='$high_sch', dept='$dept' where stuid=$stuid;";
            
            $result = mysqli_query($con, $sql);
            
            
            
            if($result){
                echo '입력 성공 :<br>'.$result;
                // header('location: /academy/student');
                
            }else{
                echo '입력 실패 : '.mysqli_error($con);
            }
        break;

        case 1: // 중딩이면
            $sql = "update student set name='$name', gender='$gen', birth='$birth', zip='$zip', 
            addr1='$addr1', addr2='$addr2', mid_sch='$mid_sch', dept='$dept' where stuid=$stuid;";
            
            $result = mysqli_query($con, $sql);
            
            
            
            if($result){
                // echo '입력 성공 :<br>'.$result;
                header('location: /academy/student');
                
            }else{
                echo '입력 실패 : '.mysqli_error($con);
            }
        break;
        
    
    }
        


 ?>
