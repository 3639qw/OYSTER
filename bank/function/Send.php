<?php
session_start();
require_once ("Sandbox.php");
require_once ("Inspection.php");

class Send extends Sandbox
{

    // 무결성 검증
    // $send: 발신계좌번호
    // $receive: 수신계좌번호
    // $amount: 송금금액
    // $ck_type: 무결성 체크 타입 W일경우 일반계좌이체, S일경우 적립식예금 추가입금
    // $same_id: Y일경우 수발신계좌번호의 동일인명의를 허용하지만, N일경우 수발신계좌번호의 명의가 각각 달라야한다
    function Integrity_Check($send,$receive,$amount,$ck_type,$same_id){
        $send = preg_replace('/[^\d]/','',$send);
        $receive = preg_replace('/[^\d]/','',$receive);
        $amount = preg_replace('/[^\d]/','',$amount);
        $pass = 'N';

        // 1. 거래가능시간인지 확인한다
        // 2. 발신계좌가 거래정지계좌인지 확인한다
        // 3. 발신계좌와 수신계좌가 동일하게 입력된 계좌인지 확인한다
        // 4. 출금계좌의 소유권을 확인한다
        // 5. 출금계좌의 해지여부를 확인한다
        // 6. 한도제한계좌에 해당하는지 확인한다
        // 7. (한도제한계좌일 경우) 거래금액이 한도금액을 넘는지 확인한다 (적립식입금, 계좌개설초입금인경우는 해당없음)
        // 8. 출금계좌의 출금가능금액이 충분한지 확인한다
        // 9. 수신계좌가 존재하는 계좌인지 확인한다
        // 10. 수신계좌가 해지,거래정지된 계좌인지 확인한다
        // 11. (온라인계좌송금일시) 수신계좌가 입출금계좌인지 확인한다
        // 11. (적립식예금추가입금일시) 수신계좌가 적립식계좌인지 확인한다
        // 12. (동일인불가코드일경우) 동일인가능여부 코드에 따라 동일인인지 타인인지 확인한다

        $bank = new Bank_Library();



        // 1. 거래가능시간인지 확인한다
        $ck_time = new Inspection();
        $ck_inspec_time = $ck_time->Regular_Inspection();

        if($ck_inspec_time){

            // 2. 발신계좌가 거래정지계좌인지 확인한다
            $sender_sql = "
            select
            a.account_number, b.id, a.active, a.limit_ac_1, a.limit_ac_2, a.stopping as stop
            from ac_List a, member_list b, ac_Title c, ac_Product d
            where a.holder = b.id
            and a.product = d.code
            and c.code = d.sub_code
            and b.id = '".$_SESSION['PID']."'
            and c.type = '입출금'
            and a.account_number = '".$send."'
            ";
            $sender_row = mysqli_fetch_assoc(mysqli_query($this->con,$sender_sql));
            while (true){
                if($sender_row['stop'] == 'N'){
                    break;
                }else{
                    echo "<script>alert('출금계좌가 거래정지된 계좌입니다')</script>";
                    echo "<script>location.href='/bank/?log=transfer'</script>";
                    return $pass;
                }
            }

            // 3. 발신계좌와 수신계좌가 동일하게 입력된 계좌인지 확인한다
            if($send != $receive && $send != '' && $send != null && $receive != '' && $receive != null && $amount != '' && $amount != null){

                // 발신계좌정보
                $ck_1_sql = "
                select
                a.account_number, b.id, a.active, a.limit_ac_1, a.limit_ac_2, a.stopping as stop,
                (select balance from bank_account.".$send." ac, ac_List al where al.holder = b.id and al.account_number = a.account_number order by time desc LIMIT 1) balance
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id
                and a.product = d.code
                and c.code = d.sub_code
                and b.id = '".$_SESSION['PID']."'
                and c.type = '입출금'
                and a.account_number = '".$send."'
                ";
                $ck_1 = mysqli_fetch_assoc(mysqli_query($this->con,$ck_1_sql));

                // 4. 출금계좌의 소유권을 확인한다
                if($ck_1['account_number'] == $send && $ck_1['id'] == $_SESSION['PID']){

                    // 5. 출금계좌의 해지여부를 확인한다
                    if($ck_1['active'] == 'Y'){

                        $sender_balance = $bank->ac_list->Withdrawable_Amount($send);
                        $amount = (int)$amount;

                        // 6. 한도제한계좌에 해당하는지 확인한다
                        while (true){
                            if($ck_type == 'W'){
                                if($ck_1['limit_ac_2'] == 'Y'){
                                    // 7. (한도제한계좌일 경우) 거래금액이 한도금액을 넘는지 확인한다 (적립식입금, 계좌개설초입금인경우는 해당없음)
                                    if($amount >= 3000000){
                                        echo "<script>alert('한도제한계좌 Ⅱ의 출금금액은 건별 300만원을 넘을 수 없습니다')</script>";
                                        echo "<script>location.href='/bank/?log=transfer'</script>";
                                        return $pass;
                                    }else{
                                        break;
                                    }
                                }else if($ck_1['limit_ac_1'] == 'Y'){
                                    // 7. (한도제한계좌일 경우) 거래금액이 한도금액을 넘는지 확인한다 (적립식입금, 계좌개설초입금인경우는 해당없음)
                                    if($amount >= 300000){
                                        echo "<script>alert('한도제한계좌 Ⅰ의 출금금액은 건별 30만원을 넘을 수 없습니다')</script>";
                                        echo "<script>location.href='/bank/?log=transfer'</script>";
                                        return $pass;
                                    }else{
                                        break;
                                    }
                                }else if($ck_1['limit_ac_1'] != 'Y' && $ck_1['limit_ac_2'] != 'Y'){
                                    break;
                                }
                            }else{
                                break;
                            }
                        }


                        // 8. 출금계좌의 출금가능금액이 충분한지 확인한다
                        if($sender_balance >= $amount && $amount != 0){

                            // 수신계좌정보
                            $ck_2_sql = "
                            select
                            a.account_number, b.id, a.active, c.type, a.stopping as stop
                            from ac_List a, member_list b, ac_Title c, ac_Product d
                            where a.holder = b.id
                            and a.product = d.code
                            and c.code = d.sub_code
                            and a.account_number = '".$receive."';
                            ";
                            $ck_2 = mysqli_fetch_assoc(mysqli_query($this->con,$ck_2_sql));

                            // 9. 수신계좌가 존재하는 계좌인지 확인한다
                            if($ck_2['account_number'] == $receive){
                                // 10. 수신계좌가 해지,거래정지된 계좌인지 확인한다
                                if($ck_2['active'] == 'Y'){

                                    while (true){
                                        if($ck_2['stop'] == 'Y'){
                                            echo "<script>alert('입금계좌를 확인해주세요')</script>";
                                            echo "<script>location.href='/bank/?log=transfer'</script>";
                                            return $pass;
                                        }else{
                                            break;
                                        }
                                    }

                                    if($ck_type == 'W'){
                                        // 11. (온라인계좌송금일시) 수신계좌가 입출금계좌인지 확인한다
                                        if($ck_2['type'] == '입출금'){
                                            // 12. (동일인불가코드일경우) 동일인가능여부 코드에 따라 동일인인지 타인인지 확인한다
                                            if($same_id == 'Y'){
                                                // 동일인 명의를 허용할 경우
                                                $pass = 'Y';
                                                return $pass;
                                            }else{
                                                // 동일인 명의를 허용하지 않을경우
                                                if($ck_1['id'] != $ck_2['id']){
                                                    // 모든 절차에 무결성이 검증됐을때 true 리턴
                                                    $pass = 'Y';
                                                    return $pass;
                                                }else{
                                                    // 수발신계좌가 동일인 명의일 경우
                                                    echo "<script>alert('내 계좌간 이체 메뉴를 이용하세요')</script>";
                                                    echo "<script>location.href='/bank/?log=transfer'</script>";
                                                    return $pass;
                                                }
                                            }
                                        }else{
                                            echo "<script>alert('입금계좌를 확인해주세요')</script>";
                                            echo "<script>location.href='/bank/?log=transfer'</script>";
                                            return $pass;
                                        }
                                    }else if($ck_type == 'S'){
                                        // 10. (적립식예금추가입금일시) 수신계좌가 적립식계좌인지 확인한다
                                        if($ck_2['type'] == '적립식'){
                                            // 모든 절차에 무결성이 검증됐을때 true 리턴
                                            $pass = 'Y';
                                            return $pass;
                                        }else{
                                            echo "<script>alert('입금계좌를 확인해주세요')</script>";
                                            echo "<script>location.href='/bank/?log=transfer'</script>";
                                            return $pass;
                                        }
                                    }
                                }else{
                                    // 입금계좌가 해지된 계좌일 경우
                                    echo "<script>alert('입금계좌가 해지된 계좌입니다')</script>";
                                    if($ck_type == 'W'){
                                        echo "<script>location.href='/bank/?log=transfer'</script>";
                                    }else if($ck_type == 'S'){
                                        echo "<script>location.href='/bank/?log=transfer'</script>";
                                    }
                                    return $pass;
                                }
                            }else{
                                // 입금계좌가 없는 계좌일 경우
                                echo "<script>alert('입금계좌를 확인해주세요')</script>";
                                if($ck_type == 'W'){
                                    echo "<script>location.href='/bank/?log=transfer'</script>";
                                }else if($ck_type == 'S'){
                                    echo "<script>location.href='/bank/?log=transfer'</script>";
                                }
                                return $pass;
                            }
                        }else{
                            if($sender_balance < $amount){
                                // 출금가능금액을 초과하여 이체를 시도할 경우
                                echo "<script>alert('이체 가능 금액이 부족합니다')</script>";
                                if($ck_type == 'W'){
                                    echo "<script>location.href='/bank/?log=transfer'</script>";
                                }else if($ck_type == 'S'){
                                    echo "<script>location.href='/bank/?log=transfer'</script>";
                                }
                                return $pass;
                            }else if($amount == 0){
                                // 0원을 이체 시도할 경우
                                echo "<script>alert('보낼금액을 확인해주세요')</script>";
                                if($ck_type == 'W'){
                                    echo "<script>location.href='/bank/?log=transfer'</script>";
                                }else if($ck_type == 'S'){
                                    echo "<script>location.href='/bank/?log=transfer'</script>";
                                }
                                return $pass;
                            }
                        }
                    }else{
                        // 해지된 계좌에서 계좌이체를 시도할 경우
                        echo "<script>alert('해지된 계좌입니다')</script>";
                        if($ck_type == 'W'){
                            echo "<script>location.href='/bank/?log=transfer'</script>";
                        }else if($ck_type == 'S'){
                            echo "<script>location.href='/bank/?log=transfer'</script>";
                        }
                        return $pass;
                    }
                }else{
                    // 소유권이 검증되지 않을 경우
                    echo "<script>alert('출금계좌를 확인해주세요')</script>";
                    if($ck_type == 'W'){
                        echo "<script>location.href='/bank/?log=transfer'</script>";
                    }else if($ck_type == 'S'){
                        echo "<script>location.href='/bank/?log=transfer'</script>";
                    }
                    return $pass;
                }
            }else{
                if($send == '' || $send == null || $receive == '' || $receive == null){
                    if($ck_type == 'W'){
                        echo "<script>alert('받는분 정보를 올바르게 입력해주세요')</script>";
                        echo "<script>location.href='/bank/?log=transfer'</script>";
                    }else if($ck_type == 'S'){
                        echo "<script>location.href='/bank/?log=transfer'</script>";
                    }
                    return $pass;
                }else if($send == $receive){
                    // 발신,수신계좌 동일할 시
                    echo "<script>alert('출금계좌와 입금계좌가 동일합니다')</script>";
                    if($ck_type == 'W'){
                        echo "<script>location.href='/bank/?log=transfer'</script>";
                    }else if($ck_type == 'S'){
                        echo "<script>location.href='/bank/?log=transfer'</script>";
                    }
                    return $pass;
                }
            }
        }else{
            // 거래중지시간에 이체를 시도했을 때
            echo "<script>alert('거래정지 시간입니다')</script>";
            if($ck_type == 'W'){
                echo "<script>location.href='/bank/?log=transfer'</script>";
            }else if($ck_type == 'S'){
                echo "<script>location.href='/bank/?log=transfer'</script>";
            }
            return $pass;
        }
        return $pass;
    }

    // 수발신계좌 무결성 테스트를 통과한후 수신계좌 예금주 및 최종잔액리턴
    // $num: 수신계좌번호
    function Receive_Account($num){
        $receive_ac_sql = "
        select
        a.account_number, b.name,
        (select balance from bank_account.".$num." ac, ac_List al where al.holder = b.id and al.account_number = a.account_number order by time desc LIMIT 1) balance
        from ac_List a, member_list b, ac_Title c, ac_Product d
        where a.holder = b.id
        and a.product = d.code
        and c.code = d.sub_code
        and a.account_number = '".$num."';
        ";
        $receive_ac = mysqli_fetch_assoc(mysqli_query($this->con,$receive_ac_sql));
        $receive_ac['Dashed'] = substr($receive_ac['account_number'],0,6).'-'.substr($receive_ac['account_number'],6,2).'-'.substr($receive_ac['account_number'],8,6);

        return $receive_ac;
    }

    // 계좌이체
    // $send: 발신계좌번호
    // $receive: 수신계좌번호
    // $amount: 송금금액
    // $memo_me: 내 통장 표기
    // $memo_to: 받는 분 통장 표기
    // $same_id: Y일경우 수발신계좌번호의 동일인명의를 허용하지만, N일경우 수발신계좌번호의 명의가 각각 달라야한다
    function Wire_Transfer($send, $receive, $amount, $memo_me, $memo_to, $same_id){
        $amount = preg_replace('/(,)/','',$amount);
        $amount = (int)$amount;
        // 무결성 테스트
        $check = $this->Integrity_Check($send,$receive,$amount,'W',$same_id);

        
        if($check == 'Y'){
            // 무결성 테스트를 통과했을 경우 계좌이체 절차 진행

            // 거래내역 기록을 위한 시간 산출
            $time_sql = "
            select now(6) time;
            ";
            $time = mysqli_fetch_assoc(mysqli_query($this->con,$time_sql));
            $time = $time['time'];

            // 출금계좌와 입금계좌의 최종잔액을 불러온다
            $each_balance_sql = "
            select
            (select balance from bank_account.".$send." order by time desc LIMIT 1)Send,
            (select balance from bank_account.".$receive." order by time desc LIMIT 1)Receive;
            ";
            $each_balance = mysqli_fetch_assoc(mysqli_query($this->con,$each_balance_sql));
            foreach ($each_balance as $key => $value){
                $each_balance[$key] = (int)$value;
            }

            // 출금계좌 거래내역 기록
            $sender_sql = "
            INSERT INTO bank_account.".$send." (time, type, amount, balance, memo_me, memo_to, receive_number)
            VALUES ('".$time."','W','".$amount."','".($each_balance['Send']-$amount)."','".$memo_me."','".$memo_to."','".$receive."');
            ";

            // 입금계좌 거래내역 기록
            $receiver_sql = "
            INSERT INTO bank_account.".$receive." (time, type, amount, balance, memo_me, receive_number)
            VALUES ('".$time."','D','$amount','".($each_balance['Receive']+$amount)."','".$memo_to."','".$send."');
            ";

            $sender_result = mysqli_query($this->con,$sender_sql);
            $receiver_result = mysqli_query($this->con,$receiver_sql);

            // 출금계좌가 신용한도로 출금했을 경우 사용내역 기록
            $send_latest_sql = "
            select tid, time, type, amount, balance from bank_account.".$send." order by time desc LIMIT 1
            ";
            $send_latest = mysqli_fetch_assoc(mysqli_query($this->con,$send_latest_sql));
            if($send_latest['balance'] < 0){
                // 신용한도를 사용하여 잔액이 음수일 경우 신용한도 사용기록
                $send_crRecord_sql = "
                INSERT INTO bank_CreditRecord.".$send." (tid, time, type, amount, sum) VALUES (".$send_latest['tid'].",'".$time."','W',".$send_latest['amount'].",(0 - (".$send_latest['balance'].")));
                ";
                $send_crRecord_result = mysqli_query($this->con,$send_crRecord_sql);
            }

            // 입금계좌가 신용한도 사용중으로 입금받을 경우 상환내역 기록
            $receive_latest_sql = "
            select tid, time, type, amount, balance from bank_account.".$receive." order by time desc LIMIT 1;
            ";
            $receive_latest = mysqli_fetch_assoc(mysqli_query($this->con,$receive_latest_sql));
            if($each_balance['Receive'] < 0){
                if($receive_latest['balance'] >= 0){
                    // 상환 완료일경우
                    $receive_crRecord_sql = "
                    INSERT INTO bank_CreditRecord.".$receive." (tid, time, type, amount, sum) VALUES (".$receive_latest['tid'].",'".$time."','D',(0 - (".$each_balance['Receive'].")),0);
                    ";
                }else if($receive_latest['balance'] < 0){
                    // 일부 상환일 경우
                    $receive_crRecord_sql = "
                    INSERT INTO bank_CreditRecord.".$receive." (tid, time, type, amount, sum) VALUES (".$receive_latest['tid'].",'".$time."','D',".$receive_latest['amount'].",(0 - (".$receive_latest['balance'].")));
                    ";
                }
                $receive_crRecord_result = mysqli_query($this->con,$receive_crRecord_sql);
            }


            if($sender_result && $receiver_result){
                echo "<script>alert('송금이 완료되었습니다')</script>";
                echo "<script>location.href='/bank/?log=transfer'</script>";
                return true;
            }else{
                echo "<script>alert('오류가 발생했습니다. 관리자에게 문의하세요')</script>";
                echo "<script>location.href='/bank/?log=transfer'</script>";
                return false;
            }
        }else if($check == 'N'){
            return false;
        }
        return false;
    }

    // 동일인계좌 적립식예금 추가입금
    // $send: 발신계좌번호, $receive: 수신계좌번호, $amount: 송금금액
    function Local_Deposit($send, $receive, $amount){
        $amount = preg_replace('/(,)/','',$amount);
        $amount = (int)$amount;
        
        // 적립식예금 추가입금 절차
        // 1. 무결성 테스트
        // 2. 적립식예금 추가입금 절차 진행
        // 3. 현재시간 불러오기
        // 4. 출금계좌와 적금계좌의 최종잔액을 가져온다
        // 5. 출금계좌에서 입금액 만큼 인출한다
        // 6. 적금계좌에 입금액 만큼 입금

        // 1. 무결성 테스트
        $check = $this->Integrity_Check($send,$receive,$amount,'S','Y');

        if($check == 'Y'){
            // 무결성 테스트를 통과했을 경우 계좌이체 절차 진행
            $time_sql = "
            select now(6) time;
            ";
            $time = mysqli_fetch_assoc(mysqli_query($this->con,$time_sql));
            $time = $time['time'];

            $each_balance_sql = "
            select
            (select balance from bank_account.".$send." order by time desc LIMIT 1)Send,
            (select balance from bank_account.".$receive." order by time desc LIMIT 1)Receive;
            ";
            $each_balance = mysqli_fetch_assoc(mysqli_query($this->con,$each_balance_sql));
            foreach ($each_balance as $key => $value){
                $each_balance[$key] = (int)$value;
            }

            $sender_sql = "
            INSERT INTO bank_account.".$send." (time, type, amount, balance, memo_me, memo_to, receive_number)
            VALUES ('".$time."','W','".$amount."','".($each_balance['Send']-$amount)."','적립식 추가입금','추가입금','".$receive."');
            ";

            $receiver_sql = "
            INSERT INTO bank_account.".$receive." (time, type, amount, balance, memo_me, receive_number)
            VALUES ('".$time."','D','$amount','".($each_balance['Receive']+$amount)."','추가입금','".$send."');
            ";
            $sender_result = mysqli_query($this->con,$sender_sql);
            $receiver_result = mysqli_query($this->con,$receiver_sql);

            if($sender_result && $receiver_result){
                echo "<script>alert('추가입금이 완료되었습니다')</script>";
                echo "<script>location.href='/bank/?log=transfer'</script>";
                return true;
            }else{
                echo "<script>alert('오류가 발생했습니다. 관리자에게 문의하세요')</script>";
                echo "<script>location.href='/bank/?log=transfer'</script>";
                return false;
            }
        }else if($check == 'N'){
            return false;
        }
        return false;
    }



}