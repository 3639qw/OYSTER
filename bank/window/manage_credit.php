<?php
$credit = $bank_lib->credit->Credit_Info();

foreach ($account_lst['Active_WD'] as $key => $value){
    $lc = $bank_lib->credit->Line_Credit($key);
    $credit['remain'] += $lc['Credit_Remain'];
    $credit['ac']['limit'][$key] += $lc['Credit_Limit'];
    $credit['ac']['remain'][$key] += $lc['Credit_Remain'];
}
$credit['notsetup'] = ($credit['maximum'] - $credit['setup']);

//echo '<pre>';
//print_r($credit);
//echo '</pre>';

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
        justify-content: center;
        flex-direction: column;
        align-items: center;
        box-shadow: inset 8px 8px 30px #c1c1c1,
        inset -8px -8px 30px #ffffff;
    }


    .main_box .top_box{
        width: 350px;
        height: 50px;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        align-items: start;

        /*background-color: #b60000;*/

    }
    .top_box .name{
        height: 50px;
        font-size: 23px;
        font-weight: 600;
        letter-spacing: 2px;
        color: #31456A;
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

        /*background-color: #00F8FF;*/
    }
    .top_box .button{
        width: 50px;
        height: 50px;
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
        background: rgb(243,243,244);
        box-shadow:  8px 8px 17px #d5d5d5,
        -8px -8px 17px #d5d5d5;

        /*background-color: #3a8dfd;*/
    }
    .top_box .button .svg_btn{
        height: 30px !important;
    }
    .top_box .button:hover{
        box-shadow:  5px 5px 44px #a1a1a1,
        -5px -5px 44px #ffffff;
        transition: 0.4s;
    }
    .top_box .button:active{
        background: #e0e0e0;
        box-shadow: inset 20px 20px 60px #bebebe,
        inset -20px -20px 60px #ffffff;
    }


    .main_box .balance_box{
        width: 380px;
        height: 100px;
        margin-top: 20px;

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

        border-radius: 25px;
        background: #E8F0F8;
        box-shadow:  20px 20px 60px #bebebe,
        -10px -10px 30px #ffffff;
    }

    .balance_box .balance{
        /*background-color: #3a8dfd;*/

        width: 100%;
        padding-left: 30px;
        font-size: 20px;
        font-weight: 600;
        color: #31456A;


    }

    .main_box .divide{
        width: 380px;
        height: auto;
        margin-top: 20px;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        align-items: center;

        /*background: #6ab4ff;*/
    }

    .limit{
        width: 180px;
        height: 80px;

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

        border-radius: 25px;
        background: #E8F0F8;
        box-shadow:  20px 20px 60px #bebebe,
        -5px -5px 30px #ffffff;
    }
    .limit .txt{
        width: 100%;
        padding-left: 30px;
        font-size: 15px;
        font-weight: 600;
        color: #31456A;
    }

    .ac_container_vertical{
        width: 350px;
        height: 560px;

        margin-top: 20px;
        /*border: 1px solid #000000;*/
        outline: 0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: flex-start;
        /*justify-content: center;*/
        flex-direction: column;
        align-items: flex-start;

        /*background-color: #b60000;*/

    }

    .ac_container_horizontal{
        /*height: 80px;*/
        width: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        align-items: start;

        /*background-color: #3a8dfd;*/

    }

    .ac_container_horizontal .text{
        font-size: 1.0em;
        font-weight: 300;
        letter-spacing: 2px;
        color: #31456A;
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

    .ac_container_horizontal .ac_list{
        width: 100%;
        height: 100%;
        font-size: 1.0em;
        font-weight: 300;
        letter-spacing: 2px;
        color: #31456A;
        border: none;
        outline: none;

        overflow-y: scroll;
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */

        /*background: #d4fa82;*/

        /*box-shadow:  5px 5px 16px #c7c7c7,*/
        /*-5px -5px 16px #f9f9f9;*/
    }
    .ac_container_horizontal .ac_list::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera*/
    }

    .ac_list .account{
        /*height: 80px;*/
        width: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: start;
        flex-direction: row;
        align-items: center;
        border-radius: 30px;

        margin-bottom: 20px;
        background: #F8FAFF;
        /*box-shadow:  5px 5px 16px #c7c7c7,*/
        /*-5px -5px 16px #f9f9f9;7c7c7,*/
        /*-5px -5px 16px #f9f9f9;*/
    }

    .account .ac_num_container{
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

        width: 295px;
        height: 100%;
        letter-spacing: 0.5px;
        font-size: 13px;
        /*background-color: #3a8dfd;*/
    }



    .svg_btn{
        height: 55px;
    }

    .svg_btn path,
    .svg_btn polygon,
    .svg_btn rect {
        fill: #a4a4a4;
    }

    .svg_btn circle {
        stroke: #a4a4a4;
        stroke-width: 1;
    }




    .ac_svg{
        height: 55px;
        margin: 0 10px 0 15px;
    }

    .ac_svg path,
    .ac_svg polygon,
    .ac_svg rect {
        fill: #a4a4a4;
    }

    .ac_svg circle {
        stroke: #a4a4a4;
        stroke-width: 1;
    }

</style>
<div class="main_box" style="box-shadow: none;">
    <div class="top_box" style="margin-top: 37px;">
        <div class="name">
            신용한도 관리
        </div>
        <div class="button" onclick="location.href='/bank'">
            <svg class="svg_btn" viewBox="0 0 20 20">
                <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
            </svg>
        </div>
    </div>
    <div class="balance_box" style="margin-top: 90px;">
        <div class="balance">
            <a style="font-size: 15px; font-weight: 600">총 신용한도</a><br>
            ₩ <?=number_format($credit['maximum'])?>
        </div>
    </div>
    <div class="divide">
        <div class="limit">
            <div class="txt">
                <a style="font-size: 13px; font-weight: 600">설정한 신용한도</a><br>
                ₩ <?=number_format($credit['setup'])?>
            </div>
        </div>
        <div class="limit">
            <div class="txt">
                <a style="font-size: 13px; font-weight: 600">남은 신용한도</a><br>
                ₩ <?=number_format($credit['remain'])?>
            </div>
        </div>
    </div>
    <div class="ac_container_vertical">
        <div class="ac_container_horizontal" style="height: 2em;">
            <div class="text">
                <div>계좌별 한도 변경</div>
            </div>
        </div>
        <div class="ac_container_horizontal" style="height: 390px;">
            <div class="ac_list">
                <?php
                $count = 0;
                foreach ($account_lst['Active_WD'] as $key => $value){
                    $count ++;
                    if($account_lst['Integrate']['canCredit'][$key] == 'Y'){
                ?>
                <form name="ac_transac" id="frm_<?=$count?>" method="post" action="./">
                    <input name="ac" value="<?=$account_lst['Integrate']['ac_Number']['Raw'][$key]?>" hidden>
                    <input name="action" value="change_credit" hidden>
                    <div class="account" style="width: 100%; height: 100px;" onClick="document.getElementById('frm_<?=$count?>').submit();">
                        <div style="width: 100px;">
                            <svg class="ac_svg" viewBox="0 0 20 20">
                                <path fill="none" d="M5.229,6.531H4.362c-0.239,0-0.434,0.193-0.434,0.434c0,0.239,0.194,0.434,0.434,0.434h0.868c0.24,0,0.434-0.194,0.434-0.434C5.663,6.724,5.469,6.531,5.229,6.531 M10,6.531c-1.916,0-3.47,1.554-3.47,3.47c0,1.916,1.554,3.47,3.47,3.47c1.916,0,3.47-1.555,3.47-3.47C13.47,8.084,11.916,6.531,10,6.531 M11.4,11.447c-0.071,0.164-0.169,0.299-0.294,0.406c-0.124,0.109-0.27,0.191-0.437,0.248c-0.167,0.057-0.298,0.09-0.492,0.098v0.402h-0.35v-0.402c-0.21-0.004-0.352-0.039-0.527-0.1c-0.175-0.064-0.324-0.154-0.449-0.27c-0.124-0.115-0.221-0.258-0.288-0.428c-0.068-0.17-0.1-0.363-0.096-0.583h0.664c-0.004,0.259,0.052,0.464,0.169,0.613c0.116,0.15,0.259,0.229,0.527,0.236v-1.427c-0.159-0.043-0.268-0.095-0.425-0.156c-0.157-0.061-0.299-0.139-0.425-0.235C8.852,9.752,8.75,9.631,8.672,9.486C8.594,9.34,8.556,9.16,8.556,8.944c0-0.189,0.036-0.355,0.108-0.498c0.072-0.144,0.169-0.264,0.292-0.36c0.122-0.097,0.263-0.17,0.422-0.221c0.159-0.052,0.277-0.077,0.451-0.077V7.401h0.35v0.387c0.174,0,0.29,0.023,0.445,0.071c0.155,0.047,0.29,0.118,0.404,0.212c0.115,0.095,0.206,0.215,0.274,0.359c0.067,0.146,0.103,0.315,0.103,0.508H10.74c-0.007-0.201-0.06-0.354-0.154-0.46c-0.096-0.106-0.199-0.159-0.408-0.159v1.244c0.174,0.047,0.296,0.102,0.462,0.165c0.167,0.063,0.314,0.144,0.443,0.241c0.128,0.099,0.23,0.221,0.309,0.366c0.077,0.146,0.116,0.324,0.116,0.536C11.509,11.092,11.473,11.283,11.4,11.447 M18.675,4.795H1.326c-0.479,0-0.868,0.389-0.868,0.868v8.674c0,0.479,0.389,0.867,0.868,0.867h17.349c0.479,0,0.867-0.389,0.867-0.867V5.664C19.542,5.184,19.153,4.795,18.675,4.795M1.76,5.664c0.24,0,0.434,0.193,0.434,0.434C2.193,6.336,2,6.531,1.76,6.531S1.326,6.336,1.326,6.097C1.326,5.857,1.52,5.664,1.76,5.664 M1.76,14.338c-0.24,0-0.434-0.195-0.434-0.434c0-0.24,0.194-0.434,0.434-0.434s0.434,0.193,0.434,0.434C2.193,14.143,2,14.338,1.76,14.338 M18.241,14.338c-0.24,0-0.435-0.195-0.435-0.434c0-0.24,0.194-0.434,0.435-0.434c0.239,0,0.434,0.193,0.434,0.434C18.675,14.143,18.48,14.338,18.241,14.338 M18.675,12.682c-0.137-0.049-0.281-0.08-0.434-0.08c-0.719,0-1.302,0.584-1.302,1.303c0,0.152,0.031,0.297,0.08,0.434H2.981c0.048-0.137,0.08-0.281,0.08-0.434c0-0.719-0.583-1.303-1.301-1.303c-0.153,0-0.297,0.031-0.434,0.08V7.318c0.136,0.049,0.28,0.08,0.434,0.08c0.718,0,1.301-0.583,1.301-1.301c0-0.153-0.032-0.298-0.08-0.434H17.02c-0.049,0.136-0.08,0.28-0.08,0.434c0,0.718,0.583,1.301,1.302,1.301c0.152,0,0.297-0.031,0.434-0.08V12.682z M18.241,6.531c-0.24,0-0.435-0.194-0.435-0.434c0-0.24,0.194-0.434,0.435-0.434c0.239,0,0.434,0.193,0.434,0.434C18.675,6.336,18.48,6.531,18.241,6.531 M9.22,8.896c0,0.095,0.019,0.175,0.058,0.242c0.039,0.066,0.088,0.124,0.148,0.171c0.061,0.047,0.13,0.086,0.21,0.115c0.079,0.028,0.11,0.055,0.192,0.073V8.319c-0.21,0-0.322,0.044-0.437,0.132C9.277,8.54,9.22,8.688,9.22,8.896 M15.639,12.602h-0.868c-0.239,0-0.434,0.195-0.434,0.434c0,0.24,0.194,0.436,0.434,0.436h0.868c0.24,0,0.434-0.195,0.434-0.436C16.072,12.797,15.879,12.602,15.639,12.602 M10.621,10.5c-0.068-0.052-0.145-0.093-0.23-0.124c-0.086-0.031-0.123-0.06-0.212-0.082v1.374c0.209-0.016,0.332-0.076,0.465-0.186c0.134-0.107,0.201-0.281,0.201-0.516c0-0.11-0.02-0.202-0.062-0.277C10.743,10.615,10.688,10.551,10.621,10.5"></path>
                            </svg>
                        </div>
                        <div class="ac_num_container">
                            <div style="width: 100%; height: auto; font-size: 14px; font-weight: 800">
                                <?=$account_lst['Integrate']['Product'][$key]?>
                                <br>
                                <a style="font-size: 12px; font-weight: 600; color: #a4a4a4"><?=$account_lst['Integrate']['ac_Number']['Dashed'][$key]?></a>
                            </div>
                            <div style="width: 100%; height: auto; text-align: right; letter-spacing: 0px; padding-right: 20px; color: #3D4F72; font-size: 13px;">
                                설정 금액 <?=number_format($credit['ac']['limit'][$account_lst['Integrate']['ac_Number']['Raw'][$key]])?>원
                            </div>
                            <div style="width: 100%; height: auto; text-align: right; letter-spacing: 0px; padding-right: 20px; color: #3D4F72; font-size: 13px;">
                                남은 금액 <?=number_format($credit['ac']['remain'][$account_lst['Integrate']['ac_Number']['Raw'][$key]])?>원
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>