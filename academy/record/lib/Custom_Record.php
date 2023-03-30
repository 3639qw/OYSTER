<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Dictionary.php";

class Custom_Record extends Dictionary
{
    // 학번, 소속학교명, 소속학교이니셜을 인수로 받아서 리턴

    // SQL 쿼리문
    // 과목별 원점수
    private function Raw($stuid,$sch,$initial){
        $record_sql = "
        select

        sub1_11,
        sub2_11,
        sub3_11,
        sub4_11,
        sub5_11,
        sub6_11,
        sub7_11,
        sub8_11,
        sub9_11,
        sub10_11,
        sub11_11,
        sub12_11,
        
        sub1_12,
        sub2_12,
        sub3_12,
        sub4_12,
        sub5_12,
        sub6_12,
        sub7_12,
        sub8_12,
        sub9_12,
        sub10_12,
        sub11_12,
        sub12_12,
        
        
        
        sub1_21,
        sub2_21,
        sub3_21,
        sub4_21,
        sub5_21,
        sub6_21,
        sub7_21,
        sub8_21,
        sub9_21,
        sub10_21,
        sub11_21,
        sub12_21,
        
        sub1_22,
        sub2_22,
        sub3_22,
        sub4_22,
        sub5_22,
        sub6_22,
        sub7_22,
        sub8_22,
        sub9_22,
        sub10_22,
        sub11_22,
        sub12_22,
        
        
        
        sub1_31,
        sub2_31,
        sub3_31,
        sub4_31,
        sub5_31,
        sub6_31,
        sub7_31,
        sub8_31,
        sub9_31,
        sub10_31,
        sub11_31,
        sub12_31,
        
        sub1_32,
        sub2_32,
        sub3_32,
        sub4_32,
        sub5_32,
        sub6_32,
        sub7_32,
        sub8_32,
        sub9_32,
        sub10_32,
        sub11_32,
        sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$sch."' and a.stuid = '".$stuid."-".$initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 학점
    private function Credit($stuid,$sch,$initial){
        $record_sql = "
        select

        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_11 = su.id)sub1_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_11 = su.id)sub2_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_11 = su.id)sub3_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_11 = su.id)sub4_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_11 = su.id)sub5_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_11 = su.id)sub6_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_11 = su.id)sub7_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_11 = su.id)sub8_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_11 = su.id)sub9_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_11 = su.id)sub10_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_11 = su.id)sub11_11,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_11 = su.id)sub12_11,
        
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_12 = su.id)sub1_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_12 = su.id)sub2_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_12 = su.id)sub3_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_12 = su.id)sub4_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_12 = su.id)sub5_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_12 = su.id)sub6_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_12 = su.id)sub7_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_12 = su.id)sub8_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_12 = su.id)sub9_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_12 = su.id)sub10_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_12 = su.id)sub11_12,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_12 = su.id)sub12_12,
        
        
        
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_21 = su.id)sub1_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_21 = su.id)sub2_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_21 = su.id)sub3_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_21 = su.id)sub4_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_21 = su.id)sub5_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_21 = su.id)sub6_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_21 = su.id)sub7_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_21 = su.id)sub8_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_21 = su.id)sub9_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_21 = su.id)sub10_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_21 = su.id)sub11_21,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_21 = su.id)sub12_21,
        
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_22 = su.id)sub1_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_22 = su.id)sub2_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_22 = su.id)sub3_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_22 = su.id)sub4_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_22 = su.id)sub5_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_22 = su.id)sub6_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_22 = su.id)sub7_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_22 = su.id)sub8_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_22 = su.id)sub9_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_22 = su.id)sub10_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_22 = su.id)sub11_22,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_22 = su.id)sub12_22,
        
        
        
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_31 = su.id)sub1_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_31 = su.id)sub2_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_31 = su.id)sub3_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_31 = su.id)sub4_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_31 = su.id)sub5_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_31 = su.id)sub6_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_31 = su.id)sub7_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_31 = su.id)sub8_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_31 = su.id)sub9_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_31 = su.id)sub10_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_31 = su.id)sub11_31,
        (select su.cr_1 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_31 = su.id)sub12_31,
        
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_32 = su.id)sub1_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_32 = su.id)sub2_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_32 = su.id)sub3_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_32 = su.id)sub4_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_32 = su.id)sub5_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_32 = su.id)sub6_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_32 = su.id)sub7_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_32 = su.id)sub8_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_32 = su.id)sub9_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_32 = su.id)sub10_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_32 = su.id)sub11_32,
        (select su.cr_2 from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_32 = su.id)sub12_32
        
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$sch."' and a.stuid = '".$stuid."-".$initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 이수구분
    private function Cat($stuid,$sch,$initial){
        $record_sql = "
        select

        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_11 = su.id)sub1_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_11 = su.id)sub2_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_11 = su.id)sub3_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_11 = su.id)sub4_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_11 = su.id)sub5_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_11 = su.id)sub6_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_11 = su.id)sub7_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_11 = su.id)sub8_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_11 = su.id)sub9_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_11 = su.id)sub10_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_11 = su.id)sub11_11,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_11 = su.id)sub12_11,
        
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_12 = su.id)sub1_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_12 = su.id)sub2_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_12 = su.id)sub3_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_12 = su.id)sub4_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_12 = su.id)sub5_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_12 = su.id)sub6_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_12 = su.id)sub7_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_12 = su.id)sub8_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_12 = su.id)sub9_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_12 = su.id)sub10_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_12 = su.id)sub11_12,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_12 = su.id)sub12_12,
        
        
        
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_21 = su.id)sub1_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_21 = su.id)sub2_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_21 = su.id)sub3_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_21 = su.id)sub4_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_21 = su.id)sub5_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_21 = su.id)sub6_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_21 = su.id)sub7_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_21 = su.id)sub8_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_21 = su.id)sub9_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_21 = su.id)sub10_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_21 = su.id)sub11_21,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_21 = su.id)sub12_21,
        
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_22 = su.id)sub1_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_22 = su.id)sub2_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_22 = su.id)sub3_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_22 = su.id)sub4_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_22 = su.id)sub5_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_22 = su.id)sub6_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_22 = su.id)sub7_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_22 = su.id)sub8_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_22 = su.id)sub9_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_22 = su.id)sub10_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_22 = su.id)sub11_22,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_22 = su.id)sub12_22,
        
        
        
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_31 = su.id)sub1_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_31 = su.id)sub2_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_31 = su.id)sub3_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_31 = su.id)sub4_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_31 = su.id)sub5_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_31 = su.id)sub6_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_31 = su.id)sub7_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_31 = su.id)sub8_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_31 = su.id)sub9_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_31 = su.id)sub10_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_31 = su.id)sub11_31,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_31 = su.id)sub12_31,
        
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code1_32 = su.id)sub1_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code2_32 = su.id)sub2_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code3_32 = su.id)sub3_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code4_32 = su.id)sub4_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code5_32 = su.id)sub5_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code6_32 = su.id)sub6_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code7_32 = su.id)sub7_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code8_32 = su.id)sub8_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code9_32 = su.id)sub9_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code10_32 = su.id)sub10_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code11_32 = su.id)sub11_32,
        (select su.cat from score sc, student st, course su where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.stuid = a.stuid and sc.code12_32 = su.id)sub12_32
        
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$sch."' and a.stuid = '".$stuid."-".$initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }


    // 보고되는 과목정보
    // 과목별 원점수 -- 일반과목만
    function Course_Raw($stuid,$sch,$initial){

        $raw = $this->Raw($stuid,$sch,$initial);
        $cat = $this->Cat($stuid,$sch,$initial);

        $record = [];

        foreach ($cat as $key => $value){
            if($value == '일반'){
                $record[$key] = $raw[$key];
            }
        }
        return $record;
    }
    // 과목별 학점 -- 일반과목만
    function Course_Credit($stuid,$sch,$initial){

        $cat = $this->Cat($stuid,$sch,$initial);
        $credit = $this->Credit($stuid,$sch,$initial);

        $record = [];

        foreach ($cat as $key => $value){
            if($value == '일반'){
                $record[$key] = $credit[$key];
            }
        }
        return $record;
    }
    // 과목별 변환평점 -- 일반과목만
    function Course_GP($stuid,$sch,$initial){

        $raw = $this->Course_Raw($stuid,$sch,$initial);

        foreach ($raw as $key => $value){
            $vv = floor(50+($value * 50/100));
            switch (true){
                case $vv >= 95:
                    $record[$key] = 4.5;
                    break;
                case $vv >= 90:
                    $record[$key] = 4.0;
                    break;
                case $vv >= 85:
                    $record[$key] = 3.5;
                    break;
                case $vv >= 80:
                    $record[$key] = 3.0;
                    break;
                case $vv >= 75:
                    $record[$key] = 2.5;
                    break;
                case $vv >= 70:
                    $record[$key] = 2.0;
                    break;
                case $vv >= 65:
                    $record[$key] = 1.5;
                    break;
                case $vv >= 60:
                    $record[$key] = 1.0;
                    break;
                case $vv <= 59:
                    $record[$key] = 0.0;
                    break;
            }
        }

        return $record;
    }
    // 과목별 변환점수 -- 일반과목
    function Course_Convertion($stuid,$sch,$initial){

        $raw = $this->Course_Raw($stuid,$sch,$initial);

        foreach ($raw as $key => $value){
            $record[$key] = floor(50+($value * 50/100));
        }

        return $record;
    }


}