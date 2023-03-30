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
        box-shadow:  8px 8px 17px #d5d5d5,
        -8px -8px 17px #d5d5d5;
        cursor: pointer;
        outline: none;
    }
    .select-box__current:focus + .select-box__list {
        opacity: 1;
        -webkit-animation-name: none;
        animation-name: none;
    }
    .select-box__current:focus + .select-box__list .select-box__option {
        cursor: pointer;
    }
    .select-box__current:focus .select-box__icon {
        -webkit-transform: translateY(-50%) rotate(180deg);
        transform: translateY(-50%) rotate(180deg);
    }
    .select-box__icon {
        position: absolute;
        top: 50%;
        right: 15px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        width: 20px;
        opacity: 0.3;
        transition: 0.2s ease;
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
    .select-box__input-text {
        display: none;
        width: 100%;
        margin: 0;
        padding: 10px 20px 10px 20px;
        background: rgb(243,243,244);

        /*border-radius: 25px;*/
    }
    .select-box__list {
        position: absolute;
        width: 100%;
        padding: 0;
        list-style: none;
        opacity: 0;
        z-index: 10;
        -webkit-animation-name: HideList;
        animation-name: HideList;
        -webkit-animation-duration: 0.5s;
        animation-duration: 0.5s;
        -webkit-animation-delay: 0.5s;
        animation-delay: 0.5s;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        -webkit-animation-timing-function: step-start;
        animation-timing-function: step-start;
        box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
    }
    .select-box__option {
        display: block;
        padding: 10px;
        background-color: #fff;
    }
    .select-box__option:hover, .select-box__option:focus {
        color: #546c84;
        background-color: #e8f0f8;
    }

    @-webkit-keyframes HideList {
        from {
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
        }
        to {
            -webkit-transform: scaleY(0);
            transform: scaleY(0);
        }
    }

    @keyframes HideList {
        from {
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
        }
        to {
            -webkit-transform: scaleY(0);
            transform: scaleY(0);
        }
    }



    .transfer_to{
        float: right;
        width: 98%;
        height: 100%;
        color: #000000;
        display: inline-block;
        text-align: right;
        font-size: 19px;
        letter-spacing: 2px;
        font-weight: bold;
        padding-right: 5px;
        border: 0px solid #000000;
        background: transparent;
    }

    .transfer_to::placeholder{
        font-size: 15px;
        color: #757575;
        text-align: right;
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
            적립식계좌 입금
        </div>
        <div class="button" onclick="location.href='./'">
            <svg class="svg_btn" viewBox="0 0 20 20">
                <path fill="none" d="M8.388,10.049l4.76-4.873c0.303-0.31,0.297-0.804-0.012-1.105c-0.309-0.304-0.803-0.293-1.105,0.012L6.726,9.516c-0.303,0.31-0.296,0.805,0.012,1.105l5.433,5.307c0.152,0.148,0.35,0.223,0.547,0.223c0.203,0,0.406-0.08,0.559-0.236c0.303-0.309,0.295-0.803-0.012-1.104L8.388,10.049z"></path>
            </svg>
        </div>
    </div>
    <form name="transfer_ac" id="transfer_ac" method="post" action="./">
        <input type="text" value="savings_deposit" name="action" hidden>
        <div class="container_vertical" style="margin-top: -50px;">
            <div class="container_horizontal" style="height: auto; font-size: 15px; justify-content: flex-start; margin-bottom: 10px;">
                출금할 입출금계좌
            </div>
            <div class="container_horizontal" style="height: auto;">
                <div class="select-box">
                    <div class="select-box__current" tabindex="1">
                        <?php
                        foreach ($account_lst['Active_WD'] as $key => $value){
                            if($account_lst['Integrate']['stop'][$key] == 'N'){
                        ?>
                        <div class="select-box__value">
                            <input class="select-box__input" type="radio" id="<?=$value?>" value="<?=$value?>" name="from_ac" checked="checked"/>
                            <table class="select-box__input-text" style="border-collapse: collapse; height: 100%;">
                                <tr style="font-weight: bold; font-size: 15px; letter-spacing: 1px;">
                                    <td style="font-weight: 600">
                                        <?=$account_lst['Integrate']['ac_Number']['Dashed'][$key]?>
                                    </td>
                                </tr>
                                <tr style="font-size: 13px; ">
                                    <td>
                                        <?=$account_lst['Integrate']['Product'][$key]?>
                                    </td>
                                </tr>
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right; width: 270px;">
                                        잔액 <?=number_format($account_lst['ac_Balance'][$key])?>원
                                    </td>
                                </tr>
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right;">
                                        출금가능금액 <?=number_format($account_lst['withdrawable']['ac_withdrawable'][$key])?>원
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php
                            }
                        }
                        ?>
                        <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
                    </div>

                    <ul class="select-box__list">
                        <?php
                        foreach ($account_lst['Active_WD'] as $key => $value){
                            if($account_lst['Integrate']['stop'][$key] == 'N'){
                        ?>
                        <li>
                            <label class="select-box__option" for="<?=$value?>" aria-hidden="aria-hidden">
                                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                    <tr style="font-weight: bold; font-size: 15px; letter-spacing: 1px;">
                                        <td style="font-weight: 600;">
                                            <?=$account_lst['Integrate']['ac_Number']['Dashed'][$key]?>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px; ">
                                        <td>
                                            <?=$account_lst['Integrate']['Product'][$key]?>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px; ">
                                        <td style="text-align: right;">
                                            잔액 <?=number_format($account_lst['ac_Balance'][$key])?>원
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px; ">
                                        <td style="text-align: right;">
                                            출금가능금액 <?=number_format($account_lst['withdrawable']['ac_withdrawable'][$key])?>원
                                        </td>
                                    </tr>
                                </table>
                            </label>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="container_horizontal" style="height: auto; font-size: 15px; justify-content: flex-start; margin-top: 20px; margin-bottom: 10px;">
                입금할 적립식계좌
            </div>
            <div class="container_horizontal" style="height: auto;">
                <div class="select-box">
                    <div class="select-box__current" tabindex="1">
                        <?php
                        foreach ($account_lst['Active_Savings'] as $key => $value){
                            if($account_lst['Integrate']['stop'][$key] == 'N'){
                        ?>
                        <div class="select-box__value">
                            <input class="select-box__input" type="radio" id="<?='to_'.$value?>" value="<?=$value?>" name="to_ac" checked="checked"/>
                            <table class="select-box__input-text" style="border-collapse: collapse; height: 100%;">
                                <tr style="font-weight: bold; font-size: 15px; letter-spacing: 1px;">
                                    <td style="font-weight: 600">
                                        <?=$account_lst['Integrate']['ac_Number']['Dashed'][$key]?>
                                    </td>
                                </tr>
                                <tr style="font-size: 13px; ">
                                    <td>
                                        <?=$account_lst['Integrate']['Product'][$key]?>
                                    </td>
                                </tr>
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right; width: 270px;">
                                        잔액 <?=number_format($account_lst['ac_Balance'][$key])?>원
                                    </td>
                                </tr>
                                <tr style="font-size: 12px;">
                                    <td style="text-align: right;">
                                        출금가능금액 <?=number_format($account_lst['withdrawable']['ac_withdrawable'][$key])?>원
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php
                            }
                        }
                        ?>
                        <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
                    </div>

                    <ul class="select-box__list">
                        <?php
                        foreach ($account_lst['Active_Savings'] as $key => $value){
                            if($account_lst['Integrate']['stop'][$key] == 'N'){
                        ?>
                        <li>
                            <label class="select-box__option" for="<?='to_'.$value?>" aria-hidden="aria-hidden">
                                <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                    <tr style="font-weight: bold; font-size: 15px; letter-spacing: 1px;">
                                        <td style="font-weight: 600;">
                                            <?=$account_lst['Integrate']['ac_Number']['Dashed'][$key]?>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px; ">
                                        <td>
                                            <?=$account_lst['Integrate']['Product'][$key]?>
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px; ">
                                        <td style="text-align: right;">
                                            잔액 <?=number_format($account_lst['ac_Balance'][$key])?>원
                                        </td>
                                    </tr>
                                    <tr style="font-size: 13px; ">
                                        <td style="text-align: right;">
                                            출금가능금액 <?=number_format($account_lst['withdrawable']['ac_withdrawable'][$key])?>원
                                        </td>
                                    </tr>
                                </table>
                            </label>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="container_horizontal" style="height: 45px; background: rgb(243,243,244); box-shadow:  8px 8px 17px #d5d5d5, -8px -8px 17px #d5d5d5; border-radius: 5px; margin-top: 15px; ">
                <input type="text" name="to_amount" class="transfer_to" id="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="보낼 금액">
            </div>
            <div class="container_horizontal" style="height: 50px; margin-top: 240px;">
                <button class="confirm">확인</button>
            </div>
        </div>
    </form>
</div>