<?php
session_start();
require_once ("Sandbox.php");
require_once ("Inspection.php");

class Account_List extends Sandbox
{
    // 신분확인번호별 계좌리스트
    function ac_List($id){

        // 거래가능시간인지 확인한다
        $ck_time = new Inspection();
        $ck_inspec_time = $ck_time->Regular_Inspection();
        
        // 에러코드
        // N: 계좌없음
        // E01: 거래불가시간

        if($ck_inspec_time){
            // 거래가능시간이 아닐경우 계좌검색시작
            
            // 활성,해지를포함하여 계좌가 1개 이상 있는지 여부
            $ac_count_ck_sql = "
            select
            b.id, b.name, b.type, count(*) account_count
            from ac_List a, member_list b, ac_Title c, ac_Product d
            where a.holder = b.id
            and a.product = d.code
            and c.code = d.sub_code
            and b.id = '".$id."'
            group by b.id;
            ";
            $ac_count_ck = mysqli_fetch_assoc(mysqli_query($this->con,$ac_count_ck_sql));
            $ac_count = (int)$ac_count_ck['account_count'];


            if($ac_count >= 1){
                $ac_ck = 'Y';
            }else{
                $ac_ck = 'N';
            }

            if($ac_ck == 'Y'){
                // 활성,해지계좌가 1개 이상 있는것이 검증되었을때 계좌탐색절차 돌입

                // 기본정보
                $ac_lst['document'] = 'Account_List';
                $ac_lst['PID'] = $ac_count_ck['id'];
                $ac_lst['name'] = $ac_count_ck['name'];
                $ac_lst['type'] = $ac_count_ck['type'];

                // 특성,상태별로 계좌갯수 카운트
                // 계좌종류, 활성여부 무관
                $ac_count_sql[1] = "
                select
                b.id, count(*) account_count
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and b.id = '".$id."'
                group by b.id;
                ";
                // 활성 모든계좌
                $ac_count_sql[2] = "
                select
                b.id, count(*) account_count
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and b.id = '".$id."'
                and a.active = 'Y'
                group by b.id;
                ";
                // 해지 모든계좌
                $ac_count_sql[3] = "
                select
                b.id, count(*) account_count
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and b.id = '".$id."'
                and a.active = 'N'
                group by b.id;
                ";
                // 활성 입출금계좌
                $ac_count_sql[4] = "
                select
                b.id, count(*) account_count
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and b.id = '".$id."'
                and a.active = 'Y'
                and c.type = '입출금'
                group by b.id;
                ";
                // 해지 입출금계좌
                $ac_count_sql[5] = "
                select
                b.id, count(*) account_count
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and b.id = '".$id."'
                and a.active = 'N'
                and c.type = '입출금'
                group by b.id;
                ";
                // 활성 적립식계좌
                $ac_count_sql[6] = "
                select
                b.id, count(*) account_count
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and b.id = '".$id."'
                and a.active = 'Y'
                and c.type = '적립식'
                group by b.id;
                ";
                // 해지 적립식계좌
                $ac_count_sql[7] = "
                select
                b.id, count(*) account_count
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and c.code = d.sub_code
                and b.id = '".$id."'
                and a.active = 'N'
                and c.type = '적립식'
                group by b.id;
                ";
                for ($i = 1; $i <= 7; $i++){
                    $row = mysqli_fetch_assoc(mysqli_query($this->con,$ac_count_sql[$i]));
                    $ac_lst['ac_Count'][$i] = $row['account_count'];
                }
                $ac_lst['ac_Count_type'][1] = '계좌종류, 활성여부 무관';
                $ac_lst['ac_Count_type'][2] = '활성 모든계좌';
                $ac_lst['ac_Count_type'][3] = '해지 모든계좌';
                $ac_lst['ac_Count_type'][4] = '활성 입출금계좌';
                $ac_lst['ac_Count_type'][5] = '해지 입출금계좌';
                $ac_lst['ac_Count_type'][6] = '활성 적립식계좌';
                $ac_lst['ac_Count_type'][7] = '해지 적립식계좌';

                // 전계좌 탐색
                $ac_lst_sql = "
                select
                a.account_number, b.id, b.name,
                DATE_FORMAT(a.reg_date,'%Y%m%d') as reg_date,
                DATE_FORMAT(a.close_date,'%Y%m%d') as close_date,
                c.type as deposit_type,
                c.name as type,
                IF(c.code = d.code,null,d.name) as product,
                IF(c.code = d.code,'Y','N') as isIdentity,
                a.alias,
                a.stopping,
                a.isCredit,
                a.limit_ac_1,
                a.limit_ac_2,
                a.active
                from ac_List a, member_list b, ac_Title c, ac_Product d
                where a.holder = b.id and a.product = d.code and d.sub_code = c.code and c.code = d.sub_code
                and b.id = '".$id."'
                order by a.reg_date desc;
                ";
                $ac_lst_result = mysqli_query($this->con,$ac_lst_sql);

                $ac_lst['Integrate'] = null;
                $ac_lst['Active'] = null;
                $ac_lst['Inactive'] = null;
                $ac_lst['Active_WD'] = null;
                $ac_lst['Active_Savings'] = null;
                $ac_lst['ac_Balance'] = null;
                $ac_lst['ac_Balance_sum'] = null;
                
                // integration: 활성,해지 전계좌
                // active: 활성 계좌만 
                // inactive: 해지 계좌만
                // active_WD: 활성 입출금계좌만
                // ac_Balance: 활성 계좌별 잔액
                // ac_balance_sum: 활성 계좌의 총잔액
                // ** active,inactive,active_WD 배열은 대시없는 계좌번호만 표기


                while ($list = mysqli_fetch_array($ac_lst_result)){
                    // 대시가 없는 계좌번호
                    $ac_lst['Integrate']['ac_Number']['Raw'][$list['account_number']] = $list['account_number'];
                    // 대시가 들어간 계좌번호
                    $ac_lst['Integrate']['ac_Number']['Dashed'][$list['account_number']] = substr($list['account_number'],0,6).'-'.substr($list['account_number'],6,2).'-'.substr($list['account_number'],8,6);
                    // 년월일이 없는 계좌신규일
                    $ac_lst['Integrate']['Open_Date']['Raw'][$list['account_number']] = $list['reg_date'];
                    // 년월일이 있는 계좌신규일
                    $ac_lst['Integrate']['Open_Date']['Dashed'][$list['account_number']] = substr($list['reg_date'],0,4).'년 '.substr($list['reg_date'],4,2).'월 '.substr($list['reg_date'],6,2).'일';
                    if($list['active'] == 'N'){
                        // 년월일이 없는 계좌해지일
                        $ac_lst['Integrate']['Inactive_Date']['Raw'][$list['account_number']] = $list['close_date'];
                        // 년월일이 있는 계좌해지일
                        $ac_lst['Integrate']['Inactive_Date']['Dashed'][$list['account_number']] = substr($list['close_date'],0,4).'년 '.substr($list['close_date'],4,2).'월 '.substr($list['close_date'],6,2).'일';
                    }
                    // 계좌상품명 표시단계
                    // 1. 별명이 있으면 별명을 표시한다
                    // 2. 예금과목과 동일한 코드를 가질 경우 예금과목만 표시한다
                    // 3. 한도제한계좌 2에 해당할 경우 뒤에 (한도제한 Ⅱ)
                    // 4. 한도제한계좌 1에 해당할 경우 뒤에 (한도제한 Ⅰ)
                    // 5. 한도제한계좌 1,2에 모두 해당하지 않을 경우 괄호를 붙이지 않는다

                    // 1. 별명이 있으면 별명을 표시한다
                    if($list['alias'] == '' || $list['alias'] == null){
                        // 2. 예금과목과 동일한 코드를 가질 경우 예금과목만 표시한다
                        if($list['isIdentity'] == 'Y'){
                            // 3. 한도제한계좌 2에 해당할 경우 뒤에 (한도제한 Ⅱ)
                            if($list['limit_ac_2'] == 'Y'){
                                $ac_lst['Integrate']['Product'][$list['account_number']] = $list['type'];
                                $ac_lst['Integrate']['Product'][$list['account_number']] .= ' [한도제한 Ⅱ]';
                            }else{
                                // 4. 한도제한계좌 1에 해당할 경우 뒤에 (한도제한 Ⅰ)
                                if($list['limit_ac_1'] == 'Y'){
                                    $ac_lst['Integrate']['Product'][$list['account_number']] = $list['type'];
                                    $ac_lst['Integrate']['Product'][$list['account_number']] .= ' [한도제한 Ⅰ]';
                                }else{
                                    // 5. 한도제한계좌 1,2에 모두 해당하지 않을 경우 괄호를 붙이지 않는다
                                    $ac_lst['Integrate']['Product'][$list['account_number']] = $list['type'];
                                }
                            }
                        }else{
                            // 3. 한도제한계좌 2에 해당할 경우 뒤에 (한도제한 Ⅱ)
                            if($list['limit_ac_2'] == 'Y'){
                                $ac_lst['Integrate']['Product'][$list['account_number']] = $list['product'].'-'.$list['type'];
                                $ac_lst['Integrate']['Product'][$list['account_number']] .= ' [한도제한 Ⅱ]';
                            }else{
                                // 4. 한도제한계좌 1에 해당할 경우 뒤에 (한도제한 Ⅰ)
                                if($list['limit_ac_1'] == 'Y'){
                                    $ac_lst['Integrate']['Product'][$list['account_number']] = $list['product'].'-'.$list['type'];
                                    $ac_lst['Integrate']['Product'][$list['account_number']] .= ' [한도제한 Ⅰ]';
                                }else{
                                    // 5. 한도제한계좌 1,2에 모두 해당하지 않을 경우 괄호를 붙이지 않는다
                                    $ac_lst['Integrate']['Product'][$list['account_number']] = $list['product'].'-'.$list['type'];
                                }
                            }
                        }
                    }else{
                        $ac_lst['Integrate']['Product'][$list['account_number']] = $list['alias'];
                    }

                    // 계좌 타입 (입출금,예금)
                    $ac_lst['Integrate']['deposit_type'][$list['account_number']] = $list['deposit_type'];
                    // 거래정지여부
                    $ac_lst['Integrate']['stop'][$list['account_number']] = $list['stopping'];
                    // 활성여부(해지여부)
                    $ac_lst['Integrate']['isActive'][$list['account_number']] = $list['active'];

                    // 신용한도설정가능여부, 한도제한계좌 유형1,2는 입출금통장만 해당한다
                    if($list['deposit_type'] == '입출금'){
                        if($list['stopping'] != 'Y'){
                            // 한도제한계좌 해당여부
                            if($list['limit_ac_2'] == 'Y'){
                                $ac_lst['Integrate']['limit_ac'][$list['account_number']] = 'Y';
                                $ac_lst['Integrate']['canCredit'][$list['account_number']] = 'N';
                            }else{
                                if($list['limit_ac_1'] == 'Y'){
                                    $ac_lst['Integrate']['limit_ac'][$list['account_number']] = 'Y';
                                    $ac_lst['Integrate']['canCredit'][$list['account_number']] = 'N';
                                }else{
                                    $ac_lst['Integrate']['limit_ac'][$list['account_number']] = 'N';
                                    $ac_lst['Integrate']['canCredit'][$list['account_number']] = $list['isCredit'];
                                }
                            }
                        }else{
                            $ac_lst['Integrate']['canCredit'][$list['account_number']] = 'N';
                        }
                    }



                    // 활성계좌의 특성에 따른 추가적인 정보
                    if($list['active'] == 'Y'){
                        // 활성계좌의 잔액 불러오기
                        $tranlist_sql = "
                        SELECT
                        tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to, receive_number
                        FROM bank_account.".$list['account_number']."
                        ORDER BY tid DESC LIMIT 1;
                        ";
                        $tranlist = mysqli_fetch_assoc(mysqli_query($this->con,$tranlist_sql));
                        $ac_lst['ac_Balance'][$list['account_number']] = $tranlist['balance'];
                        $ac_lst['ac_Balance_sum'] += $tranlist['balance'];
                        if($list['deposit_type'] == '입출금'){
                            $ac_lst['wd_Balance_sum'] += $tranlist['balance'];
                        }
                        $w_amount = $this->Withdrawable_Amount($list['account_number']);
                        $ac_lst['withdrawable']['ac_withdrawable'][$list['account_number']] = $w_amount;
                        $ac_lst['withdrawable']['ac_withdrawable_sum'] += $w_amount;
                        if($list['deposit_type'] == '입출금'){
                            $ac_lst['withdrawable']['wd_withdrawable_sum'] += $w_amount;
                        }

                        // 활성 전계좌 배열
                        $ac_lst['Active'][$list['account_number']] = $list['account_number'];

                        // 활성 입출금계좌 배열
                        if($list['deposit_type'] == '입출금'){
                            $ac_lst['Active_WD'][$list['account_number']] = $list['account_number'];
                        }
                        // 활성 적립식계좌 배열
                        if($list['deposit_type'] == '적립식'){
                            $ac_lst['Active_Savings'][$list['account_number']] = $list['account_number'];
                        }
                    }else{
                        // 해지 전계좌 배열
                        $ac_lst['Inactive'][$list['account_number']] = $list['account_number'];
                    }
                }

                return $ac_lst;
            }else{
                return 'N';
            }
        }else{
            // 거래불가시간 에러코드 리턴
            return 'E01';
        }
    }

    // 현재 판매하는 입출금 상품 리스트
    function Checking_Product_List(){
        $sql = "
        select
        IF(a.code=b.code,a.name,concat(b.name,'(',a.name,')')) checking_name,
        a.name as sub,
        b.name as product,
        a.code as sub_code,
        b.code as product_code,
        b.isPersonal,
        b.isCorporate
        from ac_Title a, ac_Product b
        where b.sub_code = a.code
        and a.type = '입출금'
        order by checking_name asc;
        ";
        $result = mysqli_query($this->con,$sql);

        $count = 1;
        while ($row = mysqli_fetch_assoc($result)){
            foreach ($row as $key => $value){
                $list[$key][$count] = $value;
            }
            $list['count'] = count($list['checking_name']);
            $count++;
        }

        foreach ($list['checking_name'] as $key => $value){
            if($list['isPersonal'][$key] == 'Y' && $list['isCorporate'][$key] == 'Y'){
                $list['Product_Eligibility'][$key] = '개인,법인';
            }else if($list['isPersonal'][$key] == 'Y' && $list['isCorporate'][$key] == 'N'){
                $list['Product_Eligibility'][$key] = '개인';
            }else if($list['isPersonal'][$key] == 'N' && $list['isCorporate'][$key] == 'Y'){
                $list['Product_Eligibility'][$key] = '법인';
            }

            $list['product_key'][$list['product_code'][$key]] = $list['checking_name'][$key];
        }
        return $list;
    }

    // 현재 판매하는 적립식 상품 리스트
    function Savings_Product_List(){
        $sql = "
        select
        IF(a.code=b.code,a.name,concat(b.name,'(',a.name,')')) checking_name,
        a.name as sub,
        b.name as product,
        a.code as sub_code,
        b.code as product_code,
        b.isPersonal,
        b.isCorporate
        from ac_Title a, ac_Product b
        where b.sub_code = a.code
        and a.type = '적립식'
        order by checking_name asc;
        ";
        $result = mysqli_query($this->con,$sql);

        $count = 1;
        while ($row = mysqli_fetch_assoc($result)){
            foreach ($row as $key => $value){
                $list[$key][$count] = $value;
            }
            $list['count'] = count($list['checking_name']);
            $count++;
        }

        foreach ($list['checking_name'] as $key => $value){
            if($list['isPersonal'][$key] == 'Y' && $list['isCorporate'][$key] == 'Y'){
                $list['Product_Eligibility'][$key] = '개인,법인';
            }else if($list['isPersonal'][$key] == 'Y' && $list['isCorporate'][$key] == 'N'){
                $list['Product_Eligibility'][$key] = '개인';
            }else if($list['isPersonal'][$key] == 'N' && $list['isCorporate'][$key] == 'Y'){
                $list['Product_Eligibility'][$key] = '법인';
            }

            $list['product_key'][$list['product_code'][$key]] = $list['checking_name'][$key];
        }

        return $list;
    }

    // 현재 판매하는 모든 상품 리스트
    function Product_List(){
        $sql = "
        select
        IF(a.code=b.code,a.name,concat(b.name,'(',a.name,')')) checking_name,
        a.name as sub,
        b.name as product,
        a.type,
        a.code as sub_code,
        b.code as product_code,
        b.price,
        b.isPersonal,
        b.isCorporate,
        b.minimum
        from ac_Title a, ac_Product b
        where b.sub_code = a.code
        order by checking_name asc;
        ";
        $result = mysqli_query($this->con,$sql);

        $count = 1;
        while ($row = mysqli_fetch_assoc($result)){
            foreach ($row as $key => $value){
                $list[$key][$count] = $value;
            }
            $list['count'] = count($list['checking_name']);
            $count++;
        }

        foreach ($list['checking_name'] as $key => $value){
            if($list['isPersonal'][$key] == 'Y' && $list['isCorporate'][$key] == 'Y'){
                $list['Product_Eligibility'][$key] = '개인,법인';
            }else if($list['isPersonal'][$key] == 'Y' && $list['isCorporate'][$key] == 'N'){
                $list['Product_Eligibility'][$key] = '개인';
            }else if($list['isPersonal'][$key] == 'N' && $list['isCorporate'][$key] == 'Y'){
                $list['Product_Eligibility'][$key] = '법인';
            }
        }

        foreach ($list['product_code'] as $key => $value){
            $list['product_key'][$value] = $key;
        }

        return $list;
    }
    
    // 계좌번호를 인수로 받아서 해당 계좌정보 리턴
    function ac_Details($num){
        $bank_lib = new Bank_Library();

        $sql = "
        select
        a.account_number as ac_number,
        concat(substr(a.account_number,1,6),'-',substr(a.account_number,7,2),'-',substr(a.account_number,9,6)) as ac_number_dashed,
        b.id, b.name,
        DATE_FORMAT(a.reg_date,'%Y년 %m월 %d일') as reg_date,
        DATE_FORMAT(a.close_date,'%Y년 %m월 %d일') as close_date,
        (SELECT DATE_FORMAT(ac.time,'%Y년 %m월 %d일') FROM bank_account.".$num." ac ORDER BY tid DESC LIMIT 1)Last_Date,
        c.type as deposit_type,
        c.name as type,
        d.name as product,
        IF(c.code = d.code,'Y','N') as isIdentity,
        a.alias,
        a.active,
        (SELECT ac.balance FROM bank_account.".$num." ac ORDER BY tid DESC LIMIT 1)balance,
        a.stopping as stop,
        a.limit_ac_1,
        a.limit_ac_2,
        IF(a.limit_ac_1 = 'Y' || a.limit_ac_2 = 'Y','N',a.isCredit) as canCredit,
        (select ar.rate_num from ac_Rating ar where ar.account_number = a.account_number)Interest_ac
        from ac_List a, member_list b, ac_Title c, ac_Product d, ac_Credit cr
        where a.holder = b.id and a.product = d.code and d.sub_code = c.code and cr.account_number = a.account_number and d.sub_code = c.code
        and a.account_number = '".$num."'
        order by a.reg_date desc;
        ";
        $row = mysqli_fetch_assoc(mysqli_query($this->con,$sql));

        $lc = $bank_lib->credit->Line_Credit($num);
        $wm = $this->Withdrawable_Amount($num);
        foreach ($lc as $key => $value){
            $row[$key] = $value;
        }
        $row['Withdrawable_Amount'] = $wm;

        if($row['stop'] == 'Y'){
            $row['special'] .= ' (거래정지계좌)';
        }
        if($row['limit_ac_1'] == 'Y'){
            $row['special'] .= ' (한도제한계좌 Ⅰ)';
        }
        if($row['limit_ac_2'] == 'Y'){
            $row['special'] .= ' (한도제한계좌 Ⅱ)';
        }

        if($row != '' && $row != null){
            $row['Interest_ac'] = substr($row['Interest_ac'],0,6).'-'.substr($row['Interest_ac'],6,2).'-'.substr($row['Interest_ac'],8,6);
        }

        return $row;
    }
    
    // 계좌별 출금가능금액
    function Withdrawable_Amount($num){
        $bank_lib = new Bank_Library();

        $sql = "
        SELECT
        tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to, receive_number
        FROM bank_account.".$num."
        ORDER BY tid DESC LIMIT 1;
        ";
        $row = mysqli_fetch_assoc(mysqli_query($this->con,$sql));
        $balance = (int)$row['balance'];

        $stop_sql = "
        select
        stopping as stop
        from ac_List
        where account_number = '".$num."';
        ";
        $stop_row = mysqli_fetch_assoc(mysqli_query($this->con,$stop_sql));

        $cr = $bank_lib->credit->Line_Credit($num);
        if($stop_row['stop'] != 'Y'){
            if($balance > 0){
                $amount = $balance+$cr['Credit_Remain'];
            }else{
                $amount = $cr['Credit_Remain'];
            }
        }else{
            $amount = 0;
        }
        return (int)$amount;
    }
    
    // 계좌별 건별 거래액수 제한여부
    function ac_Limit($num){

        // 한도제한계좌 제한사항
        // 1. 거래금액 제한
        // 유형 1: 건별 거래금액이 30만원으로 제한
        // 유형 2: 건별 거래금액이 300만원으로 제한
        // ** 신규계좌개설에 따른 출금은 제한없음 (센터출금, 이체거래는 한도 적용)
        // 2. 공통: 신용한도설정불가 (SQL에 신용한도설정 Y로 표기되어도 제한)

        // 거래정지계좌 제한사항
        // 1. 거래내역조회를 제외한 모든 거래가 불가능
        // 2. 타인으로부터 입금 불가 
        
        
    }

}