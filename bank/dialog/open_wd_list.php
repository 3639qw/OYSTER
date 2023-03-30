<div class="wd_ac_list" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px; margin-bottom: 10px;">
                    <tr>
                        <td style="font-size: 20px; height: 35px;">
                            요구불예금
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #9b9b9b !important;">
                        <td style="font-size: 14px; font-weight: normal; height: 35px; text-align: left;">
                            상품목록 <?=$checking_product_list['count']?>건
                        </td>
                    </tr>
                    <?php
                    foreach ($checking_product_list['checking_name'] as $key => $value){
                    ?>
                    <tr style="border-bottom: 1px solid #9b9b9b !important;">
                        <td style="font-size: 16px; text-align: left; padding-left: 10px; height: 40px;">
                            <a href="?prcode=<?=$checking_product_list['sub_code'][$key].'-'.$checking_product_list['product_code'][$key]?>" style="text-decoration-line: none;"><?=$value?></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</div>