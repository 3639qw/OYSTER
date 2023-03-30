<style>
    .product_list{
        width: 510px;
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
            width: 460px;
        }
    }
</style>
<div class="product_list" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <form name="register_account" id="register_account" method="post" action="/bank/Action/open_ac.php">
                    <input name="code" hidden>
                    <input name="type" hidden>

                    <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
                        <tr style="border-bottom: 1px solid #9b9b9b !important;">
                            <td colspan="3" style="font-size: 22px; height: 50px; text-align: left;">
                                기업자유예금
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important;">
                            <td style="width: 30%; height: 65px; text-align: left;">
                                <a style="font-size: 13px; font-weight: normal; color: #494949;">대상</a>
                                <br>
                                법인
                            </td>
                            <td style="width: 30%; height: 30px; text-align: left;">
                                <a style="font-size: 13px; font-weight: normal; color: #494949;">가입기간</a>
                                <br>
                                무기한
                            </td>
                            <td style="width: 30%; height: 30px; text-align: left;">
                                <a style="font-size: 13px; font-weight: normal; color: #494949;">예금과목</a>
                                <br>
                                기업자유예금
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                상품유형
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                입출금이 자유로운 예금
                            </td>
                        </tr>
                        <tr style="border-bottom: 1px solid #9b9b9b !important; height: 30px;">
                            <td style="text-align: left; font-size: 13px;">
                                금리
                            </td>
                            <td colspan="2" style="text-align: left; font-size: 13px; font-weight: normal;">
                                무이자
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding-top: 20px;">
                                <?php
                                if($_SESSION['type'] == '법인'){
                                ?>
                                <button type="submit" style="width: 90px; height: 40px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121); margin-right: 30px;">
                                    가입하기
                                </button>
                                <?php
                                }
                                ?>
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
    document.register_account.code.value = '<?=$_GET['prcode']?>';
    document.register_account.type.value = '입출금';
</script>