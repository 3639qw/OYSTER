<style>
    /* 계좌이체 검증 전 */
    .additional_deposit_2{
        width: 490px;
        height: 370px;
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

    /* 계좌이체내에서 사물 */
    .additional_deposit_2 .amount{
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

    /* 계좌이체내에서 사물 placeholder */
    .additional_deposit_2 .amount::placeholder{
        font-size: 15px;
        color: #757575;
        text-align: right;
    }

    @keyframes additional_deposit_2 {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 390px;
        }
    }
</style>
<div class="additional_deposit_2" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px;">
                    <tr>
                        <td colspan="3" style="font-size: 20px; height: 30px;">
                            적립식예금 추가입금
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 30px; text-align: left; font-weight: normal; font-size: 13px; letter-spacing: 1px;">
                            적금계좌
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 60px;">
                            <div style="width: 100%; height: 100%; background: #e8efff; border-radius: 5px; box-sizing: border-box; padding: 10px 5px; 0px; 10px;">
                                <table border="0" style="border-collapse: collapse; width: 95%; height: 100%; margin: auto;">
                                    <tr>
                                        <td style="text-align: left; font-size: 13px; letter-spacing: 1.5px;">
                                            <?=$account_lst['Integrate']['ac_Number']['Raw'][$_POST['ac_number']]?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; font-size: 12px; font-weight: normal;">
                                            <?=$account_lst['Integrate']['Product'][$_POST['ac_number']]?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right; padding-right: 30px; font-size: 12px; font-weight: normal;">
                                            <?='잔액 '.number_format($account_lst['ac_Balance'][$_POST['ac_number']]).'원'?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 30px; text-align: left; font-weight: normal; font-size: 13px; letter-spacing: 1px;">
                            출금계좌정보
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 40px;">
                            <div class="select" data-role="selectBox" style="width: 100%; height: 100%; box-sizing: border-box;">
                                <span date-value="optValue" class="selected-option" style="height: 100%;"><!-- 선택된 옵션 값이 출력되는 부분 --></span>

                                <!-- 옵션 영역 -->
                                <ul class="hide">
                                    <?php
                                    foreach ($account_lst['Active_WD'] as $key => $value){
                                    ?>
                                    <li>
                                        <form name="additional_deposit" id="additional_deposit" method="post" action="/bank/Action/Deposit_Savings.php">
                                            <input type="text" name="savings_number" value="<?=$account_lst['Integrate']['ac_Number']['Raw'][$_POST['ac_number']]?>" hidden>
                                            <input type="text" name="ac_number" value="<?=$value?>" hidden>
                                            <input type="text" name="deposit_amount" hidden>
                                        </form>
                                        <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                            <tr>
                                                <td style="text-align: left; font-size: 13px; letter-spacing: 1.5px;">
                                                    <?=$account_lst['Integrate']['ac_Number']['Dashed'][$value]?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left; font-size: 12px; font-weight: normal;">
                                                    <?=$account_lst['Integrate']['Product'][$value]?>
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
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 10px;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 40px;">
                            <div style="width: 100%; height: 100%; background: #e8efff; border-radius: 5px;">
                                <input type="text" name="amount" class="amount" id="amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="보낼 금액">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button form="additional_deposit" style="width: 100%; height: 32px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121); margin-top: 10px;">
                                확인
                            </button>
                        </td>
                    </tr>
                </table>
                <script>
                    $(document).ready(function (){
                        $('input[name=amount]').keyup(function (){
                            $('input[name=deposit_amount]').attr("value",$(this).val());
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