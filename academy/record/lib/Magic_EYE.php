<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Dictionary.php";

class Magic_EYE extends Dictionary
{
    // 학번, 소속 학교명, 소속 학교 이니셜로 학생 정보 불러오기
    function Select_Student(){
        $record_sql = "
        select REGEXP_REPLACE(a.stuid,'-".$this->initial."','')stuid,
        b.name, b.high_sch, b.mid_sch, c.initial, substr(b.gender,1,1)gender, b.dept, a.type, b.status,
        concat(DATE_FORMAT(b.birth,'%Y'),'년 ',DATE_FORMAT(b.birth,'%c'),'월 ',DATE_FORMAT(b.birth,'%e'),'일')birth,
        concat(DATE_FORMAT(b.admit_date,'%Y'),'년 ',DATE_FORMAT(b.admit_date,'%c'),'월 ',DATE_FORMAT(b.admit_date,'%e'),'일')admit,
        DATE_FORMAT(b.graduate_date,'%Y')graduate_year,
        DATE_FORMAT(b.graduate_date,'%c')graduate_month,
        DATE_FORMAT(b.graduate_date,'%e')graduate_day,
        b.register_11,
        b.register_12,
        b.register_21,
        b.register_22,
        b.register_31,
        b.register_32,
        b.class_11,
        b.class_12,
        b.class_21,
        b.class_22,
        b.class_31,
        b.class_32
        from score a, student b, high_sch c
        where a.stuid = b.stuid and b.high_sch = c.name
        and a.stuid = '".$this->stuid."-".$this->initial."'
        and b.high_sch = '".$this->sch."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));
        if($record['graduate_year'] != '' && $record['graduate_year'] != null){
            $record['graduate_date'] = $record['graduate_year'].'년 '.$record['graduate_month'].'월 '.$record['graduate_day'].'일';
        }

        return $record;
    }

    // 로그인했는지 여부
    // $i: $_SESSION['level']
    function ck_Login($i){
        if($i != '' && $i != null){
            return true;
        }else{
            return false;
        }
    }

    // 조회하려는 학생의 인정사항이 맞는지 검증
    // $birth: 생년월일, $name: 성명, $stuid: 학번, $init: 학교 이니셜
    function ck_Student_Identity($birth,$name,$stuid,$init){
        $record_sql = "
        select
        REGEXP_REPLACE(a.stuid,'-".$init."','')stuid,
        b.name,
        b.birth
        from score a, student b, high_sch c
        where a.stuid = b.stuid and b.high_sch = c.name
        and a.stuid = '".$stuid."-".$init."'
        and b.name = '".$name."'
        and DATE_FORMAT(b.birth,'%Y-%m-%d') = '".$birth."'
        and c.initial = '".$init."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        if($record['stuid'] == $stuid && $record['name'] == $name && $record['birth'] == $birth){
            return true;
        }else{
            return false;
        }
    }

}