<?php
session_start();
error_reporting( E_ERROR );
ini_set( "display_errors", 1 );
require_once "../lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();

// 학생 정보
$stu = $ac_record->magic_eye->Select_Student();


// 증명발급 보안사항 검증
$verify = $ac_record->magic_eye;
$ck_login = $verify->ck_Login($_SESSION['level']);

$ck_identity = $verify->ck_Student_Identity($_GET['birth'],$_GET['name'],$_GET['stuid'],$_GET['initial']);

//echo '<pre>';
//print_r($stu);
//echo '</pre>';

// https://web.juyong.kr/academy/record/script/student.php?stuid=22851192&name=%EC%9D%B4%EC%A3%BC%EC%9A%A9&birth=2003-05-16

if(true){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>학적증명서</title>
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
            font-weight: bold;
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
        <!-- 학적증명서 -->
        <div class="page" style="display: block;">
            <!-- 타이틀 -->
            <table border="0" cellpadding="0" style="height: 100px; width: 100%;  padding-top: 0px;">
                <tr>
                    <td style="text-align: center; font-size: 30px;">
                        <a style="letter-spacing: 10px;">학적증명서</a>
                    </td>
                </tr>
            </table>

            <!-- 굵은 테두리 -->
            <table border="1" cellpadding="0" style="width: 100%;  border: #000000 inset 2px;">
                <tr style="height: 965px;">
                    <td>
                        <table border="0" cellpadding="0" style="width: 100%; height: auto; padding-top: 0px;">
                            <tr>
                                <td style="text-align: center; font-size: 20px;">
                                    <!-- 학적사항 -->
                                    <table border="1" cellpadding="0" style="width: 100%; height: 730px; font-size: 13px; border: #000000 solid 1px; letter-spacing: 1.3px; text-align: center;">
                                        <tr style="border-top: hidden;">
                                            <td style="border-left: hidden; height: 35px;">
                                                학번
                                            </td>
                                            <td style="text-align: left; padding-left: 5px;  font-size: 12px;">
                                                22851041
                                            </td>
                                            <td>
                                                학과
                                            </td>
                                            <td colspan="3" style="text-align: left; padding-left: 5px; font-size: 12px;">
                                                소프트웨어공학
                                            </td>
                                            <td>
                                                입학년월일
                                            </td>
                                            <td style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 12px;">
                                                2019년 3월 2일
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: hidden; height: 35px; width: 8%;">
                                                성명
                                            </td>
                                            <td style="text-align: left; padding-left: 5px; width: 12%; font-size: 12px;">
                                                이주용
                                            </td>
                                            <td style="width: 10%;">
                                                생년월일
                                            </td>
                                            <td style="text-align: left; padding-left: 5px; width: 13%; font-size: 12px;">
                                                030516
                                            </td>
                                            <td style="width: 7%;">
                                                성별
                                            </td>
                                            <td style="width: 5%; font-size: 12px;">
                                                남
                                            </td>
                                            <td style="width: 20%;">
                                                 졸업년월일
                                            </td>
                                            <td style="border-right: hidden; text-align: left; padding-left: 5px; width: 25%; font-size: 12px;">
                                                2022년 2월 1일
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="border-left: hidden; height: 35px;">
                                                졸업대장번호
                                            </td>
                                            <td colspan="2" style="font-size: 12px;">
                                                2021-069
                                            </td>
                                            <td>
                                                주소
                                            </td>
                                            <td colspan="3" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 12px;">
                                                (03310) 서울 은평구 진관1로 55, 301동 304호
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="border-left: hidden; height: 35px;">
                                                출신학교
                                            </td>
                                            <td colspan="6" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 12px;">
                                                2018년도 신도중학교
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="border-left: hidden; height: 150px; letter-spacing: 2px;">
                                                학적변동사항
                                            </td>
                                            <td colspan="6" style="border-right: hidden;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="border-left: hidden; height: 90px; letter-spacing: 2px;">
                                                상벌 사항
                                            </td>
                                            <td colspan="6" style="border-right: hidden;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" rowspan="6" style="border-left: hidden; letter-spacing: 2px;">
                                                등록 사항
                                            </td>
                                            <td colspan="6" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 11px;">
                                                2019학년도 1학기 등록 (1학년 1학기)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 11px;">
                                                2019학년도 2학기 등록 (1학년 2학기)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 11px;">
                                                2020학년도 1학기 등록 (2학년 1학기)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 11px;">
                                                2020학년도 2학기 등록 (2학년 2학기)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 11px;">
                                                2021학년도 1학기 등록 (3학년 1학기)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" style="border-right: hidden; text-align: left; padding-left: 5px; font-size: 11px;">
                                                2021학년도 2학기 등록 (3학년 2학기)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="border-left: hidden; height: 90px; letter-spacing: 2px;">
                                                장학 사항
                                            </td>
                                            <td colspan="6" style="border-right: hidden;">

                                            </td>
                                        </tr>
                                        <tr style="border-bottom: hidden;">
                                            <td colspan="2" style="border-left: hidden; height: 90px; letter-spacing: 2px;">
                                                비고
                                            </td>
                                            <td colspan="6" style="border-right: hidden;">

                                            </td>
                                        </tr>
                                    </table>
                                    
                                </td>
                            </tr>
                        </table>
                        <table border="0" cellpadding="0" style="width: 100%; height: 235px; border-top: 1px solid #000000;">
                            <tr>
                                <td style="text-align: center; font-size: 15px; vertical-align: middle; border-right: hidden; border-left: hidden; border-bottom: hidden; letter-spacing: 2px;">
                                    <a>위의 사실을 증명합니다</a>
                                    <br><br>
                                    <a style="font-size: 15px;"><?=date("Y년 m월 d일")?></a>
                                    <br><br><br>
                                    <a style="font-size: 25px;"><?=$stu['high_sch'].'장'?></a>
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