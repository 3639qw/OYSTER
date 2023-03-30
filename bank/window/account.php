<?php
$ac_info = $ac_list->ac_Details($_POST['ac']);
?>
<style>
    .main_box{
        height: 95%;
        width: 80%;
        /*border-radius: 10px;*/
        border: none;
        outline: none;
        background-color: #e0e5ec;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        box-shadow: inset 8px 8px 30px #c1c1c1,
        inset -8px -8px 30px #ffffff;
    }

    .main_box .top_box{
        width: 125%;
        height: auto;
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        align-items: flex-start;
        margin-top: -21px;
        <?php
        if($ac_info['stop'] == 'Y'){
        ?>
        background-color: #005379;
        <?php
        }else{
        ?>
        background-color: #018ACC;
        <?php
        }
        ?>
        border-radius: 30px 30px 0 0;

    }
    .top_box .container_vertical{
        width: 100%;
        /*background-color: #e8efff;*/

        /*margin-top: 40px;*/
        /*border: 1px solid #000000;*/
        outline: 0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;

        /*flex-direction: row;*/
        /*justify-content: space-around;*/
        /*align-items: center;*/
    }
    .top_box .container_vertical .container_horizontal{
        height: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-around;
        flex-direction: column;
        align-items: flex-start;

        /*background-color: #3a8dfd;*/
    }

    .top_box .item{
        width: 100%;
        height: 100%;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 2px;
        text-align: center;
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-items: center;
        /*background-color: #d4fa82;*/
    }
    .top_box .item .svg_btn{
        color: #F9FFFF;
        width: 70px;
        height: 45px;
        padding: 5px 0 5px 0;
    }

    .top_box .button{
        width: 40px;
        height: 40px;
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        border-radius: 50%;
    }
    .top_box .button .svg_btn{
        height: 45px !important;
    }
    .top_box .button .svg_btn path,
    .top_box .button .svg_btn polygon,
    .top_box .button .svg_btn rect {
        fill: #FCFFFF;
    }

    .transac_detail .button{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    .transac_detail .button .svg_btn{
        height: 30px !important;
    }
    .transac_detail .button .svg_btn path,
    .transac_detail .button .svg_btn polygon,
    .transac_detail .button .svg_btn rect {
        fill: #0069d9;
    }

    .main_box .middle_menu{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-evenly;
        flex-direction: row;
        align-items: center;
    }

    .middle_menu .active{
        color: #018ACC;
        border-bottom: 3px solid #018ACC;
    }

    .middle_menu .inactive{
        color: #74b7e5;
        border: 0;
    }

    .show{
        display: block !important;
    }
    .hide{
        display: none !important;
    }

    .canvas{
        width: 100%;
        height: 480px;
    }


    .transac_cvs{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-start;
        flex-direction: row;
        align-items: center;
    }

    .transac_cvs .calendar_type{
        height: 1.2rem;
        width: 1.2rem;
        margin-right: 0.5rem;
    }


    .detail_cvs{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-start;
        flex-direction: row;
        align-items: center;
    }

    .small_cvs_vertical{

        width: 100%;
        height: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        align-items: flex-start;

        /*background-color: #3a8dfd;*/
    }

    .small_cvs_horizontal{

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        align-items: flex-start;

        width: 100%;

        /*background-color: #d4fa82;*/
    }

    .small_cvs_horizontal2{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-around;
        flex-direction: column;
        align-items: flex-start;

        width: 100%;
    }



    .sub_cvs_vertical{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: flex-start;

        /*background: #31456A;*/
    }

    .transac_subcvs_vertical{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: flex-start;
    }

    .transac_cvs_horizontal{
        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: center;
        flex-direction: row;
        align-items: center;
    }

    .date_field{
        box-shadow: none;
        border: 0;
        outline: 0;
        background: #0069d9;
        width: 120px;
        height: 30px;
        color: #FFFFFF;
        text-align: center;
        border-radius: 5px;
    }
    .date_field::-webkit-calendar-picker-indicator{
        filter: invert(1);
    }





    .sort_select{
        width: 120px;
        height: 30px;
        background: #FFFFFF;
        box-shadow: 0px;
        color: #0069d9;
        border: 1px solid #0069d9;
        border-radius: 5px;
        padding-left: 2px;
    }

    .transac_list{
        width: 100%;
        height: 100%;

        /*background: #7bbcde;*/
        overflow-y: scroll;
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
    }

    .transac_list::-webkit-scrollbar{
        display: none;
    }


    .wrapper{
        /*display: inline-flex;*/
        /*background: #fff;*/
        height: 100%;
        width: 110px;
        letter-spacing: 1.5px;
    }
    .wrapper .option{
        height: 30px;
        width: 100%;
        display: flex;
        align-items: center;
        /*justify-content: space-evenly;*/
        /*margin: 0 5px;*/
        border-radius: 5px;
        cursor: pointer;
        padding: 0 10px;
        /*border: 2px solid lightgrey;*/
        background: #fff;
        transition: all 0.3s ease;
    }
    .wrapper .option .dot{
        height: 20px;
        width: 20px;
        background: #d9d9d9;
        border-radius: 50%;
        position: relative;
    }
    .wrapper .option .dot::before{
        position: absolute;
        content: "";
        top: 4px;
        left: 4px;
        width: 12px;
        height: 12px;
        background: #0069d9;
        border-radius: 50%;
        opacity: 0;
        transform: scale(1.5);
        transition: all 0.3s ease;
    }
    .wrapper input[type="radio"]{
        display: none;
    }
    #option-1:checked:checked ~ .option-1,
    #option-2:checked:checked ~ .option-2{
        border-color: #0069d9;
        background: #0069d9;
    }
    #option-1:checked:checked ~ .option-1 .dot,
    #option-2:checked:checked ~ .option-2 .dot{
        background: #fff;
    }
    #option-1:checked:checked ~ .option-1 .dot::before,
    #option-2:checked:checked ~ .option-2 .dot::before{
        opacity: 1;
        transform: scale(1);
    }
    .wrapper .option span{
        font-size: 13px;
        color: #808080;
        padding: 0 5px 0 5px;
    }
    #option-1:checked:checked ~ .option-1 span,
    #option-2:checked:checked ~ .option-2 span{
        color: #fff;
    }

</style>
<?php


if ($_POST['period_type'] == '1') {
    $fnc_var['Account_Number'] = $_POST['ac'];
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
} else if ($_POST['period_type'] == '2') {
    $fnc_var['Account_Number'] = $_POST['ac'];
    $fnc_var['Period'][0] = '2';
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
}else{
    if(!isset($_POST['TID'])){
        $fnc_var['Account_Number'] = $_POST['ac'];
        $fnc_var['Period'][0] = '1';
        $fnc_var['Period'][1] = date('Ym');
        $fnc_var['Sort'] = 'desc';
        $ss = '최근';

        $search_string[0] = substr($fnc_var['Account_Number'], 0, 6) . '-' . substr($fnc_var['Account_Number'], 6, 2) . '-' . substr($fnc_var['Account_Number'], 8, 6);
        $search_string[1] = substr($fnc_var['Period'][1], 0, 4) . '.' . substr($fnc_var['Period'][1], 4, 2);
        $search_string[2] = $ss . ' 순';

    }
}

if(!isset($_POST['TID'])){
    $count = 1;
    $transac_result = $ac_trans->Transaction_List($fnc_var['Account_Number'],$fnc_var['Period'],$fnc_var['Sort']);
    while ($list = mysqli_fetch_assoc($transac_result)){
        foreach ($list as $key => $value){
            $transac_list[$key][$count] = $value;
            if($key == 'receive_number' && $value != '' && $value != null){
                $transac_list[$key.'_Dashed'][$count] = substr($value,0,6).'-'.substr($value,6,2).'-'.substr($value,8,6);
            }
        }
        $count++;
    }
}else{
    $detail_result = $ac_trans->Transac_Detail($_POST['ac'],$_POST['TID']);
    while ($list = mysqli_fetch_assoc($detail_result)){
        foreach ($list as $key => $value){
            $transac_list[$key] = $value;
            if($key == 'receive_number' && $value != '' && $value != null){
                $transac_list[$key.'_Dashed'] = substr($value,0,6).'-'.substr($value,6,2).'-'.substr($value,8,6);
            }
        }
    }
}

//echo '<pre>';
//print_r($fnc_var);
//echo '</pre>';

?>
<script>


$(function (){

    $("#transac_btn").on("click",function (){
        if($(this).hasClass("inactive") === true){
            $(this).removeClass("inactive");
            $(this).addClass("active");

            $("#detail_btn").removeClass("active");
            $("#detail_btn").addClass("inactive");

            $("#transac_canvas").removeClass("hide");
            $("#transac_canvas").addClass("show");
            $("#detail_canvas").removeClass("show");
            $("#detail_canvas").addClass("hide");

        }
    });

    $("#detail_btn").on("click",function (){
        if($(this).hasClass("inactive") === true){
            $(this).removeClass("inactive");
            $(this).addClass("active");

            $("#transac_btn").removeClass("active");
            $("#transac_btn").addClass("inactive");

            $("#transac_canvas").removeClass("show");
            $("#transac_canvas").addClass("hide");
            $("#detail_canvas").removeClass("hide");
            $("#detail_canvas").addClass("show");


        }
    });

    $("input[name=period_type]").on("change",function (){
        if($(this).val() == '1'){
            $(".month_period").attr("hidden",false);
            $(".month_period").attr("disabled",false);

            $(".date_period").attr("hidden",true);
            $(".date_period").attr("disabled",true);


        }else if($(this).val() == '2'){
            $(".month_period").attr("hidden",true);
            $(".month_period").attr("disabled",true);

            $(".date_period").attr("hidden",false);
            $(".date_period").attr("disabled",false);

        }
    });



})


</script>
<div class="main_box" style="box-shadow: none;">
    <div class="top_box">
        <div class="container_vertical" style="height: 40px; margin-top: 40px;">
            <div class="container_horizontal" style="width: 50%; color: #F9FFFF; font-family: 'LINESeedKR-Bd';">
                <div style="font-size: 12px; font-weight: 600; letter-spacing: 2px;">
                    <?=$account_lst['Integrate']['Product'][$ac_info['ac_number']]?>
                </div>
                <div style="font-size: 15px; font-weight: 700; letter-spacing: 3px;">
                    <?=$ac_info['ac_number_dashed']?>
                </div>
            </div>
            <div class="container_horizontal button" onclick="location.href='./?log=ac'">
                <svg class="svg_btn" viewBox="0 0 20 20">
                    <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
                </svg>
            </div>
        </div>
        <div class="container_vertical" style="height: 120px;">
            <div class="container_horizontal" style="color: #F9FFFF; justify-content: center;">
                <div style="font-size: 15px; letter-spacing: 2px; width: 100%; text-align: center;">
                    잔액
                </div>
                <div style="font-size: 23px; letter-spacing: 1px; color: #E8F0F8">
                    ₩ <?=number_format($ac_info['balance'])?>
                </div>
            </div>
        </div>
        <div class="container_vertical" style="margin-bottom: 20px;">
            <div class="container_horizontal" style="color: #F9FFFF; width: 100%; height: 100%; flex-direction: row;">
                <?php
                if($ac_info['deposit_type'] == '입출금'){
                ?>
                <div class="item" style="">
                    <div style="font-size: 12px; letter-spacing: 2px; width: 100%; text-align: center;">
                        잔여 신용한도
                    </div>
                    <div style="font-size: 16px; letter-spacing: 1px; color: #E8F0F8">
                        ₩ <?=number_format($ac_info['Credit_Remain'])?>
                    </div>
                </div>
                <div class="item" onclick="location.href='./?log=transfer'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-send svg_btn" viewBox="0 0 16 16">
                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                </div>
                <?php
                }else{
                ?>
                <div class="item">
                    <div style="height: 45px;">

                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="middle_menu" style="width: 125%; height: 50px;">
        <div class="active" id="transac_btn">
            거래내역
        </div>
        <div class="inactive" id="detail_btn">
            계좌상세
        </div>
    </div>
    <div class="show canvas transac_cvs" id="transac_canvas">
        <div class="small_cvs_vertical" style="height: auto;">
            <form method="post" action="./">
                <div class="small_cvs_horizontal">
                    <div class="sub_cvs_vertical">
                        <input type="text" name="action" value="ac" hidden>
                        <input type="text" name="ac" value="<?=$ac_info['ac_number']?>" hidden>
                        <div class="wrapper">
                            <input type="radio" name="period_type" id="option-1" value="1" checked>
                            <input type="radio" name="period_type" id="option-2" value="2">

                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>월별</span>
                            </label>
                            <label for="option-2" class="option option-2" style="margin-top: 5px;">
                                <div class="dot"></div>
                                <span>날짜 지정</span>
                            </label>
                        </div>
                    </div>
                    <div class="sub_cvs_vertical">
                        <div class="transac_cvs_horizontal month_period" style="height: auto; width: 264px; margin: 0 5px 0 0; justify-content: left; padding-left: 10px;">
                            <input type="month" class="date_field month_period" name="period_month" min="2000-01" max="2099-12" value="<?=date("Y-m",time())?>">
                        </div>
                        <div class="transac_cvs_horizontal date_period" style="height: auto; width: 264px; margin: 0 5px 0 0; justify-content: left; padding-left: 10px;" hidden>
                            <input type="date" class="date_field date_period" style="width: 130px;" name="period_from" min="2000-01-01" max="2099-12-31" value="<?=$_POST['period_from']?>" disabled>
                            <a style="color: #0069d9; font-size: 20px;">&nbsp;-&nbsp;</a>
                            <input type="date" class="date_field date_period" style="width: 130px;" name="period_to" min="2000-01-01" max="2099-12-31" value="<?=$_POST['period_to']?>" disabled>
                        </div>
                        <div class="transac_cvs_horizontal" style="height: auto; width: 264px; margin: 5px 0 0 0; justify-content: flex-start; padding-left: 10px;">
                            <select class="sort_select" name="sort">
                                <option value="desc">최근 순</option>
                                <option value="asc">과거 순</option>
                            </select>
                            <button style="width: 45px; height: 30px; background: transparent; color: #0069d9; border: 1px solid #0069d9; border-radius: 5px; margin-left: 5px;">
                                조회
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if($_POST['TID'] == '' || $_POST['TID'] == null
        ){
        ?>
        <div class="small_cvs_horizontal" style="margin-top: 5px; font-size: 14px; justify-content: flex-start; color: #333333;">
            <?=$search_string[1].' '.$search_string[2]?>
        </div>
        <div class="small_cvs_vertical" style="height: 400px; margin-top: 5px;">
            <div class="transac_list">
                <?php
                $integer = 0;
                foreach ($transac_list['time'] as $key => $value){
                    $integer++;
                ?>
                <form name="ac_transac" id="frm_<?=$integer?>" method="post" action="./">
                    <input name="action" value="ac" hidden>
                    <input name="ac" value="<?=$_POST['ac']?>" hidden>
                    <input name="TID" value="<?=$transac_list['tid'][$key]?>" hidden>
                    <input name="id" value="<?=$key?>" hidden>

                    <div class="small_cvs_horizontal2" style="height: auto; border-bottom: 1px solid #a4a4a4;" onclick="document.getElementById('frm_<?=$integer?>').submit();">
                        <div class="transac_subcvs_vertical" style="height: 100%; width: 100%; padding-left: 5px; margin-top: 10px;">
                            <div style="color: #000000; font-size: 12px;">
                                <?=$value?>
                            </div>
                            <div style="color: #000000; font-size: 15px;">
                                <?=$transac_list['memo_me'][$key]?>
                            </div>
                        </div>
                        <div class="transac_subcvs_vertical" style="height: 100%; width: 100%; align-items: flex-end; padding-right: 5px; margin-bottom: 10px;">
                            <div style="font-size: 14px;">
                                <?php
                                if($transac_list['type'][$key] == '입금'){
                                ?>
                                <a style="color: #3194F7"><?=$transac_list['type'][$key]?> <a style="color: #3194F7; font-weight: 600;"><?=number_format($transac_list['amount'][$key])?></a></a>&nbsp;<a style="color: #333333;">원</a>
                                <?php
                                }else if($transac_list['type'][$key] == '출금'){
                                ?>
                                    <a style="color: #DD6E6E"><?=$transac_list['type'][$key]?> <a style="color: #DD6E6E; font-weight: 600;"><?=number_format($transac_list['amount'][$key])?></a></a>&nbsp;<a style="color: #333333;">원</a>
                                <?php
                                }
                                ?>
                            </div>
                            <div style="color: #a4a4a4; font-size: 13px; ">
                                잔액 <?=number_format($transac_list['balance'][$key])?>원
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
        <?php
        }else{
        ?>
        <div class="small_cvs_vertical" style="height: 230px; margin-top: 15px;">
            <div class="small_cvs_horizontal" style="height: 70px; align-items: center;">
                <div style="width: 90%; ">
                    <?=$transac_list['time']?>
                </div>
                <div class="transac_detail" style="width: 10%;">
                    <div class="button" onclick="history.back()">
                        <svg class="svg_btn" viewBox="0 0 20 20">
                            <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="small_cvs_horizontal" style="height: 35px;">
                <div style="width: 50%;">
                    거래금액
                </div>
                <div style="width: 50%; text-align: right;">
                    <?php
                    if($transac_list['type'] == '입금'){
                    ?>
                    <?=$transac_list['type'].' <a style="color: #3194F7; letter-spacing: 1px;">'.number_format($transac_list['amount']).'</a> 원'?>
                    <?php
                    }else if($transac_list['type'] == '출금'){
                    ?>
                    <?=$transac_list['type'].' <a style="color: #DD6E6E; letter-spacing: 1px;">'.number_format($transac_list['amount']).'</a> 원'?>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="small_cvs_horizontal" style="height: 35px;">
                <div style="width: 50%;">
                    거래후 잔액
                </div>
                <div style="width: 50%; text-align: right; letter-spacing: 1px;">
                    <?=number_format($transac_list['balance']).' 원'?>
                </div>
            </div>
            <div class="small_cvs_horizontal" style="height: 35px;">
                <div style="width: 50%;">
                    거래유형
                </div>
                <div style="width: 50%; text-align: right;">
                    <?=$transac_list['type']?>
                </div>
            </div>
            <div class="small_cvs_horizontal" style="height: 35px;">
                <div style="width: 50%;">
                    상대 계좌
                </div>
                <div style="width: 50%; text-align: right; letter-spacing: 0.5px;">
                    <?=$transac_list['receive_number_Dashed']?>
                </div>
            </div>
            <div class="small_cvs_horizontal" style="height: 35px;">
                <div style="width: 50%;">
                    내 통장 표시
                </div>
                <div style="width: 50%; text-align: right; letter-spacing: 1px;">
                    <?=$transac_list['memo_me']?>
                </div>
            </div>
            <div class="small_cvs_horizontal" style="height: 35px;">
                <div style="width: 50%;">
                    상대 통장 표시
                </div>
                <div style="width: 50%; text-align: right; letter-spacing: 1px;">
                    <?=$transac_list['memo_to']?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="hide canvas detail_cvs" id="detail_canvas" style="margin-top: 10px;">
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                계좌번호
            </div>
            <div style="width: 50%; text-align: right; letter-spacing: 1px;">
                <?=$ac_info['ac_number_dashed']?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                과목명
            </div>
            <div style="width: 50%; text-align: right;">
                <?=$ac_info['type']?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                상품명
            </div>
            <div style="width: 50%; text-align: right;">
                <?=$ac_info['product']?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                잔액
            </div>
            <div style="width: 50%; text-align: right;">
                <?='₩ '.number_format($ac_info['balance'])?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                출금가능금액
            </div>
            <div style="width: 50%; text-align: right;">
                <?='₩ '.number_format($ac_info['Withdrawable_Amount'])?>
            </div>
        </div>
        <?php
        if($ac_info['deposit_type'] == '입출금'){
        ?>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                총 신용한도
            </div>
            <div style="width: 50%; text-align: right;">
                <?='₩ '.number_format($ac_info['Credit_Limit'])?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                잔여 신용한도
            </div>
            <div style="width: 50%; text-align: right;">
                <?='₩ '.number_format($ac_info['Credit_Remain'])?>
            </div>
        </div>
        <?php
        }else{
        ?>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                이자수령계좌
            </div>
            <div style="width: 50%; text-align: right;">
                <?=$ac_info['Interest_ac']?>
            </div>
        </div>
        <?php
        }
        ?>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                신규일자
            </div>
            <div style="width: 50%; text-align: right;">
                <?=$ac_info['reg_date']?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                최종거래일자
            </div>
            <div style="width: 50%; text-align: right;">
                <?=$ac_info['Last_Date']?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 50%;">
                계좌별칭
            </div>
            <div style="width: 50%; text-align: right;">
                <?=$ac_info['alias']?>
            </div>
        </div>
        <div class="small_cvs_horizontal">
            <div style="width: 20%;">
                특이사항
            </div>
            <div style="width: 80%; text-align: right;">
                <?=$ac_info['special']?>
            </div>
        </div>
    </div>
</div>