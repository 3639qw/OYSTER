<?php
session_start();
set_time_limit(300);
require_once "../lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();
$con = mysqli_connect("152.70.236.30:3306","3639qw","134679qw","academy");

$id = $_GET['id'];
$year = $_GET['year'];

$sql = "
SELECT
(SELECT korean_code FROM SAT.sat_record sr where sr.id = a.id and sr.apply_year = a.apply_year)Korean_Code,
(SELECT math_code FROM SAT.sat_record sr where sr.id = a.id and sr.apply_year = a.apply_year)Math_Code
from SAT.sat_record a
WHERE a.apply_year = '".$year."'
AND a.id = '".$id."';
";
$row = mysqli_fetch_assoc(mysqli_query($con,$sql));


$sat = $ac_record->sat->SAT_Exam($year,'Y','Y',$row['Korean_Code'],$row['Math_Code']);


// http://152.70.233.241/academy/record/sat/?id=2020-11002974&year=2020
// http://152.70.233.241/academy/record/sat/stats.php?year=2020&kor_code=2020-11&math_code=2020-11

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SAT Record</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="rank_list.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./index.css">
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
    <!-- 성적공고 -->
    <div class="second_section" style="width: 750px;">

        <!-- 타이틀 -->
        <table border="0" class="title">
            <tr align="center">
                <td style="letter-spacing: 2px; font-size: 35px; font-weight: bold;">
                    Korean SAT 성적 조회
                </td>
            </tr>
        </table>

        <!-- 응시 학년도 -->
        <table border="1" class="window" style="margin-top: 30px;">
            <tr align="center">
                <td align="left" class="top">
                    응시연도
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 50px; width: 25%; padding-left: 10px;">
                                <?=$year?>학년도 Korean SAT
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
                    인적 · 학적사항
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 50px; width: 25%; border-right: hidden;">
                                응시번호
                            </td>
                            <td style="width: 75%;">
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$id?>
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

        <!-- Korean SAT 성적 -->
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top">
                    Korean SAT 성적
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr style="font-size: 16px; text-align: center; height: 45px; letter-spacing: 1px;">
                            <td style="width: 25%; border-right: hidden;">
                                영역
                            </td>
                            <td style="width: 25%; border-right: hidden;">
                                국어
                            </td>
                            <td style="width: 25%; border-right: hidden;">
                                수학
                            </td>
                            <td style="width: 25%; border-right: hidden;">
                                종합
                            </td>
                        </tr>

                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                원점수
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['record']['kor']['raw'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['record']['math']['raw'][$id]?>
                            </td>
                            <td style="border-right: hidden;">

                            </td>
                        </tr>
                        <tr style="font-size: 15px; text-align: center; height: 30px; color: #40a3d5;">
                            <td style="border-right: hidden;">
                                표준점수
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['record']['kor']['std'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['record']['math']['std'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['record']['merged']['std'][$id]?>
                            </td>
                        </tr>
                        <tr style="font-size: 15px; text-align: center; height: 30px; color: #40a3d5;">
                            <td style="border-right: hidden;">
                                백분위
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Percentile']['kor'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Percentile']['math'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Percentile']['merged'][$id]?>
                            </td>
                        </tr>
                        <tr style="font-size: 15px; text-align: center; height: 30px; color: #40a3d5;">
                            <td style="border-right: hidden;">
                                등급
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Grade']['kor'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Grade']['math'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Grade']['merged'][$id]?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                응시자수
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($sat['sum']['kor']['count'])?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($sat['sum']['math']['count'])?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=number_format($sat['sum']['merged']['count'])?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                보정 석차
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Rank']['kor'][$id]+($sat['Tie']['kor'][$sat['record']['kor']['std'][$id]] / 2)?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Rank']['math'][$id]+($sat['Tie']['math'][$sat['record']['math']['std'][$id]] / 2)?>
                            </td>
                            <td style="border-right: hidden;">

                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                등급 석차
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Rank']['kor'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Rank']['math'][$id]?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Rank']['merged'][$id]?>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>

    </div>

</div>
</body>
</html>
