<div class="additional_deposit" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
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
                            입금할 적립식예금
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="width: 100%; height: 60px;">
                            <div class="select" data-role="selectBox" style="width: 100%; height: 100%; box-sizing: border-box;">
                                <span date-value="optValue" class="selected-option" style="height: 100%;"><!-- 선택된 옵션 값이 출력되는 부분 --></span>

                                <!-- 옵션 영역 -->
                                <ul class="hide">
                                    <?php
                                    foreach ($account_lst['Active_Savings'] as $key => $value){
                                    ?>
                                    <li>
                                        <form name="transfer_account" id="transfer_account" method="post" action="./">
                                            <input type="text" name="additional_deposit" value="Y" hidden>
                                            <input type="text" name="ac_number" value="<?=$value?>" hidden>
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