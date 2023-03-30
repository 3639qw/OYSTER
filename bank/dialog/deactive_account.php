<div class="manage_list" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <table border="0" style="border-collapse: collapse; width: 100%; margin: auto; margin-top: 10px;">
                    <tr>
                        <td style="font-size: 20px; height: 30px; margin-top: 10px;">
                            계좌 해지
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 15px;">

                        </td>
                    </tr>
                    <tr>
                        <td style="height: 370px; font-size: 12px;">
                            <div style="width: 100%; height: 100%; overflow-y: scroll;">
                                <div style="width: 97%; height: 30px; margin: auto; margin-top: 15px; margin-bottom: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                    <div style="float: left; width: 20%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌번호</div>
                                    </div>
                                    <div style="float: left; width: 20%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌신규일</div>
                                    </div>
                                    <div style="float: left; width: 27%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">예금과목</div>
                                    </div>
                                    <div style="float: left; width: 22%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px; letter-spacing: 1px;">출금가능금액</div>
                                    </div>
                                    <div style="float: left; width: 11%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌선택</div>
                                    </div>
                                </div>

                                <!-- 활성계좌 -->
                                <?php
                                foreach ($account_lst['Active'] as $key => $value){
                                ?>
                                <form name="manage_account" id="manage_account" method="post" action="./">
                                    <div style="width: 97%; height: 30px; margin: auto; margin-top: 10px; margin-bottom: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                        <div style="float: left; width: 20%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;"><input type="text" style="width: 100%; text-align: center;" name="ac_number" value="<?=$value?>" hidden><input type="text" name="action" value="1" hidden><?=$account_lst['Integrate']['ac_Number']['Dashed'][$value]?></div>
                                        </div>
                                        <div style="float: left; width: 20%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;"><?=$account_lst['Integrate']['Open_Date']['Dashed'][$value]?></div>
                                        </div>
                                        <div style="float: left; width: 27%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: left; padding-left: 5px; line-height: 30px;"><?=$account_lst['Integrate']['Product'][$value]?></div>
                                        </div>
                                        <div style="float: left; width: 22%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: left; padding-left: 5px; line-height: 30px; letter-spacing: 1px;"><?=number_format($account_lst['ac_Balance'][$value])?></div>
                                        </div>
                                        <div style="float: left; width: 11%; height: 30px;">
                                            <button onclick="return deActive_CK()" style="width: 100%; height: 100%; background: transparent; border: 0;">[해지]</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                }
                                ?>
                                <script>
                                    function deActive_CK(){
                                        if(confirm("계좌를 해지하시겠습니까?")){
                                            return true;
                                        }
                                        return false;
                                    }
                                </script>

                                <?php
                                if($ac_list_ck == 'N'){
                                ?>
                                <div style="width: 97%; height: 30px; margin: auto; margin-top: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                    <div style="float: left; width: 100%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌가 없습니다</div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                                <?php
                                if($ac_list_ck == 'E01'){
                                ?>
                                <div style="width: 97%; height: 30px; margin: auto; margin-top: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                    <div style="float: left; width: 100%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">23시50분 부터 0시 10분까지 거래정지시간입니다</div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>