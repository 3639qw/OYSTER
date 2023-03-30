<?php

error_reporting( E_ERROR );
ini_set( "display_errors", 1 );

if ($_POST['period_type'] == '1') {
    $fnc_var['Account_Number'] = $_POST['ac_number'];
    $fnc_var['Period'][0] = '1';
    if ($_POST['period_month'] != '' && $_POST['period_month'] != null) {
        $fnc_var['Period'][1] = preg_replace('/(-)/', '', $_POST['period_month']);
    } else {
        $fnc_var['Period'][1] = date('Ym');
    }
    $fnc_var['Sort'] = $_POST['sort'];
    if ($fnc_var['Sort'] == 'asc') {
        $ss = '과거';
    } else {
        $ss = '최근';
    }
    $search_string[0] = substr($fnc_var['Account_Number'], 0, 6) . '-' . substr($fnc_var['Account_Number'], 6, 2) . '-' . substr($fnc_var['Account_Number'], 8, 6);
    $search_string[1] = substr($fnc_var['Period'][1], 0, 4) . '.' . substr($fnc_var['Period'][1], 4, 2);
    $search_string[2] = $ss . ' 순';
} else if ($_POST['period_type'] == '3') {
    $fnc_var['Account_Number'] = $_POST['ac_number'];
    $fnc_var['Period'][0] = '3';
    if ($_POST['period_from'] != '' && $_POST['period_from'] != null) {
        $fnc_var['Period'][1] = preg_replace('/(-)/', '', $_POST['period_from']);
    } else {
        $fnc_var['Period'][1] = date('Ymd');
    }

    if ($_POST['period_to'] != '' && $_POST['period_to'] != null) {
        $fnc_var['Period'][2] = preg_replace('/(-)/', '', $_POST['period_to']);
    } else {
        $fnc_var['Period'][2] = date('Ymd');
    }
    $fnc_var['Sort'] = $_POST['sort'];
    if ($fnc_var['Sort'] == 'asc') {
        $ss = '과거';
    } else {
        $ss = '최근';
    }
    $search_string[0] = substr($fnc_var['Account_Number'], 0, 6) . '-' . substr($fnc_var['Account_Number'], 6, 2) . '-' . substr($fnc_var['Account_Number'], 8, 6);
    $search_string[1] = substr($fnc_var['Period'][1], 0, 4) . '.' . substr($fnc_var['Period'][1], 4, 2) . '.' . substr($fnc_var['Period'][1], 6, 2) . ' ~ ' . substr($fnc_var['Period'][2], 0, 4) . '.' . substr($fnc_var['Period'][2], 4, 2) . '.' . substr($fnc_var['Period'][2], 6, 2);
    $search_string[2] = $ss . ' 순';
}

$count = 1;
$trans_list_result = $ac_trans->Transaction_List($fnc_var['Account_Number'], $fnc_var['Period'], $fnc_var['Sort']);
while ($list = mysqli_fetch_assoc($trans_list_result)) {
    foreach ($list as $key => $value) {
        $trans_list[$key][$count] = $value;
        if ($key == 'receive_number' && $value != '' && $value != null) {
            $trans_list[$key . '_view'][$count] = substr($value, 0, 6) . '-' . substr($value, 6, 2) . '-' . substr($value, 8, 6);
        }
    }
    $count++;
}
$calendar['open_date'] = substr($_POST['open_date'], 0, 4) . '-' . substr($_POST['open_date'], 4, 2) . '-' . substr($_POST['open_date'], 6, 2);
$calendar['open_date_month'] = substr($_POST['open_date'], 0, 4) . '-' . substr($_POST['open_date'], 4, 2);
?>
<div class="transaction_list_dialog" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 95%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <table border="0" style="border-collapse: collapse; width: 100%; margin: auto; margin-top: 10px;">
                    <tr>
                        <td style="font-size: 20px; height: 30px;">
                            거래 내역
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 15px;">

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="width: 70%; height: 40px; margin: auto; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC; font-size: 13px;">
                                <form name="search_array" id="search_array" method="post" action="./">

                                    <!-- 날짜 지정 타입 -->
                                    <div style="float: left; width: 27%; height: 100%; margin: auto; line-height: 40px;">
                                        <input type="text" name="ac_number" hidden>
                                        <input type="text" name="action" hidden>


                                        <label><input type="radio" style="margin-left: 5px" name="period_type" value="1" checked> 월별</label>
                                        <label><input type="radio" style="margin-left: 5px" name="period_type" value="3"> 날짜 지정</label>
                                    </div>

                                    <!-- 날짜 폼 -->
                                    <div style="float: left; width: 45%; height: 100%;margin: auto; line-height: 40px;">
                                        <span>
                                            <input type="month" class="form_field" name="period_month" min="2000-01" max="2099-12">&nbsp;
                                        </span>

                                        <span id="period_3_form" hidden>
                                            <input type="date" class="form_field" name="period_from" hidden disabled>-
                                            <input type="date" class="form_field" name="period_to" hidden disabled>
                                        </span>
                                    </div>

                                    <!-- 정렬 폼 -->
                                    <div style="float: left; width: 25%; height: 100%; margin: auto; line-height: 40px;">
                                        <select class="form_field" name="sort">
                                            <option value="desc">최근 순</option>
                                            <option value="asc">과거 순</option>
                                        </select>&nbsp;
                                        <input type="text" name="open_date" hidden>
                                        <button style="background: transparent; border: 2px solid #3a8dfd; color: #3a8dfd; width: 45px; height: 25px; margin-left: 10px;">
                                            조회
                                        </button>
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function (){
                                        $('input[name="period_type"]').on("click",function (){
                                            var type = $('input[name="period_type"]:checked').val();
                                            if(type == '1'){
                                                $('#period_3_form').attr("hidden",true);
                                                $('input[name="period_month"]').attr("hidden",false);
                                                $('input[name="period_month"]').attr("disabled",false);
                                                $('input[name="period_from"]').attr("hidden",true);
                                                $('input[name="period_from"]').attr("disabled",true);
                                                $('input[name="period_to"]').attr("hidden",true);
                                                $('input[name="period_to"]').attr("disabled",true);
                                            }else if(type == '2'){

                                            }else if(type == '3'){
                                                $('#period_3_form').attr("hidden",false);
                                                $('input[name="period_month"]').attr("hidden",true);
                                                $('input[name="period_month"]').attr("disabled",true);
                                                $('input[name="period_from"]').attr("hidden",false);
                                                $('input[name="period_from"]').attr("disabled",false);
                                                $('input[name="period_to"]').attr("hidden",false);
                                                $('input[name="period_to"]').attr("disabled",false);
                                            }

                                        });

                                    });

                                    // 히든 고정 값
                                    document.search_array.ac_number.value = "<?=$_POST['ac_number']?>";
                                    document.search_array.action.value = "2";
                                    document.search_array.open_date.value = "<?=$_POST['open_date']?>";

                                    // 최저값은 계좌신규일까지로 제한한다
                                    document.search_array.period_from.min = "<?=$calendar['open_date']?>";
                                    document.search_array.period_to.min = "<?=$calendar['open_date']?>";
                                    document.search_array.period_month.min = "<?=$calendar['open_date_month']?>";

                                    // 최고값은 오늘날짜로 제한한다
                                    document.search_array.period_from.max = "<?=date('Y-m-d')?>";
                                    document.search_array.period_to.max = "<?=date('Y-m-d')?>";
                                    document.search_array.period_month.max = "<?=date('Y-m')?>";

                                    // 기재된 값은 오늘날짜로 지정한다
                                    document.search_array.period_from.value = "<?=date('Y-m-d')?>";
                                    document.search_array.period_to.value = "<?=date('Y-m-d')?>";
                                    document.search_array.period_month.value = "<?=date('Y-m')?>";

                                    // 계좌개설일을 지정한다
                                    document.search_array.open_date.value = "<?=$_POST['open_date']?>";


                                </script>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="width: 30%; height: 65px; margin: auto; margin-top: 15px; margin-bottom: 20px; box-shadow: 1px 8px 16px 0px #CCCCCC; font-size: 13px; padding: 10px 5px 10px 5px;">
                                <div style="width: 95%; height: 33.3333%;margin: auto;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; margin: auto; line-height: normal;">
                                        <tr>
                                            <td style="width: 26%; text-align: left; padding-left: 5px;">
                                                계좌번호
                                            </td>
                                            <td style="width: 6%;">
                                                :
                                            </td>
                                            <td style="width: 68%; text-align: left; padding-left: 5px;">
                                                <?=$search_string[0]?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="width: 95%; height: 33.3333%;margin: auto;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; margin: auto; line-height: normal;">
                                        <tr>
                                            <td style="width: 26%;  text-align: left; padding-left: 5px;">
                                                기간
                                            </td>
                                            <td style="width: 6%;">
                                                :
                                            </td>
                                            <td style="width: 68%; text-align: left; padding-left: 5px;">
                                                <?=$search_string[1]?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="width: 95%; height: 33.3333%; margin: auto;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; margin: auto; line-height: normal;">
                                        <tr>
                                            <td style="width: 26%; text-align: left; padding-left: 5px;">
                                                순서
                                            </td>
                                            <td style="width: 6%;">
                                                :
                                            </td>
                                            <td style="width: 68%; text-align: left; padding-left: 5px;">
                                                <?=$search_string[2]?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 370px; font-size: 12px;">
                            <div style="width: 100%; height: 100%; overflow-y: scroll;">
                                <div style="width: 97%; height: 30px; margin: auto; margin-top: 15px; margin-bottom: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                    <div style="float: left; width: 18%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">거래일시</div>
                                    </div>
                                    <div style="float: left; width: 4%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">구분</div>
                                    </div>
                                    <div style="float: left; width: 14%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">거래금액</div>
                                    </div>
                                    <div style="float: left; width: 14%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">잔액</div>
                                    </div>
                                    <div style="float: left; width: 17%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">내 통장 표기</div>
                                    </div>
                                    <div style="float: left; width: 17%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">받는 분 통장 표기</div>
                                    </div>
                                    <div style="float: left; width: 16%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">상대 계좌번호</div>
                                    </div>
                                </div>

                                <!-- 계좌 거래내역 -->
                                <?php
                                foreach ($trans_list['time'] as $key => $value){
                                ?>
                                <div style="width: 97%; height: 30px; margin: auto; margin-bottom: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                    <div style="float: left; width: 18%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px; letter-spacing: 0.6px;"><?=$value?></div>
                                    </div>
                                    <?php
                                    if($trans_list['type'][$key] == '입금'){
                                    ?>
                                    <div style="float: left; width: 4%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px; color: #3a8dfd;"><?=$trans_list['type'][$key]?></div>
                                    </div>
                                    <div style="float: left; width: 14%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: right; line-height: 30px; color: #3a8dfd;"><?=number_format($trans_list['amount'][$key])?></div>
                                    </div>
                                    <?php
                                    }else if($trans_list['type'][$key] == '출금'){
                                    ?>
                                    <div style="float: left; width: 4%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px; color: #d7585b;"><?=$trans_list['type'][$key]?></div>
                                    </div>
                                    <div style="float: left; width: 14%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: right; line-height: 30px; color: #d7585b;"><?=number_format($trans_list['amount'][$key])?></div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div style="float: left; width: 14%; height: 30px; background:">
                                        <div style="width: 96%; height: 100%; text-align: right; line-height: 30px;"><?=number_format($trans_list['balance'][$key])?></div>
                                    </div>
                                    <div style="float: left; width: 17%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: left; line-height: 30px;"><?=$trans_list['memo_me'][$key]?></div>
                                    </div>
                                    <div style="float: left; width: 17%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: left; line-height: 30px;"><?=$trans_list['memo_to'][$key]?></div>
                                    </div>
                                    <div style="float: left; width: 16%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;"><?=$trans_list['receive_number_view'][$key]?></div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>