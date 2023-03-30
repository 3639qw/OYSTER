<?php
//$send_ck = $bank_lib->send->Integrity_Check($_POST['from_ac'],$_POST['to_ac'],$_POST['to_amount'],'W');
//if($send_ck == 'Y'){
//    $to_ac = $bank_lib->send->Receive_Account($_POST['to_ac']);
//}
$cr_info = $bank_lib->credit->Limit_Info($_POST['ac']);
$lcr = $bank_lib->credit->Line_Credit($_POST['ac']);


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
        height: 150px;

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
        width: 100%;
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
        -20px -20px 60px #ffffff;
    }

    .balance_box .balance{
        /*background-color: #3a8dfd;*/

        width: 100%;
        padding-left: 30px;
        font-size: 25px;
        font-weight: 600;
        color: #31456A;


    }

    .container_vertical{

        width: 350px;

        margin-top: 40px;
        /*border: 1px solid #000000;*/
        outline: 0;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-between;
        /*justify-content: center;*/
        flex-direction: column;
        align-items: flex-start;

        /*background: #964358;*/
    }
    .container_horizontal{
        height: 200px;
        width: 100%;

        border: none;
        outline: none;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        align-items: start;

        /*background-color: #3a8dfd;*/
    }


    .svg_btn{
        height: 40px;
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


    .container_horizontal .confirm{
        border: hidden;
        width: 100%;
        height: 50px;
        letter-spacing: 2px;
        border-radius: 30px;
        font-size: 18px;
        font-weight: 700;
        color: #FFFFFF;
        text-align: center;
        background-color: #02c8db;
        box-shadow: 3px 3px 8px #b1b1b1,
        -3px -3px 8px #FFFFFF;
        transition: all 0.5s;
    }

    .confirm:hover{
        background-color: #50e5b9;
    }

    .confirm:active{
        background-color: #88ef9e;
    }

    .memo{
        float: right;
        width: 100%;
        height: 100%;
        color: #000000;
        display: inline-block;
        text-align: right;
        font-size: 15px;
        letter-spacing: 2px;
        font-weight: bold;
        padding-right: 5px;
        border: 0px solid #000000;
        background: transparent;
    }





    .select-box {
        position: relative;
        display: block;
        width: 100%;
        /*height: ;*/
        /*font-size: 18px;*/
        color: #60666d;
    }

    .select-box__current {
        position: relative;

        cursor: pointer;
        outline: none;
    }
    .select-box__value {
        display: flex;
    }
    .select-box__input {
        display: none;
    }
    .select-box__input:checked + .select-box__input-text {
        display: block;
    }

    .ac_box{

        padding: 10px 20px 10px 20px;

        background: #F3F3F4;
        box-shadow:  8px 8px 17px #d5d5d5,
        -8px -8px 17px #d5d5d5;
    }


</style>
<script>
    $(document).ready(function(){
        $("#amount").on("keyup", function(){
            $(this).val($(this).val().replace(/\,/g, '').replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,'));
        });
    });
</script>
<div class="main_box" style="box-shadow: none;">
    <div class="top_box">
        <div class="name">
            한도 변경
        </div>
        <div class="button" onclick="location.href='./?log=credit'">
            <svg class="svg_btn" viewBox="0 0 20 20">
                <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
            </svg>
        </div>
    </div>
    <form name="change_credit" id="change_credit" method="post" action="./">

        <input type="text" value="change_ac_cr" name="action" hidden>
        <input type="text" value="<?=$_POST['ac']?>" name="ac" hidden>

        <div class="container_vertical">
            <div class="container_horizontal" style="height: auto; font-size: 15px; justify-content: flex-start; margin-bottom: 10px;">
                변경할 계좌
            </div>
            <div class="container_horizontal" style="height: auto; flex-direction: column;">
                <div class="ac_box" style="width: 100%;">
                    <table border="0" style="border-collapse: collapse; width: 100%;">
                        <tr>
                            <td style="font-weight: 600; font-size: 15px; letter-spacing: 1px;">
                                <?=$account_lst['Integrate']['ac_Number']['Dashed'][$_POST['ac']]?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;">
                                <?=$account_lst['Integrate']['Product'][$_POST['ac']]?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; text-align: right;">
                                현재 설정 금액 <?=number_format($lcr['Credit_Limit'])?>원
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; text-align: right;">
                                증액 가능 금액 <?=number_format($cr_info['maximum'])?>원
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px; text-align: right;">
                                감액 가능 금액 <?=number_format($cr_info['minimum'])?>원
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="container_horizontal" style="height: 45px; background: rgb(243,243,244); box-shadow:  8px 8px 17px #d5d5d5, -8px -8px 17px #d5d5d5; border-radius: 5px; margin-top: 20px; align-items: center;">
                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                    <tr>
                        <td style="text-align: left; padding-left: 15px; font-size: 14px; width: 40%;">
                            변경할 금액
                        </td>
                        <td>
                            <input type="text" name="amount" id="amount" class="memo" style="padding-right: 15px;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="변경할 금액">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="container_horizontal" style="height: 50px; margin-top: 275px;">
                <button class="confirm">변경하기</button>
            </div>
        </div>
    </form>
</div>

<?php
//echo '<pre>';
//print_r($to_ac);
//echo '</pre>';
?>
