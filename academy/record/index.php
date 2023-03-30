<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>성적정보시스템</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="/antidragclick.js"></script>
    <script>
        function Paper() {
            if("<?=$_SESSION['id']?>" != '' && "<?=$_SESSION['id']?>" != null){
                location.href = "./paper";
            }else{
                alert('로그인 후 이용하세요.');
                return false;
            }
        }
        function Result() {
            if("<?=$_SESSION['id']?>" != '' && "<?=$_SESSION['id']?>" != null){
                location.href = "./academic_result";
            }else{
                alert('로그인 후 이용하세요.');
                return false;
            }
        }
        function RankPaper(){
            location.href = "./rank";
        }
        function Insert_Record(){
            location.href = "./insert_record";
        }
        function Calc_Record(){
            location.href = "./calc";
        }
        function Select_Rank(){
            location.href = "./select_rank";
        }
    </script>
    <style>
        .items{
            box-shadow: 2px 2px 4px 2px #bebebe;
            background-color: lightskyblue;
            color: white;
            border-radius: 25px;
            height: 100px;
            width: 100px;
            float: left;
            margin-left: 40px;
        }
        .items:hover{
            /*background-color: white;*/
            /*color: black;*/
            box-shadow: 0 8px 16px 0 rgb(51, 76, 121);
            transition: all 0.6s;
        }
    </style>
</head>
<body>
    <div style="margin: auto; margin-top: 20px; width: 950px; height: 550px;">

        <div style="width: 100%; height: 150px; padding-bottom: 30px;">
            <div style="float: left; width: 620px; text-align: center; height: 100%;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr align="center">
                        <td style="font-size: 30px;">
                            성적정보시스템
                        </td>
                    </tr>

                </table>
            </div>
            <div style="float: right; width: 300px; text-align: center; height: 100%; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                <?php
                if($_SESSION['id'] == '' && $_SESSION[''] == null){
                ?>
                <button onclick="location.href = './login'" style="width: 85%; height: 40px; display: inline-block; margin-top: 45px; border-radius: 2em; border: 0px; color: white; background-color: rgb(51, 76, 121);">
                    로그인
                </button>
                <div style="width: 85%; height: 30px; display: inline-block; margin-top: 15px;">
                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                        <tr style="font-size: 14px;">
                            <td onclick="location.href='./login/findid.php'" style="border-top: hidden; border-left: hidden; border-bottom: hidden;">
                                학번 찾기
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
                }else{
                ?>
                <div style="width: 85%; height: 30px; display: inline-block; margin-top: 15px;">
                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                        <tr style="font-size: 14px;">
                            <td align="left">
                                <?=$_SESSION['name'].'님, 환영합니다'?>
                            </td>
                            <td>
                                <button onclick="location.href='./login/logout.php'" style="width: 80px; height: 32px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121);">
                                    로그아웃
                                </button>
                            </td>
                        </tr>
                        <tr style="font-size: 14px;">
                            <td align="left" style="">
                                <?='ID: '.$_SESSION['id']?>
                            </td>
                            <td align="center" style="">
                                <?php
                                if($_SESSION['level'] == '0'){
                                    echo ('계열: '.$_SESSION['type']);
                                }
                                ?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px;">
                            <td colspan="2" align="left" style="height: 40px;">
                                <?='소속 학교: '.$_SESSION['sch']?>
                            </td>
                        </tr>
                        <tr style="font-size: 14px;">
                            <td colspan="2" align="left" style="">
                                <?=$_SESSION['level_string'].'&nbsp;&nbsp;&nbsp;'.$_SESSION['dept']?>
                            </td>
                        </tr>
                    </table>
                </div>
                <?php
                }
                ?>
            </div>

        </div>

        <div style="border-radius: 2em; width: 460px; height: 370px; float: left; border: 1px solid #bcbcbc;">
            <?php
            if($_SESSION['level'] == '0'){
            ?>
            <div class="items" onclick="Paper()" style="margin-top: 25px;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td align="center" style="font-size: 14px">
                            성적증명<br>발급
                        </td>
                    </tr>
                </table>
            </div>
            <div class="items" onclick="Result()" style="margin-top: 25px;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td align="center" style="font-size: 14px">
                            성적 조회
                        </td>
                    </tr>
                </table>
            </div>
            <div class="items" onclick="location.href='./report'" style="margin-top: 25px;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td align="center" style="font-size: 14px">
                            성적표<br>발급
                        </td>
                    </tr>
                </table>
            </div>
            <div class="items" onclick="" style="margin-top: 80px;">

            </div>
            <div class="items" onclick="" style="margin-top: 80px;">

            </div>
            <div class="items" onclick="Calc_Record()" style="margin-top: 80px;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td align="center" style="font-size: 14px; color: white;">
                            성적변환
                        </td>
                    </tr>
                </table>
            </div>
            <?php
            }else if($_SESSION['level'] == '1'){
            ?>
            <div class="items" onclick="location.href='./search'" style="margin-top: 25px;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td align="center" style="font-size: 14px; color: white;">
                            성적 프로그램
                        </td>
                    </tr>
                </table>
            </div>
            <div class="items" onclick="Paper()" style="margin-top: 25px;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td align="center" style="font-size: 14px">
                            성적증명<br>발급
                        </td>
                    </tr>
                </table>
            </div>
            <div class="items" onclick="location.href='./list'" style="margin-top: 25px;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td align="center" style="font-size: 14px">
                            개인별<br>성적 조회
                        </td>
                    </tr>
                </table>
            </div>
            <div class="items" onclick="" style="margin-top: 80px;">

            </div>
            <div class="items" onclick="" style="margin-top: 80px;">

            </div>
            <div class="items" onclick="" style="margin-top: 80px;">

            </div>
            <?php
            }
            ?>
        </div>

        <div style="border-radius: 2em; width: 460px; height: 370px; float: right; background-color: #ffffff; border: 1px solid #bcbcbc;">
            <?php
            if($_SESSION['level_string'] == '교원'){
            ?>
            <!-- 교원일때 표시되는 화면 -->

            <?php
            }else if($_SESSION['level_string'] == '학생'){
            ?>
            <!-- 학생일때 표시되는 화면 -->
            <table border="0" style="width: 91%; height: 95%; margin: auto; vertical-align: middle; border-collapse: collapse; border-color: black;">
                    <tr align="center">
                        <td colspan="3" style="font-size: 18px; height: 45px; letter-spacing: 2px; border-top: hidden; border-left: hidden; border-right: hidden;">
                            석&nbsp;차
                        </td>
                    </tr>
                    <tr style="height: 80%;">
                        <td colspan="3" style="width: 45%;">
                            <div style="width: 100%; height: 100%;">
                                <table border="1" style="border-collapse: collapse; width: 100%; border-color: black; background-color: #f0f0f0;">
                                    <tr style="height: 30px;">
                                        <td style="width: 15%; text-align: center;">
                                            학기
                                        </td>
                                        <td align="center" style="width: 20%;">
                                            평점 평균
                                        </td>
                                        <td align="center" style="width: 20%;">
                                            표준점수
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align='center' style='font-size: 14px; height: 25px;'>1-1</td>
                                        <td align='center' style='font-size: 15px; border-right: hidden;'><?=number_format($stulib['Record']['Avg_11'],2).'/9.00'?></td>
                                        <td align='center' style='font-size: 15px;'><?=number_format($stulib['Record']['GPA_11'],2).'/4.50'?></td>
                                    </tr>
                                    <tr>
                                        <td align='center' style='font-size: 14px; height: 25px;'>1-2</td>
                                        <td align='center' style='font-size: 15px; border-right: hidden;'><?=number_format($stulib['Record']['Avg_12'],2).'/9.00'?></td>
                                        <td align='center' style='font-size: 15px;'><?=number_format($stulib['Record']['GPA_12'],2).'/4.50'?></td>
                                    </tr>
                                    <tr>
                                        <td align='center' style='font-size: 14px; height: 25px;'>2-1</td>
                                        <td align='center' style='font-size: 15px; border-right: hidden;'><?=number_format($stulib['Record']['Avg_21'],2).'/9.00'?></td>
                                        <td align='center' style='font-size: 15px;'><?=number_format($stulib['Record']['GPA_21'],2).'/4.50'?></td>
                                    </tr>
                                    <tr>
                                        <td align='center' style='font-size: 14px; height: 25px;'>2-2</td>
                                        <td align='center' style='font-size: 15px; border-right: hidden;'><?=number_format($stulib['Record']['Avg_22'],2).'/9.00'?></td>
                                        <td align='center' style='font-size: 15px;'><?=number_format($stulib['Record']['GPA_22'],2).'/4.50'?></td>
                                    </tr>
                                    <tr>
                                        <td align='center' style='font-size: 14px; height: 25px;'>3-1</td>
                                        <td align='center' style='font-size: 15px; border-right: hidden;'><?=number_format($stulib['Record']['Avg_31'],2).'/9.00'?></td>
                                        <td align='center' style='font-size: 15px;'><?=number_format($stulib['Record']['GPA_31'],2).'/4.50'?></td>
                                    </tr>
                                    <tr>
                                        <td align='center' style='font-size: 14px; height: 25px;'>3-2</td>
                                        <td align='center' style='font-size: 15px; border-right: hidden;'><?=number_format($stulib['Record']['Avg_32'],2).'/9.00'?></td>
                                        <td align='center' style='font-size: 15px;'><?=number_format($stulib['Record']['GPA_32'],2).'/4.50'?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" align='center' style="font-size: 14px; height: 25px;">누적 석차</td>
                                        <td align='center' style='font-size: 15px;'><?=number_format(($stulib['Record']['Avg_11']+$stulib['Record']['Avg_12']+$stulib['Record']['Avg_21']+$stulib['Record']['Avg_22'])/4,2).'/9.00'?></td>
                                        <td align='center' style='font-size: 15px;'><?=number_format(($stulib['Record']['Avg_11']+$stulib['Record']['Avg_12']+$stulib['Record']['Avg_21']+$stulib['Record']['Avg_22'])/4,2).'/9.00'?></td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
            </table>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
