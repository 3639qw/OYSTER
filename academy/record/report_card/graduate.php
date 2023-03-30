<?php
session_start();
error_reporting( E_ERROR );
ini_set( "display_errors", 1 );
require_once "../lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();

// 학생 정보
$stu = $ac_record->magic_eye->Select_Student();


$mark = $ac_record->course_record->Raw_sum();
foreach ($mark['Full_Marks'] as $key => $value){
    if($key != 'Merged'){
        $ac['Full_Marks'][$key] = $value;
    }else{
        $ac['Merged']['Full_Marks'] = $value;
    }
}
unset($mark['Full_Marks']);
foreach ($mark as $key => $value){
    if($key != 'Merged'){
        $ac['sum'][$key] = $value;
    }else{
        $ac['Merged']['sum'] = round($value,5);
    }
}
foreach ($ac_record->course_record->Weighted_Average() as $key => $value){
    if($key != 'Merged'){
        $ac['avg'][$key] = round($value,2);
    }else{
        $ac['Merged']['avg'] = round($value,5);
    }
}
$rank = $ac_record->raw_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'Y','Y');
$rank = $ac_record->raw_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'Y','Y');
$ac['Merged']['rank'] = $rank['Rank'][$stu['stuid']].'/'.$rank['sum'];
$ac['Merged']['RG'] = $rank['RG'][$stu['stuid']];
$ac['Merged']['Percentile'] = $rank['Percentile'][$stu['stuid']];


$year = substr($_GET['range'],0,1);

// 증명발급 보안사항 검증
$verify = $ac_record->magic_eye;
$ck_login = $verify->ck_Login($_SESSION['level']);

$ck_identity = $verify->ck_Student_Identity($_GET['birth'],$_GET['name'],$_GET['stuid'],$_GET['initial']);

//echo '<pre>';
//print_r($stu);
//echo '</pre>';



// 일반: http://record.juyong.kr/report_card/rank.php?stuid=22851192&name=%EC%9D%B4%EC%A3%BC%EC%9A%A9&birth=2003-05-16&range=11
// 임시: https://web.juyong.kr/academy/record/report_card/graduate.php?stuid=22851192&name=%EC%9D%B4%EC%A3%BC%EC%9A%A9&birth=2003-05-16&sch=%EC%84%B8%EB%AA%85%EC%BB%B4%ED%93%A8%ED%84%B0%EA%B3%A0%EB%93%B1%ED%95%99%EA%B5%90&initial=SMC


if($ck_identity && $stu['status'] == '졸업'){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>졸업성적증명서</title>
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
        <!-- 졸업성적표(4.5 Scale평점) $ac_1 -->
        <div class="page" style="display: block;">
            <!-- 타이틀 -->
            <table border="0" cellpadding="0" style="height: 100px; width: 100%;  padding-top: 0px;">
                <tr>
                    <td colspan="2" style="text-align: center; font-size: 25px;">
                        <a style="letter-spacing: 10px;">졸업성적증명서</a>
                    </td>
                </tr>
                <tr>
                    <td style="height: 20%; width: 60%; text-align: left; font-size: 15px; padding-bottom: 5px;">
                        <?=$stu['high_sch']?>
                    </td>
                    <td style="text-align: right; font-size: 15px; padding-right: 10px; padding-bottom: 5px;">
                        <?=$stu['register_32'].'학년도 졸업대상자'?>
                    </td>
                </tr>
            </table>

            <!-- 굵은 테두리 -->
            <table border="1" cellpadding="0" style="width: 100%;  border: #000000 inset 2px;">
                <tr style="height: 965px;">
                    <td>
                        <table border="0" cellpadding="0" style="width: 100%; height: 545px; padding-top: 0px;">
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
                                                            <tr style="font-size: 15px;">
                                                                <td style="height: 35px; border-left: hidden; border-right: hidden;">
                                                                    학기성적
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="1" style="text-align: center; width: 100%; font-size: 11px;">
                                                            <tr style="font-size: 13px;">
                                                                <td style="width: 10%; height: 35px; border-left: hidden;">
                                                                    학년-학기
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    만점
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    점수
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    평균
                                                                </td>
                                                                <td style="width: 60%; border-right: hidden;">
                                                                    평균 그래프
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            foreach ($ac['Full_Marks'] as $key => $value){
                                                            ?>
                                                            <tr style="font-size: 13px;">
                                                                <td style="height: 25px; border-left: hidden;">
                                                                    <?=substr($key,-2,1).'-'.substr($key,1,1)?>
                                                                </td>
                                                                <td>
                                                                    <?=$value?>
                                                                </td>
                                                                <td>
                                                                    <?=$ac['sum'][$key]?>
                                                                </td>
                                                                <td>
                                                                    <?=$ac['avg'][$key]?>
                                                                </td>
                                                                <td style="width: 60%; border-right: hidden;">
                                                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; font-size: 13px;">
                                                                        <tr>
                                                                            <td style="width: 3%;">
                                                                                0
                                                                            </td>
                                                                            <td style="width: 90%;">
                                                                                <div style="width: 100%; height: 100%; background: transparent; border: #3a8dfd 1px solid; white-space: nowrap;">
                                                                                    <div style="width: <?=$ac['avg'][$key]?>%; height: 100%; background: #3a8dfd;"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td style="width: 7%; text-align: left;">
                                                                                100
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </table>
                                                        <table border="1" style="text-align: center; width: 100%; font-size: 11px;">
                                                            <tr style="font-size: 15px;">
                                                                <td style="height: 35px; border-left: hidden; border-right: hidden;">
                                                                    졸업성적
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="1" style="text-align: center; width: 100%; font-size: 11px;">
                                                            <tr style="font-size: 13px;">
                                                                <td style="width: 10%; height: 35px; border-left: hidden;">
                                                                    만점
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    총점
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    총점 평균
                                                                </td>
                                                                <td style="width: 10%;">
                                                                    졸업 석차
                                                                </td>
                                                                <td style="width: 60%; border-right: hidden;">
                                                                    평균 그래프
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 13px;">
                                                                <td style="height: 25px; border-left: hidden;">
                                                                    <?=$ac['Merged']['Full_Marks']?>
                                                                </td>
                                                                <td>
                                                                    <?=$ac['Merged']['sum']?>
                                                                </td>
                                                                <td>
                                                                    <?=$ac['Merged']['avg']?>
                                                                </td>
                                                                <td>
                                                                    <?=$ac['Merged']['rank']?>
                                                                </td>
                                                                <td style="width: 60%; border-right: hidden;">
                                                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; font-size: 13px;">
                                                                        <tr>
                                                                            <td style="width: 3%;">
                                                                                0
                                                                            </td>
                                                                            <td style="width: 90%;">
                                                                                <div style="width: 100%; height: 100%; background: transparent; border: #3a8dfd 1px solid; white-space: nowrap;">
                                                                                    <div style="width: <?=$ac['Merged']['avg']?>%; height: 100%; background: #3a8dfd;"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td style="width: 7%; text-align: left;">
                                                                                100
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 13px;">
                                                                <td colspan="2" style="height: 35px; border-left: hidden;">
                                                                    등급
                                                                </td>
                                                                <td colspan="2">
                                                                    백분위
                                                                </td>
                                                                <td style="border-right: hidden;">
                                                                    백분위 그래프
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 13px;">
                                                                <td colspan="2" style="height: 25px; border-left: hidden;">
                                                                    <?=$ac['Merged']['RG']?>
                                                                </td>
                                                                <td colspan="2">
                                                                    <?=$ac['Merged']['Percentile']?>
                                                                </td>
                                                                <td style="border-right: hidden;">
                                                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; font-size: 13px;">
                                                                        <tr>
                                                                            <td style="width: 3%;">
                                                                                0
                                                                            </td>
                                                                            <td style="width: 90%;">
                                                                                <div style="width: 100%; height: 100%; background: transparent; border: #3a8dfd 1px solid; white-space: nowrap;">
                                                                                    <div style="width: <?=$ac['Merged']['Percentile']?>%; height: 100%; background: #3a8dfd;"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td style="width: 7%; text-align: left;">
                                                                                100
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <table border="0" style="text-align: center; width: 100%;">
                                                            <tr style="font-size: 14px; border-top: 1px solid #000000;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 10px;">
                                                                    ○ 평균
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 13px;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 5px; letter-spacing: 1px;">
                                                                    각 과목별 원점수와 학점을 곱한값을 학기별로 모두 더한 후 총 학점수로 나눈 값
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 14px;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 10px;">
                                                                    ○ 졸업 석차
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 13px;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 5px; letter-spacing: 1px;">
                                                                    1학년 1학기부터 3학년 2학기까지의 총점 평균을 기준으로 한 순서<br>
                                                                    총점 평균이 동일할 경우 아래 순서로 석차를 산출한다<br>
                                                                    1. 전학년 총점<br>
                                                                    2. 3학년 총점<br>
                                                                    3. 2학년 총점<br>
                                                                    4. 1학년 총점
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 14px;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 10px;">
                                                                    ○ 등급
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 13px;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 5px; letter-spacing: 1px;">
                                                                    졸업 석차를 기준으로 1부터 9까지의 등급으로 상위 4%까지 1등급, 상위 11%까지 2등급, 상위 23%까지 3등급, 상위 40%까지 4등급, 상위 60%까지 5등급, 상위 77%까지 6등급, 상위 89%까지 7등급, 상위 96%까지 8등급, 나머지는 9등급을 부여함
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 14px;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 10px;">
                                                                    ○ 백분위
                                                                </td>
                                                            </tr>
                                                            <tr style="font-size: 13px;">
                                                                <td style="width: 50%; border-left: hidden; text-align: left; padding-left: 15px; padding-top: 5px; letter-spacing: 1px;">
                                                                    백분율로 표기한 졸업 석차로 본인보다 낮은 총점 평균을 받은 사람의 비율
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table border="0" cellpadding="0" style="width: 100%; height: 145px; border-top: 1px solid #000000;">
                            <tr>
                                <td style="text-align: center; font-size: 15px; vertical-align: middle; border-right: hidden; border-left: hidden; border-bottom: hidden; letter-spacing: 1px;">
                                    <a>위의 사실을 증명합니다.</a>
                                    <br><br>
                                    <a style="font-size: 25px; padding-top: 20px;"><?=$stu['high_sch'].'장'?></a>
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