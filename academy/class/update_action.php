<head>
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Teahcer Update</title>
</head>
<?php

	include "../school_db_info.php";

    $id = $_POST['id'];
    $name = $_POST['name'];
    $sch = $_POST['sch'];
    $year = $_POST['year'];
    $type = $_POST['type'];
    $gender = $_POST['gender'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "update class set name='$name', sch='$sch', year='$year', type='$type', gender='$gender', teacher_id='$teacher_id' ";
    $sql .= " where id = '$id';";

    $result = mysqli_query($con, $sql);
    if($result){
        echo '입력 성공 :<br>'.$result;
        header('location: /academy/class');
        
    }else{
        echo $sql;
        echo '<br>입력 실패 : '.mysqli_error($con);
        header('location: /academy/class');
    }
?>
