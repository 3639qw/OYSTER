<?php
    include "../lib/dblib.php";

    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $sch = $_POST['sch'];

    $sql = "
    select a.stuid, c.initial from score a, student b, high_sch c where a.stuid = b.stuid and b.high_sch = c.name and b.name= '".$name."' and b.birth = '".$birth."' and b.high_sch = '".$sch."'
    ";
    $row = mysqli_fetch_array(mysqli_query($con, $sql));

    $txt = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $row['stuid']);
    $txt2 = preg_replace("/[^0-9]/i","",$txt);

    if($txt2 != '' && $txt2 != null){
        echo "
            <script>
                alert('해당 학생의 학번은 {$txt2} 입니다.');
                location.href='../';
            </script>";
    }else{
        echo "
            <script>
                alert('해당하는 학생은 없습니다.');
                location.href=history.back();
            </script>";
    }




?>