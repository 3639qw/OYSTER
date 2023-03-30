<?php
session_start();
//include "../lib/dblib.php";
//if($_SESSION['level'] == '0'){
//    include "../lib/stulib.php";
//}

// 증명발급 보안사항 검증
require_once ("../lib/Academic_Record.php");
$ac_record = new Academic_Record();
$verify = $ac_record->authorize_obj;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>성적증명 발급</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="rank_list.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./index.css">
    <script src="/antidragclick.js"></script>
    <script>
        $(document).ready(function(){

            $('.one_b').click(function(){
                $ ('.one_t').show();
                $ ('.two_t').hide();
                $ ('.three_t').hide();
                return false;
            });
            $('.two_b').click(function(){
                $ ('.one_t').hide();
                $ ('.two_t').show();
                $ ('.three_t').hide();
                return false;
            });
            $('.three_b').click(function(){
                $ ('.one_t').hide();
                $ ('.two_t').hide();
                $ ('.three_t').show();
                return false;
            });

        });
    </script>
</head>
<body>

<div class="first_section">
    <?php
    if($verify->Check_Login($_SESSION['level'])){
    ?>
    <!-- 성적증명서 -->
    <div class="second_section three_t" style="width: 750px;">
        <script>
            $(document).ready(function(){
                $('#title_1_ac').click(function (e) {
                    $("#cont_1_ac").toggle();
                });
                $('#title_2_ac').click(function (e) {
                    $("#cont_2_ac").toggle();
                });
                $('#title_3_ac').click(function (e) {
                    $("#cont_3_ac").toggle();
                });
                $('#title_4_ac').click(function (e) {
                    $("#cont_4_ac").toggle();
                });

                $('input[name=al]').click(function (e){
                    if($('input[name=al]').is(':checked')){
                        $('input:checkbox[name="11"]').prop('checked',true);
                        $('input:checkbox[name="12"]').prop('checked',true);
                        $('input:checkbox[name="21"]').prop('checked',true);
                        $('input:checkbox[name="22"]').prop('checked',true);
                        $('input:checkbox[name="31"]').prop('checked',true);
                        $('input:checkbox[name="32"]').prop('checked',true);
                    }else{
                        $('input:checkbox[name="11"]').prop('checked',false);
                        $('input:checkbox[name="12"]').prop('checked',false);
                        $('input:checkbox[name="21"]').prop('checked',false);
                        $('input:checkbox[name="22"]').prop('checked',false);
                        $('input:checkbox[name="31"]').prop('checked',false);
                        $('input:checkbox[name="32"]').prop('checked',false);
                    }
                });



            });

            // 성적증명서

            // 이니셜을 제외한 학번 가져오기
            function GetStuid_ac(){
                if("<?=$_SESSION['level']?>" == 1){
                    return $('input[name=stuid_ac]').val();
                }else if("<?=$_SESSION['level']?>" == 0) {
                    return "<?=$_SESSION['id']?>";
                }
            }
            // 소속학교 가져오기
            function GetSchool_ac(){
                if("<?=$_SESSION['level']?>" == 1){
                    return $('select[name=sch_ac]').val()
                }else if("<?=$_SESSION['level']?>" == 0){
                    return "<?=$_SESSION['initial']?>";
                }
            }
            // 이름 가져오기
            function GetName_ac(){
                if("<?=$_SESSION['level']?>" == 1){
                    return $('input[name=name_ac]').val();
                }else if("<?=$_SESSION['level']?>" == 0) {
                    return "<?=$_SESSION['name']?>";
                }
            }
            // 생년월일 가져오기
            function GetBirth_ac(){
                if("<?=$_SESSION['level']?>" == 1){
                    return $('input[name=birth_ac]').val();
                }else if("<?=$_SESSION['level']?>" == 0) {
                    return "<?=$_SESSION['birth']?>";
                }
            }
            // 인적사항 다 입력했는지 체크
            function CheckPerson_ac(){
                if(GetSchool_ac() == '' | GetSchool_ac() == null){
                    alert('조회 대상 학생의 소속학교를 입력해주세요.');
                    return false;
                }else if(GetName_ac() == '' | GetName_ac() == null){
                    alert('조회 대상 학생의 이름을 입력해주세요.');
                    document.getElementById('name_ac').focus();
                    return false;
                }else if(GetBirth_ac() == '' | GetBirth_ac() == null){
                    alert('조회 대상 학생의 생년월일을 입력해주세요.');
                    document.getElementById('birth_ac').focus();
                    return false;
                }else if(GetStuid_ac() == '' | GetStuid_ac() == null){
                    alert('조회 대상 학생의 학번을 입력해주세요.');
                    document.getElementById("stuid_ac").focus();
                    return false;
                }else{
                    return true;
                }
            }
            // 발급 범위 체크
            function Range_Check(){
                var a = '';

                if($('input:checkbox[name="11"]').is(":checked")){
                    a += 'a';
                }
                if($('input:checkbox[name="12"]').is(":checked")){
                    a += 'b';
                }
                if($('input:checkbox[name="21"]').is(":checked")){
                    a += 'c';
                }
                if($('input:checkbox[name="22"]').is(":checked")){
                    a += 'd';
                }
                if($('input:checkbox[name="31"]').is(":checked")){
                    a += 'e';
                }
                if($('input:checkbox[name="32"]').is(":checked")){
                    a += 'f';
                }

                return a;
            }

            // 증명 발급
            function Paper_ac(){
                if($('select[id=paper_ac]').val() == 'Record_1'){
                    Record1_ac();
                }else if($('select[id=paper_ac]').val() == 'none'){
                    alert('발급할 증명서를 선택해주세요.');
                    return false;
                }
            }
            function Record1_ac() {
                if(CheckPerson_ac()){
                    if("<?=$_SESSION['level']?>" == '1'){
                        if($('select[id=isRank]').val() == '1'){
                            location.href = "../script/academic_record.php?stuid=" + GetStuid_ac() + "&name=" + GetName_ac() + "&birth=" + GetBirth_ac() + "&range=" + Range_Check() + "&isRank=1";
                        }else{
                            location.href = "../script/academic_record.php?stuid=" + GetStuid_ac() + "&name=" + GetName_ac() + "&birth=" + GetBirth_ac() + "&range=" + Range_Check();
                        }
                    }else if("<?=$_SESSION['level']?>" == '0'){
                        location.href = "../script/academic_record.php";
                    }
                }
            }
        </script>
        <!-- 타이틀 -->
        <table border="0" class="title">
            <tr align="center">
                <td style="letter-spacing: 2px; font-size: 35px; font-weight: bold;">
                    성적증명서 발급
                </td>
            </tr>
        </table>

        <!-- 서류 발급 종류별 표시 -->
        <table border="0" class="service_window" style="display: none;">
            <tr style="height: 60px; font-size: 17px;">
                <td class="one_b" style="letter-spacing: 2px; width: 33%; color: white; background: rgb(51, 76, 121); border-top: 1px solid rgb(51, 76, 121); border-bottom: 1px solid rgb(51, 76, 121);">
                    석차연명부
                </td>
                <td class="two_b" style="letter-spacing: 2px; width: 33%; color: white; background: rgb(51, 76, 121); border-left: 1px solid rgb(51, 76, 121); border-top: 1px solid rgb(51, 76, 121); border-bottom: 1px solid rgb(51, 76, 121);">
                    개인별 석차연명부
                </td>
                <td class="three_b" style="letter-spacing: 2px; width: 33%; border-top: 1px solid rgb(51, 76, 121); border-bottom: 1px solid rgb(51, 76, 121); border-right: 1px solid rgb(51, 76, 121);">
                    성적증명서
                </td>
            </tr>
        </table>

        <!-- 유의사항 -->
        <table border="1" class="noti_window" style="display: none;">
            <tr align="center" >
                <td align="left" id="title_1_ac" class="top">
                    유의사항
                </td>
            </tr>
            <tr align="center" id="cont_1_ac">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td>
                                <ul style="list-style-type: square; line-height: 1.5em;">
                                    <li><a style="color: red;">※ 휴학, 제적, 퇴학 등의 학적 변동 사항이 있는 학생은 최초 변동 발생 학기를 포함하여 이후 재학한 학기는 발급 불가합니다.</a></li>
                                </ul>
                                <!-- 산출자료 테이블 -->
                                <table class="paper_table" border="1" style="margin-top: 20px; margin-bottom: 20px;">
                                    <tr align="center" style="height: 30px; background-color: white;">
                                        <td style="width:50%;">
                                            산출 자료
                                        </td>
                                        <td style="width: 8%;">
                                            학점
                                        </td>
                                        <td style="width: 9%;">
                                            석차<br>등급
                                        </td>
                                        <td style="width: 9%;">
                                            수강<br>자수
                                        </td>
                                        <td style="width: 9%;">
                                            성취도
                                        </td>
                                        <td style="width: 9%;">
                                            평점<br>평균
                                        </td>
                                    </tr>
                                    <tr align="center" style="height: 40px;">
                                        <td align="left" style="padding-left: 5px;">
                                            성적증명서 I
                                        </td>
                                        <td style="color: blue">
                                            O
                                        </td>
                                        <td style="color: blue">
                                            O
                                        </td>
                                        <td style="color: blue">
                                            O
                                        </td>
                                        <td style="color: red">
                                            X
                                        </td>
                                        <td style="color: red">
                                            X
                                        </td>
                                    </tr>
                                    <tr align="center" style="height: 40px;">
                                        <td align="left" style="padding-left: 5px;">
                                            성적증명서 II
                                        </td>
                                        <td style="color: blue">
                                            O
                                        </td>
                                        <td style="color: red">
                                            X
                                        </td>
                                        <td style="color: red">
                                            X
                                        </td>
                                        <td style="color: blue">
                                            O
                                        </td>
                                        <td style="color: blue">
                                            O
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <form name="person_ac">
            <!-- 학교정보 입력 -->
            <table border="1" class="window">
                <tr align="center">
                    <td align="left" id="title_2_ac" class="top">
                        학교를 선택해주세요.
                    </td>
                </tr>
                <tr align="center" id="cont_2_ac">
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                        <!-- 학교 -->
                        <table border="1" class="content">
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    학교명
                                </td>
                                <td style="width: 75%;">
                                    <select name="sch_ac" id="sch_ac" class="input" style="height: 35px; width: 365px; letter-spacing: 2px;">
                                        <option value="">--학교 선택--</option>
                                        <?php
                                        $high_name_sql="
                                        select b.high_sch, c.initial
                                        from score a, student b, high_sch c
                                        where a.stuid = b.stuid and b.high_sch = c.name
                                        group by b.high_sch, c.initial;
                                        ";
                                        $high_name_result = mysqli_query($con, $high_name_sql);
                                        while($high_name = mysqli_fetch_array($high_name_result)){
                                        ?>
                                        <option value="<?=$high_name['initial'];?>"><?=$high_name['high_sch'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- 인적사항 입력 -->
            <table border="1" class="window">
                <tr align="center">
                    <td align="left" id="title_3_ac" class="top">
                        <?php
                        if($_SESSION['level'] == 0){
                        ?>
                        인적사항을 확인해주세요.
                        <?php
                        }else if($_SESSION['level'] == 1){
                        ?>
                        인적사항을 입력해주세요.
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr align="center" id="cont_3_ac">
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                        <table border="1" class="content">
                            <tr>
                                <td style="height: 50px; width: 25%; border-right: hidden;">
                                    성명
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" class="input" name="name_ac" id="name_ac" style="letter-spacing: 2px;">
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 50px; border-right: hidden;">
                                    생년월일
                                </td>
                                <td>
                                    <input type="date" class="input" style="width: 352px; height: 28px; letter-spacing: 3px;" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" name="birth_ac" id="birth_ac">
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 50px; border-right: hidden;">
                                    학번
                                </td>
                                <td>
                                    <input type="text" class="input" name="stuid_ac" id="stuid_ac" style="letter-spacing: 3px;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!-- 신청내용 -->
            <table border="1" class="window">
                <tr align="center">
                    <td align="left" id="title_4_ac" class="top">
                        신청내용을 확인해주세요.
                    </td>
                </tr>
                <tr align="center" id="cont_4_ac">
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                        <table border="1" class="content">
                            <tr>
                                <td style="height: 60px; width: 25%; border-right: hidden;">
                                    발급 종류
                                </td>
                                <td style="width: 75%;">
                                    <select id="paper_ac" class="input" style="width: 360px; height: 35px; letter-spacing: 2px;">
                                        <!--                                    <option value="none">--증명서 선택--</option>-->
                                        <option value="Record_1">성적증명서 통합</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 60px; width: 25%; border-right: hidden;">
                                    석차 표기
                                </td>
                                <td style="width: 75%;">
                                    <select id="isRank" name="isRank" class="input" style="width: 360px; height: 35px; letter-spacing: 2px;">
                                        <option value="0">석차 미표기</option>
                                        <option value="1">석차 표기</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 60px; width: 25%; border-right: hidden;">
                                    세부증명 발급 범위
                                </td>
                                <td style="width: 75%;">
                                    <label><table border="0" style="display: inline;"><tr><td><input type="checkbox" class="input" name="11" value="1" style="height: 20px; width: 20px;"></td><td>1-1</td></tr></table></label>
                                    <label><table border="0" style="display: inline;"><tr><td><input type="checkbox" class="input" name="12" value="1" style="height: 20px; width: 20px;"></td><td>1-2</td></tr></table></label>
                                    <label><table border="0" style="display: inline;"><tr><td><input type="checkbox" class="input" name="21" value="1" style="height: 20px; width: 20px;"></td><td>2-1</td></tr></table></label>
                                    <label><table border="0" style="display: inline;"><tr><td><input type="checkbox" class="input" name="22" value="1" style="height: 20px; width: 20px;"></td><td>2-2</td></tr></table></label>
                                    <label><table border="0" style="display: inline;"><tr><td><input type="checkbox" class="input" name="31" value="1" style="height: 20px; width: 20px;"></td><td>3-1</td></tr></table></label>
                                    <label><table border="0" style="display: inline;"><tr><td><input type="checkbox" class="input" name="32" value="1" style="height: 20px; width: 20px;"></td><td>3-2</td></tr></table></label>
                                    <label><table border="0" style="display: inline;"><tr><td><input type="checkbox" class="input" name="al" value="1" style="height: 20px; width: 20px;"></td><td>전 학년</td></tr></table></label>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </form>


        <!-- 버튼 -->
        <div style="height: 50px; width: 50%; margin: auto; margin-top: 30px; margin-bottom: 30px;">
            <button onclick="Paper_ac()" class="accept">
                신&nbsp;&nbsp;청
            </button>

            <button onclick="Cancel()" class="cancel">
                취&nbsp;&nbsp;소
            </button>
        </div>
        <script>
            if("<?=$_SESSION['level'] == 0?>"){
                document.person_ac.sch_ac.value = "<?=$_SESSION['initial']?>";
                document.person_ac.name_ac.value = "<?=$_SESSION['name']?>";
                document.person_ac.stuid_ac.value = "<?=$_SESSION['id']?>";
                document.person_ac.birth_ac.value = "<?=$_SESSION['birth']?>";
                document.getElementById('name_ac').readOnly = true;
                document.getElementById('stuid_ac').readOnly = true;
                document.getElementById('birth_ac').readOnly = true;
            }else{
                document.person_ac.sch_ac.value = "<?=$_SESSION['initial'];?>";
            }
        </script>
    </div>
    <?php
    }
    ?>
</div>
</body>
</html>