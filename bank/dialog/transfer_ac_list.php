<style>
    *{
        font-family: 'Noto Sans KR', sans-serif;
        font-weight: bold;
    }

    /* 거래내역 계좌창 */
    .transaction_list_ac{
        width: 650px;
        height: 450px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: t_list_ac;
        animation-duration: 1s;
        animation-delay: 0.0s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    /* 거래내역 실질 창 */
    .transaction_list_dialog{
        width: 850px;
        height: 600px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: t_list_dialog;
        animation-duration: 1s;
        animation-delay: 0.0s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    /* 계좌관리 */
    .manage_list{
        width: 650px;
        height: 450px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: manage_list;
        animation-duration: 1s;
        animation-delay: 0.0s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    /* 입출금 상품 목록 리스트 */
    .wd_ac_list{
        width: 510px;
        height: auto;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: wd_ac_list;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    @keyframes wd_ac_list {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 460px;
        }
    }

    /* 적립식 상품 목록 리스트 */
    .savings_ac_list{
        width: 510px;
        height: auto;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: savings_ac_list;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    @keyframes savings_ac_list {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 460px;
        }
    }

    /* 적립식예금 추가입금 검증 전 */
    .additional_deposit{
        width: 490px;
        height: 220px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: additional_deposit;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    @keyframes additional_deposit {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 390px;
        }
    }

    /* 적립식예금 추가입금 검증 후 */
    .additional_deposit_2{
        width: 490px;
        height: 270px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: additional_deposit_2;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    @keyframes additional_deposit_2 {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 390px;
            height: 220px;
        }
    }

    /* 계좌이체 검증 전 */
    .transfer_account{
        width: 490px;
        height: 340px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: transfer_account;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    /* 계좌이체 검증 후 적요 */
    .transfer_account_2{
        width: 490px;
        height: 390px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: transfer_account_2;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    /* 계좌이체내에서 사물 */
    .transfer_account .transfer_to{
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

    /* 계좌이체내에서 적요 input */
    .transfer_account_2 .memo{
        float: right;
        width: 100%;
        height: 100%;
        color: #000000;
        display: inline-block;
        text-align: right;
        font-size: 15px;
        letter-spacing: 1px;
        font-weight: bold;
        padding-right: 15px;
        border: 0px solid #000000;
        background: transparent;
    }

    /* 계좌이체내에서 사물 placeholder */
    .transfer_account .transfer_to::placeholder{
        font-size: 15px;
        color: #757575;
        text-align: right;
    }

    /* 계좌관리에서 계좌해지 */
    .close_account{
        width: 600px;
        height: 450px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: close_account;
        animation-duration: 1s;
        animation-delay: 0.0s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    .form_field{
        /*-webkit-box-shadow : 0!important;*/
        box-shadow: none !important;
        /* -webkit-border-radius: 0!important; */
        border: 0!important;
        border-bottom: 1px solid #9b9b9b!important;
        outline: 0!important;
        color: black!important;
        background: transparent!important;
        /*transition: border-color 0.2s!important;*/
    }







    .hide{
        display: none;
    }
    .show{
        display: block;
    }
    /* 셀렉트 영역 스타일 */
    .select{
        position: relative;
        padding: 5px 10px;
        width: 200px;
        border-radius: 5px;
        border: 0px solid transparent;
        background-color: #e8efff;
        background-image: url("https://img.icons8.com/material-rounded/24/000000/expand-arrow.png");
        background-repeat: no-repeat;
        background-position: 96% center;
        cursor: pointer;
    }
    /* 옵션 영역 스타일 */
    .select ul{
        position: absolute;
        top: 30px;
        left: 0;
        width: 100%;
        border:1px solid #231F20;
        /*border-radius: 5px;*/
        background-color: #525252;
        cursor: pointer;
    }
    .select ul li{
        padding: 10px;
        background: #FFFFFF;
    }
    /*.select ul li:first-child{*/
    /*    background: tomato;*/
    /*}*/
    /*.select ul li:nth-child(2){*/
    /*    background: gold;*/
    /*}*/
    /*.select ul li:nth-child(3){*/
    /*    background: orange;*/
    /*}*/
    .select ul li:hover{
        background-color: floralwhite;
    }
    /* 아이콘 스타일 */
    i{
        vertical-align: bottom;
        margin-right: 5px;
    }
    i img{
        width: 20px;
    }







    @keyframes t_list_ac {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 700px;
            height: 450px;
        }
    }

    @keyframes manage_list {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 700px;
            height: 450px;
        }
    }

    @keyframes transfer_account {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 390px;
            height: 340px;
        }
    }

    @keyframes transfer_account_2 {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 390px;
        }
    }

    @keyframes close_account {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 390px;
            height: 170px;
        }
    }

    @keyframes t_list_dialog {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 900px;
        }
    }
</style>
<div class="transfer_account" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px;">
                    <tr>
                        <td colspan="3" style="font-size: 20px; height: 30px;">
                            온라인 송금
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 30px; text-align: left; font-weight: normal; font-size: 13px; letter-spacing: 1px;">
                            출금계좌
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 60px;">
                            <div class="select" data-role="selectBox" style="width: 100%; height: 100%; box-sizing: border-box;">
                                <span date-value="optValue" class="selected-option" style="height: 100%;"><!-- 선택된 옵션 값이 출력되는 부분 --></span>

                                <!-- 옵션 영역 -->
                                <ul class="hide">
                                    <li>
                                        <form name="transfer_account" id="transfer_account" method="post" action="./">
                                            <input type="text" name="action" value="3" hidden>
                                            <input type="text" name="ac_number" value="<?=$value?>" hidden>
                                            <input type="text" name="transfer_to_num" hidden>
                                            <input type="text" name="transfer_to_amount" hidden>
                                        </form>
                                        <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                            <tr>
                                                <td style="text-align: left; font-size: 13px; letter-spacing: 1.5px;">
                                                    102022-01-000001
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left; font-size: 12px; font-weight: normal;">
                                                    저축예금
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-size: 12px; padding-right: 30px; font-weight: normal;">
                                                    <?='잔액 '.number_format($account_lst['ac_Balance'][$value]).'원'?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right; font-size: 12px; padding-right: 30px; font-weight: normal;">
                                                    <?='이체가능금액 '.number_format($account_lst['ac_Balance'][$value]).'원'?>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 30px; text-align: left; font-weight: normal; font-size: 13px; letter-spacing: 1px;">
                            받는분
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 40px;">
                            <div style="width: 100%; height: 100%; background: #e8efff; border-radius: 5px;">
                                <input type="text" name="transfer_to_num_2" class="transfer_to" style="" maxlength="14" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="입금할 계좌번호">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 10px;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 40px;">
                            <div style="width: 100%; height: 100%; background: #e8efff; border-radius: 5px;">
                                <input type="text" name="transfer_to_amount_2" class="transfer_to" id="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="보낼 금액">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button form="transfer_account" style="width: 100%; height: 32px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121); margin-top: 10px;">
                                확인
                            </button>
                        </td>
                    </tr>
                </table>
                <script>
                    $(document).ready(function (){
                        $('input[name=transfer_to_num_2]').keyup(function (){
                            $('input[name=transfer_to_num]').attr("value",$(this).val());
                        });
                        $('input[name=transfer_to_amount_2]').keyup(function (){
                            $('input[name=transfer_to_amount]').attr("value",$(this).val());
                        });
                    });

                    $("#amount").on("keyup", function(){
                        $(this).val($(this).val().replace(/\,/g, '').replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,'));
                    });

                    const body = document.querySelector('body');
                    const select = document.querySelector(`[data-role="selectBox"]`);
                    const values = select.querySelector(`[date-value="optValue"]`);
                    const option = select.querySelector('ul');
                    const opts = option.querySelectorAll('li');

                    /* 셀렉트영역 클릭 시 옵션 숨기기, 보이기 */
                    function selects(e){
                        e.stopPropagation();
                        option.setAttribute('style',`top:${select.offsetHeight}px`)
                        if(option.classList.contains('hide')){
                            option.classList.remove('hide');
                            option.classList.add('show');
                        }else{
                            option.classList.add('hide');
                            option.classList.remove('show');
                        }
                        selectOpt();
                    }

                    /* 옵션선택 */
                    function selectOpt(){
                        opts.forEach(opt=>{
                            const innerValue = opt.innerHTML;
                            function changeValue(){
                                values.innerHTML = innerValue;
                            }
                            opt.addEventListener('click',changeValue)
                        });
                    }

                    /* 렌더링 시 옵션의 첫번째 항목 기본 선택 */
                    function selectFirst(){
                        const firstValue = opts[0].innerHTML;
                        values.innerHTML = `${firstValue}`
                    }

                    /* 옵션밖의 영역(=바디) 클릭 시 옵션 숨김 */
                    function hideSelect(){
                        if(option.classList.contains('show')){
                            option.classList.add('hide');
                            option.classList.remove('show');
                        }
                    }

                    selectFirst();
                    select.addEventListener('click',selects);
                    body.addEventListener('click',hideSelect);
                </script>
            </td>
        </tr>
    </table>
</div>