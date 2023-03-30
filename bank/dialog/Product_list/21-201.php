<style>
    .product_list{
        width: 560px;
        height: auto;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;

        animation-name: product_list;
        animation-duration: 1s;
        animation-delay: 0.1s; /* 딜레이 시간 */
        animation-iteration-count: 1; /* 반복 횟수 */
        animation-direction: alternate; /* 진행 방향 */
        animation-fill-mode: both;
    }

    @keyframes product_list {
        /* keyframe */
        /*from {*/
        /*    width: 850px;*/
        /*}*/
        /* keyframe */
        to {
            width: 510px;
        }
    }
</style>
<div class="product_list" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <form name="register_account" id="register_account" method="post" action="./">
                    <input name="open_savings_act" hidden>
                    <input name="sub_code" hidden>
                    <input name="product_code" hidden>
                    <input name="type" hidden>

                    <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
                        <tr style="border-bottom: 1px solid #9b9b9b !important;">
                            <td colspan="3" style="font-size: 22px; height: 50px; text-align: left;">
                                자유적금
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important;">
                            <td style="width: 30%; height: 65px; text-align: left;">
                                <a style="font-size: 13px; font-weight: normal; color: #494949;">대상</a>
                                <br>
                                제한없음
                            </td>
                            <td style="width: 30%; height: 30px; text-align: left;">
                                <a style="font-size: 13px; font-weight: normal; color: #494949;">가입기간</a>
                                <br>
                                무기한
                            </td>
                            <td style="width: 30%; height: 30px; text-align: left;">
                                <a style="font-size: 13px; font-weight: normal; color: #494949;">가입금액</a>
                                <br>
                                 100만원 이상
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                예금과목
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                정기적금
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                저축방법
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                자유적립식(적립한도 없음)
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                상품유형
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                자유적립식 예금
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                이자지급방식
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                매일 0시에 본인명의 입출금통장으로 지급
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                금리
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                5.0% (연,세전)
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                이자율 산출기준
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                운용일수 * (전전날 최종잔액 * 이자율) / 365
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                해지방법
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                온라인채널로 해약
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-top: 20px;">
                                <button type="submit" style="width: 90px; height: 40px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121); margin-right: 30px;">
                                    가입하기
                                </button>
                                <button type="button" onclick="history.back()" style="width: 90px; height: 40px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121);">
                                    뒤로가기
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>
<script>
    document.register_account.sub_code.value = '21';
    document.register_account.product_code.value = '201';
    document.register_account.type.value = '적립식';
    document.register_account.open_savings_act.value = '1';
</script>