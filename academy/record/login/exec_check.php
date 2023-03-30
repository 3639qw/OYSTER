<?php
    session_start(); // 세션
    include "../lib/dblib.php"; // DB접속

    $name = $_POST['name'];
    $id = $_POST['id'];
    $birth = $_POST['birth'];
    $sch = $_POST['sch'];

    // 교원정보 대조
    $sql = "
    select b.tid id, b.name name, b.birth, b.position, a.name sch, a.initial, a.addr1 from high_sch a, teacher b
    where a.name = b.sch and
    b.name = '".$name."' and
    b.tid = '".$id."' and
    b.birth = '".$birth."' and
    a.initial = '$sch';
    ";
    $row = mysqli_fetch_assoc(mysqli_query($con, $sql));

    if($name == $row['name'] &&
        $id == $row['id'] &&
        $birth == $row['birth'] &&
        $sch == $row['initial'] &&
        $row != '' &&
        $row != null){

        $row['level'] = '1';
        $row['level_string'] = '교원';

        foreach ($row as $key => $value){
            $_SESSION[$key] = $value;
        }

        echo("정상 교원");
        echo "<script>location.href='../'</script>";

    }else{
        echo "<script>window.alert('인적사항이 틀립니다.');</script>";
        echo "<script>location.href=history.back();</script>";
    }





?>