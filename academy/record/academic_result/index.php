<?php
session_start();

require_once "../lib/Academic_Record.php";
$ac_record = new Academic_Record();

// 학생 정보
$stu = $ac_record->selecter_obj->Select_Student();

//echo '<pre>';
//print_r($stu);
//echo '</pre>';

// 공통변수 $ac ----------------------------------------------------------------

foreach ($ac_record->each_name->Subject_Type() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Cat']['11'][$key] = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Cat']['12'][$key] = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Cat']['21'][$key] = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Cat']['22'][$key] = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Cat']['31'][$key] = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Cat']['32'][$key] = $value;
    }
}

// 과목명 $ac 공통사용
foreach ($ac_record->each_name->Subject_Name() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Name']['11'][$key]  = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Name']['12'][$key]  = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Name']['21'][$key]  = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Name']['22'][$key]  = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Name']['31'][$key]  = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Name']['32'][$key]  = $value;
    }
}

// 과목별 학점, 학기별 학점 $ac 공통사용
foreach ($ac_record->each_credit->Subject_Credit() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Credit']['11'][$key] = $value;
        $ac['Credit']['Sum']['11'] += $value;
        if($ac['Cat']['11'][$key] == '일반'){
            $ac['Grade_Credit']['11'] += $value;
        }
    }
    if(substr($key,-2) == '12'){
        $ac['Credit']['12'][$key] = $value;
        $ac['Credit']['Sum']['12'] += $value;
        if($ac['Cat']['12'][$key] == '일반'){
            $ac['Grade_Credit']['12'] += $value;
        }
    }
    if(substr($key,-2) == '21'){
        $ac['Credit']['21'][$key] = $value;
        $ac['Credit']['Sum']['21'] += $value;
        if($ac['Cat']['21'][$key] == '일반'){
            $ac['Grade_Credit']['21'] += $value;
        }
    }
    if(substr($key,-2) == '22'){
        $ac['Credit']['22'][$key] = $value;
        $ac['Credit']['Sum']['22'] += $value;
        if($ac['Cat']['22'][$key] == '일반'){
            $ac['Grade_Credit']['22'] += $value;
        }
    }
    if(substr($key,-2) == '31'){
        $ac['Credit']['31'][$key] = $value;
        $ac['Credit']['Sum']['31'] += $value;
        if($ac['Cat']['31'][$key] == '일반'){
            $ac['Grade_Credit']['31'] += $value;
        }
    }
    if(substr($key,-2) == '32'){
        $ac['Credit']['32'][$key] = $value;
        $ac['Credit']['Sum']['32'] += $value;
        if($ac['Cat']['32'][$key] == '일반'){
            $ac['Grade_Credit']['32'] += $value;
        }
    }
}

// 과목별 원점수/과목평균(표준편차)
foreach ($record = $ac_record->each_record->Record_Intergrate() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Record']['11'][$key]  = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Record']['12'][$key]  = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Record']['21'][$key]  = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Record']['22'][$key]  = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Record']['31'][$key]  = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Record']['32'][$key]  = $value;
    }
}

// 과목별 석차
foreach ($ac_record->each_rank->Rank_Integrate() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Rank']['11'][$key]  = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Rank']['12'][$key]  = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Rank']['21'][$key]  = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Rank']['22'][$key]  = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Rank']['31'][$key]  = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Rank']['32'][$key]  = $value;
    }
}

// 과목별 평어
foreach ($sub_level = $ac_record->each_gp->Grade_Rank() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Grade']['11'][$key]  = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Grade']['12'][$key]  = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Grade']['21'][$key]  = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Grade']['22'][$key]  = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Grade']['31'][$key]  = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Grade']['32'][$key]  = $value;
    }
}

// 과목별 석차등급
foreach ($rank_grade = $ac_record->each_rank->Rank_Grade() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['RankGrade']['11'][$key]  = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['RankGrade']['12'][$key]  = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['RankGrade']['21'][$key]  = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['RankGrade']['22'][$key]  = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['RankGrade']['31'][$key]  = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['RankGrade']['32'][$key]  = $value;
    }
}

// 학기별 평점평균, 졸업 평점평균
$ac['GPA'] = $ac_record->each_gp->GPA();

// 학기별 석차등급 평균, 졸업 석차등급 평균
//$ac['RankGrade_Avg'] = $ac_record->each_rank->Grade_Avg();


//----------------------------------------------------------------------------


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>성적 조회</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="rank_list.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./index.css">
    <script src="/antidragclick.js"></script>
    <style>
        /* index.php 스타일시트 */
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100&display=swap');
        *{
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: bold;
            word-break: break-all;
        }

        /* 1단 div */
        .first_section{
            width: 100%;
            height: auto;
        }

        /* 2단 div */
        .second_section{
            height: auto;
            width: 610px;
            margin: auto;
            padding: 10px 20px;
        }

        /* 캔슬버튼 */
        .cancel{
            float: right;
            width: 160px;
            height: 50px;
            font-size: 20px;
            border: 1px solid #999999;
            color: black;
            background-color: white;
            border-radius: 5px;
        }
        .cancel:hover{
            background-color: black;
            border: white;
            color: white;
            box-shadow: 0 8px 16px 0 rgb(51, 76, 121);
            transition: all 0.6s;
        }

        /* 타이틀 윈도우 */
        .title{
            letter-spacing: 2px;
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* 항목 윈도우 */
        .window{
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            margin-top: 40px;
            border: 1px solid rgb(51, 76, 121)
        }
        .window .top{
            letter-spacing: 1px;
            padding-left: 30px; height: 50px; font-size: 18px; font-weight: bold; background: rgb(51, 76, 121); color: #ffffff;
        }
        .window .content{
            letter-spacing: 1px;
            border-right: hidden;
            border-left: hidden;
            border-collapse: collapse;
            width: 89%;
            border-top: 3px solid rgb(51, 76, 121);
        }

        /* 유의사항 윈도우 */
        .noti_window{
            width: 100%;
            margin: auto;
            border-collapse: collapse;
            margin-top: 40px;
            border: 1px solid #999999;
        }
        .noti_window .top{
            letter-spacing: 2px;
            padding-left: 30px;
            height: 50px;
            font-size: 18px;
            font-weight: bold;
            background: white;
            color: #000000;
        }
        .noti_window .content{
            letter-spacing: 1px;
            border-right: hidden;
            border-left: hidden;
            border-collapse: collapse;
            width: 85%;
            border-top: 3px solid rgb(51, 76, 121);
        }
        .paper_table{
            width: 100%;
            border-collapse: collapse;
            border-color: black;
            margin: auto;
            vertical-align: middle;
        }

        /* Input창 */
        .content .input{
            font-size: 15px;
            padding-left: 10px;
            width: 350px;
            height: 25px;
            border: 1px solid #9b9b9b;
            background: #f0f0f0;
            outline: 0!important;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<div class="first_section">
    <?php
    if($_SESSION['id'] != '' && $_SESSION['id'] != null){
        if($_SESSION['level'] == 0){
    ?>
    <!-- 성적공고 -->
    <div class="second_section two_t" style="width: 750px;">
        <script>
            $(document).ready(function(){

                // $('.sub_11').hide();
                // $('.sub_12').hide();
                // $('.sub_21').hide();
                // $('.sub_22').hide();
                // $('.sub_31').hide();
                // $('.sub_32').hide();

                $('.sem_11').click(function (e) {
                    $('.sub_11').show();
                    $('.sub_none').hide();
                    $(".sem_11").css("background-color","#7bbcde");
                    $('.sub_12').hide();
                    $(".sem_12").css("background-color","white");
                    $('.sub_21').hide();
                    $(".sem_21").css("background-color","white");
                    $('.sub_22').hide();
                    $(".sem_22").css("background-color","white");
                    $('.sub_31').hide();
                    $(".sem_31").css("background-color","white");
                    $('.sub_32').hide();
                    $(".sem_32").css("background-color","white");


                });
                $('.sem_12').click(function (e) {
                    $('.sub_11').hide();
                    $('.sub_none').hide();
                    $(".sem_11").css("background-color","white");
                    $('.sub_12').show();
                    $(".sem_12").css("background-color","#7bbcde");
                    $('.sub_21').hide();
                    $(".sem_21").css("background-color","white");
                    $('.sub_22').hide();
                    $(".sem_22").css("background-color","white");
                    $('.sub_31').hide();
                    $(".sem_31").css("background-color","white");
                    $('.sub_32').hide();
                    $(".sem_32").css("background-color","white");

                });
                $('.sem_21').click(function (e) {
                    $('.sub_11').hide();
                    $('.sub_none').hide();
                    $(".sem_11").css("background-color","white");
                    $('.sub_12').hide();
                    $(".sem_12").css("background-color","white");
                    $('.sub_21').show();
                    $(".sem_21").css("background-color","#7bbcde");
                    $('.sub_22').hide();
                    $(".sem_22").css("background-color","white");
                    $('.sub_31').hide();
                    $(".sem_31").css("background-color","white");
                    $('.sub_32').hide();
                    $(".sem_32").css("background-color","white");

                });
                $('.sem_22').click(function (e) {
                    $('.sub_11').hide();
                    $('.sub_none').hide();
                    $(".sem_11").css("background-color","white");
                    $('.sub_12').hide();
                    $(".sem_12").css("background-color","white");
                    $('.sub_21').hide();
                    $(".sem_21").css("background-color","white");
                    $('.sub_22').show();
                    $(".sem_22").css("background-color","#7bbcde");
                    $('.sub_31').hide();
                    $(".sem_31").css("background-color","white");
                    $('.sub_32').hide();
                    $(".sem_32").css("background-color","white");

                });
                $('.sem_31').click(function (e) {
                    $('.sub_11').hide();
                    $('.sub_none').hide();
                    $(".sem_11").css("background-color","white");
                    $('.sub_12').hide();
                    $(".sem_12").css("background-color","white");
                    $('.sub_21').hide();
                    $(".sem_21").css("background-color","white");
                    $('.sub_22').hide();
                    $(".sem_22").css("background-color","white");
                    $('.sub_31').show();
                    $(".sem_31").css("background-color","#7bbcde");
                    $('.sub_32').hide();
                    $(".sem_32").css("background-color","white");

                });
                $('.sem_32').click(function (e) {
                    $('.sub_11').hide();
                    $('.sub_none').hide();
                    $(".sem_11").css("background-color","white");
                    $('.sub_12').hide();
                    $(".sem_12").css("background-color","white");
                    $('.sub_21').hide();
                    $(".sem_21").css("background-color","white");
                    $('.sub_22').hide();
                    $(".sem_22").css("background-color","white");
                    $('.sub_31').hide();
                    $(".sem_31").css("background-color","white");
                    $('.sub_32').show();
                    $(".sem_32").css("background-color","#7bbcde");
                });

            });
        </script>

        <!-- 타이틀 -->
        <table border="0" class="title">
            <tr align="center">
                <td style="letter-spacing: 2px; font-size: 35px; font-weight: bold;">
                    성적 조회
                </td>
            </tr>
        </table>

        <!-- 참고사항 -->
        <table border="1" class="noti_window">
            <tr align="center" >
                <td align="left" id="title_1_ac" class="top">
                    참고사항
                </td>
            </tr>
            <tr align="center" id="cont_1_ac" style="font-size: 15px;">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td>
                                <ul style="list-style-type: square; line-height: 1.5em;">
                                    <li style="color: black; padding-top: 5px;">평점 평균, 등급 평균은 과목별로 학점에 따른 가중치가 부여 된 값 입니다.</li>
                                    <li style="color: black; padding-top: 5px;"><a style="color: red;">※ P,NP로 평가된 과목은 성적 계산에 포함하지 않습니다.</a></li>
                                </ul>
                                <!-- 등급 산정식 테이블 -->
                                <table class="paper_table" border="0" style="">
                                    <tr align="left" style="background-color: white;">
                                        <td style="width: 16%;">
                                            A<sup>+</sup>:4.5(95-100)
                                        </td>
                                        <td style="width: 16%;">
                                            A<sup>0</sup>:4.0(90-94)
                                        </td>
                                        <td style="width: 16%;">
                                            B<sup>+</sup>:3.5(85-89)
                                        </td>
                                        <td style="width: 16%;">
                                            B<sup>0</sup>:3.0(80-84)
                                        </td>
                                        <td style="width: 16%;">
                                            C<sup>+</sup>:2.5(75-79)
                                        </td>
                                    </tr>
                                    <tr align="left" style="background-color: white;">
                                        <td>
                                            C<sup>0</sup>:2.0(70-74)
                                        </td>
                                        <td style='height: 20px;'>
                                            D<sup>+</sup>:1.5(65-69)
                                        </td>
                                        <td style='height: 20px;'>
                                            D<sup>0</sup>:1.0(60-64)
                                        </td>
                                        <td style='height: 20px;'>
                                            F:0.0(0-59)
                                        </td>
                                        <td style='height: 20px;'>
                                            P: 불계
                                        </td>
                                    </tr>
                                </table>
                                <table class="paper_table" border="0" style="margin-top: 5px; margin-bottom: 20px; ">
                                    <tr align="left" style="background-color: white;">
                                        <td style="width: 16%;">
                                            1:4%(~4%)
                                        </td>
                                        <td style="width: 16%;">
                                            2:7%(~11%)
                                        </td>
                                        <td style="width: 16%;">
                                            3:12%(~23%)
                                        </td>
                                        <td style="width: 16%;">
                                            4:17%(~40%)
                                        </td>
                                        <td style="width: 16%;">
                                            5:20%(~60%)
                                        </td>
                                    </tr>
                                    <tr align="left" style="background-color: white;">
                                        <td>
                                            6:17%(~77%)
                                        </td>
                                        <td>
                                            7:12%(~89%)
                                        </td>
                                        <td>
                                            8:7%(~96%)
                                        </td>
                                        <td>
                                            9:4%(~100%)
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- 인적,학적사항 -->
        <table border="1" class="window" style="margin-top: 30px;">
            <tr align="center">
                <td align="left" class="top">
                    인적 · 학적사항을 확인해주세요.
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 50px; width: 25%; border-right: hidden;">
                                성명
                            </td>
                            <td style="width: 75%;">
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$stu['name']?>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; border-right: hidden;">
                                생년월일
                            </td>
                            <td>
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$stu['birth']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; border-right: hidden;">
                                학번
                            </td>
                            <td>
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$stu['stuid']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; width: 25%; border-right: hidden;">
                                소속 학교
                            </td>
                            <td style="width: 75%;">
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$stu['high_sch']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; width: 25%; border-right: hidden;">
                                학과
                            </td>
                            <td style="width: 75%;">
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$stu['dept']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- 학기성적 -->
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top">
                    학기성적
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr style="font-size: 16px; text-align: center; height: 45px; letter-spacing: 1px;">
                            <td style="width: 25px; border-right: hidden;">
                                학년도
                            </td>
                            <td style="width: 15px; border-right: hidden;">
                                학기
                            </td>
                            <td style="width: 25px; border-right: hidden;">
                                학점
                            </td>
                            <td style="width: 30px; border-right: hidden;">
                                평점 평균
                            </td>
                            <td style="width: 35px;">
                                등급 평균
                            </td>
                        </tr>

                        <!-- 1-1 -->
                        <tr class="sem_11" style="font-size: 14px; text-align: center;">
                            <td style="border-right: hidden; height: 30px;">
                                <?=$stu['register_11']?>
                            </td>
                            <td style="border-right: hidden;">
                                1-1
                            </td>
                            <td style="border-right: hidden;">
                                <?=$ac['Credit']['Sum']['11']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($ac['GPA']['11'],2)?>
                            </td>
                            <td>
                                <?=number_format($ac['RankGrade_Avg']['11'], 2)?>
                            </td>
                        </tr>
                        <!-- 1-2 -->
                        <tr class="sem_12" style="font-size: 14px; text-align: center;">
                            <td style="border-right: hidden; height: 30px;">
                                <?=$stu['register_12']?>
                            </td>
                            <td style="border-right: hidden;">
                                1-2
                            </td>
                            <td style="border-right: hidden;">
                                <?=$ac['Credit']['Sum']['12']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($ac['GPA']['12'],2)?>
                            </td>
                            <td>
                                <?=number_format($ac['RankGrade_Avg']['12'], 2)?>
                            </td>
                        </tr>
                        <!-- 2-1 -->
                        <tr class="sem_21" style="font-size: 14px; text-align: center;">
                            <td style="border-right: hidden; height: 30px;">
                                <?=$stu['register_21']?>
                            </td>
                            <td style="border-right: hidden;">
                                2-1
                            </td>
                            <td style="border-right: hidden;">
                                <?=$ac['Credit']['Sum']['21']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($ac['GPA']['21'],2)?>
                            </td>
                            <td>
                                <?=number_format($ac['RankGrade_Avg']['21'], 2)?>
                            </td>
                        </tr>
                        <!-- 2-2 -->
                        <tr class="sem_22" style="font-size: 14px; text-align: center;">
                            <td style="border-right: hidden; height: 30px;">
                                <?=$stu['register_22']?>
                            </td>
                            <td style="border-right: hidden;">
                                2-2
                            </td>
                            <td style="border-right: hidden;">
                                <?=$ac['Credit']['Sum']['22']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($ac['GPA']['22'],2)?>
                            </td>
                            <td>
                                <?=number_format($ac['RankGrade_Avg']['22'], 2)?>
                            </td>
                        </tr>
                        <!-- 3-1 -->
                        <tr class="sem_31" style="font-size: 14px; text-align: center;">
                            <td style="border-right: hidden; height: 30px;">
                                <?=$stu['register_31']?>
                            </td>
                            <td style="border-right: hidden;">
                                3-1
                            </td>
                            <td style="border-right: hidden;">
                                <?=$ac['Credit']['Sum']['31']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($ac['GPA']['31'],2)?>
                            </td>
                            <td>
                                <?=number_format($ac['RankGrade_Avg']['31'], 2)?>
                            </td>
                        </tr>
                        <!-- 3-2 -->
                        <tr class="sem_32" style="font-size: 14px; text-align: center;">
                            <td style="border-right: hidden; height: 30px;">
                                <?=$stu['register_32']?>
                            </td>
                            <td style="border-right: hidden;">
                                3-2
                            </td>
                            <td style="border-right: hidden;">
                                <?=$ac['Credit']['Sum']['32']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($ac['GPA']['32'],2)?>
                            </td>
                            <td>
                                <?=number_format($ac['RankGrade_Avg']['32'], 2)?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- 졸업성적 -->
        <?php
        if($stu['isGraduate'] == 'Y'){
        ?>
        <table border="1" class="window" style="margin-top: 40px;">
                <tr align="center">
                    <td align="left" class="top">
                        졸업성적
                    </td>
                </tr>
                <tr align="center">
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                        <table border="1" class="content">
                            <tr>
                                <td style="height: 50px; border-right: hidden;">
                                    석차등급 평균
                                </td>
                                <td style="width: 25%; border-right: hidden;">
                                    <div class="input" style="vertical-align: middle; height: 31px; width: 120px;">
                                        <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                            <tr>
                                                <td>
                                                    <?=number_format($ac['RankGrade_Avg']['Merged'],2).'/9.00'?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td style="height: 50px; border-right: hidden;">
                                    평점 평균
                                </td>
                                <td style="width: 25%; border-right: hidden;">
                                    <div class="input" style="vertical-align: middle; height: 31px; width: 120px;">
                                        <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                            <tr>
                                                <td>
                                                    <?=number_format($ac['GPA']['Merged'],2).'/4.50'?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
        </table>
        <?php
        }
        ?>

        <!-- 과목성적 -->
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top">
                    과목성적
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content sub_11" style="font-size: 15px; display: none;">
                        <tr style="text-align: center; height: 60px;">
                            <td style="width: 6%; border-right: hidden;">
                                구분
                            </td>
                            <td style="width: 30%; border-right: hidden;">
                                과목
                            </td>
                            <td style="width: 6%; border-right: hidden;">
                                학점
                            </td>
                            <td style="width: 20%; border-right: hidden;">
                                원점수/과목평균<br>(표준편차)
                            </td>
                            <td style="width: 15.5%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 5%; border-right: hidden;">
                                평어
                            </td>
                            <td style="width: 8%; border-right: hidden;">
                                석차<br>등급
                            </td>
                        </tr>

                        <?php
                        foreach ($ac['Cat']['11'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$value?>
                                </td>
                                <td style="text-align: left; border-right: hidden;">
                                    <?=$ac['Name']['11'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Credit']['11'][$key]?>
                                </td>
                                <td style="border-right: hidden; text-align: left;">
                                    <?=$ac['Record']['11'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Rank']['11'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Grade']['11'][$key]?>
                                </td>
                                <td>
                                    <?=$ac['RankGrade']['11'][$key]?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                    </table>
                    <table border="1" class="content sub_12" style="font-size: 15px; display: none;">
                        <tr style="text-align: center; height: 60px;">
                            <td style="width: 6%; border-right: hidden;">
                                구분
                            </td>
                            <td style="width: 30%; border-right: hidden;">
                                과목
                            </td>
                            <td style="width: 6%; border-right: hidden;">
                                학점
                            </td>
                            <td style="width: 20%; border-right: hidden;">
                                원점수/과목평균<br>(표준편차)
                            </td>
                            <td style="width: 15.5%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 5%; border-right: hidden;">
                                평어
                            </td>
                            <td style="width: 8%; border-right: hidden;">
                                석차<br>등급
                            </td>
                        </tr>

                        <?php
                        foreach ($ac['Cat']['12'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$value?>
                                </td>
                                <td style="text-align: left; border-right: hidden;">
                                    <?=$ac['Name']['12'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Credit']['12'][$key]?>
                                </td>
                                <td style="border-right: hidden; text-align: left;">
                                    <?=$ac['Record']['12'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Rank']['12'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Grade']['12'][$key]?>
                                </td>
                                <td>
                                    <?=$ac['RankGrade']['12'][$key]?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                    </table>
                    <table border="1" class="content sub_21" style="font-size: 15px; display: none;">
                        <tr style="text-align: center; height: 60px;">
                            <td style="width: 6%; border-right: hidden;">
                                구분
                            </td>
                            <td style="width: 30%; border-right: hidden;">
                                과목
                            </td>
                            <td style="width: 6%; border-right: hidden;">
                                학점
                            </td>
                            <td style="width: 20%; border-right: hidden;">
                                원점수/과목평균<br>(표준편차)
                            </td>
                            <td style="width: 15.5%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 5%; border-right: hidden;">
                                평어
                            </td>
                            <td style="width: 8%; border-right: hidden;">
                                석차<br>등급
                            </td>
                        </tr>

                        <?php
                        foreach ($ac['Cat']['21'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$value?>
                                </td>
                                <td style="text-align: left; border-right: hidden;">
                                    <?=$ac['Name']['21'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Credit']['21'][$key]?>
                                </td>
                                <td style="border-right: hidden; text-align: left;">
                                    <?=$ac['Record']['21'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Rank']['21'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Grade']['21'][$key]?>
                                </td>
                                <td>
                                    <?=$ac['RankGrade']['21'][$key]?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                    </table>
                    <table border="1" class="content sub_22" style="font-size: 15px; display: none;">
                        <tr style="text-align: center; height: 60px;">
                            <td style="width: 6%; border-right: hidden;">
                                구분
                            </td>
                            <td style="width: 30%; border-right: hidden;">
                                과목
                            </td>
                            <td style="width: 6%; border-right: hidden;">
                                학점
                            </td>
                            <td style="width: 20%; border-right: hidden;">
                                원점수/과목평균<br>(표준편차)
                            </td>
                            <td style="width: 15.5%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 5%; border-right: hidden;">
                                평어
                            </td>
                            <td style="width: 8%; border-right: hidden;">
                                석차<br>등급
                            </td>
                        </tr>

                        <?php
                        foreach ($ac['Cat']['22'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$value?>
                                </td>
                                <td style="text-align: left; border-right: hidden;">
                                    <?=$ac['Name']['22'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Credit']['22'][$key]?>
                                </td>
                                <td style="border-right: hidden; text-align: left;">
                                    <?=$ac['Record']['22'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Rank']['22'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Grade']['22'][$key]?>
                                </td>
                                <td>
                                    <?=$ac['RankGrade']['22'][$key]?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                    </table>
                    <table border="1" class="content sub_31" style="font-size: 15px; display: none;">
                        <tr style="text-align: center; height: 60px;">
                            <td style="width: 6%; border-right: hidden;">
                                구분
                            </td>
                            <td style="width: 30%; border-right: hidden;">
                                과목
                            </td>
                            <td style="width: 6%; border-right: hidden;">
                                학점
                            </td>
                            <td style="width: 20%; border-right: hidden;">
                                원점수/과목평균<br>(표준편차)
                            </td>
                            <td style="width: 15.5%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 5%; border-right: hidden;">
                                평어
                            </td>
                            <td style="width: 8%; border-right: hidden;">
                                석차<br>등급
                            </td>
                        </tr>

                        <?php
                        foreach ($ac['Cat']['31'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$value?>
                                </td>
                                <td style="text-align: left; border-right: hidden;">
                                    <?=$ac['Name']['31'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Credit']['31'][$key]?>
                                </td>
                                <td style="border-right: hidden; text-align: left;">
                                    <?=$ac['Record']['31'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Rank']['31'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Grade']['31'][$key]?>
                                </td>
                                <td>
                                    <?=$ac['RankGrade']['31'][$key]?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>


                    </table>
                    <table border="1" class="content sub_32" style="font-size: 15px; display: none;">
                        <tr style="text-align: center; height: 60px;">
                            <td style="width: 6%; border-right: hidden;">
                                구분
                            </td>
                            <td style="width: 30%; border-right: hidden;">
                                과목
                            </td>
                            <td style="width: 6%; border-right: hidden;">
                                학점
                            </td>
                            <td style="width: 20%; border-right: hidden;">
                                원점수/과목평균<br>(표준편차)
                            </td>
                            <td style="width: 15.5%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 5%; border-right: hidden;">
                                평어
                            </td>
                            <td style="width: 8%; border-right: hidden;">
                                석차<br>등급
                            </td>
                        </tr>

                        <?php
                        foreach ($ac['Cat']['32'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$value?>
                                </td>
                                <td style="text-align: left; border-right: hidden;">
                                    <?=$ac['Name']['32'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Credit']['32'][$key]?>
                                </td>
                                <td style="border-right: hidden; text-align: left;">
                                    <?=$ac['Record']['32'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Rank']['32'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$ac['Grade']['32'][$key]?>
                                </td>
                                <td>
                                    <?=$ac['RankGrade']['32'][$key]?>
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
    <!-- 버튼 -->
    <div style="height: 50px; width: 160px; margin: auto; margin-top: 10px; margin-bottom: 10px;">
        <button style="letter-spacing: 2px;" onclick="location.href='../'" class="cancel">
            홈으로
        </button>
    </div>
    <?php
        }else{
    ?>
    <!-- 학생이 아니면 -->
    <script>location.href="../"</script>
    <?php
        }
    }else{
    ?>
    <!-- 로그인 안했으면 -->
    <script>location.href="../"</script>
    <?php
    }
    ?>
</div>
</body>
</html>
