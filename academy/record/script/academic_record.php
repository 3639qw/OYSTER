<?php
session_start();
error_reporting( E_ERROR );
ini_set( "display_errors", 1 );
//http://web.juyong.kr/academy/record/script/academic_record.php?stuid=22851041&name=%EC%9D%B4%EC%A3%BC%EC%9A%A9&birth=2003-05-16&range=abcdef&sch=%EC%84%B8%EB%AA%85%EC%BB%B4%ED%93%A8%ED%84%B0%EA%B3%A0%EB%93%B1%ED%95%99%EA%B5%90&initial=SMC
require_once "../lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();

// 학생 정보
$stu = $ac_record->magic_eye->Select_Student();


// $ac: 공통변수
require_once "./Common_Storage.php";
// $ac_1: 성적변수
require_once "./Academic_Storage.php";


//echo '<pre>';
//print_r($rec);
//echo '</pre>';

// 증명발급 보안사항 검증
$verify = $ac_record->magic_eye;
$ck_login = $verify->ck_Login($_SESSION['level']);

$ck_identity = $verify->ck_Student_Identity($_GET['birth'],$_GET['name'],$_GET['stuid'],$_GET['initial']);


if(true){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>성적증명서</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./grade_point.css">
    <link rel="stylesheet" type="text/css" href="./rank.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/antidrag.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');
        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 7mm 7mm;
            margin: 5mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            /*background: white;*/
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            /*background-color: #FAFAFA;*/
            /*font-family: 'Nanum Myeongjo', serif;*/
            /*font-weight: bold;*/
            word-break: break-all;
        }
        table{
            border-collapse: collapse;
        }
        * {
            font-family: 'Nanum Myeongjo', serif;
            /*font-size: 13px;*/
            font-weight: normal;
            word-break: break-all;

            box-sizing: border-box;
            -moz-box-sizing: border-box;
            border-color: #000000;
        }

        /* 타이틀이 속하는 div */
        .page #title_div{
            width: 100%;
            height: 26mm;
        }

        /* 타이틀이 속하는 div속 table */
        #title_div .title_table{
            width: 100%;
            height: 100%;
        }

        /* 타이틀이 속하는 div속 table속 텍스트 */
        .title_table .title_txt{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        /* 프레임을 만드는 div */
        .page #frame_div{
            width: 100%;
            height: 217mm;
            border: #000000 solid 1px;
        }
        
        /* 프레임이 속하는 인적사항 table */
        #frame_div .personal_data{
            width: 100%;
            height: 8%;
        }

        /* 인적사항 컬럼명 */
        .personal_data .col_name{
            width: 10%;
            text-align: center;
        }

        /* 인적사항 콤마 */
        .personal_data .col_com{
            width: 0.1%;
        }

        /* 인적사항 컬럼값 */
        .personal_data .col_val{
            text-align: left;
            padding-left: 5px;
        }

        /* 프레임이 속하는 인적사항 table내 tr */
        .personal_data tr{
            font-size: 13px;
        }


        .year_cell{
            text-align: center;
            font-size: 11px;
            height: 20px;
        }

        .type_cell{
            text-align: left;
            padding-left: 3px;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .name_cell{
            text-align: left;
            padding-left: 3px;
            font-size: 11px;
            letter-spacing: 1px;
        }



        .credit_cell{
            text-align: center;
            font-size: 11px;
            border-right: hidden;
        }

        .record_cell{
            text-align: left;
            padding-left: 3px;
            font-size: 11px;
            border-right: hidden;
        }

        .grade_cell{
            text-align: center;
            font-size: 11px;
        }








        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>
<body>

    <div class="book">

        <!-- 성적증명서(석차등급) -->
        <div class="page rank" style="display: block;">
            <!-- 성적증명서(석차등급) 타이틀 -->
            <div id="title_div">
                <table class="title_table">
                    <tr>
                        <td class="title_txt">
                            성&nbsp;적&nbsp;증&nbsp;명&nbsp;서
                        </td>
                    </tr>
                </table>
            </div>

            <div id="frame_div">
                <table border="0" class="personal_data" style="height: 10%;">
                    <tr>
                        <td class="col_name" style="letter-spacing: 1px;">
                            성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 20%; letter-spacing: 1px;">
                            <?=$stu['name']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;번
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 27%; letter-spacing: 1px;">
                            <?=$stu['stuid']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            생&nbsp;년&nbsp;월&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 18%; letter-spacing: 1px;">
                            <?=$stu['birth']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;교
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['high_sch']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;과
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['dept']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1.2px;">
                            성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;별
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['gender']?>
                        </td>
                    </tr>
                    <tr style="border-bottom: #000000 solid 1px;">
                        <td class="col_name" style="letter-spacing: 0.5px;">
                            입&nbsp;&nbsp;&nbsp;학&nbsp;&nbsp;&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['admit']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 0.5px;">
                            졸&nbsp;&nbsp;&nbsp;업&nbsp;&nbsp;&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['graduate_date']?>
                        </td>
                    </tr>
                </table>
                <div class="record_div" style="width: 100%;">
                    <table border="1" style="width: 100%; text-align: center; font-size: 13px; border-top: hidden; ">
                        <tr style="border-left: hidden; border-right: hidden; font-size: 12px; letter-spacing: 0px;">
                            <td rowspan="2" style="width: 5%;">
                                학년
                            </td>
                            <td rowspan="2" style="width: 10%;">
                                교과
                            </td>
                            <td rowspan="2" style="width: 36%;">
                                과&nbsp;&nbsp;&nbsp;목
                            </td>
                            <td colspan="3" style="font-size: 11px; height: 22px;">
                                1학기
                            </td>
                            <td colspan="3" style="font-size: 11px;">
                                2학기
                            </td>
                        </tr>
                        <tr style="font-size: 11px; letter-spacing: 0px; border-left: hidden; border-right: hidden;">
                            <td style="width: 4%; height: 45px;">
                                학점
                            </td>
                            <td style="width: 11%;">
                                원점수/<br>과목평균<br>(표준편차)
                            </td>
                            <td style="width: 8%;">
                                석차등급<br>(이수자수)
                            </td>
                            <td style="width: 4%;">
                                학점
                            </td>
                            <td style="width: 11%;">
                                원점수/<br>과목평균<br>(표준편차)
                            </td>
                            <td style="width: 8%;">
                                석차등급<br>(이수자수)
                            </td>
                        </tr>
                        <?php
                        foreach ($rec['year'] as $key => $value){
                        ?>
                        <tr style="font-size: 10px; letter-spacing: 0em; word-spacing: 0px; border-left: hidden; border-right: hidden;">
                            <td class="year_cell">
                                <?=$value?>
                            </td>
                            <td class="type_cell">
                                <?=$rec['type'][$key]?>
                            </td>
                            <td class="name_cell">
                                <?=$rec['name'][$key]?>
                            </td>

                            <?php
                            if($rec['position'][$key] == '4'){
                                foreach ($rec['credit'][$key] as $k => $v){
                            ?>
                            <td colspan="3">

                            </td>
                            <td class="credit_cell">
                                <?=$v?>
                            </td>
                            <td class="record_cell">
                                <?=$rec['record'][$key][$k]?>
                            </td>
                            <td class="grade_cell">
                                <?=$rec['grade'][$key][$k]?>
                            </td>
                            <?php
                                }
                            }
                            ?>

                            <?php
                            if($rec['position'][$key] == '6' || $rec['position'][$key] == '2'){
                                foreach ($rec['credit'][$key] as $k => $v){
                            ?>
                            <td class="credit_cell">
                                <?=$v?>
                            </td>
                            <td class="record_cell">
                                <?=$rec['record'][$key][$k]?>
                            </td>
                            <td class="grade_cell">
                                <?=$rec['grade'][$key][$k]?>
                            </td>
                            <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                        }
                        ?>

                        <tr style="font-size: 10px; letter-spacing: 0em; word-spacing: 0px; border-left: hidden; border-right: hidden;">
                            <td colspan="3" style="text-align: center; font-size: 12px; height: 20px; letter-spacing: 2px;">
                                이수학점합계
                            </td>
                            <td colspan="3" style="text-align: right; font-size: 12px; letter-spacing: 1px; padding-right: 5px;">
                                <?=$rec['credit_sum']['1']?>
                            </td>
                            <td colspan="3" style="text-align: right; font-size: 12px; letter-spacing: 1px; padding-right: 5px;">
                                <?=$rec['credit_sum']['2']?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            <div id="stamp_div">
                <table class="stamp_table">
                    <tr>
                        <td class="stamp_txt">
                            위의 사실을 증명합니다.
                            <br><br><br>
                            <?=date("Y년 m월 d일",time())?>
                            <br><br>
                            <a style="font-size: 20px; font-weight: bold;"><?=$stu['high_sch'],'장'?></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- 성적증명서(석차) -->
        <div class="page rank" style="display: block;">
            <!-- 성적증명서(석차) 타이틀 -->
            <div id="title_div">
                <table class="title_table">
                    <tr>
                        <td class="title_txt">
                            성&nbsp;적&nbsp;증&nbsp;명&nbsp;서
                        </td>
                    </tr>
                </table>
            </div>

            <div id="frame_div">
                <table border="0" class="personal_data" style="height: 10%;">
                    <tr>
                        <td class="col_name" style="letter-spacing: 1px;">
                            성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 20%; letter-spacing: 1px;">
                            <?=$stu['name']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;번
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 27%; letter-spacing: 1px;">
                            <?=$stu['stuid']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            생&nbsp;년&nbsp;월&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 18%; letter-spacing: 1px;">
                            <?=$stu['birth']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;교
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['high_sch']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;과
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['dept']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1.2px;">
                            성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;별
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['gender']?>
                        </td>
                    </tr>
                    <tr style="border-bottom: #000000 solid 1px;">
                        <td class="col_name" style="letter-spacing: 0.5px;">
                            입&nbsp;&nbsp;&nbsp;학&nbsp;&nbsp;&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['admit']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 0.5px;">
                            졸&nbsp;&nbsp;&nbsp;업&nbsp;&nbsp;&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['graduate_date']?>
                        </td>
                    </tr>
                </table>
                <div class="record_div" style="width: 100%;">
                    <table border="1" style="width: 100%; text-align: center; font-size: 13px; border-top: hidden; ">
                        <tr style="border-left: hidden; border-right: hidden; font-size: 12px; letter-spacing: 0px;">
                            <td rowspan="2" style="width: 5%;">
                                학년
                            </td>
                            <td rowspan="2" style="width: 10%;">
                                교과
                            </td>
                            <td rowspan="2" style="width: 36%;">
                                과&nbsp;&nbsp;&nbsp;목
                            </td>
                            <td colspan="3" style="font-size: 11px; height: 22px;">
                                1학기
                            </td>
                            <td colspan="3" style="font-size: 11px;">
                                2학기
                            </td>
                        </tr>
                        <tr style="font-size: 11px; letter-spacing: 0px; border-left: hidden; border-right: hidden;">
                            <td style="width: 4%; height: 45px;">
                                학점
                            </td>
                            <td style="width: 6%;">
                                표준<br>점수
                            </td>
                            <td style="width: 12%;">
                                석차/재적수
                            </td>
                            <td style="width: 4%;">
                                학점
                            </td>
                            <td style="width: 6%;">
                                표준<br>점수
                            </td>
                            <td style="width: 12%;">
                                석차/재적수
                            </td>
                        </tr>
                        <?php
                        foreach ($rec['year'] as $key => $value){
                            ?>
                            <tr style="font-size: 10px; letter-spacing: 0em; word-spacing: 0px; border-left: hidden; border-right: hidden;">
                                <td class="year_cell">
                                    <?=$value?>
                                </td>
                                <td class="type_cell">
                                    <?=$rec['type'][$key]?>
                                </td>
                                <td class="name_cell">
                                    <?=$rec['name'][$key]?>
                                </td>

                                <?php
                                if($rec['position'][$key] == '4'){
                                    foreach ($rec['credit'][$key] as $k => $v){
                                        ?>
                                        <td colspan="3">

                                        </td>
                                        <td class="credit_cell">
                                            <?=$v?>
                                        </td>
                                        <td class="record_cell" style="text-align: center;">
                                            <?=$rec['std'][$key][$k]?>
                                        </td>
                                        <td class="grade_cell" style="text-align: left; font-size: 11px;">
                                            <?=$rec['rank'][$key][$k]?>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>

                                <?php
                                if($rec['position'][$key] == '6' || $rec['position'][$key] == '2'){
                                    foreach ($rec['credit'][$key] as $k => $v){
                                        ?>
                                        <td class="credit_cell">
                                            <?=$v?>
                                        </td>
                                        <td class="record_cell" style="text-align: center;">
                                            <?=$rec['std'][$key][$k]?>
                                        </td>
                                        <td class="grade_cell" style="text-align: left; font-size: 11px;">
                                            <?=$rec['rank'][$key][$k]?>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>

                        <tr style="font-size: 10px; letter-spacing: 0em; word-spacing: 0px; border-left: hidden; border-right: hidden;">
                            <td colspan="3" style="text-align: center; font-size: 12px; height: 20px; letter-spacing: 2px;">
                                이수학점합계
                            </td>
                            <td colspan="3" style="text-align: right; font-size: 12px; letter-spacing: 1px; padding-right: 5px;">
                                <?=$rec['credit_sum']['1']?>
                            </td>
                            <td colspan="3" style="text-align: right; font-size: 12px; letter-spacing: 1px; padding-right: 5px;">
                                <?=$rec['credit_sum']['2']?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            <div id="stamp_div">
                <table class="stamp_table">
                    <tr>
                        <td class="stamp_txt">
                            위의 사실을 증명합니다.
                            <br><br><br>
                            <?=date("Y년 m월 d일",time())?>
                            <br><br>
                            <a style="font-size: 20px; font-weight: bold;"><?=$stu['high_sch'],'장'?></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- 성적증명서(4.5 평점) $ac_1 -->
        <div class="page gp" style="display: block;">
            <!-- 성적증명서(평점) 타이틀 -->
            <div id="title_div">
                <table class="title_table">
                    <tr>
                        <td class="title_txt">
                            성&nbsp;적&nbsp;증&nbsp;명&nbsp;서
                        </td>
                    </tr>
                </table>
            </div>

            <div id="frame_div">
                <table border="0" class="personal_data">
                    <tr>
                        <td class="col_name" style="letter-spacing: 1px;">
                            성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 20%; letter-spacing: 1px;">
                            <?=$stu['name']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;번
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 27%; letter-spacing: 1px;">
                            <?=$stu['stuid']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            생&nbsp;년&nbsp;월&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="width: 18%; letter-spacing: 1px;">
                            <?=$stu['birth']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;교
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['high_sch']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1px;">
                            학&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;과
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['dept']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 1.2px;">
                            성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;별
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['gender']?>
                        </td>
                    </tr>
                    <tr style="border-bottom: #000000 solid 1px;">
                        <td class="col_name" style="letter-spacing: 0.5px;">
                            입&nbsp;&nbsp;&nbsp;학&nbsp;&nbsp;&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['admit']?>
                        </td>
                        <td class="col_name" style="letter-spacing: 0.5px;">
                            졸&nbsp;&nbsp;&nbsp;업&nbsp;&nbsp;&nbsp;일
                        </td>
                        <td class="col_com">
                            :
                        </td>
                        <td class="col_val" style="letter-spacing: 1px;">
                            <?=$stu['graduate_date']?>
                        </td>
                    </tr>
                </table>
                <div class="record_div">
                    <table style="width: 100%; height: 3%; text-align: center; font-size: 13px; border-top: hidden;">
                        <tr style="border-bottom: #000000 solid 1px;">
                            <td style="height: 25px; width: 12%; border-bottom: #000000 solid 1px;">
                                구분
                            </td>
                            <td style="width: 64%;">
                                교&nbsp;&nbsp;&nbsp;과&nbsp;&nbsp;&nbsp;목
                            </td>
                            <td style="width: 12%;">
                                학점
                            </td>
                            <td style="width: 12%;">
                                성적
                            </td>
                        </tr>

                        <?php
                        if($stu['register_11'] != '' && $stu['register_11'] != null){
                        ?>
                        <tr style="border: 0px solid #000000;">
                            <td colspan="4" style="padding-top: 10px; padding-bottom: 2px; text-align: left; padding-left: 40px; font-size: 11px;">
                                <?=$stu['register_11']?>학년도 1학기
                            </td>
                        </tr>
                        <?php
                        foreach ($ac['Cat']['11'] as $key => $value){
                        ?>
                        <tr style="font-size: 11px; border: 0px solid #000000;">
                            <td style="line-height: 10px;">
                                <?=$value?>
                            </td>
                            <td style="text-align: left; letter-spacing: 0px;">
                                <?=$ac['Name']['11'][$key]?>
                            </td>
                            <td>
                                <?=$ac['Credit']['11'][$key]?>
                            </td>
                            <td style="text-align: left;">
                                <?=$ac_1['RG']['11'][$key]?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="font-size: 11px; border: 0px solid #000000;">
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%;">
                                                이수 학점
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac['Credit']['Sum']['11']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                평점 평균
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=number_format($ac_1['RG']['GPA']['11'],2)?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%; letter-spacing: 1.5px;">
                                                평&nbsp;점&nbsp;계
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac_1['RG']['Grade']['Sum']['11']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="letter-spacing: 1px;">
                                                환산점수
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$conversion_perc['11']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                        <?php
                        if($stu['register_12'] != '' && $stu['register_12'] != null){
                        ?>
                        <tr style="border: 0px solid #000000;">
                            <td colspan="4" style="padding-top: 10px; padding-bottom: 2px; text-align: left; padding-left: 40px; font-size: 11px;">
                                <?=$stu['register_12']?>학년도 2학기
                            </td>
                        </tr>
                        <?php
                        foreach ($ac['Cat']['12'] as $key => $value){
                        ?>
                        <tr style="font-size: 11px; border: 0px solid #000000;">
                            <td style="line-height: 10px;">
                                <?=$value?>
                            </td>
                            <td style="text-align: left; letter-spacing: 0px;">
                                <?=$ac['Name']['12'][$key]?>
                            </td>
                            <td>
                                <?=$ac['Credit']['12'][$key]?>
                            </td>
                            <td style="text-align: left;">
                                <?=$ac_1['RG']['12'][$key]?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="font-size: 11px; border: 0px solid #000000;">
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%;">
                                                이수 학점
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac['Credit']['Sum']['12']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                평점 평균
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=number_format($ac_1['RG']['GPA']['12'],2)?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%; letter-spacing: 1.5px;">
                                                평&nbsp;점&nbsp;계
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac_1['RG']['Grade']['Sum']['12']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="letter-spacing: 1px;">
                                                환산점수
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$conversion_perc['12']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="record_div record_center">
                    <table style="width: 100%; height: 3%; text-align: center; font-size: 13px; border-top: hidden;">
                        <tr style="border-bottom: #000000 solid 1px;">
                            <td style="height: 25px; width: 12%; border-bottom: #000000 solid 1px;">
                                구분
                            </td>
                            <td style="width: 64%;">
                                교&nbsp;&nbsp;&nbsp;과&nbsp;&nbsp;&nbsp;목
                            </td>
                            <td style="width: 12%;">
                                학점
                            </td>
                            <td style="width: 12%;">
                                성적
                            </td>
                        </tr>

                        <?php
                        if($stu['register_21'] != '' && $stu['register_21'] != null){
                        ?>
                        <tr style="border: 0px solid #000000;">
                            <td colspan="4" style="padding-top: 10px; padding-bottom: 2px; text-align: left; padding-left: 40px; font-size: 11px;">
                                <?=$stu['register_21']?>학년도 1학기
                            </td>
                        </tr>
                        <?php
                        foreach ($ac['Cat']['21'] as $key => $value){
                        ?>
                        <tr style="font-size: 11px; border: 0px solid #000000;">
                            <td style="line-height: 10px;">
                                <?=$value?>
                            </td>
                            <td style="text-align: left; letter-spacing: 0px;">
                                <?=$ac['Name']['21'][$key]?>
                            </td>
                            <td>
                                <?=$ac['Credit']['21'][$key]?>
                            </td>
                            <td style="text-align: left;">
                                <?=$ac_1['RG']['21'][$key]?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="font-size: 11px; border: 0px solid #000000;">
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%;">
                                                이수 학점
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac['Credit']['Sum']['21']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                평점 평균
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=number_format($ac_1['RG']['GPA']['21'],2)?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%; letter-spacing: 1.5px;">
                                                평&nbsp;점&nbsp;계
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac_1['RG']['Grade']['Sum']['21']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="letter-spacing: 1px;">
                                                환산점수
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$conversion_perc['21']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                        <?php
                        if($stu['register_22'] != '' && $stu['register_22'] != null){
                        ?>
                        <tr style="border: 0px solid #000000;">
                            <td colspan="4" style="padding-top: 10px; padding-bottom: 2px; text-align: left; padding-left: 40px; font-size: 11px;">
                                <?=$stu['register_22']?>학년도 2학기
                            </td>
                        </tr>
                        <?php
                        foreach ($ac['Cat']['22'] as $key => $value){
                        ?>
                        <tr style="font-size: 11px; border: 0px solid #000000;">
                            <td style="line-height: 10px;">
                                <?=$value?>
                            </td>
                            <td style="text-align: left; letter-spacing: 0px;">
                                <?=$ac['Name']['22'][$key]?>
                            </td>
                            <td>
                                <?=$ac['Credit']['22'][$key]?>
                            </td>
                            <td style="text-align: left;">
                                <?=$ac_1['RG']['22'][$key]?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="font-size: 11px; border: 0px solid #000000;">
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%;">
                                                이수 학점
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac['Credit']['Sum']['22']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                평점 평균
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=number_format($ac_1['RG']['GPA']['22'],2)?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%; letter-spacing: 1.5px;">
                                                평&nbsp;점&nbsp;계
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac_1['RG']['Grade']['Sum']['22']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="letter-spacing: 1px;">
                                                환산점수
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$conversion_perc['22']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="record_div">
                    <table style="width: 100%; height: 3%; text-align: center; font-size: 13px; border-top: hidden;">
                        <tr style="border-bottom: #000000 solid 1px;">
                            <td style="height: 25px; width: 12%; border-bottom: #000000 solid 1px;">
                                구분
                            </td>
                            <td style="width: 64%;">
                                교&nbsp;&nbsp;&nbsp;과&nbsp;&nbsp;&nbsp;목
                            </td>
                            <td style="width: 12%;">
                                학점
                            </td>
                            <td style="width: 12%;">
                                성적
                            </td>
                        </tr>

                        <?php
                        if($stu['register_31'] != '' && $stu['register_31'] != null){
                        ?>
                        <tr style="border: 0px solid #000000;">
                            <td colspan="4" style="padding-top: 10px; padding-bottom: 2px; text-align: left; padding-left: 40px; font-size: 11px;">
                                <?=$stu['register_31']?>학년도 1학기
                            </td>
                        </tr>
                        <?php
                        foreach ($ac['Cat']['31'] as $key => $value){
                        ?>
                        <tr style="font-size: 11px; border: 0px solid #000000;">
                            <td style="line-height: 10px;">
                                <?=$value?>
                            </td>
                            <td style="text-align: left; letter-spacing: 0px;">
                                <?=$ac['Name']['31'][$key]?>
                            </td>
                            <td>
                                <?=$ac['Credit']['31'][$key]?>
                            </td>
                            <td style="text-align: left;">
                                <?=$ac_1['RG']['31'][$key]?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="font-size: 11px; border: 0px solid #000000;">
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%;">
                                                이수 학점
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac['Credit']['Sum']['31']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                평점 평균
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=number_format($ac_1['RG']['GPA']['31'],2)?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%; letter-spacing: 1.5px;">
                                                평&nbsp;점&nbsp;계
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac_1['RG']['Grade']['Sum']['31']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="letter-spacing: 1px;">
                                                환산점수
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$conversion_perc['31']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                        <?php
                        if($stu['register_32'] != '' && $stu['register_32'] != null){
                        ?>
                        <tr style="border: 0px solid #000000;">
                            <td colspan="4" style="padding-top: 10px; padding-bottom: 2px; text-align: left; padding-left: 40px; font-size: 11px;">
                                <?=$stu['register_32']?>학년도 2학기
                            </td>
                        </tr>
                        <?php
                        foreach ($ac['Cat']['32'] as $key => $value){
                        ?>
                        <tr style="font-size: 11px; border: 0px solid #000000;">
                            <td style="line-height: 10px;">
                                <?=$value?>
                            </td>
                            <td style="text-align: left; letter-spacing: 0px;">
                                <?=$ac['Name']['32'][$key]?>
                            </td>
                            <td>
                                <?=$ac['Credit']['32'][$key]?>
                            </td>
                            <td style="text-align: left;">
                                <?=$ac_1['RG']['32'][$key]?>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="font-size: 11px; border: 0px solid #000000;">
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%;">
                                                이수 학점
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac['Credit']['Sum']['32']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                평점 평균
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=number_format($ac_1['RG']['GPA']['32'],2)?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="float: left; width: 50%; height: 33px; margin-top: 5px;">
                                    <table border="0" style="width: 100%; height: 100%;">
                                        <tr>
                                            <td style="width: 50%; letter-spacing: 1.5px;">
                                                평&nbsp;점&nbsp;계
                                            </td>
                                            <td style="width: 1px;">
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$ac_1['RG']['Grade']['Sum']['32']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="letter-spacing: 1px;">
                                                환산점수
                                            </td>
                                            <td>
                                                :
                                            </td>
                                            <td style="text-align: left;">
                                                <?=$conversion_perc['32']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4" style="font-size: 11px; padding-top: 5px;">
                                <table border="0" style="width: 100%;">
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1px; width: 27%;">
                                            총 이수학점
                                        </td>
                                        <td style="width: 1px;">
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$ac['Credit']['sum']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1.5px;">
                                            총 평&nbsp;점&nbsp;계
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$ac_1['RG']['Grade']['Sum']['Merged']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1px;">
                                            총 평점평균
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=number_format($ac_1['RG']['GPA']['Merged'],2).'/4.50'?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1.5px;">
                                            환&nbsp;산&nbsp;점&nbsp;수
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$conversion_perc['Merged'].'/100'?>
                                        </td>
                                    </tr>
                                    <?php
                                    if($_GET['isRank'] == 'Y'){
                                    ?>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 2.88px;">
                                            석&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;차
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$rank['Rank'][$stu['stuid']].'/'.$rank['sum']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="text-align: left; letter-spacing: 1px;">
                                            평점평균 분포
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1px;">
                                            상위 20%
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$rank['statistics']['20']['GPA']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1px;">
                                            상위 40%
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$rank['statistics']['40']['GPA']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1px;">
                                            상위 60%
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$rank['statistics']['60']['GPA']?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; letter-spacing: 1px;">
                                            상위 80%
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td style="text-align: left;">
                                            <?=$rank['statistics']['80']['GPA']?>
                                        </td>
                                    </tr>

                                    <?php
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div id="grade_div">
                <table class="grade_table">
                    <tr>
                        <td class="grade_txt">
                            A+(4.5)95-100,A0(4.0)90-94,B+(3.5)85-89,B0(3.0)80-84,C+(2.5)75-79,C0(2.0)70-74,D+(1.5)65-69,D0(1.0)60-64,F(0.0)0-59,P(Pass)
                        </td>
                    </tr>
                </table>
            </div>

            <div id="stamp_div">
                <table class="stamp_table">
                    <tr>
                        <td class="stamp_txt">
                            위의 사실을 증명합니다.
                            <br><br><br>
                            <?=date("Y년 m월 d일",time())?>
                            <br><br>
                            <a style="font-size: 20px; font-weight: bold;"><?=$stu['high_sch'],'장'?></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
<?php
}else{
    echo("<script>alert('해당하는 학생은 없습니다')</script>
    <script>history.back()</script>
    ");
}

?>