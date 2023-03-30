<?php
// 매일 자정에 실시되는 예금이자 지급
include_once "/var/www/html/bank/function/Sandbox.php";
include_once "/var/www/html/bank/function/Calculator.php";
include_once "/var/www/html/bank/function/Inspection.php";
$lib = new SandBox();
$calc = new Calculator();
$inspec = new Inspection();
$ck = $inspec->Regular_Inspection();
$ck = false;

if(!$ck){

    // 예금이자 지급절차
    // 00시 01분 00초에 실행
    // 현재 이자 지급기준: 전계좌 전전날 최종잔액을 기준으로 지급
    // 추후 수정 지급기준: 입출금계좌의 경우 전날 모든 거래의 최저 잔액과 전전날 최종잔액간 평균을 기준으로 지급, 단 전날 거래내역이 없을 경우 전전날 거래내역*2 한후 /2 하여 반영
    //
    //
    // 사전절차: 일관된 거래내역기록을 위해 MYSQL에서 시간을 불러온다
    // 1. 활성된 모든 계좌를 불러온다
    //
    // 계좌 셀렉트 조건
    // 1. 상품에 설정된 이자가 NULL 이거나 공백이 아니여야 한다
    // 2. 상품에 설정된 이자가 0보다 커야하며, 음수가 아니여야 한다
    // 위 조건에 맞지 않을 경우 계좌리스트에서 제외한다
    //
    // 2. 계좌번호별로 전전일 최종잔액을 불러온다
    // 3. 계좌번호별로 이율을 불러온다
    // 4. 계좌번호별로 최종잔액과, 이율을 활용하여 당일에 지급해야 할 이자를 산정한다
    // 5. 입출금 통장 이외의 계좌는 이자를 지급할 계좌번호를 불러온다
    // 6. 입출금통장인 경우와 그외에 경우로 나눈다
    // 7. 입출금 통장은 각 통장으로 이자를 지급한다
    // 8. 그외 예적금은 예금주가 지정한 계좌정보를 받아와 해당 계좌로 지급한다


    // 사전절차: 일관된 거래내역기록을 위해 MYSQL에서 시간을 불러온다
    $time_sql = "SELECT NOW(6) time;";
    $time_row = mysqli_fetch_assoc(mysqli_query($lib->con,$time_sql));
    $time = $time_row['time'];

    // 1. 활성된 모든 계좌를 불러온다
    $active_ac_sql = "
    select
    account_number
    from ac_List
    where active = 'Y';
    ";
    $active_ac_result = mysqli_query($lib->con,$active_ac_sql);
    while ($active_ac = mysqli_fetch_assoc($active_ac_result)){
        foreach ($active_ac as $key => $value){
            $ac_sql = "
            select
            c.price
            
            from ac_List a, member_list b, ac_Product c, ac_Title d
            where a.holder = b.id and a.product = c.code and c.sub_code = d.code
            and a.account_number = '".$value."';
            ";
            $ac_row = mysqli_fetch_assoc(mysqli_query($lib->con,$ac_sql));
            foreach ($ac_row as $k => $v){

                // 2. 계좌번호별로 전전일 최종잔액을 불러온다
                // 3. 계좌번호별로 이율을 불러온다
                if($k == 'price' && $v != '' && $v != null && $v > 0){

                    // 4. 계좌번호별로 최종잔액과, 이율을 활용하여 당일에 지급해야 할 이자를 산정한다
                    $amount_sql = "
                    SELECT
                    tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to, receive_number
                    FROM bank_account.ac_".$value."
                    WHERE
                    date_format(time,'%Y-%m-%d') != '".date('Y-m-d')."'
                    and date_format(time,'%Y-%m-%d') != '".date('Y-m-d', strtotime(date('Y-m-d').' -1 day'))."'
                    ORDER BY tid DESC LIMIT 1;
                    ";
                    $amount_row = mysqli_fetch_assoc(mysqli_query($lib->con,$amount_sql));

                    $ac_list['interest_balance'][$value] = $amount_row['balance'];
                    $ac_list['price'][$value] = $v;
                    $ac_list['interest'][$value] = floor($calc->Interest($amount_row['balance'],1,$v));
                }
            }
        }
    }

    // 이자가 지급되는 계좌별로 해당이자가 지급되는 계좌번호 조회
    foreach ($ac_list['interest'] as $key => $value){
        if($value > 0){
            $charac_sql = "
            select
            b.id,
            b.type as member_type,
            c.name as Produce_name,
            c.price,
            d.type,
            a.active
            
            from ac_List a, member_list b, ac_Product c, ac_Title d
            where a.holder = b.id and a.product = c.code and c.sub_code = d.code
            and a.account_number = '".$key."';
            ";
            $charac_row = mysqli_fetch_assoc(mysqli_query($lib->con,$charac_sql));

            if($charac_row['type'] == '입출금'){
                // 7. 입출금 통장은 각 통장으로 이자를 지급한다

                $ac_list['deposit_ac'][$key] = $key;
            }else{
                // 8. 그외 예적금은 예금주가 지정한 계좌정보를 받아와 해당 계좌로 지급한다
                $interest_ac_sql = "
                select account_number, rate_num
                from ac_Rating
                where account_number = '".$key."';
                ";
                $interest_ac_row = mysqli_fetch_assoc(mysqli_query($lib->con,$interest_ac_sql));

                if($interest_ac_row['rate_num'] != '' && $interest_ac_row['rate_num'] != null){
                    // 지급계좌가 정해져있는경우 해당 입출금계좌로 지급

                    $ac_list['deposit_ac'][$key] = $interest_ac_row['rate_num'];
                }else{
                    // 지급계좌가 정해지지 않는 경우 복리식으로 지급

                    $ac_list['deposit_ac'][$key] = $key;
                }
            }
        }
    }

    // 계좌로 이자지급
    foreach ($ac_list['deposit_ac'] as $key => $value){

        // 이자지급계좌의 최종 잔액을 확인한다
        $sql = "
        SELECT
        tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to, receive_number
        FROM bank_account.ac_".$value."
        ORDER BY tid DESC LIMIT 1;
        ";
        $row = mysqli_fetch_assoc(mysqli_query($lib->con,$sql));
        $balance = (int)$row['balance'];

        $sum_balance = ($balance + $ac_list['interest'][$key]);
        // 이자지급계좌로 지급
        $interest_sql = "
        INSERT INTO bank_account.ac_".$value." (time, type, amount, balance, memo_me, receive_number)
        VALUES ('".$time."','D','".$ac_list['interest'][$key]."','".$sum_balance."','예금이자', '".$key."');
        ";
//        $interest_result = mysqli_query($lib->con,$interest_sql);
    }

    echo '<pre> aa';
    print_r($ac_list);
    echo '</pre>';
}



?>