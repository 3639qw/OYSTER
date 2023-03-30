<div class="transaction_list_ac" style="text-align: center; box-shadow: 1px 8px 16px 0px #CCCCCC;">
    <table border="0" style="border-collapse: collapse; width: 93%; font-size: 15px; margin: auto;">
        <tr>
            <td>
                <table border="0" style="border-collapse: collapse; width: 100%; margin: auto; margin-top: 10px;">
                    <tr>
                        <td style="font-size: 20px; height: 30px;">
                            예금이자 조회
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
                                <form name="tran_list" id="tran_list" method="post" action="./">
                                    <input type="text" name="ac_number" value="<?=$value?>" hidden>
                                    <input type="text" name="action" value="2" hidden>
                                    <input type="text" name="period_type" value="1" hidden>
                                    <input type="text" name="period_month" value="<?=date('Ym');?>" hidden>
                                    <input type="text" name="sort" value="desc" hidden>
                                    <input type="text" name="open_date" value="<?=$account_lst['Integrate']['Open_Date']['Dashed'][$value]?>" hidden>

                                    <div style="width: 97%; height: 30px; margin: auto; margin-top: 10px; margin-bottom: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                        <div style="float: left; width: 20%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;"><?=$account_lst['Integrate']['ac_Number']['Dashed'][$value]?></div>
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
                                            <button onclick="" style="width: 100%; height: 100%; background: transparent; border: 0; font-size: 12px;">조회</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                }
                                ?>
                                <script>

                                </script>

                                <!-- 해지계좌 -->
                                <?php
                                if($account_lst['ac_Count'][3] >= 1){
                                ?>
                                <div style="width: 97%; height: 30px; margin: auto; margin-top: 30px; margin-bottom: 15px; background-color: white; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                    <div style="float: left; width: 25%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌번호</div>
                                    </div>
                                    <div style="float: left; width: 20%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌신규일</div>
                                    </div>
                                    <div style="float: left; width: 22%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌해지일</div>
                                    </div>
                                    <div style="float: left; width: 22%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px; letter-spacing: 1px;">예금과목</div>
                                    </div>
                                    <div style="float: left; width: 11%; height: 30px;">
                                        <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;">계좌선택</div>
                                    </div>
                                </div>
                                <?php
                                }
                                foreach ($account_lst['Inactive'] as $key => $value){
                                ?>
                                <form name="tran_list" id="tran_list" method="post" action="./">
                                    <input type="text" name="ac_number" value="<?=$value?>" hidden>
                                    <input type="text" name="action" value="2" hidden>
                                    <input type="text" name="period_type" value="1" hidden>
                                    <input type="text" name="period_month" value="<?=date('Ym');?>" hidden>
                                    <input type="text" name="sort" value="desc" hidden>
                                    <input type="text" name="open_date" value="<?=$account_lst['Integrate']['Open_Date']['Raw'][$value]?>" hidden>

                                    <div style="width: 97%; height: 30px; margin: auto; margin-top: 10px; margin-bottom: 15px; background-color: #dadada; box-shadow: 1px 8px 16px 0px #CCCCCC;">
                                        <div style="float: left; width: 25%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;"><input type="text" style="width: 100%; text-align: center;" name="ac_number" value="<?=$value?>" hidden><input type="text" name="action" value="2" hidden><?=$account_lst['Integrate']['ac_Number']['Dashed'][$value]?></div>
                                        </div>
                                        <div style="float: left; width: 20%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: center; line-height: 30px;"><?=$account_lst['Integrate']['Open_Date']['Dashed'][$value]?></div>
                                        </div>
                                        <div style="float: left; width: 22%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: left; padding-left: 5px; line-height: 30px;"><?=$account_lst['Integrate']['Inactive_Date']['Dashed'][$value]?></div>
                                        </div>
                                        <div style="float: left; width: 22%; height: 30px;">
                                            <div style="width: 100%; height: 100%; margin: auto; text-align: left; padding-left: 5px; line-height: 30px; letter-spacing: 1px;"><?=$account_lst['Integrate']['Product'][$value]?></div>
                                        </div>
                                        <div style="float: left; width: 11%; height: 30px;">
                                            <button onclick="" style="width: 100%; height: 100%; background: transparent; border: 0; font-size: 12px;">조회</button>
                                        </div>
                                    </div>
                                </form>
                                <?php
                                }
                                ?>

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