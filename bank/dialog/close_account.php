<?php
$close_info['ac_number'] = $_POST['ac_number'];
$close_info['ac_number_view'] = substr($_POST['ac_number'], 0, 6) . '-' . substr($_POST['ac_number'], 6, 2) . '-' . substr($_POST['ac_number'], 8, 6);
?>
<div class="close_account" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <form name="close_account" id="close_account" method="post" action="./Action/DeActive_Account.php">
                    <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px;">
                        <tr>
                            <td colspan="3" style="font-size: 20px; height: 30px; margin-top: 10px;">
                                계좌 해지
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%; height: 30px; text-align: left;">
                                계좌번호
                            </td>
                            <td style="width: 5%;">
                                :
                            </td>
                            <td style="text-align: left; padding-left: 5px;">
                                <input type="text" name="close_ac_number" id="close_ac_number" style="font-weight: normal; width: 153px; border: 1px solid #000000; background: transparent; padding-left: 5px;">
                                <input type="text" name="close_ac_number_2" id="close_ac_number_2" style="font-weight: normal; width: 153px; border: 1px solid #000000; background: transparent; padding-left: 5px;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%; height: 30px; text-align: left;">
                                입금계좌 선택
                            </td>
                            <td style="width: 5%;">
                                :
                            </td>
                            <td style="text-align: left; padding-left: 5px;">
                                <select name="transfer_account" style="font-weight: normal; width: 160px; border: 1px solid #000000; background: transparent; padding-left: 2px;">
                                    <?php
                                    foreach ($account_lst['Active_WD'] as $key => $value){
                                    if($value != $_POST['ac_number']){
                                    ?>
                                    <option value="<?=$account_lst['Integrate']['ac_Number']['Raw'][$value]?>"><?=$account_lst['Integrate']['ac_Number']['Dashed'][$value]?></option>
                                    <?php
                                    }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button style="width: 100%; height: 32px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121); margin-top: 10px;">
                                    계좌 해지신청
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
                <script>
                    $("#close_ac_number").attr("readonly",true);
                    $("#close_ac_number_2").attr("readonly",true);
                    $("#close_ac_number_2").attr("hidden",true);
                    document.close_account.close_ac_number.value = "<?=$close_info['ac_number_view']?>";
                    document.close_account.close_ac_number_2.value = "<?=$close_info['ac_number']?>";
                </script>
            </td>
        </tr>
    </table>
</div>