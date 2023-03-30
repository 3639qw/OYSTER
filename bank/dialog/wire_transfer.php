<?php
$send_ck = $ac_send->Integrity_Check($_POST['ac_number'], $_POST['transfer_to_num'], $_POST['transfer_to_amount'],'W','N');
if ($send_ck == 'Y') {
    $receive_ac_info = $ac_send->Receive_Account($_POST['transfer_to_num']);
}
?>
<div class="transfer_account_2" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <form name="transfer_account" id="transfer_account" method="post" action="./Action/Send_Money.php">
                    <input type="text" name="ac_number" value="<?=$_POST['ac_number']?>" hidden>
                    <input type="text" name="transfer_to_num" value="<?=$_POST['transfer_to_num']?>" hidden>
                    <input type="text" name="transfer_to_amount" value="<?=$_POST['transfer_to_amount']?>" hidden>
                    <table border="0" style="border-collapse: collapse; width: 93%; margin: auto; margin-top: 10px;">
                        <tr>
                            <td colspan="3" style="font-size: 17px; height: 30px; text-align: left;">
                                받는분과 금액을 확인해주세요
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height: 10px;"></td>
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
                                                <?='이체가능금액 '.number_format($account_lst['ac_Balance'][$_POST['ac_number']]).'원'?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 100%; height: 30px; text-align: center; font-weight: normal; font-size: 13px;">
                                ∨
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 100%; height: 40px;">
                                <div style="width: 100%; height: 100%; background: #e8efff; border-radius: 5px; box-sizing: border-box; padding: 10px 5px; 0px; 10px;">
                                    <table border="0" style="border-collapse: collapse; width: 95%; height: 100%; margin: auto;">
                                        <tr>
                                            <td style="text-align: left; font-size: 13px; letter-spacing: 1.5px;">
                                                <?=$receive_ac_info['name']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left; font-size: 12px; font-weight: normal; letter-spacing: 1.5px;">
                                                <?=$receive_ac_info['account_number']?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; padding-right: 30px; font-size: 12px; font-weight: normal;">
                                                <?=$_POST['transfer_to_amount'].'원'?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 100%; height: 10px;">

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 100%; height: 40px;">
                                <div style="width: 100%; height: 100%; background: #e8efff; border-radius: 5px; box-sizing: border-box;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; ">
                                        <tr>
                                            <td style="font-size: 13px; width: 40%; text-align: left; padding-left: 10px;">
                                                받는 분 통장 표기
                                            </td>
                                            <td>
                                                <input type="text" name="memo_to" class="memo" style="" maxlength="10" value="<?=$_SESSION['name']?>">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 10px;"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 100%; height: 40px;">
                                <div style="width: 100%; height: 100%; background: #e8efff; border-radius: 5px; box-sizing: border-box;">
                                    <table border="0" style="border-collapse: collapse; width: 100%; height: 100%; ">
                                        <tr>
                                            <td style="font-size: 13px; width: 40%; text-align: left; padding-left: 10px;">
                                                내 통장 표기
                                            </td>
                                            <td>
                                                <input type="text" name="memo_me" class="memo" style="" maxlength="10" value="<?=$receive_ac_info['name']?>">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button style="width: 100%; height: 32px; border-radius: 1em; border: 0; color: white; background: rgb(51, 76, 121); margin-top: 10px;">
                                    확인
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>