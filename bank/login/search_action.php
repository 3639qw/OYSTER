<?php
include "../bank_db_info.php";


$ck_info['name'] = $_POST['name'];
$ck_info['PID'] = $_POST['pid'];

if($ck_info['PID'] != '' && $ck_info['PID'] != null){

    if(preg_match("/\s/u", $ck_info['name']) == true){
        echo "<script>alert('성명(법인명)은 공백없이 입력해주세요')</script>";
        echo "<script>history.back()</script>";
    }else{
        $sql = "
        select
        login_id id, id pid
        from member_list
        where
        name = '".$ck_info['name']."'
        and id = '".$ck_info['PID']."';
        ";
        $row = mysqli_fetch_assoc(mysqli_query($con,$sql));

        if($row['pid'] == '' || $row['pid'] == null){
            $ck_info['Pass'] = 'N';
        }else{
            if($row['pid'] == $ck_info['PID']){
                $ck_info['Pass'] = 'Y';
                $ck_info['ID'] = $row['id'];
            }else{
                $ck_info['Pass'] = 'N';
            }
        }

        if($ck_info['Pass'] == 'Y'){
            $txt = $ck_info['name'].'님의 아이디는 '.$ck_info['ID'].'입니다';
            echo "<script>alert('$txt')</script>";
            echo "<script>history.back()</script>";
        }else{
            echo "<script>alert('일치하는 정보가 없습니다')</script>";
            echo "<script>history.back()</script>";
        }
    }
}
?>