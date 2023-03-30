<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Dictionary.php";

class Course_Rank extends Dictionary
{
    // SQL 쿼리문
    // 과목별 석차
    function Rank(){
        $record_sql = "
        select

        (select count(*)+1 from score sc, student st where sub1_11 > a.sub1_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*)+1 from score sc, student st where sub2_11 > a.sub2_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*)+1 from score sc, student st where sub3_11 > a.sub3_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*)+1 from score sc, student st where sub4_11 > a.sub4_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*)+1 from score sc, student st where sub5_11 > a.sub5_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*)+1 from score sc, student st where sub6_11 > a.sub6_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*)+1 from score sc, student st where sub7_11 > a.sub7_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*)+1 from score sc, student st where sub8_11 > a.sub8_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*)+1 from score sc, student st where sub9_11 > a.sub9_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*)+1 from score sc, student st where sub10_11 > a.sub10_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*)+1 from score sc, student st where sub11_11 > a.sub11_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*)+1 from score sc, student st where sub12_11 > a.sub12_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*)+1 from score sc, student st where sub1_12 > a.sub1_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*)+1 from score sc, student st where sub2_12 > a.sub2_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*)+1 from score sc, student st where sub3_12 > a.sub3_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*)+1 from score sc, student st where sub4_12 > a.sub4_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*)+1 from score sc, student st where sub5_12 > a.sub5_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*)+1 from score sc, student st where sub6_12 > a.sub6_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*)+1 from score sc, student st where sub7_12 > a.sub7_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*)+1 from score sc, student st where sub8_12 > a.sub8_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*)+1 from score sc, student st where sub9_12 > a.sub9_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*)+1 from score sc, student st where sub10_12 > a.sub10_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*)+1 from score sc, student st where sub11_12 > a.sub11_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*)+1 from score sc, student st where sub12_12 > a.sub12_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*)+1 from score sc, student st where sub1_21 > a.sub1_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*)+1 from score sc, student st where sub2_21 > a.sub2_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*)+1 from score sc, student st where sub3_21 > a.sub3_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*)+1 from score sc, student st where sub4_21 > a.sub4_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*)+1 from score sc, student st where sub5_21 > a.sub5_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*)+1 from score sc, student st where sub6_21 > a.sub6_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*)+1 from score sc, student st where sub7_21 > a.sub7_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*)+1 from score sc, student st where sub8_21 > a.sub8_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*)+1 from score sc, student st where sub9_21 > a.sub9_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*)+1 from score sc, student st where sub10_21 > a.sub10_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*)+1 from score sc, student st where sub11_21 > a.sub11_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*)+1 from score sc, student st where sub12_21 > a.sub12_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*)+1 from score sc, student st where sub1_22 > a.sub1_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*)+1 from score sc, student st where sub2_22 > a.sub2_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*)+1 from score sc, student st where sub3_22 > a.sub3_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*)+1 from score sc, student st where sub4_22 > a.sub4_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*)+1 from score sc, student st where sub5_22 > a.sub5_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*)+1 from score sc, student st where sub6_22 > a.sub6_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*)+1 from score sc, student st where sub7_22 > a.sub7_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*)+1 from score sc, student st where sub8_22 > a.sub8_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*)+1 from score sc, student st where sub9_22 > a.sub9_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*)+1 from score sc, student st where sub10_22 > a.sub10_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*)+1 from score sc, student st where sub11_22 > a.sub11_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*)+1 from score sc, student st where sub12_22 > a.sub12_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*)+1 from score sc, student st where sub1_31 > a.sub1_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*)+1 from score sc, student st where sub2_31 > a.sub2_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*)+1 from score sc, student st where sub3_31 > a.sub3_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*)+1 from score sc, student st where sub4_31 > a.sub4_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*)+1 from score sc, student st where sub5_31 > a.sub5_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*)+1 from score sc, student st where sub6_31 > a.sub6_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*)+1 from score sc, student st where sub7_31 > a.sub7_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*)+1 from score sc, student st where sub8_31 > a.sub8_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*)+1 from score sc, student st where sub9_31 > a.sub9_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*)+1 from score sc, student st where sub10_31 > a.sub10_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*)+1 from score sc, student st where sub11_31 > a.sub11_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*)+1 from score sc, student st where sub12_31 > a.sub12_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*)+1 from score sc, student st where sub1_32 > a.sub1_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*)+1 from score sc, student st where sub2_32 > a.sub2_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*)+1 from score sc, student st where sub3_32 > a.sub3_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*)+1 from score sc, student st where sub4_32 > a.sub4_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*)+1 from score sc, student st where sub5_32 > a.sub5_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*)+1 from score sc, student st where sub6_32 > a.sub6_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*)+1 from score sc, student st where sub7_32 > a.sub7_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*)+1 from score sc, student st where sub8_32 > a.sub8_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*)+1 from score sc, student st where sub9_32 > a.sub9_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*)+1 from score sc, student st where sub10_32 > a.sub10_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*)+1 from score sc, student st where sub11_32 > a.sub11_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*)+1 from score sc, student st where sub12_32 > a.sub12_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 동석차
    function Rank_Tie(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sub1_11 = a.sub1_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*) from score sc, student st where sub2_11 = a.sub2_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*) from score sc, student st where sub3_11 = a.sub3_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*) from score sc, student st where sub4_11 = a.sub4_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*) from score sc, student st where sub5_11 = a.sub5_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*) from score sc, student st where sub6_11 = a.sub6_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*) from score sc, student st where sub7_11 = a.sub7_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*) from score sc, student st where sub8_11 = a.sub8_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*) from score sc, student st where sub9_11 = a.sub9_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*) from score sc, student st where sub10_11 = a.sub10_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*) from score sc, student st where sub11_11 = a.sub11_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*) from score sc, student st where sub12_11 = a.sub12_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*) from score sc, student st where sub1_12 = a.sub1_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*) from score sc, student st where sub2_12 = a.sub2_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*) from score sc, student st where sub3_12 = a.sub3_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*) from score sc, student st where sub4_12 = a.sub4_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*) from score sc, student st where sub5_12 = a.sub5_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*) from score sc, student st where sub6_12 = a.sub6_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*) from score sc, student st where sub7_12 = a.sub7_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*) from score sc, student st where sub8_12 = a.sub8_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*) from score sc, student st where sub9_12 = a.sub9_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*) from score sc, student st where sub10_12 = a.sub10_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*) from score sc, student st where sub11_12 = a.sub11_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*) from score sc, student st where sub12_12 = a.sub12_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sub1_21 = a.sub1_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*) from score sc, student st where sub2_21 = a.sub2_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*) from score sc, student st where sub3_21 = a.sub3_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*) from score sc, student st where sub4_21 = a.sub4_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*) from score sc, student st where sub5_21 = a.sub5_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*) from score sc, student st where sub6_21 = a.sub6_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*) from score sc, student st where sub7_21 = a.sub7_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*) from score sc, student st where sub8_21 = a.sub8_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*) from score sc, student st where sub9_21 = a.sub9_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*) from score sc, student st where sub10_21 = a.sub10_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*) from score sc, student st where sub11_21 = a.sub11_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*) from score sc, student st where sub12_21 = a.sub12_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*) from score sc, student st where sub1_22 = a.sub1_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*) from score sc, student st where sub2_22 = a.sub2_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*) from score sc, student st where sub3_22 = a.sub3_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*) from score sc, student st where sub4_22 = a.sub4_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*) from score sc, student st where sub5_22 = a.sub5_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*) from score sc, student st where sub6_22 = a.sub6_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*) from score sc, student st where sub7_22 = a.sub7_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*) from score sc, student st where sub8_22 = a.sub8_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*) from score sc, student st where sub9_22 = a.sub9_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*) from score sc, student st where sub10_22 = a.sub10_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*) from score sc, student st where sub11_22 = a.sub11_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*) from score sc, student st where sub12_22 = a.sub12_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sub1_31 = a.sub1_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*) from score sc, student st where sub2_31 = a.sub2_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*) from score sc, student st where sub3_31 = a.sub3_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*) from score sc, student st where sub4_31 = a.sub4_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*) from score sc, student st where sub5_31 = a.sub5_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*) from score sc, student st where sub6_31 = a.sub6_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*) from score sc, student st where sub7_31 = a.sub7_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*) from score sc, student st where sub8_31 = a.sub8_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*) from score sc, student st where sub9_31 = a.sub9_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*) from score sc, student st where sub10_31 = a.sub10_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*) from score sc, student st where sub11_31 = a.sub11_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*) from score sc, student st where sub12_31 = a.sub12_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*) from score sc, student st where sub1_32 = a.sub1_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*) from score sc, student st where sub2_32 = a.sub2_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*) from score sc, student st where sub3_32 = a.sub3_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*) from score sc, student st where sub4_32 = a.sub4_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*) from score sc, student st where sub5_32 = a.sub5_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*) from score sc, student st where sub6_32 = a.sub6_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*) from score sc, student st where sub7_32 = a.sub7_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*) from score sc, student st where sub8_32 = a.sub8_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*) from score sc, student st where sub9_32 = a.sub9_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*) from score sc, student st where sub10_32 = a.sub10_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*) from score sc, student st where sub11_32 = a.sub11_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*) from score sc, student st where sub12_32 = a.sub12_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 이수자수
    function sum(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 원점수 90% 이상
    private function Raw_A(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sc.sub1_11 >= 90 and sc.sub1_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*) from score sc, student st where sc.sub2_11 >= 90 and sc.sub2_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*) from score sc, student st where sc.sub3_11 >= 90 and sc.sub3_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*) from score sc, student st where sc.sub4_11 >= 90 and sc.sub4_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*) from score sc, student st where sc.sub5_11 >= 90 and sc.sub5_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*) from score sc, student st where sc.sub6_11 >= 90 and sc.sub6_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*) from score sc, student st where sc.sub7_11 >= 90 and sc.sub7_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*) from score sc, student st where sc.sub8_11 >= 90 and sc.sub8_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*) from score sc, student st where sc.sub9_11 >= 90 and sc.sub9_11 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*) from score sc, student st where sc.sub10_11 >= 90 and sc.sub10_11 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*) from score sc, student st where sc.sub11_11 >= 90 and sc.sub11_11 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*) from score sc, student st where sc.sub12_11 >= 90 and sc.sub12_11 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*) from score sc, student st where sc.sub1_12 >= 90 and sc.sub1_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*) from score sc, student st where sc.sub2_12 >= 90 and sc.sub2_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*) from score sc, student st where sc.sub3_12 >= 90 and sc.sub3_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*) from score sc, student st where sc.sub4_12 >= 90 and sc.sub4_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*) from score sc, student st where sc.sub5_12 >= 90 and sc.sub5_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*) from score sc, student st where sc.sub6_12 >= 90 and sc.sub6_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*) from score sc, student st where sc.sub7_12 >= 90 and sc.sub7_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*) from score sc, student st where sc.sub8_12 >= 90 and sc.sub8_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*) from score sc, student st where sc.sub9_12 >= 90 and sc.sub9_12 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*) from score sc, student st where sc.sub10_12 >= 90 and sc.sub10_12 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*) from score sc, student st where sc.sub11_12 >= 90 and sc.sub11_12 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*) from score sc, student st where sc.sub12_12 >= 90 and sc.sub12_12 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_21 >= 90 and sc.sub1_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*) from score sc, student st where sc.sub2_21 >= 90 and sc.sub2_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*) from score sc, student st where sc.sub3_21 >= 90 and sc.sub3_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*) from score sc, student st where sc.sub4_21 >= 90 and sc.sub4_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*) from score sc, student st where sc.sub5_21 >= 90 and sc.sub5_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*) from score sc, student st where sc.sub6_21 >= 90 and sc.sub6_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*) from score sc, student st where sc.sub7_21 >= 90 and sc.sub7_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*) from score sc, student st where sc.sub8_21 >= 90 and sc.sub8_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*) from score sc, student st where sc.sub9_21 >= 90 and sc.sub9_21 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*) from score sc, student st where sc.sub10_21 >= 90 and sc.sub10_21 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*) from score sc, student st where sc.sub11_21 >= 90 and sc.sub11_21 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*) from score sc, student st where sc.sub12_21 >= 90 and sc.sub12_21 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*) from score sc, student st where sc.sub1_22 >= 90 and sc.sub1_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*) from score sc, student st where sc.sub2_22 >= 90 and sc.sub2_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*) from score sc, student st where sc.sub3_22 >= 90 and sc.sub3_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*) from score sc, student st where sc.sub4_22 >= 90 and sc.sub4_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*) from score sc, student st where sc.sub5_22 >= 90 and sc.sub5_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*) from score sc, student st where sc.sub6_22 >= 90 and sc.sub6_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*) from score sc, student st where sc.sub7_22 >= 90 and sc.sub7_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*) from score sc, student st where sc.sub8_22 >= 90 and sc.sub8_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*) from score sc, student st where sc.sub9_22 >= 90 and sc.sub9_22 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*) from score sc, student st where sc.sub10_22 >= 90 and sc.sub10_22 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*) from score sc, student st where sc.sub11_22 >= 90 and sc.sub11_22 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*) from score sc, student st where sc.sub12_22 >= 90 and sc.sub12_22 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_31 >= 90 and sc.sub1_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*) from score sc, student st where sc.sub2_31 >= 90 and sc.sub2_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*) from score sc, student st where sc.sub3_31 >= 90 and sc.sub3_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*) from score sc, student st where sc.sub4_31 >= 90 and sc.sub4_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*) from score sc, student st where sc.sub5_31 >= 90 and sc.sub5_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*) from score sc, student st where sc.sub6_31 >= 90 and sc.sub6_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*) from score sc, student st where sc.sub7_31 >= 90 and sc.sub7_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*) from score sc, student st where sc.sub8_31 >= 90 and sc.sub8_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*) from score sc, student st where sc.sub9_31 >= 90 and sc.sub9_31 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*) from score sc, student st where sc.sub10_31 >= 90 and sc.sub10_31 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*) from score sc, student st where sc.sub11_31 >= 90 and sc.sub11_31 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*) from score sc, student st where sc.sub12_31 >= 90 and sc.sub12_31 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*) from score sc, student st where sc.sub1_32 >= 90 and sc.sub1_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*) from score sc, student st where sc.sub2_32 >= 90 and sc.sub2_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*) from score sc, student st where sc.sub3_32 >= 90 and sc.sub3_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*) from score sc, student st where sc.sub4_32 >= 90 and sc.sub4_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*) from score sc, student st where sc.sub5_32 >= 90 and sc.sub5_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*) from score sc, student st where sc.sub6_32 >= 90 and sc.sub6_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*) from score sc, student st where sc.sub7_32 >= 90 and sc.sub7_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*) from score sc, student st where sc.sub8_32 >= 90 and sc.sub8_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*) from score sc, student st where sc.sub9_32 >= 90 and sc.sub9_32 <= 100   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*) from score sc, student st where sc.sub10_32 >= 90 and sc.sub10_32 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*) from score sc, student st where sc.sub11_32 >= 90 and sc.sub11_32 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*) from score sc, student st where sc.sub12_32 >= 90 and sc.sub12_32 <= 100 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 원점수 80% 이상
    private function Raw_B(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sc.sub1_11 >= 80 and sc.sub1_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*) from score sc, student st where sc.sub2_11 >= 80 and sc.sub2_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*) from score sc, student st where sc.sub3_11 >= 80 and sc.sub3_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*) from score sc, student st where sc.sub4_11 >= 80 and sc.sub4_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*) from score sc, student st where sc.sub5_11 >= 80 and sc.sub5_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*) from score sc, student st where sc.sub6_11 >= 80 and sc.sub6_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*) from score sc, student st where sc.sub7_11 >= 80 and sc.sub7_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*) from score sc, student st where sc.sub8_11 >= 80 and sc.sub8_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*) from score sc, student st where sc.sub9_11 >= 80 and sc.sub9_11 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*) from score sc, student st where sc.sub10_11 >= 80 and sc.sub10_11 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*) from score sc, student st where sc.sub11_11 >= 80 and sc.sub11_11 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*) from score sc, student st where sc.sub12_11 >= 80 and sc.sub12_11 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*) from score sc, student st where sc.sub1_12 >= 80 and sc.sub1_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*) from score sc, student st where sc.sub2_12 >= 80 and sc.sub2_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*) from score sc, student st where sc.sub3_12 >= 80 and sc.sub3_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*) from score sc, student st where sc.sub4_12 >= 80 and sc.sub4_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*) from score sc, student st where sc.sub5_12 >= 80 and sc.sub5_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*) from score sc, student st where sc.sub6_12 >= 80 and sc.sub6_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*) from score sc, student st where sc.sub7_12 >= 80 and sc.sub7_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*) from score sc, student st where sc.sub8_12 >= 80 and sc.sub8_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*) from score sc, student st where sc.sub9_12 >= 80 and sc.sub9_12 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*) from score sc, student st where sc.sub10_12 >= 80 and sc.sub10_12 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*) from score sc, student st where sc.sub11_12 >= 80 and sc.sub11_12 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*) from score sc, student st where sc.sub12_12 >= 80 and sc.sub12_12 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_21 >= 80 and sc.sub1_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*) from score sc, student st where sc.sub2_21 >= 80 and sc.sub2_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*) from score sc, student st where sc.sub3_21 >= 80 and sc.sub3_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*) from score sc, student st where sc.sub4_21 >= 80 and sc.sub4_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*) from score sc, student st where sc.sub5_21 >= 80 and sc.sub5_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*) from score sc, student st where sc.sub6_21 >= 80 and sc.sub6_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*) from score sc, student st where sc.sub7_21 >= 80 and sc.sub7_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*) from score sc, student st where sc.sub8_21 >= 80 and sc.sub8_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*) from score sc, student st where sc.sub9_21 >= 80 and sc.sub9_21 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*) from score sc, student st where sc.sub10_21 >= 80 and sc.sub10_21 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*) from score sc, student st where sc.sub11_21 >= 80 and sc.sub11_21 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*) from score sc, student st where sc.sub12_21 >= 80 and sc.sub12_21 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*) from score sc, student st where sc.sub1_22 >= 80 and sc.sub1_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*) from score sc, student st where sc.sub2_22 >= 80 and sc.sub2_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*) from score sc, student st where sc.sub3_22 >= 80 and sc.sub3_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*) from score sc, student st where sc.sub4_22 >= 80 and sc.sub4_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*) from score sc, student st where sc.sub5_22 >= 80 and sc.sub5_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*) from score sc, student st where sc.sub6_22 >= 80 and sc.sub6_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*) from score sc, student st where sc.sub7_22 >= 80 and sc.sub7_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*) from score sc, student st where sc.sub8_22 >= 80 and sc.sub8_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*) from score sc, student st where sc.sub9_22 >= 80 and sc.sub9_22 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*) from score sc, student st where sc.sub10_22 >= 80 and sc.sub10_22 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*) from score sc, student st where sc.sub11_22 >= 80 and sc.sub11_22 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*) from score sc, student st where sc.sub12_22 >= 80 and sc.sub12_22 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_31 >= 80 and sc.sub1_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*) from score sc, student st where sc.sub2_31 >= 80 and sc.sub2_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*) from score sc, student st where sc.sub3_31 >= 80 and sc.sub3_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*) from score sc, student st where sc.sub4_31 >= 80 and sc.sub4_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*) from score sc, student st where sc.sub5_31 >= 80 and sc.sub5_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*) from score sc, student st where sc.sub6_31 >= 80 and sc.sub6_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*) from score sc, student st where sc.sub7_31 >= 80 and sc.sub7_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*) from score sc, student st where sc.sub8_31 >= 80 and sc.sub8_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*) from score sc, student st where sc.sub9_31 >= 80 and sc.sub9_31 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*) from score sc, student st where sc.sub10_31 >= 80 and sc.sub10_31 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*) from score sc, student st where sc.sub11_31 >= 80 and sc.sub11_31 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*) from score sc, student st where sc.sub12_31 >= 80 and sc.sub12_31 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*) from score sc, student st where sc.sub1_32 >= 80 and sc.sub1_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*) from score sc, student st where sc.sub2_32 >= 80 and sc.sub2_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*) from score sc, student st where sc.sub3_32 >= 80 and sc.sub3_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*) from score sc, student st where sc.sub4_32 >= 80 and sc.sub4_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*) from score sc, student st where sc.sub5_32 >= 80 and sc.sub5_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*) from score sc, student st where sc.sub6_32 >= 80 and sc.sub6_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*) from score sc, student st where sc.sub7_32 >= 80 and sc.sub7_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*) from score sc, student st where sc.sub8_32 >= 80 and sc.sub8_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*) from score sc, student st where sc.sub9_32 >= 80 and sc.sub9_32 <= 89   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*) from score sc, student st where sc.sub10_32 >= 80 and sc.sub10_32 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*) from score sc, student st where sc.sub11_32 >= 80 and sc.sub11_32 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*) from score sc, student st where sc.sub12_32 >= 80 and sc.sub12_32 <= 89 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 원점수 70% 이상
    private function Raw_C(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sc.sub1_11 >= 70 and sc.sub1_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*) from score sc, student st where sc.sub2_11 >= 70 and sc.sub2_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*) from score sc, student st where sc.sub3_11 >= 70 and sc.sub3_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*) from score sc, student st where sc.sub4_11 >= 70 and sc.sub4_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*) from score sc, student st where sc.sub5_11 >= 70 and sc.sub5_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*) from score sc, student st where sc.sub6_11 >= 70 and sc.sub6_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*) from score sc, student st where sc.sub7_11 >= 70 and sc.sub7_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*) from score sc, student st where sc.sub8_11 >= 70 and sc.sub8_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*) from score sc, student st where sc.sub9_11 >= 70 and sc.sub9_11 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*) from score sc, student st where sc.sub10_11 >= 70 and sc.sub10_11 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*) from score sc, student st where sc.sub11_11 >= 70 and sc.sub11_11 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*) from score sc, student st where sc.sub12_11 >= 70 and sc.sub12_11 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*) from score sc, student st where sc.sub1_12 >= 70 and sc.sub1_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*) from score sc, student st where sc.sub2_12 >= 70 and sc.sub2_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*) from score sc, student st where sc.sub3_12 >= 70 and sc.sub3_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*) from score sc, student st where sc.sub4_12 >= 70 and sc.sub4_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*) from score sc, student st where sc.sub5_12 >= 70 and sc.sub5_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*) from score sc, student st where sc.sub6_12 >= 70 and sc.sub6_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*) from score sc, student st where sc.sub7_12 >= 70 and sc.sub7_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*) from score sc, student st where sc.sub8_12 >= 70 and sc.sub8_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*) from score sc, student st where sc.sub9_12 >= 70 and sc.sub9_12 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*) from score sc, student st where sc.sub10_12 >= 70 and sc.sub10_12 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*) from score sc, student st where sc.sub11_12 >= 70 and sc.sub11_12 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*) from score sc, student st where sc.sub12_12 >= 70 and sc.sub12_12 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_21 >= 70 and sc.sub1_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*) from score sc, student st where sc.sub2_21 >= 70 and sc.sub2_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*) from score sc, student st where sc.sub3_21 >= 70 and sc.sub3_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*) from score sc, student st where sc.sub4_21 >= 70 and sc.sub4_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*) from score sc, student st where sc.sub5_21 >= 70 and sc.sub5_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*) from score sc, student st where sc.sub6_21 >= 70 and sc.sub6_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*) from score sc, student st where sc.sub7_21 >= 70 and sc.sub7_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*) from score sc, student st where sc.sub8_21 >= 70 and sc.sub8_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*) from score sc, student st where sc.sub9_21 >= 70 and sc.sub9_21 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*) from score sc, student st where sc.sub10_21 >= 70 and sc.sub10_21 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*) from score sc, student st where sc.sub11_21 >= 70 and sc.sub11_21 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*) from score sc, student st where sc.sub12_21 >= 70 and sc.sub12_21 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*) from score sc, student st where sc.sub1_22 >= 70 and sc.sub1_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*) from score sc, student st where sc.sub2_22 >= 70 and sc.sub2_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*) from score sc, student st where sc.sub3_22 >= 70 and sc.sub3_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*) from score sc, student st where sc.sub4_22 >= 70 and sc.sub4_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*) from score sc, student st where sc.sub5_22 >= 70 and sc.sub5_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*) from score sc, student st where sc.sub6_22 >= 70 and sc.sub6_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*) from score sc, student st where sc.sub7_22 >= 70 and sc.sub7_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*) from score sc, student st where sc.sub8_22 >= 70 and sc.sub8_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*) from score sc, student st where sc.sub9_22 >= 70 and sc.sub9_22 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*) from score sc, student st where sc.sub10_22 >= 70 and sc.sub10_22 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*) from score sc, student st where sc.sub11_22 >= 70 and sc.sub11_22 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*) from score sc, student st where sc.sub12_22 >= 70 and sc.sub12_22 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_31 >= 70 and sc.sub1_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*) from score sc, student st where sc.sub2_31 >= 70 and sc.sub2_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*) from score sc, student st where sc.sub3_31 >= 70 and sc.sub3_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*) from score sc, student st where sc.sub4_31 >= 70 and sc.sub4_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*) from score sc, student st where sc.sub5_31 >= 70 and sc.sub5_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*) from score sc, student st where sc.sub6_31 >= 70 and sc.sub6_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*) from score sc, student st where sc.sub7_31 >= 70 and sc.sub7_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*) from score sc, student st where sc.sub8_31 >= 70 and sc.sub8_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*) from score sc, student st where sc.sub9_31 >= 70 and sc.sub9_31 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*) from score sc, student st where sc.sub10_31 >= 70 and sc.sub10_31 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*) from score sc, student st where sc.sub11_31 >= 70 and sc.sub11_31 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*) from score sc, student st where sc.sub12_31 >= 70 and sc.sub12_31 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*) from score sc, student st where sc.sub1_32 >= 70 and sc.sub1_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*) from score sc, student st where sc.sub2_32 >= 70 and sc.sub2_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*) from score sc, student st where sc.sub3_32 >= 70 and sc.sub3_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*) from score sc, student st where sc.sub4_32 >= 70 and sc.sub4_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*) from score sc, student st where sc.sub5_32 >= 70 and sc.sub5_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*) from score sc, student st where sc.sub6_32 >= 70 and sc.sub6_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*) from score sc, student st where sc.sub7_32 >= 70 and sc.sub7_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*) from score sc, student st where sc.sub8_32 >= 70 and sc.sub8_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*) from score sc, student st where sc.sub9_32 >= 70 and sc.sub9_32 <= 79   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*) from score sc, student st where sc.sub10_32 >= 70 and sc.sub10_32 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*) from score sc, student st where sc.sub11_32 >= 70 and sc.sub11_32 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*) from score sc, student st where sc.sub12_32 >= 70 and sc.sub12_32 <= 79 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 원점수 60% 이상
    private function Raw_D(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sc.sub1_11 >= 60 and sc.sub1_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*) from score sc, student st where sc.sub2_11 >= 60 and sc.sub2_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*) from score sc, student st where sc.sub3_11 >= 60 and sc.sub3_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*) from score sc, student st where sc.sub4_11 >= 60 and sc.sub4_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*) from score sc, student st where sc.sub5_11 >= 60 and sc.sub5_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*) from score sc, student st where sc.sub6_11 >= 60 and sc.sub6_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*) from score sc, student st where sc.sub7_11 >= 60 and sc.sub7_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*) from score sc, student st where sc.sub8_11 >= 60 and sc.sub8_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*) from score sc, student st where sc.sub9_11 >= 60 and sc.sub9_11 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*) from score sc, student st where sc.sub10_11 >= 60 and sc.sub10_11 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*) from score sc, student st where sc.sub11_11 >= 60 and sc.sub11_11 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*) from score sc, student st where sc.sub12_11 >= 60 and sc.sub12_11 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*) from score sc, student st where sc.sub1_12 >= 60 and sc.sub1_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*) from score sc, student st where sc.sub2_12 >= 60 and sc.sub2_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*) from score sc, student st where sc.sub3_12 >= 60 and sc.sub3_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*) from score sc, student st where sc.sub4_12 >= 60 and sc.sub4_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*) from score sc, student st where sc.sub5_12 >= 60 and sc.sub5_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*) from score sc, student st where sc.sub6_12 >= 60 and sc.sub6_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*) from score sc, student st where sc.sub7_12 >= 60 and sc.sub7_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*) from score sc, student st where sc.sub8_12 >= 60 and sc.sub8_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*) from score sc, student st where sc.sub9_12 >= 60 and sc.sub9_12 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*) from score sc, student st where sc.sub10_12 >= 60 and sc.sub10_12 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*) from score sc, student st where sc.sub11_12 >= 60 and sc.sub11_12 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*) from score sc, student st where sc.sub12_12 >= 60 and sc.sub12_12 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_21 >= 60 and sc.sub1_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*) from score sc, student st where sc.sub2_21 >= 60 and sc.sub2_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*) from score sc, student st where sc.sub3_21 >= 60 and sc.sub3_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*) from score sc, student st where sc.sub4_21 >= 60 and sc.sub4_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*) from score sc, student st where sc.sub5_21 >= 60 and sc.sub5_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*) from score sc, student st where sc.sub6_21 >= 60 and sc.sub6_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*) from score sc, student st where sc.sub7_21 >= 60 and sc.sub7_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*) from score sc, student st where sc.sub8_21 >= 60 and sc.sub8_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*) from score sc, student st where sc.sub9_21 >= 60 and sc.sub9_21 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*) from score sc, student st where sc.sub10_21 >= 60 and sc.sub10_21 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*) from score sc, student st where sc.sub11_21 >= 60 and sc.sub11_21 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*) from score sc, student st where sc.sub12_21 >= 60 and sc.sub12_21 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*) from score sc, student st where sc.sub1_22 >= 60 and sc.sub1_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*) from score sc, student st where sc.sub2_22 >= 60 and sc.sub2_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*) from score sc, student st where sc.sub3_22 >= 60 and sc.sub3_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*) from score sc, student st where sc.sub4_22 >= 60 and sc.sub4_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*) from score sc, student st where sc.sub5_22 >= 60 and sc.sub5_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*) from score sc, student st where sc.sub6_22 >= 60 and sc.sub6_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*) from score sc, student st where sc.sub7_22 >= 60 and sc.sub7_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*) from score sc, student st where sc.sub8_22 >= 60 and sc.sub8_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*) from score sc, student st where sc.sub9_22 >= 60 and sc.sub9_22 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*) from score sc, student st where sc.sub10_22 >= 60 and sc.sub10_22 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*) from score sc, student st where sc.sub11_22 >= 60 and sc.sub11_22 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*) from score sc, student st where sc.sub12_22 >= 60 and sc.sub12_22 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_31 >= 60 and sc.sub1_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*) from score sc, student st where sc.sub2_31 >= 60 and sc.sub2_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*) from score sc, student st where sc.sub3_31 >= 60 and sc.sub3_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*) from score sc, student st where sc.sub4_31 >= 60 and sc.sub4_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*) from score sc, student st where sc.sub5_31 >= 60 and sc.sub5_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*) from score sc, student st where sc.sub6_31 >= 60 and sc.sub6_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*) from score sc, student st where sc.sub7_31 >= 60 and sc.sub7_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*) from score sc, student st where sc.sub8_31 >= 60 and sc.sub8_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*) from score sc, student st where sc.sub9_31 >= 60 and sc.sub9_31 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*) from score sc, student st where sc.sub10_31 >= 60 and sc.sub10_31 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*) from score sc, student st where sc.sub11_31 >= 60 and sc.sub11_31 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*) from score sc, student st where sc.sub12_31 >= 60 and sc.sub12_31 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*) from score sc, student st where sc.sub1_32 >= 60 and sc.sub1_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*) from score sc, student st where sc.sub2_32 >= 60 and sc.sub2_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*) from score sc, student st where sc.sub3_32 >= 60 and sc.sub3_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*) from score sc, student st where sc.sub4_32 >= 60 and sc.sub4_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*) from score sc, student st where sc.sub5_32 >= 60 and sc.sub5_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*) from score sc, student st where sc.sub6_32 >= 60 and sc.sub6_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*) from score sc, student st where sc.sub7_32 >= 60 and sc.sub7_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*) from score sc, student st where sc.sub8_32 >= 60 and sc.sub8_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*) from score sc, student st where sc.sub9_32 >= 60 and sc.sub9_32 <= 69   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*) from score sc, student st where sc.sub10_32 >= 60 and sc.sub10_32 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*) from score sc, student st where sc.sub11_32 >= 60 and sc.sub11_32 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*) from score sc, student st where sc.sub12_32 >= 60 and sc.sub12_32 <= 69 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 원점수 60% 미만
    private function Raw_E(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sc.sub1_11 >= 00 and sc.sub1_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11)sub1_11,
        (select count(*) from score sc, student st where sc.sub2_11 >= 00 and sc.sub2_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11)sub2_11,
        (select count(*) from score sc, student st where sc.sub3_11 >= 00 and sc.sub3_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11)sub3_11,
        (select count(*) from score sc, student st where sc.sub4_11 >= 00 and sc.sub4_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11)sub4_11,
        (select count(*) from score sc, student st where sc.sub5_11 >= 00 and sc.sub5_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11)sub5_11,
        (select count(*) from score sc, student st where sc.sub6_11 >= 00 and sc.sub6_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11)sub6_11,
        (select count(*) from score sc, student st where sc.sub7_11 >= 00 and sc.sub7_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11)sub7_11,
        (select count(*) from score sc, student st where sc.sub8_11 >= 00 and sc.sub8_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11)sub8_11,
        (select count(*) from score sc, student st where sc.sub9_11 >= 00 and sc.sub9_11 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11)sub9_11,
        (select count(*) from score sc, student st where sc.sub10_11 >= 00 and sc.sub10_11 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11)sub10_11,
        (select count(*) from score sc, student st where sc.sub11_11 >= 00 and sc.sub11_11 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11)sub11_11,
        (select count(*) from score sc, student st where sc.sub12_11 >= 00 and sc.sub12_11 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11)sub12_11,
        
        (select count(*) from score sc, student st where sc.sub1_12 >= 00 and sc.sub1_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12)sub1_12,
        (select count(*) from score sc, student st where sc.sub2_12 >= 00 and sc.sub2_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12)sub2_12,
        (select count(*) from score sc, student st where sc.sub3_12 >= 00 and sc.sub3_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12)sub3_12,
        (select count(*) from score sc, student st where sc.sub4_12 >= 00 and sc.sub4_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12)sub4_12,
        (select count(*) from score sc, student st where sc.sub5_12 >= 00 and sc.sub5_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12)sub5_12,
        (select count(*) from score sc, student st where sc.sub6_12 >= 00 and sc.sub6_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12)sub6_12,
        (select count(*) from score sc, student st where sc.sub7_12 >= 00 and sc.sub7_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12)sub7_12,
        (select count(*) from score sc, student st where sc.sub8_12 >= 00 and sc.sub8_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12)sub8_12,
        (select count(*) from score sc, student st where sc.sub9_12 >= 00 and sc.sub9_12 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12)sub9_12,
        (select count(*) from score sc, student st where sc.sub10_12 >= 00 and sc.sub10_12 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12)sub10_12,
        (select count(*) from score sc, student st where sc.sub11_12 >= 00 and sc.sub11_12 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12)sub11_12,
        (select count(*) from score sc, student st where sc.sub12_12 >= 00 and sc.sub12_12 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_21 >= 00 and sc.sub1_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21)sub1_21,
        (select count(*) from score sc, student st where sc.sub2_21 >= 00 and sc.sub2_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21)sub2_21,
        (select count(*) from score sc, student st where sc.sub3_21 >= 00 and sc.sub3_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21)sub3_21,
        (select count(*) from score sc, student st where sc.sub4_21 >= 00 and sc.sub4_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21)sub4_21,
        (select count(*) from score sc, student st where sc.sub5_21 >= 00 and sc.sub5_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21)sub5_21,
        (select count(*) from score sc, student st where sc.sub6_21 >= 00 and sc.sub6_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21)sub6_21,
        (select count(*) from score sc, student st where sc.sub7_21 >= 00 and sc.sub7_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21)sub7_21,
        (select count(*) from score sc, student st where sc.sub8_21 >= 00 and sc.sub8_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21)sub8_21,
        (select count(*) from score sc, student st where sc.sub9_21 >= 00 and sc.sub9_21 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21)sub9_21,
        (select count(*) from score sc, student st where sc.sub10_21 >= 00 and sc.sub10_21 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21)sub10_21,
        (select count(*) from score sc, student st where sc.sub11_21 >= 00 and sc.sub11_21 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21)sub11_21,
        (select count(*) from score sc, student st where sc.sub12_21 >= 00 and sc.sub12_21 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21)sub12_21,
        
        (select count(*) from score sc, student st where sc.sub1_22 >= 00 and sc.sub1_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22)sub1_22,
        (select count(*) from score sc, student st where sc.sub2_22 >= 00 and sc.sub2_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22)sub2_22,
        (select count(*) from score sc, student st where sc.sub3_22 >= 00 and sc.sub3_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22)sub3_22,
        (select count(*) from score sc, student st where sc.sub4_22 >= 00 and sc.sub4_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22)sub4_22,
        (select count(*) from score sc, student st where sc.sub5_22 >= 00 and sc.sub5_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22)sub5_22,
        (select count(*) from score sc, student st where sc.sub6_22 >= 00 and sc.sub6_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22)sub6_22,
        (select count(*) from score sc, student st where sc.sub7_22 >= 00 and sc.sub7_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22)sub7_22,
        (select count(*) from score sc, student st where sc.sub8_22 >= 00 and sc.sub8_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22)sub8_22,
        (select count(*) from score sc, student st where sc.sub9_22 >= 00 and sc.sub9_22 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22)sub9_22,
        (select count(*) from score sc, student st where sc.sub10_22 >= 00 and sc.sub10_22 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22)sub10_22,
        (select count(*) from score sc, student st where sc.sub11_22 >= 00 and sc.sub11_22 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22)sub11_22,
        (select count(*) from score sc, student st where sc.sub12_22 >= 00 and sc.sub12_22 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sc.sub1_31 >= 00 and sc.sub1_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31)sub1_31,
        (select count(*) from score sc, student st where sc.sub2_31 >= 00 and sc.sub2_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31)sub2_31,
        (select count(*) from score sc, student st where sc.sub3_31 >= 00 and sc.sub3_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31)sub3_31,
        (select count(*) from score sc, student st where sc.sub4_31 >= 00 and sc.sub4_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31)sub4_31,
        (select count(*) from score sc, student st where sc.sub5_31 >= 00 and sc.sub5_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31)sub5_31,
        (select count(*) from score sc, student st where sc.sub6_31 >= 00 and sc.sub6_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31)sub6_31,
        (select count(*) from score sc, student st where sc.sub7_31 >= 00 and sc.sub7_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31)sub7_31,
        (select count(*) from score sc, student st where sc.sub8_31 >= 00 and sc.sub8_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31)sub8_31,
        (select count(*) from score sc, student st where sc.sub9_31 >= 00 and sc.sub9_31 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31)sub9_31,
        (select count(*) from score sc, student st where sc.sub10_31 >= 00 and sc.sub10_31 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31)sub10_31,
        (select count(*) from score sc, student st where sc.sub11_31 >= 00 and sc.sub11_31 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31)sub11_31,
        (select count(*) from score sc, student st where sc.sub12_31 >= 00 and sc.sub12_31 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31)sub12_31,
        
        (select count(*) from score sc, student st where sc.sub1_32 >= 00 and sc.sub1_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32)sub1_32,
        (select count(*) from score sc, student st where sc.sub2_32 >= 00 and sc.sub2_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32)sub2_32,
        (select count(*) from score sc, student st where sc.sub3_32 >= 00 and sc.sub3_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32)sub3_32,
        (select count(*) from score sc, student st where sc.sub4_32 >= 00 and sc.sub4_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32)sub4_32,
        (select count(*) from score sc, student st where sc.sub5_32 >= 00 and sc.sub5_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32)sub5_32,
        (select count(*) from score sc, student st where sc.sub6_32 >= 00 and sc.sub6_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32)sub6_32,
        (select count(*) from score sc, student st where sc.sub7_32 >= 00 and sc.sub7_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32)sub7_32,
        (select count(*) from score sc, student st where sc.sub8_32 >= 00 and sc.sub8_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32)sub8_32,
        (select count(*) from score sc, student st where sc.sub9_32 >= 00 and sc.sub9_32 <= 59   and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32)sub9_32,
        (select count(*) from score sc, student st where sc.sub10_32 >= 00 and sc.sub10_32 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32)sub10_32,
        (select count(*) from score sc, student st where sc.sub11_32 >= 00 and sc.sub11_32 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32)sub11_32,
        (select count(*) from score sc, student st where sc.sub12_32 >= 00 and sc.sub12_32 <= 59 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 학급석차
    private function cls_Rank(){
        $record_sql = "
        select

        (select count(*)+1 from score sc, student st where sub1_11 > a.sub1_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11 and st.class_11 = b.class_11)sub1_11,
        (select count(*)+1 from score sc, student st where sub2_11 > a.sub2_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11 and st.class_11 = b.class_11)sub2_11,
        (select count(*)+1 from score sc, student st where sub3_11 > a.sub3_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11 and st.class_11 = b.class_11)sub3_11,
        (select count(*)+1 from score sc, student st where sub4_11 > a.sub4_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11 and st.class_11 = b.class_11)sub4_11,
        (select count(*)+1 from score sc, student st where sub5_11 > a.sub5_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11 and st.class_11 = b.class_11)sub5_11,
        (select count(*)+1 from score sc, student st where sub6_11 > a.sub6_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11 and st.class_11 = b.class_11)sub6_11,
        (select count(*)+1 from score sc, student st where sub7_11 > a.sub7_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11 and st.class_11 = b.class_11)sub7_11,
        (select count(*)+1 from score sc, student st where sub8_11 > a.sub8_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11 and st.class_11 = b.class_11)sub8_11,
        (select count(*)+1 from score sc, student st where sub9_11 > a.sub9_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11 and st.class_11 = b.class_11)sub9_11,
        (select count(*)+1 from score sc, student st where sub10_11 > a.sub10_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11 and st.class_11 = b.class_11)sub10_11,
        (select count(*)+1 from score sc, student st where sub11_11 > a.sub11_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11 and st.class_11 = b.class_11)sub11_11,
        (select count(*)+1 from score sc, student st where sub12_11 > a.sub12_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11 and st.class_11 = b.class_11)sub12_11,
        
        (select count(*)+1 from score sc, student st where sub1_12 > a.sub1_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12 and st.class_12 = b.class_12)sub1_12,
        (select count(*)+1 from score sc, student st where sub2_12 > a.sub2_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12 and st.class_12 = b.class_12)sub2_12,
        (select count(*)+1 from score sc, student st where sub3_12 > a.sub3_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12 and st.class_12 = b.class_12)sub3_12,
        (select count(*)+1 from score sc, student st where sub4_12 > a.sub4_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12 and st.class_12 = b.class_12)sub4_12,
        (select count(*)+1 from score sc, student st where sub5_12 > a.sub5_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12 and st.class_12 = b.class_12)sub5_12,
        (select count(*)+1 from score sc, student st where sub6_12 > a.sub6_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12 and st.class_12 = b.class_12)sub6_12,
        (select count(*)+1 from score sc, student st where sub7_12 > a.sub7_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12 and st.class_12 = b.class_12)sub7_12,
        (select count(*)+1 from score sc, student st where sub8_12 > a.sub8_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12 and st.class_12 = b.class_12)sub8_12,
        (select count(*)+1 from score sc, student st where sub9_12 > a.sub9_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12 and st.class_12 = b.class_12)sub9_12,
        (select count(*)+1 from score sc, student st where sub10_12 > a.sub10_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12 and st.class_12 = b.class_12)sub10_12,
        (select count(*)+1 from score sc, student st where sub11_12 > a.sub11_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12 and st.class_12 = b.class_12)sub11_12,
        (select count(*)+1 from score sc, student st where sub12_12 > a.sub12_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12 and st.class_12 = b.class_12)sub12_12,
        
        
        
        (select count(*)+1 from score sc, student st where sub1_21 > a.sub1_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21 and st.class_21 = b.class_21)sub1_21,
        (select count(*)+1 from score sc, student st where sub2_21 > a.sub2_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21 and st.class_21 = b.class_21)sub2_21,
        (select count(*)+1 from score sc, student st where sub3_21 > a.sub3_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21 and st.class_21 = b.class_21)sub3_21,
        (select count(*)+1 from score sc, student st where sub4_21 > a.sub4_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21 and st.class_21 = b.class_21)sub4_21,
        (select count(*)+1 from score sc, student st where sub5_21 > a.sub5_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21 and st.class_21 = b.class_21)sub5_21,
        (select count(*)+1 from score sc, student st where sub6_21 > a.sub6_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21 and st.class_21 = b.class_21)sub6_21,
        (select count(*)+1 from score sc, student st where sub7_21 > a.sub7_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21 and st.class_21 = b.class_21)sub7_21,
        (select count(*)+1 from score sc, student st where sub8_21 > a.sub8_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21 and st.class_21 = b.class_21)sub8_21,
        (select count(*)+1 from score sc, student st where sub9_21 > a.sub9_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21 and st.class_21 = b.class_21)sub9_21,
        (select count(*)+1 from score sc, student st where sub10_21 > a.sub10_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21 and st.class_21 = b.class_21)sub10_21,
        (select count(*)+1 from score sc, student st where sub11_21 > a.sub11_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21 and st.class_21 = b.class_21)sub11_21,
        (select count(*)+1 from score sc, student st where sub12_21 > a.sub12_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21 and st.class_21 = b.class_21)sub12_21,
        
        (select count(*)+1 from score sc, student st where sub1_22 > a.sub1_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22 and st.class_22 = b.class_22)sub1_22,
        (select count(*)+1 from score sc, student st where sub2_22 > a.sub2_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22 and st.class_22 = b.class_22)sub2_22,
        (select count(*)+1 from score sc, student st where sub3_22 > a.sub3_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22 and st.class_22 = b.class_22)sub3_22,
        (select count(*)+1 from score sc, student st where sub4_22 > a.sub4_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22 and st.class_22 = b.class_22)sub4_22,
        (select count(*)+1 from score sc, student st where sub5_22 > a.sub5_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22 and st.class_22 = b.class_22)sub5_22,
        (select count(*)+1 from score sc, student st where sub6_22 > a.sub6_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22 and st.class_22 = b.class_22)sub6_22,
        (select count(*)+1 from score sc, student st where sub7_22 > a.sub7_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22 and st.class_22 = b.class_22)sub7_22,
        (select count(*)+1 from score sc, student st where sub8_22 > a.sub8_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22 and st.class_22 = b.class_22)sub8_22,
        (select count(*)+1 from score sc, student st where sub9_22 > a.sub9_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22 and st.class_22 = b.class_22)sub9_22,
        (select count(*)+1 from score sc, student st where sub10_22 > a.sub10_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22 and st.class_22 = b.class_22)sub10_22,
        (select count(*)+1 from score sc, student st where sub11_22 > a.sub11_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22 and st.class_22 = b.class_22)sub11_22,
        (select count(*)+1 from score sc, student st where sub12_22 > a.sub12_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22 and st.class_22 = b.class_22)sub12_22,
        
        
        
        (select count(*)+1 from score sc, student st where sub1_31 > a.sub1_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31 and st.class_31 = b.class_31)sub1_31,
        (select count(*)+1 from score sc, student st where sub2_31 > a.sub2_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31 and st.class_31 = b.class_31)sub2_31,
        (select count(*)+1 from score sc, student st where sub3_31 > a.sub3_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31 and st.class_31 = b.class_31)sub3_31,
        (select count(*)+1 from score sc, student st where sub4_31 > a.sub4_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31 and st.class_31 = b.class_31)sub4_31,
        (select count(*)+1 from score sc, student st where sub5_31 > a.sub5_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31 and st.class_31 = b.class_31)sub5_31,
        (select count(*)+1 from score sc, student st where sub6_31 > a.sub6_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31 and st.class_31 = b.class_31)sub6_31,
        (select count(*)+1 from score sc, student st where sub7_31 > a.sub7_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31 and st.class_31 = b.class_31)sub7_31,
        (select count(*)+1 from score sc, student st where sub8_31 > a.sub8_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31 and st.class_31 = b.class_31)sub8_31,
        (select count(*)+1 from score sc, student st where sub9_31 > a.sub9_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31 and st.class_31 = b.class_31)sub9_31,
        (select count(*)+1 from score sc, student st where sub10_31 > a.sub10_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31 and st.class_31 = b.class_31)sub10_31,
        (select count(*)+1 from score sc, student st where sub11_31 > a.sub11_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31 and st.class_31 = b.class_31)sub11_31,
        (select count(*)+1 from score sc, student st where sub12_31 > a.sub12_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31 and st.class_31 = b.class_31)sub12_31,
        
        (select count(*)+1 from score sc, student st where sub1_32 > a.sub1_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32 and st.class_32 = b.class_32)sub1_32,
        (select count(*)+1 from score sc, student st where sub2_32 > a.sub2_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32 and st.class_32 = b.class_32)sub2_32,
        (select count(*)+1 from score sc, student st where sub3_32 > a.sub3_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32 and st.class_32 = b.class_32)sub3_32,
        (select count(*)+1 from score sc, student st where sub4_32 > a.sub4_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32 and st.class_32 = b.class_32)sub4_32,
        (select count(*)+1 from score sc, student st where sub5_32 > a.sub5_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32 and st.class_32 = b.class_32)sub5_32,
        (select count(*)+1 from score sc, student st where sub6_32 > a.sub6_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32 and st.class_32 = b.class_32)sub6_32,
        (select count(*)+1 from score sc, student st where sub7_32 > a.sub7_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32 and st.class_32 = b.class_32)sub7_32,
        (select count(*)+1 from score sc, student st where sub8_32 > a.sub8_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32 and st.class_32 = b.class_32)sub8_32,
        (select count(*)+1 from score sc, student st where sub9_32 > a.sub9_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32 and st.class_32 = b.class_32)sub9_32,
        (select count(*)+1 from score sc, student st where sub10_32 > a.sub10_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32 and st.class_32 = b.class_32)sub10_32,
        (select count(*)+1 from score sc, student st where sub11_32 > a.sub11_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32 and st.class_32 = b.class_32)sub11_32,
        (select count(*)+1 from score sc, student st where sub12_32 > a.sub12_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32 and st.class_32 = b.class_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 학급동석차
    private function cls_Tie(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sub1_11 = a.sub1_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11 and st.class_11 = b.class_11)sub1_11,
        (select count(*) from score sc, student st where sub2_11 = a.sub2_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11 and st.class_11 = b.class_11)sub2_11,
        (select count(*) from score sc, student st where sub3_11 = a.sub3_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11 and st.class_11 = b.class_11)sub3_11,
        (select count(*) from score sc, student st where sub4_11 = a.sub4_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11 and st.class_11 = b.class_11)sub4_11,
        (select count(*) from score sc, student st where sub5_11 = a.sub5_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11 and st.class_11 = b.class_11)sub5_11,
        (select count(*) from score sc, student st where sub6_11 = a.sub6_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11 and st.class_11 = b.class_11)sub6_11,
        (select count(*) from score sc, student st where sub7_11 = a.sub7_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11 and st.class_11 = b.class_11)sub7_11,
        (select count(*) from score sc, student st where sub8_11 = a.sub8_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11 and st.class_11 = b.class_11)sub8_11,
        (select count(*) from score sc, student st where sub9_11 = a.sub9_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11 and st.class_11 = b.class_11)sub9_11,
        (select count(*) from score sc, student st where sub10_11 = a.sub10_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11 and st.class_11 = b.class_11)sub10_11,
        (select count(*) from score sc, student st where sub11_11 = a.sub11_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11 and st.class_11 = b.class_11)sub11_11,
        (select count(*) from score sc, student st where sub12_11 = a.sub12_11 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11 and st.class_11 = b.class_11)sub12_11,
        
        (select count(*) from score sc, student st where sub1_12 = a.sub1_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12 and st.class_12 = b.class_12)sub1_12,
        (select count(*) from score sc, student st where sub2_12 = a.sub2_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12 and st.class_12 = b.class_12)sub2_12,
        (select count(*) from score sc, student st where sub3_12 = a.sub3_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12 and st.class_12 = b.class_12)sub3_12,
        (select count(*) from score sc, student st where sub4_12 = a.sub4_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12 and st.class_12 = b.class_12)sub4_12,
        (select count(*) from score sc, student st where sub5_12 = a.sub5_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12 and st.class_12 = b.class_12)sub5_12,
        (select count(*) from score sc, student st where sub6_12 = a.sub6_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12 and st.class_12 = b.class_12)sub6_12,
        (select count(*) from score sc, student st where sub7_12 = a.sub7_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12 and st.class_12 = b.class_12)sub7_12,
        (select count(*) from score sc, student st where sub8_12 = a.sub8_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12 and st.class_12 = b.class_12)sub8_12,
        (select count(*) from score sc, student st where sub9_12 = a.sub9_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12 and st.class_12 = b.class_12)sub9_12,
        (select count(*) from score sc, student st where sub10_12 = a.sub10_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12 and st.class_12 = b.class_12)sub10_12,
        (select count(*) from score sc, student st where sub11_12 = a.sub11_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12 and st.class_12 = b.class_12)sub11_12,
        (select count(*) from score sc, student st where sub12_12 = a.sub12_12 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12 and st.class_12 = b.class_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sub1_21 = a.sub1_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21 and st.class_21 = b.class_21)sub1_21,
        (select count(*) from score sc, student st where sub2_21 = a.sub2_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21 and st.class_21 = b.class_21)sub2_21,
        (select count(*) from score sc, student st where sub3_21 = a.sub3_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21 and st.class_21 = b.class_21)sub3_21,
        (select count(*) from score sc, student st where sub4_21 = a.sub4_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21 and st.class_21 = b.class_21)sub4_21,
        (select count(*) from score sc, student st where sub5_21 = a.sub5_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21 and st.class_21 = b.class_21)sub5_21,
        (select count(*) from score sc, student st where sub6_21 = a.sub6_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21 and st.class_21 = b.class_21)sub6_21,
        (select count(*) from score sc, student st where sub7_21 = a.sub7_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21 and st.class_21 = b.class_21)sub7_21,
        (select count(*) from score sc, student st where sub8_21 = a.sub8_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21 and st.class_21 = b.class_21)sub8_21,
        (select count(*) from score sc, student st where sub9_21 = a.sub9_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21 and st.class_21 = b.class_21)sub9_21,
        (select count(*) from score sc, student st where sub10_21 = a.sub10_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21 and st.class_21 = b.class_21)sub10_21,
        (select count(*) from score sc, student st where sub11_21 = a.sub11_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21 and st.class_21 = b.class_21)sub11_21,
        (select count(*) from score sc, student st where sub12_21 = a.sub12_21 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21 and st.class_21 = b.class_21)sub12_21,
        
        (select count(*) from score sc, student st where sub1_22 = a.sub1_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22 and st.class_22 = b.class_22)sub1_22,
        (select count(*) from score sc, student st where sub2_22 = a.sub2_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22 and st.class_22 = b.class_22)sub2_22,
        (select count(*) from score sc, student st where sub3_22 = a.sub3_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22 and st.class_22 = b.class_22)sub3_22,
        (select count(*) from score sc, student st where sub4_22 = a.sub4_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22 and st.class_22 = b.class_22)sub4_22,
        (select count(*) from score sc, student st where sub5_22 = a.sub5_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22 and st.class_22 = b.class_22)sub5_22,
        (select count(*) from score sc, student st where sub6_22 = a.sub6_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22 and st.class_22 = b.class_22)sub6_22,
        (select count(*) from score sc, student st where sub7_22 = a.sub7_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22 and st.class_22 = b.class_22)sub7_22,
        (select count(*) from score sc, student st where sub8_22 = a.sub8_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22 and st.class_22 = b.class_22)sub8_22,
        (select count(*) from score sc, student st where sub9_22 = a.sub9_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22 and st.class_22 = b.class_22)sub9_22,
        (select count(*) from score sc, student st where sub10_22 = a.sub10_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22 and st.class_22 = b.class_22)sub10_22,
        (select count(*) from score sc, student st where sub11_22 = a.sub11_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22 and st.class_22 = b.class_22)sub11_22,
        (select count(*) from score sc, student st where sub12_22 = a.sub12_22 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22 and st.class_22 = b.class_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sub1_31 = a.sub1_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31 and st.class_31 = b.class_31)sub1_31,
        (select count(*) from score sc, student st where sub2_31 = a.sub2_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31 and st.class_31 = b.class_31)sub2_31,
        (select count(*) from score sc, student st where sub3_31 = a.sub3_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31 and st.class_31 = b.class_31)sub3_31,
        (select count(*) from score sc, student st where sub4_31 = a.sub4_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31 and st.class_31 = b.class_31)sub4_31,
        (select count(*) from score sc, student st where sub5_31 = a.sub5_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31 and st.class_31 = b.class_31)sub5_31,
        (select count(*) from score sc, student st where sub6_31 = a.sub6_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31 and st.class_31 = b.class_31)sub6_31,
        (select count(*) from score sc, student st where sub7_31 = a.sub7_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31 and st.class_31 = b.class_31)sub7_31,
        (select count(*) from score sc, student st where sub8_31 = a.sub8_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31 and st.class_31 = b.class_31)sub8_31,
        (select count(*) from score sc, student st where sub9_31 = a.sub9_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31 and st.class_31 = b.class_31)sub9_31,
        (select count(*) from score sc, student st where sub10_31 = a.sub10_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31 and st.class_31 = b.class_31)sub10_31,
        (select count(*) from score sc, student st where sub11_31 = a.sub11_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31 and st.class_31 = b.class_31)sub11_31,
        (select count(*) from score sc, student st where sub12_31 = a.sub12_31 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31 and st.class_31 = b.class_31)sub12_31,
        
        (select count(*) from score sc, student st where sub1_32 = a.sub1_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32 and st.class_32 = b.class_32)sub1_32,
        (select count(*) from score sc, student st where sub2_32 = a.sub2_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32 and st.class_32 = b.class_32)sub2_32,
        (select count(*) from score sc, student st where sub3_32 = a.sub3_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32 and st.class_32 = b.class_32)sub3_32,
        (select count(*) from score sc, student st where sub4_32 = a.sub4_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32 and st.class_32 = b.class_32)sub4_32,
        (select count(*) from score sc, student st where sub5_32 = a.sub5_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32 and st.class_32 = b.class_32)sub5_32,
        (select count(*) from score sc, student st where sub6_32 = a.sub6_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32 and st.class_32 = b.class_32)sub6_32,
        (select count(*) from score sc, student st where sub7_32 = a.sub7_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32 and st.class_32 = b.class_32)sub7_32,
        (select count(*) from score sc, student st where sub8_32 = a.sub8_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32 and st.class_32 = b.class_32)sub8_32,
        (select count(*) from score sc, student st where sub9_32 = a.sub9_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32 and st.class_32 = b.class_32)sub9_32,
        (select count(*) from score sc, student st where sub10_32 = a.sub10_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32 and st.class_32 = b.class_32)sub10_32,
        (select count(*) from score sc, student st where sub11_32 = a.sub11_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32 and st.class_32 = b.class_32)sub11_32,
        (select count(*) from score sc, student st where sub12_32 = a.sub12_32 and sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32 and st.class_32 = b.class_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }
    // 과목별 학급이수자수
    private function cls_sum(){
        $record_sql = "
        select

        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code1_11 = a.code1_11 and st.class_11 = b.class_11)sub1_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code2_11 = a.code2_11 and st.class_11 = b.class_11)sub2_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code3_11 = a.code3_11 and st.class_11 = b.class_11)sub3_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code4_11 = a.code4_11 and st.class_11 = b.class_11)sub4_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code5_11 = a.code5_11 and st.class_11 = b.class_11)sub5_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code6_11 = a.code6_11 and st.class_11 = b.class_11)sub6_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code7_11 = a.code7_11 and st.class_11 = b.class_11)sub7_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code8_11 = a.code8_11 and st.class_11 = b.class_11)sub8_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code9_11 = a.code9_11 and st.class_11 = b.class_11)sub9_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code10_11 = a.code10_11 and st.class_11 = b.class_11)sub10_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code11_11 = a.code11_11 and st.class_11 = b.class_11)sub11_11,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_11 = b.register_11 and sc.code12_11 = a.code12_11 and st.class_11 = b.class_11)sub12_11,
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code1_12 = a.code1_12 and st.class_12 = b.class_12)sub1_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code2_12 = a.code2_12 and st.class_12 = b.class_12)sub2_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code3_12 = a.code3_12 and st.class_12 = b.class_12)sub3_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code4_12 = a.code4_12 and st.class_12 = b.class_12)sub4_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code5_12 = a.code5_12 and st.class_12 = b.class_12)sub5_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code6_12 = a.code6_12 and st.class_12 = b.class_12)sub6_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code7_12 = a.code7_12 and st.class_12 = b.class_12)sub7_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code8_12 = a.code8_12 and st.class_12 = b.class_12)sub8_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code9_12 = a.code9_12 and st.class_12 = b.class_12)sub9_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code10_12 = a.code10_12 and st.class_12 = b.class_12)sub10_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code11_12 = a.code11_12 and st.class_12 = b.class_12)sub11_12,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_12 = b.register_12 and sc.code12_12 = a.code12_12 and st.class_12 = b.class_12)sub12_12,
        
        
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code1_21 = a.code1_21 and st.class_21 = b.class_21)sub1_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code2_21 = a.code2_21 and st.class_21 = b.class_21)sub2_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code3_21 = a.code3_21 and st.class_21 = b.class_21)sub3_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code4_21 = a.code4_21 and st.class_21 = b.class_21)sub4_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code5_21 = a.code5_21 and st.class_21 = b.class_21)sub5_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code6_21 = a.code6_21 and st.class_21 = b.class_21)sub6_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code7_21 = a.code7_21 and st.class_21 = b.class_21)sub7_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code8_21 = a.code8_21 and st.class_21 = b.class_21)sub8_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code9_21 = a.code9_21 and st.class_21 = b.class_21)sub9_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code10_21 = a.code10_21 and st.class_21 = b.class_21)sub10_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code11_21 = a.code11_21 and st.class_21 = b.class_21)sub11_21,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_21 = b.register_21 and sc.code12_21 = a.code12_21 and st.class_21 = b.class_21)sub12_21,
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code1_22 = a.code1_22 and st.class_22 = b.class_22)sub1_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code2_22 = a.code2_22 and st.class_22 = b.class_22)sub2_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code3_22 = a.code3_22 and st.class_22 = b.class_22)sub3_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code4_22 = a.code4_22 and st.class_22 = b.class_22)sub4_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code5_22 = a.code5_22 and st.class_22 = b.class_22)sub5_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code6_22 = a.code6_22 and st.class_22 = b.class_22)sub6_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code7_22 = a.code7_22 and st.class_22 = b.class_22)sub7_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code8_22 = a.code8_22 and st.class_22 = b.class_22)sub8_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code9_22 = a.code9_22 and st.class_22 = b.class_22)sub9_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code10_22 = a.code10_22 and st.class_22 = b.class_22)sub10_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code11_22 = a.code11_22 and st.class_22 = b.class_22)sub11_22,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_22 = b.register_22 and sc.code12_22 = a.code12_22 and st.class_22 = b.class_22)sub12_22,
        
        
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code1_31 = a.code1_31 and st.class_31 = b.class_31)sub1_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code2_31 = a.code2_31 and st.class_31 = b.class_31)sub2_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code3_31 = a.code3_31 and st.class_31 = b.class_31)sub3_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code4_31 = a.code4_31 and st.class_31 = b.class_31)sub4_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code5_31 = a.code5_31 and st.class_31 = b.class_31)sub5_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code6_31 = a.code6_31 and st.class_31 = b.class_31)sub6_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code7_31 = a.code7_31 and st.class_31 = b.class_31)sub7_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code8_31 = a.code8_31 and st.class_31 = b.class_31)sub8_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code9_31 = a.code9_31 and st.class_31 = b.class_31)sub9_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code10_31 = a.code10_31 and st.class_31 = b.class_31)sub10_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code11_31 = a.code11_31 and st.class_31 = b.class_31)sub11_31,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_31 = b.register_31 and sc.code12_31 = a.code12_31 and st.class_31 = b.class_31)sub12_31,
        
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code1_32 = a.code1_32 and st.class_32 = b.class_32)sub1_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code2_32 = a.code2_32 and st.class_32 = b.class_32)sub2_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code3_32 = a.code3_32 and st.class_32 = b.class_32)sub3_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code4_32 = a.code4_32 and st.class_32 = b.class_32)sub4_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code5_32 = a.code5_32 and st.class_32 = b.class_32)sub5_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code6_32 = a.code6_32 and st.class_32 = b.class_32)sub6_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code7_32 = a.code7_32 and st.class_32 = b.class_32)sub7_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code8_32 = a.code8_32 and st.class_32 = b.class_32)sub8_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code9_32 = a.code9_32 and st.class_32 = b.class_32)sub9_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code10_32 = a.code10_32 and st.class_32 = b.class_32)sub10_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code11_32 = a.code11_32 and st.class_32 = b.class_32)sub11_32,
        (select count(*) from score sc, student st where sc.stuid = st.stuid and st.high_sch = b.high_sch and sc.type = a.type and st.register_32 = b.register_32 and sc.code12_32 = a.code12_32 and st.class_32 = b.class_32)sub12_32
        
        from score a, student b
        where a.stuid = b.stuid and b.high_sch = '".$this->sch."' and a.stuid = '".$this->stuid."-".$this->initial."';
        ";
        $record = mysqli_fetch_assoc(mysqli_query($this->con, $record_sql));

        return $record;
    }


    // 일반과목, 석차 Y 일경우
    // : 석차등급(9단계) 산출, 석차정보 산출
    // 일반과목, 석차 N 일경우
    // : 석차정보를 산출하지 않음
    // 일반과목일경우
    // : 모든 성적평가에 적용함, 과목별 석차정보는 포함하지 않을 수 있음
    // 교양과목일경우
    // : 각종 성적평가전부에서 제외함



    
    // 보고되는 과목별 계열석차
    // 과목별 계열석차 ** 석차(동석차)/수강자수
    function Rank_Integrate(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();
        $name = $ac_record->course_detail->Course_Name();

        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        $record = [];

        foreach ($name as $key => $value){
            // 일반과목만 석차 기재
            if($isRank[$key] == 'Y'){
                // 수강자수가 13인 이상일 경우에만 표기
                if($sum[$key] >= 13){
                    if($tie[$key] == 1){
                        $record[$key] = $rank[$key].'/'.$sum[$key];
                    }else{
                        $record[$key] = $rank[$key].'('.$tie[$key].')/'.$sum[$key];
                    }
                }else{
                    if($tie[$key] == 1){
                        $record[$key] = $rank[$key].'/'.$sum[$key];
                    }else{
                        $record[$key] = $rank[$key].'('.$tie[$key].')/'.$sum[$key];
                    }
//                    $record[$key] = '/'.$sum[$key];
                }
            }else{
                $record[$key] = '/'.$sum[$key];
            }
        }
        return $record;
    }
    // 과목별 학급석차 ** 석차(동석차)/수강자수
    function class_Rank(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();
        $name = $ac_record->course_detail->Course_Name();

        $rank = $this->cls_Rank();
        $tie = $this->cls_Tie();
        $sum = $this->cls_sum();

        $record = [];

        foreach ($name as $key => $value){
            // 일반과목만 석차 기재
            if($isRank[$key] == 'Y'){
                // 수강자수가 13인 이상일 경우에만 표기
                if($sum[$key] >= 13){
                    if($tie[$key] == 1){
                        $record[$key] = $rank[$key].'/'.$sum[$key];
                    }else{
                        $record[$key] = $rank[$key].'('.$tie[$key].')/'.$sum[$key];
                    }
                }else{
                    if($tie[$key] == 1){
                        $record[$key] = $rank[$key].'/'.$sum[$key];
                    }else{
                        $record[$key] = $rank[$key].'('.$tie[$key].')/'.$sum[$key];
                    }
//                    $record[$key] = '/'.$sum[$key];
                }
            }else{
                $record[$key] = '/'.$sum[$key];
            }
        }
        return $record;
    }
    // 과목별 수강자수가 13인 이상인 과목의 석차백분율 리턴
    function Percentile(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();
        $name = $ac_record->course_detail->Course_Name();

        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        $record = [];

        foreach ($name as $key => $value){
            // 일반과목만 석차 기재
            if($isRank[$key]  == 'Y'){
                // 수강자수가 13인 이상일 경우에만 표기
                if($sum[$key] >= 13){
                    $record[$key] = round((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100,2);
                }
            }
        }
        return $record;
    }
    // 과목별 석차백분율의 가중치 평균
    function Percentile_Average(){
        $ac_record = new Academic_Integrate();

        // 과목별 석차여부
        $isRank = $ac_record->course_detail->Course_isRank();
        // 과목별 학점
        $credit = $ac_record->course_detail->Course_Credit();
        // 과목별 석차
        $rank = $this->Rank();
        // 과목별 동석차
        $tie = $this->Rank_Tie();
        // 과목별 이수자수
        $sum = $this->sum();

        $record = [];
        $cr = [];

        foreach ($isRank as $key => $value){
            if($value == 'Y' && $sum[$key] >= 13){
                $record['Merged'] += (((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100) * $credit[$key]);
                $cr['Merged'] += $credit[$key];

                if(substr($key,-2) == '11'){
                    $record['11'] += (((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100) * $credit[$key]);
                    $cr['11'] += $credit[$key];
                }
                if(substr($key,-2) == '12'){
                    $record['12'] += (((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100) * $credit[$key]);
                    $cr['12'] += $credit[$key];
                }
                if(substr($key,-2) == '21'){
                    $record['21'] += (((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100) * $credit[$key]);
                    $cr['21'] += $credit[$key];
                }
                if(substr($key,-2) == '22'){
                    $record['22'] += (((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100) * $credit[$key]);
                    $cr['22'] += $credit[$key];
                }
                if(substr($key,-2) == '31'){
                    $record['31'] += (((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100) * $credit[$key]);
                    $cr['31'] += $credit[$key];
                }
                if(substr($key,-2) == '32'){
                    $record['32'] += (((($rank[$key] + (($tie[$key] - 1) / 2)) / $sum[$key]) * 100) * $credit[$key]);
                    $cr['32'] += $credit[$key];
                }
            }
        }

        foreach ($record as $key => $value){
            $record[$key] = 100 - ($value / $cr[$key]);
        }

        return $record;
    }
    // 과목별 9단계 석차등급
    function RG(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();

        // 전과목 석차정보
        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        $record = [];

        foreach ($isRank as $k => $v){
            // 일반과목만 석차등급 기재
            if($v == 'Y'){
                // 수강자수가 13인 이상일 경우에만 석차등급을 기재
                if($sum[$k] >= 13){
                    // 인원별 석차등급 조견표
                    $tbl[$k] = $this->Grade_Table($sum[$k]);

                    foreach ($tbl[$k]['Rank'] as $key => $value){
                        if($tie[$k] > 1){
                            $rnk[$k] = ($rank[$k] + (($tie[$k] - 1) / 2));
                        }else{
                            $rnk[$k] = $rank[$k];
                        }

                        if($rnk[$k] <= $value){
                            $record[$k] = $key;
                            break;
                        }
                    }
                }
            }
        }
        return $record;
    }
    // 과목별 15단계 석차등급
    function RG_15(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();

        // 전과목 석차정보
        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        $record = [];

        foreach ($isRank as $k => $v){
            // 일반과목만 석차등급 기재
            if($v == 'Y'){
                // 수강자수가 13인 이상일 경우에만 석차등급을 기재
                if($sum[$k] >= 13){
                    // 인원별 석차등급 조견표
                    $tbl[$k] = $this->G15_Table($sum[$k]);

                    foreach ($tbl[$k]['Rank'] as $key => $value){
                        if($tie[$k] > 1){
                            $rnk[$k] = ($rank[$k] + (($tie[$k] - 1) / 2));
                        }else{
                            $rnk[$k] = $rank[$k];
                        }

                        if($rnk[$k] <= $value){
                            $record[$k] = $key;
                            break;
                        }
                    }
                }
            }
        }
        return $record;
    }
    // 학기별 석차등급 가중치 평균
    function RG_Average(){
        $ac_record = new Academic_Integrate();

        // 과목별 학점
        $credit = $ac_record->course_detail->Course_Credit();
        // 과목별 석차등급
        $grade = $this->RG();

        $record = [];
        $cr = [];

        foreach ($grade as $key => $value){
            $record['Merged'] += ($value * $credit[$key]);
            $cr['Merged'] += $credit[$key];

            if(substr($key,-2) == '11'){
                $record['11'] += ($value * $credit[$key]);
                $cr['11'] += $credit[$key];
            }
            if(substr($key,-2) == '12'){
                $record['12'] += ($value * $credit[$key]);
                $cr['12'] += $credit[$key];
            }
            if(substr($key,-2) == '21'){
                $record['21'] += ($value * $credit[$key]);
                $cr['21'] += $credit[$key];
            }
            if(substr($key,-2) == '22'){
                $record['22'] += ($value * $credit[$key]);
                $cr['22'] += $credit[$key];
            }
            if(substr($key,-2) == '31'){
                $record['31'] += ($value * $credit[$key]);
                $cr['31'] += $credit[$key];
            }
            if(substr($key,-2) == '32'){
                $record['32'] += ($value * $credit[$key]);
                $cr['32'] += $credit[$key];
            }
        }

        foreach ($record as $key => $value){
            $record[$key] = round($value / $cr[$key],2);
        }

        return $record;
    }
    // 상대평가로 채점한 점수
    function Relative_Score(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();

        // 전과목 석차정보
        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        // 원점수
        $raw = $ac_record->course_record->Course_Raw();

        $record = [];

        foreach ($isRank as $k => $v){
            // 일반과목만 점수 기재
            if($v == 'Y'){
                // 수강자수가 10인 이상일 경우에만 점수 기재
                if($sum[$k] >= 10){
                    // 인원별 등급 조견표
                    $tbl[$k] = $this->Relative_Table(70,71,100,$sum[$k]);

                    foreach ($tbl[$k]['Rank'] as $key => $value){
                        if($tie[$k] > 1){
                            $rnk[$k] = ($rank[$k] + (($tie[$k] - 1) / 2));
                        }else{
                            $rnk[$k] = $rank[$k];
                        }

                        if($rnk[$k] <= $value){
                            switch ($key){
                                case 'A+':
                                    $record[$k] = round(95+(((100-(($rnk[$k]/$tbl[$k]['A+'])*100)))*5/100));
                                    break;
                                case 'A0':
                                    $record[$k] = round(90+(((100-((($rnk[$k] - $tbl[$k]['Rank']['A+']) / $tbl[$k]['A0'])*100)))*4/100));
                                    break;
                                case 'B+':
                                    $record[$k] = round(85+(((100-((($rnk[$k] - $tbl[$k]['Rank']['A0']) / $tbl[$k]['B+'])*100)))*4/100));
                                    break;
                                case 'B0':
                                    $record[$k] = round(80+(((100-((($rnk[$k] - $tbl[$k]['Rank']['B+']) / $tbl[$k]['B0'])*100)))*4/100));
                                    break;
                                case 'C+':
                                    $record[$k] = round(75+(((100-((($rnk[$k] - $tbl[$k]['Rank']['B0']) / $tbl[$k]['C+'])*100)))*4/100));
                                    break;
                                case 'C0':
                                    $record[$k] = round(70+(((100-((($rnk[$k] - $tbl[$k]['Rank']['C+']) / $tbl[$k]['C0'])*100)))*4/100));
                                    break;
                                case 'D+':
                                    $record[$k] = round(65+(((100-((($rnk[$k] - $tbl[$k]['Rank']['C0']) / $tbl[$k]['D+'])*100)))*4/100));
                                    break;
                                case 'D0':
                                    $record[$k] = round(60+(((100-((($rnk[$k] - $tbl[$k]['Rank']['D+']) / $tbl[$k]['D0'])*100)))*4/100));
                                    break;
                            }
                            break;
                        }
                    }
                }else{
                    $record[$k] = round(60+($raw[$k]*40/100));
                }
            }
        }
        return $record;
    }
    // 과목별 성취도 분포비율
    function Level_Percentile(){
        $ac_record = new Academic_Integrate();

        $name = $ac_record->course_detail->Course_Name();

        $a = $this->Raw_A();
        $b = $this->Raw_B();
        $c = $this->Raw_C();
        $d = $this->Raw_D();
        $e = $this->Raw_E();
        $sum = $this->sum();

        $record = [];

        foreach ($name as $key => $value){
            $record['A'][$key] = round(($a[$key] / $sum[$key])*100,1);
            $record['B'][$key] = round(($b[$key] / $sum[$key])*100,1);
            $record['C'][$key] = round(($c[$key] / $sum[$key])*100,1);
            $record['D'][$key] = round(($d[$key] / $sum[$key])*100,1);
            $record['E'][$key] = round(($e[$key] / $sum[$key])*100,1);
        }

        return $record;
    }


    // 고등학교 성적증명서 발급에 필요한 9단계 석차등급
    function RG_Script(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();

        // 전과목 석차정보
        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        // 성취도
        $level = $ac_record->course_gp->Grade_Level();

        $record = [];

        foreach ($isRank as $k => $v){
            // 일반과목만 석차등급 기재
            if($v == 'Y'){
                // 수강자수가 13인 이상일 경우에만 석차등급을 기재
                if($sum[$k] >= 13){
                    // 인원별 석차등급 조견표
                    $tbl[$k] = $this->Grade_Table($sum[$k]);

                    foreach ($tbl[$k]['Rank'] as $key => $value){
                        if($tie[$k] > 1){
                            $rnk[$k] = ($rank[$k] + (($tie[$k] - 1) / 2));
                        }else{
                            $rnk[$k] = $rank[$k];
                        }

                        if($rnk[$k] <= $value){
                            $record[$k] = $key.'('.$sum[$k].')';
                            break;
                        }
                    }
                }else{
                    $record[$k] = '· ('.$sum[$k].')';
                }
            }else{
                $record[$k] = '('.$sum[$k].')';
            }
        }
        return $record;
    }

    // 석차등급(성취도)로 리턴
    function RG_Level(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();

        // 전과목 석차정보
        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        // 성취도
        $level = $ac_record->course_gp->Grade_Level();

        $record = [];

        foreach ($isRank as $k => $v){
            // 일반과목만 석차등급 기재
            if($v == 'Y'){
                // 수강자수가 13인 이상일 경우에만 석차등급을 기재
                if($sum[$k] >= 13){
                    // 인원별 석차등급 조견표
                    $tbl[$k] = $this->Grade_Table($sum[$k]);

                    foreach ($tbl[$k]['Rank'] as $key => $value){
                        if($tie[$k] > 1){
                            $rnk[$k] = ($rank[$k] + (($tie[$k] - 1) / 2));
                        }else{
                            $rnk[$k] = $rank[$k];
                        }

                        if($rnk[$k] <= $value){
                            $record[$k] = $key;
                            break;
                        }
                    }
                }
            }else{
//                $record[$k] = $level[$k];
            }
        }
        return $record;
    }

    // 정규분포 성취도 ** 중간석차 무시
    function Level_RG(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();
        $cat = $ac_record->course_detail->Course_Cat();

        // 전과목 석차정보
        $rank = $this->Rank();
        $sum = $this->sum();

        // 원점수 성취도
        $level = $ac_record->course_gp->Grade_Level();

        $record = [];

        foreach ($cat as $k => $v){
            if($v == '일반'){
                if($isRank[$k] == 'Y'){
                    // 수강자수가 13인 이상일 경우에만 석차등급을 기재
                    if($sum[$k] >= 13){
                        // 인원별 석차등급 조견표
                        $tbl[$k] = $this->Level_Table($sum[$k]);

                        foreach ($tbl[$k]['Rank'] as $key => $value){
//                        if($tie[$k] > 1){
//                            $rnk[$k] = ($rank[$k] + (($tie[$k] - 1) / 2));
//                        }else{
//                            $rnk[$k] = $rank[$k];
//                        }

                            if($rank[$k] <= $value){
                                $record[$k] = $key;
                                break;
                            }
                        }
                    }
                }else{
                    $record[$k] = $level[$k];
                }
            }
        }
        return $record;
    }

    // 중간석차를 기준 100점만점 변환점수
    function Conversion_Rank(){
        $ac_record = new Academic_Integrate();

        $isRank = $ac_record->course_detail->Course_isRank();
        $name = $ac_record->course_detail->Course_Name();

        $rank = $this->Rank();
        $tie = $this->Rank_Tie();
        $sum = $this->sum();

        $record = [];

        foreach ($name as $key => $value){
            // 일반과목만 석차 기재
            if($isRank[$key]  == 'Y'){
                $record[$key] = round(500 - (490 * ((($rank[$key] + (($tie[$key] - 1) / 2)) - 1) / $sum[$key])));
            }
        }
        return $record;
    }

    
    
    // 수강자수에 따른 9단계 등급별 인원과 누적 인원 리턴
    // $s: 수강자수
    function Grade_Table($s){

        $rank_grade['1'] = round($s * 0.04);
        $rank_grade['2'] = round(round($s * 0.11) - ($rank_grade['1']));
        $rank_grade['3'] = round(round($s * 0.23) - ($rank_grade['1']+$rank_grade['2']));
        $rank_grade['4'] = round(round($s * 0.40) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']));
        $rank_grade['5'] = round(round($s * 0.60) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']));
        $rank_grade['6'] = round(round($s * 0.77) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']));
        $rank_grade['7'] = round(round($s * 0.89) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']));
        $rank_grade['8'] = round(round($s * 0.96) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']));
        $rank_grade['9'] = round(round($s * 1.00) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']));

        // 누적 석차에 따른 등급표
        if($rank_grade['1'] != 0){
            $rank_grade['Rank']['1'] = ($rank_grade['1']);
        }
        if($rank_grade['2'] != 0){
            $rank_grade['Rank']['2'] = ($rank_grade['1']+$rank_grade['2']);
        }
        if($rank_grade['3'] != 0){
            $rank_grade['Rank']['3'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']);
        }
        if($rank_grade['4'] != 0){
            $rank_grade['Rank']['4'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']);
        }
        if($rank_grade['5'] != 0){
            $rank_grade['Rank']['5'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']);
        }
        if($rank_grade['6'] != 0){
            $rank_grade['Rank']['6'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']);
        }
        if($rank_grade['7'] != 0){
            $rank_grade['Rank']['7'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']);
        }
        if($rank_grade['8'] != 0){
            $rank_grade['Rank']['8'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']);
        }
        if($rank_grade['9'] != 0){
            $rank_grade['Rank']['9'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']);
        }


        // 인원수가 0인 경우 배열 삭제
        foreach ($rank_grade as $key => $value){
            if($value == 0){
                unset($rank_grade[$key]);
            }
        }



        return $rank_grade;
    }

    // 수강자수에 따른 5단계 등급별 인원과 누적 인원 리턴
    // $s: 수강자수
    function Level_Table($s){
        $rank_grade['A'] = round($s * 0.10);
        $rank_grade['B'] = round(round($s * 0.30) - ($rank_grade['A']));
        $rank_grade['C'] = round(round($s * 0.70) - ($rank_grade['A']+$rank_grade['B']));
        $rank_grade['D'] = round(round($s * 0.90) - ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']));
        $rank_grade['E'] = round(round($s * 1.00) - ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']+$rank_grade['D']));

        // 누적 석차에 따른 등급표
        if($rank_grade['A'] != 0){
            $rank_grade['Rank']['A'] = ($rank_grade['A']);
        }
        if($rank_grade['B'] != 0){
            $rank_grade['Rank']['B'] = ($rank_grade['A']+$rank_grade['B']);
        }
        if($rank_grade['C'] != 0){
            $rank_grade['Rank']['C'] = ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']);
        }
        if($rank_grade['D'] != 0){
            $rank_grade['Rank']['D'] = ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']+$rank_grade['D']);
        }
        if($rank_grade['E'] != 0){
            $rank_grade['Rank']['E'] = ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']+$rank_grade['D']+$rank_grade['E']);
        }

        // 인원수가 0인 경우 배열 삭제
        foreach ($rank_grade as $key => $value){
            if($value == 0){
                unset($rank_grade[$key]);
            }
        }

        return $rank_grade;
    }

    // 수강자수에 따른 15단계 등급별 인원과 누적 인원 리턴
    // $s: 수강자수
    function G15_Table($s){

        $rank_grade['1'] = round($s * 0.03);
        $rank_grade['2'] = round(round($s * 0.07) - ($rank_grade['1']));
        $rank_grade['3'] = round(round($s * 0.12) - ($rank_grade['1']+$rank_grade['2']));
        $rank_grade['4'] = round(round($s * 0.18) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']));
        $rank_grade['5'] = round(round($s * 0.25) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']));
        $rank_grade['6'] = round(round($s * 0.33) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']));
        $rank_grade['7'] = round(round($s * 0.43) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']));
        $rank_grade['8'] = round(round($s * 0.57) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']));
        $rank_grade['9'] = round(round($s * 0.67) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']));
        $rank_grade['10'] = round(round($s * 0.75) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']));
        $rank_grade['11'] = round(round($s * 0.82) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']));
        $rank_grade['12'] = round(round($s * 0.88) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']));
        $rank_grade['13'] = round(round($s * 0.93) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']+$rank_grade['12']));
        $rank_grade['14'] = round(round($s * 0.97) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']+$rank_grade['12']+$rank_grade['13']));
        $rank_grade['15'] = round(round($s * 1.00) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']+$rank_grade['12']+$rank_grade['13']+$rank_grade['14']));

        // 누적 석차에 따른 등급표
        if($rank_grade['1'] != 0){
            $rank_grade['Rank']['1'] = ($rank_grade['1']);
        }
        if($rank_grade['2'] != 0){
            $rank_grade['Rank']['2'] = ($rank_grade['1']+$rank_grade['2']);
        }
        if($rank_grade['3'] != 0){
            $rank_grade['Rank']['3'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']);
        }
        if($rank_grade['4'] != 0){
            $rank_grade['Rank']['4'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']);
        }
        if($rank_grade['5'] != 0){
            $rank_grade['Rank']['5'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']);
        }
        if($rank_grade['6'] != 0){
            $rank_grade['Rank']['6'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']);
        }
        if($rank_grade['7'] != 0){
            $rank_grade['Rank']['7'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']);
        }
        if($rank_grade['8'] != 0){
            $rank_grade['Rank']['8'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']);
        }
        if($rank_grade['9'] != 0){
            $rank_grade['Rank']['9'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']);
        }
        if($rank_grade['10'] != 0){
            $rank_grade['Rank']['10'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']);
        }
        if($rank_grade['11'] != 0){
            $rank_grade['Rank']['11'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']);
        }
        if($rank_grade['12'] != 0){
            $rank_grade['Rank']['12'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']+$rank_grade['12']);
        }
        if($rank_grade['13'] != 0){
            $rank_grade['Rank']['13'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']+$rank_grade['12']+$rank_grade['13']);
        }
        if($rank_grade['14'] != 0){
            $rank_grade['Rank']['14'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']+$rank_grade['12']+$rank_grade['13']+$rank_grade['14']);
        }
        if($rank_grade['15'] != 0){
            $rank_grade['Rank']['15'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']+$rank_grade['10']+$rank_grade['11']+$rank_grade['12']+$rank_grade['13']+$rank_grade['14']+$rank_grade['15']);
        }


        // 인원수가 0인 경우 배열 삭제
        foreach ($rank_grade as $key => $value){
            if($value == 0){
                unset($rank_grade[$key]);
            }
        }



        return $rank_grade;
    }

    // 상대평가 4.5 평점부여 등급별 인원과 누적 인원 리턴
    // A,B학점 각각의 인원과 C학점 이하의 인원을 리턴
    // A,B 학점 각 비율을 절반으로 나눠서 +,0으로 배분
    // $a: A학점 누적비율, $b: B학점 누적비율, $c: C학점 누적비율(100이하일 경우 나머지는 D학점) $s: 수강자수
    function Relative_Table($a, $b, $c, $s){

        $ratio['Ratio']['A+'] = (($a / 100) / 2);
        $ratio['Ratio']['A0'] = ($a / 100);
        $ratio['Ratio']['B+'] = ($b / 100) - ((($b / 100) - $ratio['Ratio']['A0']) / 2);
        $ratio['Ratio']['B0'] = ($b / 100);
        $ratio['Ratio']['C+'] = ($c / 100) - ((($c / 100) - $ratio['Ratio']['B0']) / 2);
        $ratio['Ratio']['C0'] = ($c / 100);
        $ratio['Ratio']['D+'] = 1 - ((1 - $ratio['Ratio']['C0']) / 2);
        $ratio['Ratio']['D0'] = 1;

        $rank_grade['A+'] = round($s * $ratio['Ratio']['A+']);
        $rank_grade['A0'] = round(round($s * $ratio['Ratio']['A0']) - ($rank_grade['A+']));
        $rank_grade['B+'] = round(round($s * $ratio['Ratio']['B+']) - ($rank_grade['A+']+$rank_grade['A0']));
        $rank_grade['B0'] = round(round($s * $ratio['Ratio']['B0']) - ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']));
        $rank_grade['C+'] = round(round($s * $ratio['Ratio']['C+']) - ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']));
        $rank_grade['C0'] = round(round($s * $ratio['Ratio']['C0']) - ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']+$rank_grade['C+']));
        $rank_grade['D+'] = round(round($s * $ratio['Ratio']['D+']) - ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']+$rank_grade['C+']+$rank_grade['C0']));
        $rank_grade['D0'] = round(round($s * $ratio['Ratio']['D0']) - ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']+$rank_grade['C+']+$rank_grade['C0']+$rank_grade['D+']));


        // 누적 석차에 따른 등급표
        if($rank_grade['A+'] != 0){
            $rank_grade['Rank']['A+'] = ($rank_grade['A+']);
        }
        if($rank_grade['A0'] != 0){
            $rank_grade['Rank']['A0'] = ($rank_grade['A+']+$rank_grade['A0']);
        }
        if($rank_grade['B+'] != 0){
            $rank_grade['Rank']['B+'] = ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']);
        }
        if($rank_grade['B0'] != 0){
            $rank_grade['Rank']['B0'] = ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']);
        }
        if($rank_grade['C+'] != 0){
            $rank_grade['Rank']['C+'] = ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']+$rank_grade['C+']);
        }
        if($rank_grade['C0'] != 0){
            $rank_grade['Rank']['C0'] = ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']+$rank_grade['C+']+$rank_grade['C0']);
        }
        if($rank_grade['D+'] != 0){
            $rank_grade['Rank']['D+'] = ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']+$rank_grade['C+']+$rank_grade['C0']+$rank_grade['D+']);
        }
        if($rank_grade['D0'] != 0){
            $rank_grade['Rank']['D0'] = ($rank_grade['A+']+$rank_grade['A0']+$rank_grade['B+']+$rank_grade['B0']+$rank_grade['C+']+$rank_grade['C0']+$rank_grade['D+']+$rank_grade['D0']);
        }


        // 인원수가 0인 경우 배열 삭제
        foreach ($rank_grade as $key => $value){
            if($value == 0){
                unset($rank_grade[$key]);
            }
        }



        return $rank_grade;
    }

    // 상대평가 4.0 평점부여 등급별 인원과 누적 인원 리턴
    // A,B,C학점 각각의 인원과 D학점 이하의 인원을 리턴
    // $a: A학점 누적비율, $b: B학점 누적비율, $c: C학점 누적비율(100이하일 경우 나머지는 D학점) $s: 수강자수
    function Relative40_Table($a, $b, $c, $s){

        $ratio['Ratio']['A'] = ($a / 100);
        $ratio['Ratio']['B'] = ($b / 100);
        $ratio['Ratio']['C'] = ($c / 100);
        $ratio['Ratio']['D'] = 1;

        $rank_grade['A'] = round($s * $ratio['Ratio']['A']);
        $rank_grade['B'] = round(round($s * $ratio['Ratio']['B']) - ($rank_grade['A']));
        $rank_grade['C'] = round(round($s * $ratio['Ratio']['C']) - ($rank_grade['A']+$rank_grade['B']));
        $rank_grade['D'] = round(round($s * $ratio['Ratio']['D']) - ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']));

        // 누적 석차에 따른 등급표
        if($rank_grade['A'] != 0){
            $rank_grade['Rank']['A'] = ($rank_grade['A']);
        }
        if($rank_grade['B'] != 0){
            $rank_grade['Rank']['B'] = ($rank_grade['A']+$rank_grade['B']);
        }
        if($rank_grade['C'] != 0){
            $rank_grade['Rank']['C'] = ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']);
        }
        if($rank_grade['D'] != 0){
            $rank_grade['Rank']['D'] = ($rank_grade['A']+$rank_grade['B']+$rank_grade['C']+$rank_grade['D']);
        }


        // 인원수가 0인 경우 배열 삭제
        foreach ($rank_grade as $key => $value){
            if($value == 0){
                unset($rank_grade[$key]);
            }
        }



        return $rank_grade;
    }




}