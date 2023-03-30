<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Teahcer Update</title>
</head>
<?php

	include "../school_db_info.php";

    $tid = $_POST['tid'];
    $name = $_POST['name'];
    $sub = $_POST['sub'];
    $sub2 = $_POST['sub2'];
    $sch = $_POST['sch'];
    $lilevel = $_POST['lilevel'];
    $gender = $_POST['gender'];
    $birth = $_POST['birth'];
    $joindate = $_POST['joindate'];
    $position = $_POST['position'];
    $dept = $_POST['dept'];
    $title = $_POST['title'];
    $step = $_POST['step'];

    $sql = "update teacher set name='".$name."', gender='".$gender."', birth='".$birth."', sch='".$sch."', joindate='".$joindate."', sub='".$sub."', sub2='".$sub2."', ";
    $sql .= "dept='".$dept."', position='".$position."', title='".$title."', step='".$step."', lilevel='".$lilevel."' where tid = '".$tid."';";
    
    $result = mysqli_query($con, $sql);
    

    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/teacher');
        
    }else{
        echo $sql;
        echo '<br>입력 실패 : '.mysqli_error($con);
        header('location: /academy/teacher');
    }
?>
