<?php
session_start();
error_reporting( E_ERROR );
ini_set( "display_errors", 1 );
require_once "../lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();

// 교사만 조회할 수 있음

//require_once ("../lib/Academic_Record.php");
//$ac_record = new Academic_Record();
//$verify = $ac_record->authorize_obj;
//$ck_teacher = $verify->Check_Teacher();
//
//require_once "../lib/Academic_Record.php";
//$ac_record = new Academic_Record();

// 요청사항 불러오기
require_once "./Record_Storage.php";

//echo '<pre>';
//print_r(mysqli_connect("152.70.236.30:3306","3639qw","134679qw",'bank'));
//echo '</pre>';

//echo '<pre>';
//print_r($rec);
//echo '</pre>';

// 임시: http://web.juyong.kr/academy/record/search/?sel_type=0&stuid=22851041&sch=%EC%84%B8%EB%AA%85%EC%BB%B4%ED%93%A8%ED%84%B0%EA%B3%A0%EB%93%B1%ED%95%99%EA%B5%90&initial=SMC

//if($ck_teacher){
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cmd.css">
    <meta charset="utf-8">
    <title>학생 성적 조회</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');
        @import url(http://fonts.googleapis.com/earlyaccess/nanumgothiccoding.css);
        @import url('https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css');

        *{
            font-family: 'Pretendard-Regular';
            font-weight: 100;


        }

        @font-face {
            font-family: 'Pretendard-Regular';
            src: url('https://cdn.jsdelivr.net/gh/Project-Noonnu/noonfonts_2107@1.1/Pretendard-Regular.woff') format('woff');
        }

        .local .txt{
            letter-spacing: 2px;
        }

        /* Input창 */
        .input{
            font-size: 15px;
            border: 1px solid;
            color: #000000;
            background: transparent;
            /*outline: 0!important;*/
            letter-spacing: 2px;
        }
        .input::placeholder{
            color: #6c6c6c;
        }

        /* 신청버튼 */
        .accept{
            /*width: 90px;*/
            /*height: 32px;*/
            font-size: 15px;
            /*border: 1px solid rgb(51, 76, 121);*/
            border: 1px solid #000000;
            color: white;
            background-color: transparent;
            /*background-color: rgb(51, 76, 121);*/
            /*border-radius: 5px;*/
        }
        .accept:hover{
            border: 2px solid #000000;
            /*box-shadow: 0 8px 16px 0 rgb(51, 76, 121);*/
            /*transition: all 0.6s;*/
        }



        @media print{
            *{
                size: A4;
                margin: 0;
                width: 210mm;
                color: black;
                margin: 0;
                /*border: initial;*/
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                /*page-break-after: always;*/
            }
            .search{
                display: none;
            }
            .level_perc{
                display: none;
            }
        }

    </style>
</head>
<body>

<form method="get" action="./" id="input_form">
    <table border="0" class="search" style="border-collapse: collapse; width: 1000px; height: 35px;">
        <tr>
            <td style="width: 30%;">
                <select class="input" id="sel_type" name="sel_type" style="height: 100%; width: 100%;">
                    <option style="color: black" value="0">개인별 성적</option>
                    <option style="color: black" value="1">개인별 학적부</option>
                </select>
            </td>
            <td style="width: 60%;">
                <input type="text" class="input" id="id" name="stuid" placeholder="학번을 입력해주세요" style="height: 88%; width: 82%; padding-left: 5px;" value="<?=$_GET['stuid']?>">
                <label style="font-size: 15px;"><input type="checkbox" id="typerank" name="typerank" value="Y">계열석차</label>
            </td>
            <td style="width: 10%;">
                <button type="submit" class="accept" style="height: 34px; width: 100%; color: black">전송</button>
            </td>
        </tr>
    </table>
</form>
<!-- 개인별 성적 -->
<?php
if($_GET['sel_type'] == '0'){
    if($stu != null && $stu != ''){
?>
<table border="1" style="border-collapse: collapse; width: 1000px; border: 1px solid #000000; margin-top: 10px;">
    <tr>
        <td style="text-align: left; padding-left: 10px; height: 30px;">
            교과내신성적 일람표
        </td>
    </tr>
</table>

<!-- 인적사항 -->
<table border="1" class="student_id" style="border-collapse: collapse; width: 1000px; font-size: 14px; border: 1px solid #000000; margin-top: 10px;">
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td style="width: 120px;">
            학번
        </td>
        <td style="width: 160px; text-align: left; padding-left: 10px;">
            <?=$stu['stuid']?>
        </td>
        <td style="width: 120px; text-align: center;">
            성명
        </td>
        <td style="width: 260px; text-align: left; padding-left: 10px;">
            <?=$stu['name']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            생년월일
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['birth']?>
        </td>
        <td>
            성별
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['gender']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            입학년월일
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['admit']?>
        </td>
        <td>
            학적상태
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['status']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            졸업년월일
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['graduate_date']?>
        </td>
        <td>
            학과 (계열코드)
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['dept'].' ('.$stu['type'].')'?>
        </td>
    </tr>
</table>

<!-- 학기별 성적 -->
<table border="1" class="sem_record" style="border-collapse: collapse; width: 1000px; border: 1px solid #000000; margin-top: 10px; letter-spacing: 2px;">
    <tr style="height: 40px; text-align: center;">
        <td colspan="11">
            학기별 성적
        </td>
    </tr>
    <tr style="text-align: center; font-size: 14px;">
        <td rowspan="2" style="width: 12%;">
            학년
        </td>
        <td colspan="5" style="height: 25px; font-size: 15px;">
            1학기
        </td>
        <td colspan="5" style="font-size: 14px;">
            2학기
        </td>
    </tr>
    <tr style="text-align: center; font-size: 12px;">
        <td style="height: 33px; width: 4%;">
            이수<br>학점
        </td>
        <td style="width: 8%;">
            총점<br>평균
        </td>
        <td style="width: 8%;">
            백분위<br>평균
        </td>
        <td style="width: 7%;">
            석차등급<br>평균
        </td>
        <td style="width: 7%;">
            GPA
        </td>
        <td style="width: 4%;">
            이수<br>학점
        </td>
        <td style="width: 8%;">
            총점<br>평균
        </td>
        <td style="width: 8%;">
            백분위<br>평균
        </td>
        <td style="width: 7%;">
            석차등급<br>평균
        </td>
        <td style="width: 7%;">
            GPA
        </td>
    </tr>
    <tr style="height: 25px; text-align: center;">
        <td style="font-size: 14px; text-align: center; padding-left: 5px;">
            <?=$ac_sems['year'][1]?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][1]['credit']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][1]['raw_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][1]['percentile']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][1]['rg_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][1]['gpa']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][2]['credit']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][2]['raw_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][2]['percentile']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][2]['rg_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[1][2]['gpa']?>
        </td>
    </tr>
    <tr style="height: 25px; text-align: center;">
        <td style="font-size: 14px; text-align: center; padding-left: 5px;">
            <?=$ac_sems['year'][2]?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][1]['credit']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][1]['raw_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][1]['percentile']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][1]['rg_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][1]['gpa']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][2]['credit']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][2]['raw_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][2]['percentile']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][2]['rg_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[2][2]['gpa']?>
        </td>
    </tr>
    <tr style="height: 25px; text-align: center;">
        <td style="font-size: 14px; text-align: center; padding-left: 5px;">
            <?=$ac_sems['year'][3]?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][1]['credit']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][1]['raw_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][1]['percentile']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][1]['rg_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][1]['gpa']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][2]['credit']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][2]['raw_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][2]['percentile']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][2]['rg_avg']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sems[3][2]['gpa']?>
        </td>
    </tr>
    <tr style="height: 25px; text-align: center;">
        <td style="font-size: 14px; text-align: center; padding-left: 5px;">
            누적
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sem_2['credit']['Merged']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sem['raw_avg']['Merged']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sem['perc_avg']['Merged']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sem['rankgrade_avg']['Merged']?>
        </td>
        <td style="font-size: 12px;">
            <?=$ac_sem['gpa']['Merged']?>
        </td>
    </tr>
    <?php
    if($_GET['typerank'] == 'Y'){
    ?>
    <tr style="height: 25px; text-align: center;">
        <td style="font-size: 14px;">
            전체(계열)석차
        </td>
        <td colspan="10" style="font-size: 12px;">
            <?=$rank['Rank'][$stu['stuid']].'/'.$rank['sum']?>
        </td>
    </tr>
    <?php
    }
    ?>
    <?php
    if($_GET['allrank'] == 'Y'){
    ?>
    <tr style="height: 25px; text-align: center;">
        <td style="font-size: 14px;">
            전체(재적)석차
        </td>
        <td colspan="10" style="font-size: 12px;">
            <?=$a_rank['Rank'][$stu['stuid']].'/'.$a_rank['sum']?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>

<!-- 과목별 성적 -->
<table border="1" class="sub_record" style="border-collapse: collapse; width: 1000px; margin-top: 10px; border: 1px solid #000000;">
    <tr>
        <td colspan="13" style="height: 40px; font-size: 17px; text-align: center;">
            과목별 성적
        </td>
    </tr>
    <tr style="font-size: 12px; text-align: center;">
        <td rowspan="2" style="width: 4%;">
            학년
        </td>
        <td rowspan="2" style="width: 7%;">
            교과
        </td>
        <td rowspan="2" style="width: 21%;">
            과&nbsp;&nbsp;&nbsp;목
        </td>
        <td colspan="5" style="font-size: 14px; height: 20px;">
            1학기
        </td>
        <td colspan="5" style="font-size: 14px;">
            2학기
        </td>
    </tr>
    <tr style="font-size: 12px; text-align: center;">
        <td style="width: 4%;">
            학점
        </td>
        <td style="width: 10%;">
            원점수/<br>과목평균<br>(표준편차)
        </td>
        <td style="width: 8%;">
            학급 석차
        </td>
        <td style="width: 8%;">
            계열 석차
        </td>
        <td style="width: 4%;">
            석차<br>등급
        </td>
        <td style="width: 4%;">
            학점
        </td>
        <td style="width: 10%;">
            원점수/<br>과목평균<br>(표준편차)
        </td>
        <td style="width: 8%;">
            학급 석차
        </td>
        <td style="width: 8%;">
            계열 석차
        </td>
        <td style="width: 4%;">
            석차<br>등급
        </td>
    </tr>
    <?php
    foreach ($rec['year'] as $key => $value){
    ?>
    <tr style="font-size: 12px;">
        <td style="text-align: center; font-size: 13px; height: 23px;">
            <?=$value?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['type'][$key]?>
        </td>
        <td style="text-align: left; font-size: 14px; letter-spacing: 1px; padding-left: 3px;">
            <?=$rec['name'][$key]?>
        </td>

        <?php
        if($rec['position'][$key] == '4'){
            foreach ($rec['credit'][$key] as $k => $v){
        ?>
        <td colspan="5">

        </td>
        <td style="text-align: center; font-size: 13px;">
            <?=$v?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['record'][$key][$k]?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['class_rank'][$key][$k]?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['rank'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px;">
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
        <td style="text-align: center; font-size: 13px;">
            <?=$v?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['record'][$key][$k]?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['class_rank'][$key][$k]?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['rank'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px;">
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

</table>

<!-- 성취도 분포비율 -->
<table border="1" class="sub_record level_perc" style="border-collapse: collapse; width: 1000px; margin-top: 10px; border: 1px solid #000000;">
    <tr>
        <td colspan="17" style="height: 40px; font-size: 17px; text-align: center;">
            과목별 성적
        </td>
    </tr>
    <tr style="font-size: 12px; text-align: center;">
        <td rowspan="3" style="width: 4%;">
            학년
        </td>
        <td rowspan="3" style="width: 7%;">
            교과
        </td>
        <td rowspan="3" style="width: 27%;">
            과&nbsp;&nbsp;&nbsp;목
        </td>
        <td colspan="7" style="font-size: 14px; height: 20px;">
            1학기
        </td>
        <td colspan="7" style="font-size: 14px;">
            2학기
        </td>
    </tr>
    <tr style="font-size: 12px; text-align: center;">
        <td rowspan="2" style="width: 4%; height: 35px;">
            학점
        </td>
        <td rowspan="2" style="width: 5%;">
            성취도
        </td>
        <td colspan="5" style="width: 22%;">
            성취도별<br>분포비율
        </td>
        <td rowspan="2" style="width: 4%;">
            학점
        </td>
        <td rowspan="2" style="width: 5%;">
            성취도
        </td>
        <td colspan="5" style="width: 22%;">
            성취도별<br>분포비율
        </td>
    </tr>
    <tr style="font-size: 12px; height: 25px; text-align: center;">
        <td style="border-right: hidden;">
            A
        </td>
        <td style="border-right: hidden;">
            B
        </td>
        <td style="border-right: hidden;">
            C
        </td>
        <td style="border-right: hidden;">
            D
        </td>
        <td>
            E
        </td>
        <td style="border-right: hidden;">
            A
        </td>
        <td style="border-right: hidden;">
            B
        </td>
        <td style="border-right: hidden;">
            C
        </td>
        <td style="border-right: hidden;">
            D
        </td>
        <td>
            E
        </td>
    </tr>
    <?php
    foreach ($rec['year'] as $key => $value){
    ?>
    <tr style="font-size: 12px;">
        <td style="text-align: center; font-size: 13px; height: 23px;">
            <?=$value?>
        </td>
        <td style="text-align: left; font-size: 13px; padding-left: 3px;">
            <?=$rec['type'][$key]?>
        </td>
        <td style="text-align: left; font-size: 14px; letter-spacing: 1px; padding-left: 3px;">
            <?=$rec['name'][$key]?>
        </td>

    <?php
    if($rec['position'][$key] == '4'){
        foreach ($rec['credit'][$key] as $k => $v){
    ?>
        <td colspan="7">

        </td>
        <td style="text-align: center; font-size: 13px;">
            <?=$v?>
        </td>
        <td style="text-align: center; font-size: 13px;">
            <?=$rec['level'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['A'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['B'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['C'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['D'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px;">
            <?=$rec['level_percentile']['E'][$key][$k]?>
        </td>
    <?php
        }
    }
    ?>


    <?php
    if($rec['position'][$key] == '6' || $rec['position'][$key] == '2'){
        foreach ($rec['credit'][$key] as $k => $v){
    ?>
        <td style="text-align: center; font-size: 13px;">
            <?=$v?>
        </td>
        <td style="text-align: center; font-size: 13px;">
            <?=$rec['level'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['A'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['B'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['C'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px; border-right: hidden;">
            <?=$rec['level_percentile']['D'][$key][$k]?>
        </td>
        <td style="text-align: center; font-size: 13px;">
            <?=$rec['level_percentile']['E'][$key][$k]?>
        </td>
    <?php
        }
    }
    ?>

    </tr>
    <?php
    }
    ?>

</table>
<?php
    }else if($stu == null && $stu == ''){
        echo("<a style='float: left; margin-top: 50px;'>해당하는 학생은 존재하지 않습니다.</a>");
    }
}else if ($_GET['sel_type'] == '1'){
    if($stu != null && $stu != ''){
?>
<!-- 인적사항 -->
<table border="1" class="student_id" style="border-collapse: collapse; width: 1000px; font-size: 14px; border: 1px solid #000000; margin-top: 10px;">
    <tr align="center" style="height: 30px; letter-spacing: 2px; font-size: 15px;">
        <td colspan="4">
            인적사항
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td style="width: 120px;">
            학번
        </td>
        <td style="width: 160px; text-align: left; padding-left: 10px;">
            <?=$stu['stuid']?>
        </td>
        <td style="width: 120px; text-align: center;">
            성명
        </td>
        <td style="width: 260px; text-align: left; padding-left: 10px;">
            <?=$stu['name']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            생년월일
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['birth']?>
        </td>
        <td>
            성별
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['gender']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            입학년월일
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['admit']?>
        </td>
        <td>
            학적상태
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['status']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            졸업년월일
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['graduate_date']?>
        </td>
        <td>
            학과 (계열코드)
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['dept'].' ('.$stu['type'].')'?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            출신학교
        </td>
        <td style="text-align: left; padding-left: 10px;">
            <?=$stu['mid_sch']?>
        </td>
    </tr>
</table>
<!-- 등록사항 -->
<table border="1" class="student_id" style="border-collapse: collapse; width: 1000px; font-size: 14px; border: 1px solid #000000; margin-top: 10px;">
    <tr align="center" style="height: 30px; letter-spacing: 2px; font-size: 15px;">
        <td colspan="4">
            등록사항
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td style="width: 120px;">
            학기
        </td>
        <td style="width: 220px; text-align: center;">
            이수년도
        </td>
        <td style="width: 220px; text-align: center;">
            학급코드
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            1학년 1학기
        </td>
        <td>
            <?=$stu['register_11']?>
        </td>
        <td>
            <?=$stu['class_11']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            1학년 2학기
        </td>
        <td>
            <?=$stu['register_12']?>
        </td>
        <td>
            <?=$stu['class_12']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            2학년 1학기
        </td>
        <td>
            <?=$stu['register_21']?>
        </td>
        <td>
            <?=$stu['class_21']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            2학년 2학기
        </td>
        <td>
            <?=$stu['register_22']?>
        </td>
        <td>
            <?=$stu['class_22']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            3학년 1학기
        </td>
        <td>
            <?=$stu['register_31']?>
        </td>
        <td>
            <?=$stu['class_31']?>
        </td>
    </tr>
    <tr align="center" style="height: 27px; letter-spacing: 2px;">
        <td>
            3학년 2학기
        </td>
        <td>
            <?=$stu['register_32']?>
        </td>
        <td>
            <?=$stu['class_32']?>
        </td>
    </tr>
</table>
<?php
    }else{
        echo("<a style='float: left; margin-top: 50px;'>해당하는 학생은 존재하지 않습니다.</a>");
    }
}
?>

</body>
</html>
<?php
//}
?>