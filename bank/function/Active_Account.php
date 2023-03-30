<?php
session_start();
require_once ("Sandbox.php");
require_once ("Inspection.php");

class Active_Account extends Sandbox
{

    // 무결성 검증
    // 인수 풀이
    // $close_num: 비활성화할 계좌번호
    // $transfer_num: 잔액 이체할 계좌번호
    function Integrity_Check($close_num, $transfer_num){
        $pass = 'N';

        // 1. 점검시간이 아닌지 확인한다
        // 2. 비활성화할 계좌의 소유권을 확인한다, 해지된여부 조사
        // 3. 잔액 이체할 계좌(해지되는계좌의 잔액이 이체될 계좌)의 소유권을 확인한다
        // 4. 신용한도가 설정된 계좌인지 확인한다
        // 5. 신용한도를 사용중인 계좌인지 확인한다
        // 6. (입출금계좌일시) 해지된 계좌를 포함하여 2개 이상의 입출금계좌가 있는지 확인한다
        // 7. 해지된계좌를 다시 해지하는것이 아닌지 확인한다
        // 8. 해지할 계좌가 거래정지된계좌인지 확인한다
        // 9. 잔액 이체할 계좌와 비활성화할 계좌가 다른지 확인한다

        // SQL 명령
        // 1. 계좌목록에서 계좌해지조치
        // 2. 거래내역 테이블 별도 데이터베이스로 이동
        // 3. 계좌별 신용한도 테이블에서 계좌정보 삭제



        $ck_inspec = new Inspection();
        $ck_time = $ck_inspec->Regular_Inspection();

        // 1. 점검시간이 아닌지 확인한다
        if($ck_time){

            // 2. 비활성화할 계좌의 소유권을 확인한다, 해지된여부 조사
            $ck_close_ac_sql = "
            select a.account_number, b.id, a.active
            from ac_List a, member_list b
            where a.holder = b.id
            and b.id = '".$_SESSION['PID']."'
            and a.account_number = '".$close_num."';
            ";
            $ck_close_ac = mysqli_fetch_assoc(mysqli_query($this->con,$ck_close_ac_sql));
            while (true){
                if($ck_close_ac['id'] == $_SESSION['PID'] && $ck_close_ac['account_number'] == $close_num && $ck_close_ac['active'] == 'Y'){
                    break;
                }else{
                    echo "<script>alert('해지할 계좌를 확인해주세요')</script>";
                    echo "<script>history.back()</script>";
                    return $pass;
                }
            }

            // 3. 잔액 이체할 계좌(해지되는계좌의 잔액이 이체될 계좌)의 소유권을 확인한다
            $ck_trans_ac_sql = "
            select a.account_number, b.id
            from ac_List a, member_list b
            where a.holder = b.id
            and b.id = '".$_SESSION['PID']."'
            and a.account_number = '".$transfer_num."';
            ";
            $ck_trans_ac = mysqli_fetch_assoc(mysqli_query($this->con,$ck_trans_ac_sql));
            while (true){
                if($ck_trans_ac['id'] == $_SESSION['PID'] && $ck_trans_ac['account_number'] == $transfer_num){
                    break;
                }else{
                    echo "<script>alert('입금받을 계좌를 확인해주세요')</script>";
                    echo "<script>history.back()</script>";
                    return $pass;
                }
            }

            // 4. 신용한도가 설정된 계좌인지 확인한다
            $ck_crbool_sql = "
            select
            a.account_number, IF(b.amount>0,'Y','N')Credit_bool
            from ac_List a, ac_Credit b
            where a.account_number = b.account_number
            and a.account_number = '".$close_num."';
            ";
            $ck_crbool = mysqli_fetch_assoc(mysqli_query($this->con,$ck_crbool_sql));
            while (true){
                if($ck_crbool['Credit_bool'] == 'N'){
                    break;
                }else{
                    echo "<script>alert('신용한도가 설정된 계좌는 해지할 수 없습니다')</script>";
                    echo "<script>history.back()</script>";
                    return $pass;
                }
            }

            // 5. 신용한도를 사용중인 계좌인지 확인한다
            $ck_balance_sql = "
            SELECT
            IF(balance<0,'Y','N')balance_bool
            FROM bank_account.`".$close_num."`
            ORDER BY tid DESC LIMIT 1;
            ";
            $ck_balance = mysqli_fetch_assoc(mysqli_query($this->con,$ck_balance_sql));
            while (true){
                if($ck_balance['balance_bool'] == 'N'){
                    break;
                }else{
                    echo "<script>alert('신용한도를 사용중인 계좌는 해지할 수 없습니다')</script>";
                    echo "<script>history.back()</script>";
                    return $pass;
                }
            }

            // 6. (입출금계좌일시) 해지된 계좌를 포함하여 2개 이상의 입출금계좌가 있는지 확인한다
            $ck_wd_sql = "
            SELECT
            a.account_number, b.type
            FROM ac_List a, ac_Title b, ac_Product c
            where a.product = c.code and b.code = c.sub_code
            and a.account_number = '".$close_num."';
            ";
            $ck_wd = mysqli_fetch_assoc(mysqli_query($this->con,$ck_wd_sql));
            if($ck_wd['type'] == '입출금'){
                $ck_ac_count_sql = "
                SELECT
                IF(count(a.account_number)>2,'Y','N')count_ac
                FROM ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and a.active = 'Y' and a.stopping = 'N' and c.type = '입출금'
                and b.id = '".$_SESSION['PID']."'
                group by b.id;
                ";
                $ck_ac_count = mysqli_fetch_assoc(mysqli_query($this->con,$ck_ac_count_sql));
                while (true){
                    if($ck_ac_count['count_ac'] == 'Y'){
                        break;
                    }else{
                        echo "<script>alert('더 이상 계좌를 해지할 수 없습니다')</script>";
                        echo "<script>history.back()</script>";
                        return $pass;
                    }
                }
            }

            // 7. 해지된계좌를 다시 해지하는것이 아닌지 확인한다
            $ck_close_sql = "
            SELECT
            active
            FROM ac_List
            where account_number = '".$close_num."';
            ";
            $ck_close = mysqli_fetch_assoc(mysqli_query($this->con,$ck_close_sql));
            while (true){
                if($ck_close['active'] == 'Y'){
                    break;
                }else{
                    echo "<script>alert('해지된 계좌입니다')</script>";
                    echo "<script>history.back()</script>";
                    return $pass;
                }
            }

            // 8. 해지할 계좌가 거래정지된계좌인지 확인한다
            $ck_stop_sql = "
            SELECT
            stopping as stop
            FROM ac_List
            where account_number = '".$close_num."';
            ";
            $ck_stop = mysqli_fetch_assoc(mysqli_query($this->con,$ck_stop_sql));
            while (true){
                if($ck_stop['stop'] == 'N'){
                    break;
                }else{
                    echo "<script>alert('거래정지된 계좌는 해지할 수 없습니다')</script>";
                    echo "<script>history.back()</script>";
                    return $pass;
                }
            }

            // 9. 잔액 이체할 계좌와 비활성화할 계좌가 다른지 확인한다
            if($close_num != $transfer_num){
                return 'Y';
            }else{
                echo "<script>alert('해지할 계좌와 입금받을 계좌는 동일 할 수 없습니다')</script>";
                echo "<script>history.back()</script>";
                return $pass;
            }

        }else{
            // 거래정지 시간일경우
            echo "<script>alert('거래정지 시간입니다')</script>";
            echo "<script>history.back()</script>";
            return false;
        }
    }



    // 입출금계좌 비활성화 (거래내역, 리스트를 삭제하지 않고 비활성화함, 계좌 해지일 기록)
    // 인수 풀이
    // $close_num: 비활성화할 계좌번호
    // $transfer_num: 잔액 이체할 계좌번호
    function Close_Account($close_num, $transfer_num){

        // SQL 명령
        // 1. 계좌목록에서 계좌해지조치
        // 2. 거래내역 테이블 별도 데이터베이스로 이동
        // 3. 계좌별 신용한도 테이블에서 계좌정보 삭제

        $ck_integrity = $this->Integrity_Check($close_num,$transfer_num);

        if($ck_integrity == 'Y'){

            // 해지될 계좌의 최종 거래내역을 조회하여 다른 계좌로 입금시킬 잔존 잔액 조회
            $latest_c_ac_list_sql = "
            select
            tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to
            from bank_account.".$close_num."
            order by time desc LIMIT 1;
            ";
            $latest_c_ac_list = mysqli_fetch_assoc(mysqli_query($this->con,$latest_c_ac_list_sql));
            $latest_c_ac_list['balance'] = (int)$latest_c_ac_list['balance'];

            $time_sql = "
            select now(6) time;
            ";
            $time = mysqli_fetch_assoc(mysqli_query($this->con,$time_sql));


            // 입금받을 계좌의 최종 거래내역을 조회하여 입금되어 반영될 총 잔액 조회
            $latest_t_num_list_sql = "
            select
            tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to
            from bank_account.".$transfer_num."
            order by time desc LIMIT 1;
            ";
            $latest_t_num_list = mysqli_fetch_assoc(mysqli_query($this->con,$latest_t_num_list_sql));
            $latest_t_num_list['balance'] = (int)$latest_t_num_list['balance'];
            $transter_balance = (int)$latest_c_ac_list['balance']+$latest_t_num_list['balance']; // 해지될 계좌의 잔액과 입금받는 계좌의 잔액을 합하여 거래내역에 찍힐 잔액

            // 해지될 계좌의 거래내역 SQL
            $c_ac_trans_sql = "
            INSERT INTO bank_account.".$close_num." (time, type, amount, balance, memo_me, memo_to, receive_number)
            VALUES ('".$time['time']."','W','".$latest_c_ac_list['balance']."','0','계좌해지', '계좌해지대체', '".$transfer_num."');
            ";
            // 입금되는 계좌의 거래내역 SQL
            $t_ac_trans_sql = "
            INSERT INTO bank_account.".$transfer_num." (time, type, amount, balance, memo_me, receive_number)
            VALUES ('".$time['time']."','D','".$latest_c_ac_list['balance']."','".$transter_balance."','계좌해지대체', '".$close_num."');
            ";
            $c_ac_trans = mysqli_query($this->con,$c_ac_trans_sql);
            $t_ac_trans = mysqli_query($this->con,$t_ac_trans_sql);

            // 계좌목록에서 계좌 비활성화조치
            $deactive_sql = "
            UPDATE ac_List set
            close_date = '".$time['time']."',
            active = 'N' where
            account_number = '".$close_num."' and
            holder = '".$_SESSION['PID']."';
            ";
            // 해지된 계좌의 거래내역 테이블은 별도 데이터베이스로 이관 -- 해지계좌 거래내역 불러오는데 문제 발생 우려로 이를 바로 잡은후에 활성화 시키기로 함
            $alter_sql = "
            alter table bank_account.".$close_num." rename bank_inactive_account.".$close_num."
            ";
            $deactive = mysqli_query($this->con,$deactive_sql);
            $alter = mysqli_query($this->pri,$alter_sql);

            // 신용한도계좌 테이블에서 삭제
            $delete_credit_sql = "
            DELETE FROM ac_Credit
            where account_number = '".$close_num."'
            ";
            $delete_credit = mysqli_query($this->con,$delete_credit_sql);

            if($deactive == true && $alter == true && $c_ac_trans == true && $t_ac_trans == true && $delete_credit == true){
                echo "<script>alert('계좌가 정상적으로 해지되었습니다')</script>";
                echo "<script>location.href='/bank'</script>";
                return true;
            }else{
                echo "<script>alert('계좌 해지중 에러가 발생했습니다. 관리자에게 문의하세요')</script>";
                echo "<script>history.back()</script>";
                return false;
            }
        }

    }
    

}