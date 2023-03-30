<?php
session_start();
require_once ("Sandbox.php");

class Credit extends SandBox
{

    // 고객 신분확인번호별 부여 한도, 설정 한도 리턴
    function Credit_Info(){
        $sql = "
        select b.amount as maximum,
        (select sum(cr.amount) from member_list me, ac_List ac, ac_Credit cr where me.id = ac.holder and me.id = a.id and ac.account_number = cr.account_number group by me.id)setup
        from member_list a, Credit_member b
        where a.id = '".$_SESSION['PID']."';
        ";

        $row = mysqli_fetch_assoc(mysqli_query($this->con,$sql));

        return $row;
    }

    // 계좌번호를 인수로 받아서 할당된 신용한도와 잔여 신용한도 리턴
    function Line_Credit($num){

        // 계좌별 할당된 신용한도
        $limit_sql = "
        SELECT
        a.account_number, cr.amount
        FROM ac_List a, member_list b, ac_Credit cr
        where a.holder = b.id and cr.account_number = a.account_number
        and a.account_number = '".$num."';
        ";
        $limit_row = mysqli_fetch_assoc(mysqli_query($this->con,$limit_sql));

        // 최종거래내역 조회
        $last_transac_sql = "
        SELECT
        tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to, receive_number
        FROM bank_account.".$num."
        ORDER BY tid DESC LIMIT 1;
        ";
        $last_transac_row = mysqli_fetch_assoc(mysqli_query($this->con,$last_transac_sql));
        $balance = (int)$last_transac_row['balance'];

        // 최종잔액을 기준으로 잔여 신용한도 조회
        if($balance < 0){
            $remain_credit = ($limit_row['amount'] + $balance);
        }else{
            $remain_credit = $limit_row['amount'];
        }

        $ac['Credit_Limit'] = $limit_row['amount'];
        $ac['Credit_Remain'] = $remain_credit;

        return $ac;
    }
    
    // 계좌번호를 인수로 받아서 증액가능한도와 감액가능한도 리턴
    function Limit_Info($num){
        $cr_info = $this->Credit_Info();
        $cr_ac = $this->Line_Credit($num);

        $credit['maximum'] = $cr_ac['Credit_Limit']+($cr_info['maximum']-$cr_info['setup']);
        $credit['minimum'] = $cr_ac['Credit_Limit']-$cr_ac['Credit_Remain'];

        return $credit;
    }
    
    // 계좌번호를 인수로 받아서 신용한도변경 무결성체크
    function Limit_Integrity($num,$amount){

        // 1. 거래가능시간인지 확인한다
        // 2. 계좌의 소유권이 있는지 체크
        // 3. 계좌가 해지된 계좌인지 체크
        // 4. 현재 한도와 동일한지 체크
        // 5. 현재 한도와 비교하여 증액인지 감액인지 체크
        // 6. (증액일경우) 증액가능한 한도 위로 넘어가지 않았는지 체크
        // 6. (감액일경우) 감액가능한 한도 아래로 넘어가지 않았는지 체크
        // 7. Y리턴

        $pass = 'N';

        $bank = new Bank_Library();

        $num = (int)$num;
        $amount = preg_replace('/(,)/','',$amount);
        $amount = (int)$amount;



        $ck_time = new Inspection();
        $ck_inspec_time = $ck_time->Regular_Inspection();

        // 1. 거래가능시간인지 확인한다
        if($ck_inspec_time){

            $ck_1_sql = "
            select
            a.account_number, b.id, a.active
            from ac_List a, member_list b, ac_Title c, ac_Product d
            where a.holder = b.id
            and c.code = d.sub_code
            and a.product = d.code
            and b.id = '".$_SESSION['PID']."'
            and c.type = '입출금'
            and a.account_number = '".$num."'
            ";
            $ck_1 = mysqli_fetch_assoc(mysqli_query($this->con,$ck_1_sql));

            // 2. 계좌의 소유권이 있는지 체크
            if($ck_1['account_number'] == $num && $ck_1['id'] == $_SESSION['PID']){

                // 3. 계좌가 해지된 계좌인지 체크
                if($ck_1['active'] == 'Y'){

                    $lc = $this->Line_Credit($num);

                    // 4. 현재 한도와 동일한지 체크
                    if($lc['Credit_Limit'] != $amount){

                        $cr_ac = $this->Limit_Info($num);

                        // 5. 현재 한도와 비교하여 증액인지 감액인지 체크
                        if($amount > $lc['Credit_Limit']){
                            // 증액

                            // 6. (증액일경우) 증액가능한 한도 위로 넘어가지 않았는지 체크
                            if($amount <= (int)$cr_ac['maximum']){
                                // 7. Y리턴
                                return 'Y';
                            }else{
                                // 증액 한도보다 낮을 경우
                                echo "<script>alert('증액 가능한 한도보다 높게 설정할 수 없습니다')</script>";
                                echo "<script>location.href='/bank/?log=credit'</script>";
                                return $pass;
                            }

                        }else if($amount < $lc['Credit_Limit']){
                            // 감액

                            // 6. (감액일경우) 감액가능한 한도 아래로 넘어가지 않았는지 체크
                            if($amount >= (int)$cr_ac['minimum']){
                                // 7. Y리턴
                                return 'Y';
                            }else{
                                // 감액 한도보다 낮을 경우
                                echo "<script>alert('감액 가능한 한도보다 낮게 설정할 수 없습니다')</script>";
                                echo "<script>location.href='/bank/?log=credit'</script>";
                                return $pass;
                            }
                        }
                    }else{
                        // 현재 한도와 동일할 경우
                        echo "<script>alert('현재 설정된 한도와 동일합니다')</script>";
                        echo "<script>location.href='/bank/?log=credit'</script>";
                        return $pass;
                    }
                }else{
                    // 해지된계좌일 경우
                    echo "<script>alert('해지된 계좌입니다')</script>";
                    echo "<script>location.href='/bank/?log=credit'</script>";
                    return $pass;
                }
            }else{
                // 계좌소유권 검증 실패했을때
                echo "<script>alert('계좌 소유권검증에 실패했습니다')</script>";
                echo "<script>location.href='/bank/?log=credit'</script>";
                return $pass;
            }
        }else{
            // 거래중지시간에 거래를 시도했을 때
            echo "<script>alert('거래정지 시간입니다')</script>";
            echo "<script>location.href='/bank'</script>";
            return $pass;
        }

        return $pass;
    }

    // 계좌번호를 인수로 받아서 계좌별 신용한도 변경
    function Change_Limit($num,$amount){
        $amount = preg_replace('/(,)/','',$amount);
        $amount = (int)$amount;

        $check = $this->Limit_Integrity($num,$amount);

        if($check == 'Y'){
            $sql = "
            UPDATE ac_Credit set amount = '".$amount."'
            where account_number = '".$num."';
            ";
            $result = mysqli_query($this->con,$sql);
            if($result){
                echo "<script>alert('한도변경이 완료되었습니다')</script>";
                echo "<script>location.href='/bank/?log=credit'</script>";
                return true;
            }
        }else{
            return false;
        }
        return false;
    }




}