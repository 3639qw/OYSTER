<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Dictionary.php";

class Course_Record extends Dictionary
{
    // SQL 쿼리문
    // 과목별 원점수
    private function Raw(){
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
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 평균점수
    private function Average(){
        $record_sql = "
        select


        (select avg(sub1_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11 )sub1_11,
        (select avg(sub2_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11 )sub2_11,
        (select avg(sub3_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11 )sub3_11,
        (select avg(sub4_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11 )sub4_11,
        (select avg(sub5_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11 )sub5_11,
        (select avg(sub6_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11 )sub6_11,
        (select avg(sub7_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11 )sub7_11,
        (select avg(sub8_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11 )sub8_11,
        (select avg(sub9_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11 )sub9_11,
        (select avg(sub10_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11 )sub10_11,
        (select avg(sub10_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11 )sub11_11,
        (select avg(sub10_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11 )sub12_11,
        
        (select avg(sub1_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12 )sub1_12,
        (select avg(sub2_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12 )sub2_12,
        (select avg(sub3_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12 )sub3_12,
        (select avg(sub4_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12 )sub4_12,
        (select avg(sub5_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12 )sub5_12,
        (select avg(sub6_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12 )sub6_12,
        (select avg(sub7_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12 )sub7_12,
        (select avg(sub8_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12 )sub8_12,
        (select avg(sub9_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12 )sub9_12,
        (select avg(sub10_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12 )sub10_12,
        (select avg(sub10_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12 )sub11_12,
        (select avg(sub10_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12 )sub12_12,
        
        
        
        (select avg(sub1_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21 )sub1_21,
        (select avg(sub2_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21 )sub2_21,
        (select avg(sub3_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21 )sub3_21,
        (select avg(sub4_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21 )sub4_21,
        (select avg(sub5_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21 )sub5_21,
        (select avg(sub6_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21 )sub6_21,
        (select avg(sub7_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21 )sub7_21,
        (select avg(sub8_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21 )sub8_21,
        (select avg(sub9_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21 )sub9_21,
        (select avg(sub10_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21 )sub10_21,
        (select avg(sub11_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21 )sub11_21,
        (select avg(sub11_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21 )sub12_21,
        
        (select avg(sub1_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22 )sub1_22,
        (select avg(sub2_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22 )sub2_22,
        (select avg(sub3_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22 )sub3_22,
        (select avg(sub4_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22 )sub4_22,
        (select avg(sub5_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22 )sub5_22,
        (select avg(sub6_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22 )sub6_22,
        (select avg(sub7_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22 )sub7_22,
        (select avg(sub8_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22 )sub8_22,
        (select avg(sub9_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22 )sub9_22,
        (select avg(sub10_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22 )sub10_22,
        (select avg(sub11_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22 )sub11_22,
        (select avg(sub11_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22 )sub12_22,
        
        
        
        (select avg(sub1_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31 )sub1_31,
        (select avg(sub2_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31 )sub2_31,
        (select avg(sub3_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31 )sub3_31,
        (select avg(sub4_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31 )sub4_31,
        (select avg(sub5_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31 )sub5_31,
        (select avg(sub6_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31 )sub6_31,
        (select avg(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31 )sub7_31,
        (select avg(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31 )sub8_31,
        (select avg(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31 )sub9_31,
        (select avg(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31 )sub10_31,
        (select avg(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31 )sub11_31,
        (select avg(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31 )sub12_31,
        
        (select avg(sub1_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32 )sub1_32,
        (select avg(sub2_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32 )sub2_32,
        (select avg(sub3_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32 )sub3_32,
        (select avg(sub4_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32 )sub4_32,
        (select avg(sub5_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32 )sub5_32,
        (select avg(sub6_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32 )sub6_32,
        (select avg(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32 )sub7_32,
        (select avg(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32 )sub8_32,
        (select avg(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32 )sub9_32,
        (select avg(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32 )sub10_32,
        (select avg(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32 )sub11_32,
        (select avg(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32 )sub12_32
        
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 표준편차
    private function SD(){
        $record_sql = "
        select


        (select std(sub1_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11 )sub1_11,
        (select std(sub2_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11 )sub2_11,
        (select std(sub3_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11 )sub3_11,
        (select std(sub4_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11 )sub4_11,
        (select std(sub5_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11 )sub5_11,
        (select std(sub6_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11 )sub6_11,
        (select std(sub7_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11 )sub7_11,
        (select std(sub8_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11 )sub8_11,
        (select std(sub9_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11 )sub9_11,
        (select std(sub10_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11 )sub10_11,
        (select std(sub10_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11 )sub11_11,
        (select std(sub10_11) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11 )sub12_11,
        
        (select std(sub1_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12 )sub1_12,
        (select std(sub2_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12 )sub2_12,
        (select std(sub3_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12 )sub3_12,
        (select std(sub4_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12 )sub4_12,
        (select std(sub5_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12 )sub5_12,
        (select std(sub6_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12 )sub6_12,
        (select std(sub7_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12 )sub7_12,
        (select std(sub8_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12 )sub8_12,
        (select std(sub9_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12 )sub9_12,
        (select std(sub10_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12 )sub10_12,
        (select std(sub10_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12 )sub11_12,
        (select std(sub10_12) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12 )sub12_12,
        
        
        
        (select std(sub1_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21 )sub1_21,
        (select std(sub2_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21 )sub2_21,
        (select std(sub3_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21 )sub3_21,
        (select std(sub4_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21 )sub4_21,
        (select std(sub5_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21 )sub5_21,
        (select std(sub6_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21 )sub6_21,
        (select std(sub7_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21 )sub7_21,
        (select std(sub8_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21 )sub8_21,
        (select std(sub9_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21 )sub9_21,
        (select std(sub10_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21 )sub10_21,
        (select std(sub11_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21 )sub11_21,
        (select std(sub11_21) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21 )sub12_21,
        
        (select std(sub1_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22 )sub1_22,
        (select std(sub2_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22 )sub2_22,
        (select std(sub3_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22 )sub3_22,
        (select std(sub4_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22 )sub4_22,
        (select std(sub5_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22 )sub5_22,
        (select std(sub6_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22 )sub6_22,
        (select std(sub7_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22 )sub7_22,
        (select std(sub8_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22 )sub8_22,
        (select std(sub9_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22 )sub9_22,
        (select std(sub10_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22 )sub10_22,
        (select std(sub11_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22 )sub11_22,
        (select std(sub11_22) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22 )sub12_22,
        
        
        
        (select std(sub1_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31 )sub1_31,
        (select std(sub2_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31 )sub2_31,
        (select std(sub3_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31 )sub3_31,
        (select std(sub4_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31 )sub4_31,
        (select std(sub5_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31 )sub5_31,
        (select std(sub6_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31 )sub6_31,
        (select std(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31 )sub7_31,
        (select std(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31 )sub8_31,
        (select std(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31 )sub9_31,
        (select std(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31 )sub10_31,
        (select std(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31 )sub11_31,
        (select std(sub7_31) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31 )sub12_31,
        
        (select std(sub1_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32 )sub1_32,
        (select std(sub2_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32 )sub2_32,
        (select std(sub3_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32 )sub3_32,
        (select std(sub4_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32 )sub4_32,
        (select std(sub5_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32 )sub5_32,
        (select std(sub6_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32 )sub6_32,
        (select std(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32 )sub7_32,
        (select std(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32 )sub8_32,
        (select std(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32 )sub9_32,
        (select std(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32 )sub10_32,
        (select std(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32 )sub11_32,
        (select std(sub7_32) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32 )sub12_32
        
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }



    // 보고되는 과목 성적
    // 과목별 성적묶음
    // 일반과목은 원점수/과목평균/(표준편차) 양식으로 보고
    // 그외과목은 원점수/과목평균 양식으로 보고
    function Course_Integrate(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();
        $cat = $ac_record->course_detail->Course_Cat();

        $raw = $this->Raw();
        $avg = $this->Average();
        $sd = $this->SD();

        $record = [];

        foreach ($name as $key => $value){
            $record[$key] = $raw[$key].'/'.round($avg[$key],1);
//            if($cat[$key] == '일반'){
//            }
            $record[$key] .= '('.round($sd[$key],1).')';
        }
        return $record;
    }

    // 과목별 원점수
    // 일반과목의 원점수만 리턴하며 교양과목은 P로 처리함
    function Course_Raw(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();
        $cat = $ac_record->course_detail->Course_Cat();

        $raw = $this->Raw();

        $record = [];

        foreach ($name as $key => $value){
            if($cat[$key] == '일반'){
                $record[$key] = $raw[$key];
            }else{
                $record[$key] = 'P';
            }
        }
        return $record;
    }

    // 과목별 평균점수
    function Course_Average(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();
        $cat = $ac_record->course_detail->Course_Cat();

        $avg = $this->Average();

        $record = [];

        foreach ($name as $key => $value){
            if($cat[$key] == '일반'){
                $record[$key] = $avg[$key];
            }else{
                $record[$key] = 'P';
            }
        }
        return $record;
    }

    // 과목별 표준편차
    function Course_SD(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();
        $cat = $ac_record->course_detail->Course_Cat();

        $sd = $this->SD();

        $record = [];

        foreach ($name as $key => $value){
            if($cat[$key] == '일반'){
                $record[$key] = $sd[$key];
            }else{
                $record[$key] = 'P';
            }
        }
        return $record;
    }


    // 과목별 원점수
    // 전과목의 원점수만 리턴(교양과목 포함)
    function Course_Raw_All(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();

        $raw = $this->Raw();

        $record = [];

        foreach ($name as $key => $value){
            $record[$key] = $raw[$key];
        }
        return $record;
    }
    // 과목별 표준점수
    // 일반과목만 리턴
    // 평균: 100, 표준편차: 20
    function Course_STD(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();
        $cat = $ac_record->course_detail->Course_Cat();

        $raw = $this->Raw();
        $avg = $this->Average();
        $sd = $this->SD();

        $record = [];

        foreach ($name as $key => $value){
            if($cat[$key] == '일반'){
                $record[$key] = round(20*(($raw[$key] - $avg[$key]) / $sd[$key])+100);
            }
        }
        return $record;
    }

    // 학기별 원점수 가중치 평균
    function Weighted_Average(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();
        $cat = $ac_record->course_detail->Course_Cat();
        $credit = $ac_record->course_detail->Course_Credit();

        $raw = $this->Raw();

        $record = [];
        $cr = [];

        foreach ($name as $key => $value){
            if($cat[$key] == '일반'){
                $record['Merged'] += ($raw[$key] * $credit[$key]);
                $cr['Merged'] += $credit[$key];

                if(substr($key,-2)  == '11'){
                    $record['11'] += ($raw[$key] * $credit[$key]);
                    $cr['11'] += $credit[$key];
                }
                if(substr($key,-2)  == '12'){
                    $record['12'] += ($raw[$key] * $credit[$key]);
                    $cr['12'] += $credit[$key];
                }
                if(substr($key,-2)  == '21'){
                    $record['21'] += ($raw[$key] * $credit[$key]);
                    $cr['21'] += $credit[$key];
                }
                if(substr($key,-2)  == '22'){
                    $record['22'] += ($raw[$key] * $credit[$key]);
                    $cr['22'] += $credit[$key];
                }
                if(substr($key,-2)  == '31'){
                    $record['31'] += ($raw[$key] * $credit[$key]);
                    $cr['31'] += $credit[$key];
                }
                if(substr($key,-2)  == '32'){
                    $record['32'] += ($raw[$key] * $credit[$key]);
                    $cr['32'] += $credit[$key];
                }
            }
        }

        foreach ($record as $key => $value){
            $record[$key] = ($value / $cr[$key]);
        }

        return $record;
    }
    // 학기별 원점수 만점, 총점
    function Raw_sum(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();
        $cat = $ac_record->course_detail->Course_Cat();

        $raw = $this->Raw();

        $record = [];

        foreach ($name as $key => $value){
            if($cat[$key] == '일반'){
                $record['Full_Marks']['Merged'] ++;
                $record['Full_Marks'][substr($key,-2)] ++;
                $record['Merged'] += $raw[$key];
                $record[substr($key,-2)] += $raw[$key];
            }
        }

        foreach ($record['Full_Marks'] as $key => $value){
            $record['Full_Marks'][$key] = ($value * 100);
        }

        return $record;
    }




    // 과목별 통계자료

    // 원점수별 표준점수
    function Allof_Raw($sub, $code, $type, $year){
        $stats = $this->Allof_Stats($sub, $code, $type, $year);

        $record_sql = "
        select
        REGEXP_REPLACE(a.stuid,'-".$this->initial."','')stuid,
        sub".$sub."_".substr($code,0,2)." sub
        from score a, student b
        where a.stuid = b.stuid
        and b.high_sch = '".$this->sch."'
        and a.type = '".$type."'
        and register_".substr($code,0,2)." = '".$year."'
        and a.code".$sub."_".substr($code,0,2)." = '".$code."'
        order by sub".$sub."_".substr($code,0,2)." desc;
        ";
        $rc = [];
        $record_result = mysqli_query($this->con, $record_sql);
        while ($record = mysqli_fetch_array($record_result)){
            $rc['원점수별로 취득하는 표준점수'][$record['sub']] = round(20*(($record['sub'] - $stats['AVG']) / $stats['SD'])+100);
            $rc['원점수별 도수'][$record['sub']] ++;
        }

        foreach ($rc['원점수별로 취득하는 표준점수'] as $key => $value){
            $rc['해당하는 표준점수를 받기 위한 최소 원점수'][$value] = $key;
            $rc['표준점수별 도수'][$value] ++;
        }

        return $rc;
    }

    // 원점수별 석차등급
    // $sub: 과목 번호
    // $code: 과목 코드
    // $type: 학생 계열
    // $year: 재적 년도
    // $sem: 학년학기
    function Allof_RG($sub, $code, $type, $year, $sem){
        $ac_record = new Academic_Integrate();

        $record_sql = "
        select
        REGEXP_REPLACE(a.stuid,'-".$this->initial."','')stuid,
        sub".$sub."_".$sem." sub
        from score a, student b
        where a.stuid = b.stuid
        and b.high_sch = '".$this->sch."'
        and a.type = '".$type."'
        and register_".$sem." = '".$year."'
        and a.code".$sub."_".$sem." = '".$code."'
        order by sub".$sub."_".$sem." desc;
        ";
        $rc = [];
        $record_result = mysqli_query($this->con, $record_sql);
        while ($record = mysqli_fetch_array($record_result)){
            $rc['Raw'][$record['stuid']] = $record['sub'];
            $rc['Raw_Count'][$record['sub']] ++;
        }
        $rc['count'] = count($rc['Raw']);

        foreach ($ac_record->statistics->HIGH_Rank($rc['Raw']) as $key => $value){
            $rc['Rank'][$key] = $value + (($rc['Raw_Count'][$rc['Raw'][$key]] - 1) / 2);
        }

        $rank_grade = $ac_record->course_rank->Grade_Table($rc['count']);

        foreach ($rc['Rank'] as $key => $value){
            foreach ($rank_grade['Rank'] as $k => $v){
                if($value <= $v){
                    $rc['RG'][$key] = $k;
                    break;
                }
            }
        }

        foreach ($rc['RG'] as $key => $value){
            $rc['RG_cut'][$value] = $rc['Raw'][$key];
        }
        $rc['RG_count'] = array_count_values($rc['RG']);
        foreach ($rc['RG_count'] as $key => $value){
            $rc['RG_Percentage'][$key] = ($value / $rc['count']) * 100;
        }

        $rc['Mean'] = $ac_record->statistics->Array_Mean($rc['Raw']);
        $rc['Median'] = $ac_record->statistics->Array_Median($rc['Raw']);
        $rc['SD'] = $ac_record->statistics->Array_SD($rc['Raw'],$rc['Mean']);

        unset($rc['Raw']);
        unset($rc['Raw_Count']);
        unset($rc['Rank']);
        unset($rc['RG']);


        return $rc;
    }

    // 과목별 평균, 표준편차
    function Allof_Stats($sub, $code, $type, $year){
        $record_sql = "
        select
        (select avg(sub".$sub."_".substr($code,0,2).") from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_".substr($code,0,2)." = b.register_".substr($code,0,2)." and sc.code".$sub."_".substr($code,0,2)." = a.code".$sub."_".substr($code,0,2)." )AVG,
        (select std(sub".$sub."_".substr($code,0,2).") from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_".substr($code,0,2)." = b.register_".substr($code,0,2)." and sc.code".$sub."_".substr($code,0,2)." = a.code".$sub."_".substr($code,0,2)." )SD
        from score a, student b
        where a.stuid = b.stuid
        and b.high_sch = '".$this->sch."'
        and a.type = '".$type."'
        and register_".substr($code,0,2)." = '".$year."'
        and a.code".$sub."_".substr($code,0,2)." = '".$code."'
        group by AVG, SD;
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con,$record_sql));

        return $record;
    }
    

}