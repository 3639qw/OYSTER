<?php
session_start();
require_once ("Sandbox.php");

class Transaction_Details extends Sandbox
{

    // 인수를 받아서 조건에 맞는 계좌 거래내역 리스트를 리턴
    // 거래내역 표출 조건
    // 1. 계좌번호 $num
    // 2. 거래일 $date: 0번인덱스: 타입(1: 연월별로 대조, 2: 사용자 지정), 1,2번인덱스 기간
    // 3. 최근순 과거순 $sort
    function Transaction_List($num,array $date, $sort){

        // 기본 쿼리문 작성전 해지계좌 거래내역 조회인지 검증
        $close_ac_ck_sql = "
        select
        a.id, b.account_number, b.active
        from member_list a, ac_List b
        where a.id = b.holder and
        a.id = '".$_SESSION['PID']."' and
        b.account_number = '".$num."'
        ";
        $close_ac_ck = mysqli_fetch_assoc(mysqli_query($this->con,$close_ac_ck_sql));

        if($close_ac_ck['active'] == 'Y'){
            // 활성계좌는 일반 데이터베이스에서 계좌 거래내역을 가져온다
            $trans_list_sql = "
            select
            a.tid, DATE_FORMAT(a.time,'%Y.%m.%d %T') time, if(a.type='D','입금',if(a.type,'출금','')) type,
            a.amount, a.balance,                                
            a.memo_me, a.memo_to,
            a.receive_number
            from bank_account.".$num." a, member_list b
            where b.id = '".$_SESSION['PID']."'
            ";
        }else{
            // 해지된계좌는 별도 분리된 데이터베이스에서 계좌 거래내역을 가져온다
            $trans_list_sql = "
            select
            a.tid, DATE_FORMAT(a.time,'%Y.%m.%d %T') time, if(a.type='D','입금',if(a.type,'출금','')) type,
            a.amount, a.balance,                                
            a.memo_me, a.memo_to,
            a.receive_number
            from bank_inactive_account.".$num." a, member_list b
            where b.id = '".$_SESSION['PID']."'
            ";
        }


        // 거래내역 조회 조건
        if($date[0] == '1'){
            // 월별 거래내역: 1
            $trans_list_sql .= " and DATE_FORMAT(a.time,'%Y%m') = '".$date[1]."'";
        }else if($date[0] == '2'){
            // 사용자 지정 기간: 2
            $trans_list_sql .= " and DATE_FORMAT(a.time,'%Y%m%d') between '".$date[1]."' AND '".$date[2]."'";
        }else{
            // 지정되지 않았을 경우 현재 월의 거래내역을 조회
            $trans_list_sql .= " and DATE_FORMAT(a.time,'%Y%m') = '".date('Ym')."'";
        }


        // 거래내역 정렬 조건
        if($sort == 'desc'){
            // 최근 순
            $trans_list_sql .= " order by a.tid desc;";
        }else if($sort == 'asc'){
            // 과거 순
            $trans_list_sql .= " order by a.tid asc;";
        }else{
            // 지정되지 않았을 경우 최근 순으로 대조
            $trans_list_sql .= " order by a.tid desc;";
        }

        // $date 의 0번 인덱스는 거래내역 기간 타입으로 한다
        // 1: 월별로 대조한다 ex. 2022년 11월
        // 2: 최근 n개월간 대조한다(3,6,9,12개월로 지정) ex. 3,6,9,12개월
        // 3: 사용자 지정 
        
        // $sort 최근순과 과거순으로 표기할지 어떤 값도 일치하지 않을 경우 최근순으로 표시
        // desc: 최근
        // asc: 과거



        return mysqli_query($this->con,$trans_list_sql);
    }


    // 거래내역 코드를 받아서 개별 거래내역 상세 리턴
    // $ac: 계좌번호, $tid: 거래내역 코드
    function Transac_Detail($ac,$tid){

        // 기본 쿼리문 작성전 해지계좌 거래내역 조회인지 검증
        $close_ac_ck_sql = "
        select
        a.id, b.account_number, b.active
        from member_list a, ac_List b
        where a.id = b.holder and
        a.id = '".$_SESSION['PID']."' and
        b.account_number = '".$ac."'
        ";
        $close_ac_ck = mysqli_fetch_assoc(mysqli_query($this->con,$close_ac_ck_sql));

        if($close_ac_ck['active'] == 'Y'){
            // 활성계좌는 일반 데이터베이스에서 계좌 거래내역을 가져온다
            $trans_list_sql = "
            select
            a.tid, DATE_FORMAT(a.time,'%Y.%m.%d %T') time, if(a.type='D','입금',if(a.type,'출금','')) type,
            a.amount, a.balance,                                
            a.memo_me, a.memo_to,
            a.receive_number
            from bank_account.".$ac." a, member_list b
            where b.id = '".$_SESSION['PID']."'
            and a.tid = '".$tid."'
            ";
        }else{
            // 해지된계좌는 별도 분리된 데이터베이스에서 계좌 거래내역을 가져온다
            $trans_list_sql = "
            select
            a.tid, DATE_FORMAT(a.time,'%Y.%m.%d %T') time, if(a.type='D','입금',if(a.type,'출금','')) type,
            a.amount, a.balance,                                
            a.memo_me, a.memo_to,
            a.receive_number
            from bank_inactive_account.".$ac." a, member_list b
            where b.id = '".$_SESSION['PID']."'
            and a.tid = '".$tid."'
            ";
        }


        return mysqli_query($this->con,$trans_list_sql);
    }




}