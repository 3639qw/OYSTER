<?php
session_start();
error_reporting( E_ERROR );
ini_set( "display_errors", 1 );
require_once "../lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();

// 학생 정보
$stu = $ac_record->magic_eye->Select_Student();


// $ac: 공통변수
require_once "../script/Common_Storage.php";
// $ac_1: 성적변수
require_once "./Rank_Storage.php";


$range = $_GET['range'];
$year = substr($_GET['range'],0,1);
$sem = substr($_GET['range'],-1);

// 증명발급 보안사항 검증
$verify = $ac_record->magic_eye;
$ck_login = $verify->ck_Login($_SESSION['level']);

$ck_identity = $verify->ck_Student_Identity($_GET['birth'],$_GET['name'],$_GET['stuid'],$_GET['initial']);



// 일반: http://record.juyong.kr/report_card/rank.php?stuid=22851192&name=%EC%9D%B4%EC%A3%BC%EC%9A%A9&birth=2003-05-16&range=11
// 임시: http://web.juyong.kr/academy/record/report_card/rank.php?stuid=22851041&name=%EC%9D%B4%EC%A3%BC%EC%9A%A9&birth=2003-05-16&range=12&sch=%EC%84%B8%EB%AA%85%EC%BB%B4%ED%93%A8%ED%84%B0%EA%B3%A0%EB%93%B1%ED%95%99%EA%B5%90&initial=SMC


if($ck_identity){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>학업성적표</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="/antidrag.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            /*background-color: #FAFAFA;*/
            font-family: 'Nanum Myeongjo', serif;
            font-weight: bold;
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
        <!-- 학업성적표(4.5 Scale평점) $ac_1 -->
        <div class="page" style="display: block;">
            <!-- 성적증명서(평점) 타이틀 -->
            <table border="0" cellpadding="0" style="height: 100px; width: 100%;  padding-top: 0px;">
                <tr>
                    <td colspan="2" style="text-align: center; font-size: 25px;">
                        <a style="letter-spacing: 10px;">학업성적표</a>
                    </td>
                </tr>
                <tr>
                    <td style="height: 20%; width: 80%; text-align: left; font-size: 15px; padding-bottom: 5px;">
                        <?=$stu['high_sch']?>
                    </td>
                    <td style="text-align: right; font-size: 15px; padding-right: 10px; padding-bottom: 5px;">
                        <?=$stu['register_'.$range].'학년도&nbsp;&nbsp;&nbsp;&nbsp; '.$sem.'학기'?>
                    </td>
                </tr>
            </table>

            <!-- 굵은 테두리 -->
            <table border="1" cellpadding="0" style="width: 100%;  border: #000000 inset 2px;">
                <tr style="height: 965px;">
                    <td>
                        <table border="0" cellpadding="0" style="width: 100%; height: 800px; padding-top: 0px; ">
                            <tr>
                                <td style="text-align: center; font-size: 20px;">
                                    <!-- 학적사항 -->
                                    <table border="1" cellpadding="0" style="width: 100%; height: 23px; font-size: 13px; border: #000000 solid 1px; letter-spacing: 1.3px; text-align: center;">
                                        <tr>
                                            <td style="width: 8%; border-left: hidden; border-top: hidden; letter-spacing: 2px;">
                                                학&nbsp;과
                                            </td>
                                            <td style="width: 30%; border-top: hidden; text-align: left; padding-left: 5px;">
                                                <?=$stu['dept']?>
                                            </td>
                                            <td style="width: 8%; border-top: hidden; letter-spacing: 2px;">
                                                학&nbsp;번
                                            </td>
                                            <td style="width: 20%; border-top: hidden;">
                                                <?=$stu['stuid']?>
                                            </td>
                                            <td style="width: 8%; border-top: hidden; letter-spacing: 2px;">
                                                성&nbsp;명
                                            </td>
                                            <td style="width: 15%; border-right: hidden; border-top: hidden;">
                                                <?=$stu['name']?>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- 성적기록 -->
                                    <table border="0" cellpadding="0" style="width: 100%; height: 797px;">
                                        <tr>
                                            <td>
                                                <div style="width: 100%; height: 100%;">

                                                    <!-- 학업성적 -->
                                                    <div style="width: 100%; height: 100%; float: left;">
                                                        <table border="1" style="text-align: center; width: 100%; font-size: 11px;">
                                                            <tr>
                                                                <td style="width: 5%; border-bottom: #000000 solid 1px; font-size: 11px; border-left: hidden; border-top: hidden;">
                                                                    일련<br>번호
                                                                </td>
                                                                <td style="width: 9%; border-bottom: #000000 solid 1px; font-size: 12px; border-top: hidden; letter-spacing: 3px;">
                                                                    교&nbsp;과
                                                                </td>
                                                                <td style="width: 43.15%; border-bottom: #000000 solid 1px; font-size: 12px; letter-spacing: 15px; border-top: hidden;">
                                                                    교과목
                                                                </td>
                                                                <td style="width: 5%; border-bottom: #000000 solid 1px; font-size: 12px; border-top: hidden;">
                                                                    학점
                                                                </td>
                                                                <td style="width: 12%; border-bottom: #000000 solid 1px; font-size: 12px; border-top: hidden;">
                                                                    석 차
                                                                </td>
                                                                <td style="width: 5%; border-bottom: #000000 solid 1px; font-size: 11px; border-top: hidden;">
                                                                    석차<br>등급
                                                                </td>
                                                                <td style="text-align: left; padding-left: 5px; border-bottom: #000000 solid 1px; font-size: 11px; border-right: hidden; border-top: hidden;">
                                                                    원점수/과목평균<br>(표준편차)
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $count = 1;
                                                            foreach ($ac['Cat'][$range] as $key => $value){
                                                            ?>
                                                            <tr style="font-size: 12px;">
                                                                <td style="height: 25px; border-left: hidden;">
                                                                    <?=$count?>
                                                                </td>
                                                                <td style="text-align: left; padding-left: 5px;">
                                                                    <?=$ac['Sort'][$range][$key]?>
                                                                </td>
                                                                <td style="text-align: left; padding-left: 5px;">
                                                                    <?=$ac['Name'][$range][$key]?>
                                                                </td>
                                                                <td>
                                                                    <?=number_format($ac['Credit'][$range][$key],1)?>
                                                                </td>
                                                                <td style="text-align: left; padding-left: 5px;">
                                                                    <?=$ac_1['Rank'][$key]?>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <?=$ac_1['Grade'][$key]?>
                                                                </td>
                                                                <td style="border-right: hidden; text-align: left; padding-left: 5px;">
                                                                    <?=$ac_1['Record'][$key]?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                $count++;
                                                            }
                                                            ?>
                                                        </table>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table border="1" cellpadding="0" style="width: 100%; height: 145px; padding-top: 0px; border: #000000 solid 1px;">
                            <tr style="font-size: 13px;">
                                <td style="width: 20%; height: 15%; text-align: center; border-left: hidden;">
                                    등 급 평 균
                                </td>
                                <td style="width: 20%; text-align: center;">
                                    등 급 계
                                </td>
                                <td style="width: 20%; text-align: center;">
                                    이 수 학 점
                                </td>
                                <td rowspan="2" style="width: 09%; text-align: center;">
                                    비고
                                </td>
                                <td rowspan="2" style="width: 31%; border-right: hidden;">

                                </td>
                            </tr>
                            <tr style="text-align: center; font-size: 13px;">
                                <td style="border-left: hidden; height: 15%;">
                                    <?=number_format($ac_1['RG_Avg'][$range],2)?>
                                </td>
                                <td>
                                    <?=$ac_1['RG_sum'][$range]?>
                                </td>
                                <td>
                                    <?=$ac['Credit']['Sum'][$range]?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" style="text-align: left; height: 50%; font-size: 9px; vertical-align: middle; border-right: hidden; border-left: hidden; border-bottom: hidden; letter-spacing: 1px;">
                                    <div style="float: left; width: 100%; height: 30%;">
                                        <table style="width: 100%; height: 100%;">
                                            <tr>
                                                <td style="font-size: 13px; text-align: left; padding-left: 5px;">
                                                    - 학업성적분류표
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float: left; width: 25%; height: 55%;">
                                        <table border="0" style="width: 100%; height: 100%; font-size: 12px;">
                                            <tr style="height: 33.3333%;">
                                                <td style="width: 20px;">

                                                </td>
                                                <td style="text-align: left;">
                                                    1
                                                </td>
                                                <td style="">
                                                    4%
                                                </td>
                                                <td style="">
                                                    0-4%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">
                                                    5
                                                </td>
                                                <td>
                                                    20%
                                                </td>
                                                <td>
                                                    40.01-60%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">
                                                    9
                                                </td>
                                                <td>
                                                    4%
                                                </td>
                                                <td>
                                                    96.01-100%
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float: left; width: 25%; height: 55%;">
                                        <table border="0" style="width: 100%; height: 100%; font-size: 12px;">
                                            <tr style="height: 33.3333%;">
                                                <td style="width: 20px;">

                                                </td>
                                                <td style="text-align: left;">
                                                    2
                                                </td>
                                                <td style="">
                                                    7%
                                                </td>
                                                <td style="">
                                                    4.01-11%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">
                                                    6
                                                </td>
                                                <td>
                                                    17%
                                                </td>
                                                <td>
                                                    60.01-77%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">
                                                    P
                                                </td>
                                                <td>
                                                    
                                                </td>
                                                <td>
                                                    합격
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float: left; width: 25%; height: 55%;">
                                        <table border="0" style="width: 100%; height: 100%; font-size: 12px;">
                                            <tr style="height: 33.3333%;">
                                                <td style="width: 20px;">

                                                </td>
                                                <td style="text-align: left;">
                                                    3
                                                </td>
                                                <td style="">
                                                    12%
                                                </td>
                                                <td style="">
                                                    11.01-23%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">
                                                    7
                                                </td>
                                                <td>
                                                    12%
                                                </td>
                                                <td>
                                                    77.01-89%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">
                                                    NP
                                                </td>
                                                <td>

                                                </td>
                                                <td>
                                                    불합격
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float: left; width: 25%; height: 55%;">
                                        <table border="0" style="width: 100%; height: 100%; font-size: 12px;">
                                            <tr style="height: 33.3333%;">
                                                <td style="width: 20px;">

                                                </td>
                                                <td style="text-align: left;">
                                                    4
                                                </td>
                                                <td style="">
                                                    17%
                                                </td>
                                                <td style="">
                                                    23.01-40%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">
                                                    8
                                                </td>
                                                <td>
                                                    7%
                                                </td>
                                                <td>
                                                    89.01-96%
                                                </td>
                                            </tr>
                                            <tr style="height: 33.3333%;">
                                                <td>

                                                </td>
                                                <td style="text-align: left;">

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float: left; width: 100%; height: 15%;">

                                    </div>
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
<?php
}else{
    echo("<script>alert('해당하는 학생은 없습니다')</script>
    <script>history.back()</script>
    ");
}
?>