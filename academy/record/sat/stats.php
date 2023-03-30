<?php

error_reporting( E_ERROR );
ini_set( "display_errors", 1 );

session_start();
set_time_limit(300);

require_once "../lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();

$exam_year = $_GET['year'];
$kor_code = $_GET['kor_code'];
$math_code = $_GET['math_code'];


$sat = $ac_record->sat->SAT_Exam($exam_year,'Y','Y',$kor_code,$math_code);


// http://152.70.233.241/academy/record/sat/stats.php?year=2020&kor_code=2020-11&math_code=2020-11

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>대학수학능력시험 성적분석</title>
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

        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .page {
                /*margin: 0;*/
                /*border: initial;*/
                /*border-radius: initial;*/
                /*width: initial;*/
                /*min-height: initial;*/
                /*box-shadow: initial;*/
                /*background: initial;*/
                page-break-after: always;
            }
        }

    </style>
</head>
<body>



<div class="first_section">
    <!-- 성적공고 -->
    <div class="second_section" style="width: 750px;">

        <div class="page">

        <!-- 타이틀 -->
        <table border="0" class="title">
            <tr align="center">
                <td style="letter-spacing: 2px; font-size: 35px; font-weight: bold;">
                    대학수학능력시험 성적분석
                </td>
            </tr>
        </table>

        <!-- 산출정보 -->
        <table border="1" class="window" style="margin-top: 30px;">
            <tr align="center">
                <td align="left" class="top">
                    산출정보
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 50px; width: 25%; padding-left: 10px;">
                                <?=$exam_year?>학년도 대학수학능력시험
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; width: 25%; padding-left: 10px;">
                                국어영역 선택과목코드: <?=$kor_code?>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; width: 25%; padding-left: 10px;">
                                수학영역 선택과목코드: <?=$math_code?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- 참고치 -->
        <table border="1" class="window" style="margin-top: 30px;">
            <tr align="center">
                <td align="left" class="top">
                    참고치
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td colspan="2" style="height: 50px; width: 25%; border-right: hidden;">
                                국어 영역
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; width: 25%; border-right: hidden;">
                                μ
                            </td>
                            <td style="width: 75%;">
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$sat['AS']['kor']['Average']?>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; width: 25%; border-right: hidden;">
                                σ
                            </td>
                            <td style="width: 75%;">
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$sat['AS']['kor']['SD']?>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; border-right: hidden;">
                                N
                            </td>
                            <td>
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=number_format($sat['sum']['kor']['count'])?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 50px; width: 25%; border-right: hidden;">
                                수학 영역
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; border-right: hidden;">
                                μ
                            </td>
                            <td>
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$sat['AS']['math']['Average']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; border-right: hidden;">
                                σ
                            </td>
                            <td>
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=$sat['AS']['math']['SD']?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 50px; border-right: hidden;">
                                N
                            </td>
                            <td>
                                <div class="input" style="vertical-align: middle; height: 31px;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                        <tr>
                                            <td>
                                                <?=number_format($sat['sum']['math']['count'])?>
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

        </div>

        <div class="page">
        <!-- 등급별 분포도 -->
        <table border="1" class="window page">
            <tr align="center">
                <td align="left" class="top">
                    등급별 분포도
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <div>
                        <table><tr><td>국어 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">1<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['1'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['1']*3?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">2<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['2'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['2']*3?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">3<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['3'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['3']*3?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">4<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['4'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['4']*3?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">5<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['5'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['5']*3?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">6<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['6'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['6']*3?>%; background-color: rgb(255,194,000); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">7<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['7'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['7']*3?>%; background-color: rgb(255,001,002); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">8<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['8'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['8']*3?>%; background-color: rgb(194,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">9<br><?=round($sat['Statistics']['등급 급간별 비율']['kor']['9'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['kor']['9']*3?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <table><tr><td style="color: black;">수학 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">1<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['1'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['1']*3?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">2<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['2'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['2']*3?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">3<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['3'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['3']*3?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">4<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['4'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['4']*3?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">5<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['5'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['5']*3?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">6<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['6'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['6']*3?>%; background-color: rgb(255,194,000); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">7<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['7'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['7']*3?>%; background-color: rgb(255,001,002); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">8<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['8'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['8']*3?>%; background-color: rgb(194,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">9<br><?=round($sat['Statistics']['등급 급간별 비율']['math']['9'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['math']['9']*3?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <table><tr><td style="color: black;">종합 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">1<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['1'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['1']*3?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">2<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['2'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['2']*3?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">3<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['3'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['3']*3?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">4<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['4'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['4']*3?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">5<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['5'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['5']*3?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">6<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['6'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['6']*3?>%; background-color: rgb(255,194,000); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">7<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['7'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['7']*3?>%; background-color: rgb(255,001,002); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">8<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['8'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['8']*3?>%; background-color: rgb(194,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 11.1111%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">9<br><?=round($sat['Statistics']['등급 급간별 비율']['merged']['9'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['등급 급간별 비율']['merged']['9']*3?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        </div>

        <div class="page">
        <!-- 표준점수별 분포도 -->
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top">
                    표준점수별 분포도
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <div>
                        <table><tr><td>국어 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">< 60<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['50'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['50']*2?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 69<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['60'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['60']*2?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 79<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['70'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['70']*2?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 89<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['80'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['80']*2?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 99<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['90'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['90']*2?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 109<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['100'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['100']*2?>%; background-color: rgb(241,199,63); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 119<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['110'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['110']*2?>%; background-color: rgb(255,106,0); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 129<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['120'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['120']*2?>%; background-color: rgb(255,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 139<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['130'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['130']*2?>%; background-color: rgb(166,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 149<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['140'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['140']*2?>%; background-color: rgb(66,30,30); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">150 <=<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['150'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['kor']['150']*2?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table style="color: black;"><tr><td>수학 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">< 60<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['50'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['50']*2?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 69<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['60'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['60']*2?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 79<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['70'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['70']*2?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 89<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['80'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['80']*2?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 99<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['90'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['90']*2?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 109<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['100'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['100']*2?>%; background-color: rgb(241,199,63); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 119<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['110'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['110']*2?>%; background-color: rgb(255,106,0); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 129<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['120'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['120']*2?>%; background-color: rgb(255,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 139<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['130'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['130']*2?>%; background-color: rgb(166,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 149<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['140'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['140']*2?>%; background-color: rgb(66,30,30); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">150 <=<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['math']['150'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['math']['150']*2?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table style="color: black;"><tr><td>종합 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">< 60<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['50'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['50']*2?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 69<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['60'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['60']*2?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 79<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['70'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['70']*2?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 89<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['80'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['80']*2?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 99<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['90'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['90']*2?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 109<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['100'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['100']*2?>%; background-color: rgb(241,199,63); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 119<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['110'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['110']*2?>%; background-color: rgb(255,106,0); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 129<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['120'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['120']*2?>%; background-color: rgb(255,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 139<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['130'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['130']*2?>%; background-color: rgb(166,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 149<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['140'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['140']*2?>%; background-color: rgb(66,30,30); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 9.090909090909091%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">150 <=<br><?=round($sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['150'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['표준점수 급간별 비율']['percent']['merged']['150']*2?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        </div>

        <div class="page">
        <!-- 원점수별 분포도 -->
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top">
                    원점수별 분포도
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <div>
                        <table><tr><td>국어 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 9<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['0'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['0']*1.5?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 19<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['1'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['1']*1.5?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 29<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['2'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['2']*1.5?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 39<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['3'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['3']*1.5?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 49<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['4'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['4']*1.5?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 59<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['5'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['5']*1.5?>%; background-color: rgb(255,194,000); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 69<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['6'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['6']*1.5?>%; background-color: rgb(255,0,0); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 79<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['7'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['7']*1.5?>%; background-color: rgb(147,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 89<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['8'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['8']*1.5?>%; background-color: rgb(77,37,37); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 100<br><?=round($sat['Statistics']['원점수 급간별 비율']['kor']['9'],1)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['kor']['9']*1.5?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 10px;">
                        <table><tr><td style="color: black;">수학 영역</td></tr></table>
                        <div style="height: 300px; width: 89%; background-color: transparent;">
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 9<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['0'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['0']*1.5?>%; background-color: rgb(000,112,112); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 19<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['1'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['1']*1.5?>%; background-color: rgb(000,175,240); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 29<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['2'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['2']*1.5?>%; background-color: rgb(000,175,080); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 39<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['3'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['3']*1.5?>%; background-color: rgb(147,208,078); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 49<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['4'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['4']*1.5?>%; background-color: rgb(162,255,001); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 59<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['5'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['5']*1.5?>%; background-color: rgb(255,194,000); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 69<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['6'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['6']*1.5?>%; background-color: rgb(255,0,0); position: absolute; bottom: 00%;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 79<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['7'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['7']*1.5?>%; background-color: rgb(147,0,0); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 89<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['8'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['8']*1.5?>%; background-color: rgb(77,37,37); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                            <div style="float: left; width: 10%; height: 100%; background-color: transparent; display: inline; position: relative;">
                                <a style="color: black;">~ 100<br><?=round($sat['Statistics']['원점수 급간별 비율']['math']['9'],2)?></a>
                                <div style="width: 100%; height: <?=$sat['Statistics']['원점수 급간별 비율']['math']['9']*1.5?>%; background-color: rgb(000,000,000); position: absolute; bottom: 00%;"><a style="color: white;"></div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        </div>

        <div class="page">
        <!-- 표준점수 등급컷 -->
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top">
                    등급컷
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; border-bottom: hidden;">
                    <a style="text-align: left;">표준점수</a>
                    <table border="1" class="content">
                        <tr style="font-size: 16px; text-align: center; height: 45px; letter-spacing: 1px;">
                            <td style="width: 10%; border-right: hidden;">
                                등급
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                1
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                2
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                3
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                4
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                5
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                6
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                7
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                8
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                9
                            </td>
                        </tr>

                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                국어
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['kor']['9']?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                수학
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['math']['9']?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                종합
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['표준점수']['merged']['9']?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 10px; border-bottom: hidden;">
                    원점수
                    <table border="1" class="content">
                        <tr style="font-size: 16px; text-align: center; height: 45px; letter-spacing: 1px;">
                            <td style="width: 10%; border-right: hidden;">
                                등급
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                1
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                2
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                3
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                4
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                5
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                6
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                7
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                8
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                9
                            </td>
                        </tr>

                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                국어
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['kor']['9']?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                수학
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['원점수']['math']['9']?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 10px; padding-bottom: 35px;">
                    백분위
                    <table border="1" class="content">
                        <tr style="font-size: 16px; text-align: center; height: 45px; letter-spacing: 1px;">
                            <td style="width: 10%; border-right: hidden;">
                                등급
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                1
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                2
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                3
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                4
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                5
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                6
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                7
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                8
                            </td>
                            <td style="width: 10%; border-right: hidden;">
                                9
                            </td>
                        </tr>

                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                국어
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['kor']['9']?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                수학
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['math']['9']?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                종합
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['1']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['2']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['3']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['4']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['5']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['6']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['7']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['8']?>
                            </td>
                            <td style="border-right: hidden;">
                                <?=$sat['Statistics']['등급컷']['백분위']['merged']['9']?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px; text-align: center; height: 27px;">
                            <td style="border-right: hidden;">
                                표준
                            </td>
                            <td style="border-right: hidden;">
                                96
                            </td>
                            <td style="border-right: hidden;">
                                89
                            </td>
                            <td style="border-right: hidden;">
                                77
                            </td>
                            <td style="border-right: hidden;">
                                60
                            </td>
                            <td style="border-right: hidden;">
                                40
                            </td>
                            <td style="border-right: hidden;">
                                23
                            </td>
                            <td style="border-right: hidden;">
                                11
                            </td>
                            <td style="border-right: hidden;">
                                4
                            </td>
                            <td style="border-right: hidden;">
                                4 >
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        </div>

        <div class="page">
            <!-- 원점수별 통계자료 -->
            <table border="1" class="window">
                <tr align="center">
                    <td align="left" class="top" colspan="2">
                        원점수별 통계자료
                    </td>
                </tr>
                <tr align="center">
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px; border-right: hidden; vertical-align: top;">
                        <table border="1" class="content" style="width: 89%; float: right;">
                            <tr style="font-size: 14px; text-align: center; height: 45px; letter-spacing: 1px;">
                                <td style="width: 10%; border-right: hidden;">
                                    국어<br>원점수
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    도수
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    표준점수
                                </td>
                            </tr>
                            <?php
                            foreach ($sat['Statistics']['원점수별 표준점수']['kor'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$key?>
                                </td>
                                <td style="border-right: hidden; text-align: center;">
                                    <?=$sat['Statistics']['원점수 급간별 비율']['percent']['kor'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$value?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </td>
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px; vertical-align: top;">
                        <table border="1" class="content" style="width: 89%; float: left;">
                            <tr style="font-size: 14px; text-align: center; height: 45px; letter-spacing: 1px;">
                                <td style="width: 10%; border-right: hidden;">
                                    수학<br>원점수
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    도수
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    표준점수
                                </td>
                            </tr>
                            <?php
                            foreach ($sat['Statistics']['원점수별 표준점수']['math'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$key?>
                                </td>
                                <td style="border-right: hidden; text-align: center;">
                                    <?=$sat['Statistics']['원점수 급간별 비율']['percent']['math'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$value?>
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

        <div class="page">
            <!-- 표준점수별 통계자료 -->
            <table border="1" class="window">
                <tr align="center">
                    <td align="left" class="top" colspan="2">
                        표준점수별 통계자료
                    </td>
                </tr>
                <tr align="center">
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px; border-right: hidden; vertical-align: top;">
                        <table border="1" class="content" style="width: 89%; float: right;">
                            <tr style="font-size: 14px; text-align: center; height: 45px; letter-spacing: 1px;">
                                <td style="width: 10%; border-right: hidden;">
                                    국어<br>표준점수
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    도수<br>비율
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    백분위
                                </td>
                                <td style="width: 5%; border-right: hidden;">
                                    등급
                                </td>
                            </tr>
                            <?php
                            foreach ($sat['Statistics']['표준점수 급간별 비율']['all']['count']['kor'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$key?>
                                </td>
                                <td style="border-right: hidden; text-align: center;">
                                    <?=$sat['Statistics']['표준점수 급간별 비율']['all']['percent']['kor'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$sat['Statistics']['표준점수별 백분위']['kor'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$sat['Statistics']['표준점수별 등급']['kor'][$key]?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </td>
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px; vertical-align: top;">
                        <table border="1" class="content" style="width: 89%; float: left;">
                            <tr style="font-size: 14px; text-align: center; height: 45px; letter-spacing: 1px;">
                                <td style="width: 10%; border-right: hidden;">
                                    수학<br>표준점수
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    도수<br>비율
                                </td>
                                <td style="width: 10%; border-right: hidden;">
                                    백분위
                                </td>
                                <td style="width: 5%; border-right: hidden;">
                                    등급
                                </td>
                            </tr>
                            <?php
                            foreach ($sat['Statistics']['표준점수 급간별 비율']['all']['count']['math'] as $key => $value){
                            ?>
                            <tr style="font-size: 14px; text-align: center; height: 27px;">
                                <td style="border-right: hidden;">
                                    <?=$key?>
                                </td>
                                <td style="border-right: hidden; text-align: center;">
                                    <?=$sat['Statistics']['표준점수 급간별 비율']['all']['percent']['math'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$sat['Statistics']['표준점수별 백분위']['math'][$key]?>
                                </td>
                                <td style="border-right: hidden;">
                                    <?=$sat['Statistics']['표준점수별 등급']['math'][$key]?>
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
</div>
</body>
</html>

<?php


//echo '<pre>';
//print_r($sat);
//echo '</pre>';


?>
