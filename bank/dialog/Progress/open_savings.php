<style>
    .progress{
        width: 560px;
        height: auto;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: progress;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    @keyframes progress {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 510px;
        }
    }

    .open_amount{
        float: left;
        width: 98%;
        height: 40px;
        color: #000000;
        display: inline-block;
        text-align: left;
        font-size: 17px;
        letter-spacing: 2px;
        font-weight: bold;
        padding-left: 10px;
        border: 0px solid #000000;
        border-radius: 10px;
        background: #e8efff;
        margin: auto;
        margin-top: 5px;
    }


    /* 셀렉트 영역 스타일 */
    .select_ac{
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
    .select_ac ul{
        position: absolute;
        top: 30px;
        left: 0;
        width: 100%;
        border:1px solid #231F20;
        /*border-radius: 5px;*/
        background-color: #525252;
        cursor: pointer;
    }
    .select_ac ul li{
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
    .select_ac ul li:hover{
        background-color: floralwhite;
    }

</style>
<div class="progress" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
                    <tr>
                        <td colspan="3" style="font-size: 22px; height: 50px; text-align: left; padding-bottom: 10px;">
                            <?=$detail['Integrate_Name']?>
                            <br>
                            <a style="font-size: 14px; font-weight: normal;">연 <?=number_format($detail['price'],2)?>%</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; text-align: left; padding-left: 10px; height: 45px; background: #e6e6e6">
                           상품가입정보
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 13px; text-align: left; padding-top: 20px; height: 35px;">
                            신규금액<br>
                            <input type="text" name="amount_non" class="open_amount" id="amount_non" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="100만원 이상">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 13px; text-align: left; padding-top: 30px; height: auto;">
                            출금계좌,이자수령계좌<br>
                            <div class="select_ac" data-role="selectBox" style="width: 100%; height: 100%; box-sizing: border-box; margin-top: 5px;">
                                <span date-value="optValue" class="selected-option" style="height: 100%;"><!-- 선택된 옵션 값이 출력되는 부분 --></span>

                                <!-- 옵션 영역 -->
                                <ul class="hide">
                                    <?php
                                    foreach ($account_lst['Active_WD'] as $key => $value){
                                    ?>
                                    <li style="">
                                        <form name="register_account" id="register_account" method="post" action="./">
                                            <input name="open_savings_act" value="1" hidden>
                                            <input name="progress" value="1" hidden>

                                            <input type="text" name="ac_number" value="<?=$value?>" hidden>
                                            <input name="amount" hidden>
                                            <input name="product_code" value="<?=$_POST['product_code']?>" hidden>
                                            <input name="type" value="<?=$_POST['type']?>" hidden>
                                        </form>
                                        <table border="0" style="border-collapse: collapse; width: 100%; height: 100%;">
                                            <tr>
                                                <td style="width: 40%; text-align: left; font-size: 13px; letter-spacing: 1.5px;">
                                                    <?=$account_lst['Integrate']['ac_Number']['Dashed'][$value]?>
                                                </td>
                                                <td style="text-align: right; font-size: 12px; padding-right: 35px; font-weight: normal;">
                                                    <?='잔액 '.number_format($account_lst['ac_Balance'][$value]).'원'?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left; font-size: 12px; font-weight: normal;">
                                                    <?=$account_lst['Integrate']['Product'][$value]?>
                                                </td>
                                                <td style="text-align: right; font-size: 12px; padding-right: 35px; font-weight: normal;">
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
                        <td colspan="3" style="padding-top: 40px;">
                            <button type="submit" form="register_account" style="width: 90px; height: 40px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121); margin-right: 30px;">
                                가입하기
                            </button>
                            <button type="button" onclick="history.back()" style="width: 90px; height: 40px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121);">
                                뒤로가기
                            </button>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<script>
    $(document).ready(function (){
        $("#amount_non").on("keyup", function(){
            $(this).val($(this).val().replace(/\,/g, '').replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,'));
        });
        $('input[name=amount_non]').keyup(function (){
            $('input[name=amount]').attr("value",$(this).val());
        });
    });

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