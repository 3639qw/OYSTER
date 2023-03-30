<?php
session_start();
require_once ("Sandbox.php");
require_once ("Inspection.php");

class Open_Account extends Sandbox
{


    // 요구불예금 신규개설
    // $product: 예금상품코드, $limit: 한도제한계좌여부 (1: 한도제한타입 1, 2: 한도제한타입 2, N: 일반계좌)
    function Checking_Account($product,$limit){

        // 거래정지시간인지 확인
        $ck_time = new Inspection();
        $ck_inspec_time = $ck_time->Regular_Inspection();

        if($ck_inspec_time){

            // 예금과목코드 가져오기
            $title_sql = "
            select code, sub_code
            from ac_Product
            where code = '".$product."'
            ";
            $title = mysqli_fetch_assoc(mysqli_query($this->con,$title_sql));

            // 계좌개설을 위한 무결성 일련번호 불러오기
            $serial_sql = "
            select
            code, serial, type
            from ac_Title
            where code = '".$title['sub_code']."';
            ";
            $serial = mysqli_fetch_assoc(mysqli_query($this->con,$serial_sql));
            
            // 요청한 예금과목코드와 예금상품코드의 판매가능여부, 서로 묶을수 있는지 검증
            $canSale_ck_sql = "
            select
            a.code as sub_code, b.code as product_code, b.sub_code as compatible_code,
            IF(b.sub_code=a.code,'Y','N')Can_Sale
            from ac_Title a, ac_Product b
            where a.code = b.sub_code
            and a.code = '".$title['sub_code']."'
            and b.code = '".$product."';
            ";
            $canSale_ck = mysqli_fetch_assoc(mysqli_query($this->con,$canSale_ck_sql));

            // 상품등록부에 올라있는지 확인
            if($canSale_ck['Can_Sale'] == 'Y'){

                // 개인,법인별로 판매가능여부 검증
                $sale_id_sql = "
                select code, sub_code, isPersonal, isCorporate
                from ac_Product
                where code = '".$product."';
                ";
                $sale_id = mysqli_fetch_assoc(mysqli_query($this->con,$sale_id_sql));
                while (true){
                    if($_SESSION['type'] == '개인'){
                        if($sale_id['isPersonal'] == 'Y'){
                            break;
                        }else{
                            echo "<script>alert('판매가능한 상품이 아닙니다')</script>";
                            echo "<script>history.back()</script>";
                            return false;
                        }
                    }else if($_SESSION['type'] == '법인'){
                        if($sale_id['isCorporate'] == 'Y'){
                            break;
                        }else{
                            echo "<script>alert('판매가능한 상품이 아닙니다')</script>";
                            echo "<script>history.back()</script>";
                            return false;
                        }
                    }else{
                        echo "<script>alert('판매가능한 상품이 아닙니다')</script>";
                        echo "<script>history.back()</script>";
                        return false;
                    }
                }


                // 현재 판매하는 상품임을 검증 한 후 추가로 개설가능한 일련번호가 남았는지 확인한다
                if($serial['serial'] < 999999){
                    // 추가로 개설가능이 확인되면 계좌번호를 만들기 시작한다
                    if($_SESSION['type'] == '개인'){
                        $ac_info['type'] = '10';
                    }else if($_SESSION['type'] == '법인'){
                        $ac_info['type'] = '20';
                    }
                    $ac_info['year'] = date("Y");
                    $ac_info['code'] = sprintf('%02d',$serial['code']);
                    $ac_info['serial'] = sprintf('%06d',$serial['serial']+1);
                    $ac_info['account_number'] = $ac_info['type'].$ac_info['year'].$ac_info['code'].$ac_info['serial'];
                    $ac_info['Product_Code'] = $canSale_ck['product_code'];
                    $ac_info['PID'] = $_SESSION['PID'];

                    // 계좌번호 중복 검증
                    $ac_number_ck_sql = "
                    select
                    account_number
                    from ac_List
                    where account_number = '".$ac_info['account_number']."';
                    ";
                    $ac_number_ck = mysqli_fetch_assoc(mysqli_query($this->con,$ac_number_ck_sql));
                    if($ac_number_ck['account_number'] != $ac_info['account_number']) {
                        // 계좌번호 중복검증을 통과하여 무결한 경우

                        // 한도제한계좌코드, 신용한도여부코드
                        if($limit == 'N'){
                            $ifCredit = 'Y';
                            $limit_type_1 = 'N';
                            $limit_type_2 = 'N';
                        }else{
                            $ifCredit = 'N';
                            if($limit == '1'){
                                $limit_type_1 = 'Y';
                                $limit_type_2 = 'N';
                            }else if($limit == '2'){
                                $limit_type_1 = 'N';
                                $limit_type_2 = 'Y';
                            }
                        }

                        // 거래내역, 신규일등에 쓰일 일관된 시간 불러오기
                        $time_sql = "
                        select now(6) time;
                        ";
                        $time = mysqli_fetch_assoc(mysqli_query($this->con,$time_sql));
                        $ac_info['time'] = $time['time'];

                        // 계좌별 거래내역 테이블 생성
                        $ac_table_sql = "
                        create table bank_account.".$ac_info['account_number']." like bank.ac;
                        ";
                        // 계좌 리스트 추가
                        $ac_list_sql = "
                        INSERT INTO ac_List (account_number, holder, reg_date, product, isCredit, stopping, limit_ac_1, limit_ac_2)
                        VALUES ('".$ac_info['account_number']."','".$ac_info['PID']."','".$ac_info['time']."','".$ac_info['Product_Code']."','".$ifCredit."', 'N','".$limit_type_1."','".$limit_type_2."');
                        ";
                        // 계좌 일련번호 상승
                        $int = (int)$serial['serial']+1;
                        $integrity_sql = "
                        UPDATE ac_Title set serial = '".$int."', latest_datetime = '".$ac_info['time']."', latest_number = '".$ac_info['account_number']."'
                        where code = '".$ac_info['code']."';
                        ";
                        // 신규되는 계좌의 최초 거래내역 찍어주기
                        $first_trans_sql = "
                        INSERT INTO bank_account.".$ac_info['account_number']." (time, type, amount, balance, memo_me)
                        VALUES ('".$ac_info['time']."','D',0,0, '신규');
                        ";
                        // 신용거래내역 테이블 생성
                        $cr_table_sql = "
                        CREATE TABLE bank_CreditRecord.".$ac_info['account_number']." like bank.cr;
                        ";

                        $cr_table = mysqli_query($this->con,$cr_table_sql);
                        $ac_table = mysqli_query($this->con,$ac_table_sql);
                        $ac_list = mysqli_query($this->con,$ac_list_sql);
                        $integrity = mysqli_query($this->con,$integrity_sql);
                        $first_trans = mysqli_query($this->con,$first_trans_sql);
//                        echo mysqli_error($this->con);


                        if($ac_table && $ac_list && $integrity && $first_trans && $cr_table){
                            $ac_number = substr($ac_info['account_number'],0,6).'-'.substr($ac_info['account_number'],6,2).'-'.substr($ac_info['account_number'],8,6);
                            $success = '계좌신규가 완료됐습니다. 신규계좌번호는'.$ac_number.'입니다';
                            echo "<script>alert('$success')</script>";
                            echo "<script>location.href='/bank'</script>";
                        }else{
                            // 쿼리문 4개중 한개라도 에러가 발생했을 경우
                            echo "<script>alert('계좌개설중 문제가 발생했습니다. 관리자에게 문의하세요(code2)')</script>";
                            echo "<script>history.back()</script>";
                            return false;
                        }
                    }else{
                        // 계좌번호중복 검증을 통과하지 못했을 경우
                        echo "<script>alert('계좌개설중 문제가 발생했습니다. 관리자에게 문의하세요(중복 검증 실패)')</script>";
                        echo "<script>history.back()</script>";
                        return false;
                    }
                }else{
                    // 사용가능한 계좌 일련번호가 없을 경우
                    echo "<script>alert('생성가능 최대 한도에 도달하였습니다')</script>";
                    echo "<script>history.back()</script>";
                    return false;
                }
            }else{
                // 판매하는 예금상품부에 없을 경우
                echo "<script>alert('현재 판매하는 상품이 아닙니다')</script>";
                echo "<script>history.back()</script>";
                return false;
            }
        }else{
            // 거래정지시간일 경우
            echo "<script>alert('거래정지 시간입니다')</script>";
            echo "<script>history.back()</script>";
            return false;
        }
    }


    // 적립식예금 신규개설
    // $product: 예금상품코드, $ac_num: 출금,이자수령계좌, $amount: 신규할 금액
    function Savings_Account($product,$ac_num,$amount){

        // 거래정지시간인지 확인
        $ck_time = new Inspection();
        $ck_inspec_time = $ck_time->Regular_Inspection();

        if($ck_inspec_time){

            // 1. 출금계좌가 본인명의인지, 활성계좌인지 확인한다
            // 2. 출금계좌의 잔액이 신규금액만큼 충분하지 확인한다
            // 3. 신규 금액이 상품별 최저 신규금액보다 작은지 확인한다
            // 4. 상품등록부에 해당 상품이 등재되어있는지 확인한다
            // 5. 계좌개설을 위해 예금과목코드로 무결성 일련번호를 가져온다
            // 6. 판매가능한 일련번호가 남았는지 확인한다
            // 7. 각종 정보들을 활용해 신규되는 계좌번호를 만들기 시작한다
            // 8. 만들어진 계좌번호의 중복성을 체크한다
            // 9. 일관된 시간을 불러온다
            // 10. SQL 작업 실시
            
            // *** 적립식예금 신규금액은 신용한도를 사용할 수 없다 실질 잔액으로만 형성 가능

            // SQL 작업
            // 1. 계좌별 거래내역 테이블 생성
            // 2. 계좌리스트에 계좌번호 추가
            // 3. 이자수령정보 테이블에 입력
            // 4. 예금과목 일련번호 상승
            // 5. 신규된 계좌 거래내역 테이블에 최초 신규 거래내역 찍어주기
            // 6. 출금계좌에서 신규금액 출금
            // 총 RESULT 6개가 무결할 경우
            // 계좌개설 완료처리

            $holder_ck_sql = "
            select
            a.account_number, a.holder as id
            from ac_List a, member_list b
            where a.holder = b.id
            and a.active = 'Y'
            and a.account_number = '".$ac_num."';
            ";
            $holder_ck = mysqli_fetch_assoc(mysqli_query($this->con,$holder_ck_sql));


            // 1. 출금계좌가 본인명의인지, 활성계좌인지 확인한다
            if($holder_ck['account_number'] == $ac_num && $holder_ck['id'] == $_SESSION['PID']){

                $balance_ck_sql = "
                SELECT
                tid, time, if(type='D','입금',if(type='W','출금',''))type, amount, balance, memo_me, memo_to, receive_number
                FROM bank_account.".$ac_num."
                ORDER BY tid DESC LIMIT 1;
                ";
                $balance_ck = mysqli_fetch_assoc(mysqli_query($this->con,$balance_ck_sql));
                $balance = (int)$balance_ck['balance'];

                // 2. 출금계좌의 잔액이 신규금액만큼 충분하지 확인한다
                // *** 적립식예금 신규금액은 신용한도를 사용할 수 없다 실질 잔액으로만 형성 가능
                if($balance >= $amount){

                    $minimum_sql = "
                    select
                    a.code as sub_code, b.code as product_code,
                    IF(b.sub_code=a.code,'Y','N')Can_Sale,
                    b.minimum
                    from ac_Title a, ac_Product b
                    where a.code = b.sub_code
                    and b.code = '".$product."';
                    ";
                    $minimum_row = mysqli_fetch_assoc(mysqli_query($this->con,$minimum_sql));
                    $minimum = (int)$minimum_row['minimum'];

                    // 3. 신규 금액이 상품별 최저 신규금액보다 작은지 확인한다
                    if($amount >= $minimum){

                        $canSale_ck_sql = "
                        select
                        a.code as sub_code, b.code as product_code,
                        IF(b.sub_code=a.code,'Y','N')Can_Sale
                        from ac_Title a, ac_Product b
                        where a.code = b.sub_code
                        and b.code = '".$product."';
                        ";
                        $canSale_ck = mysqli_fetch_assoc(mysqli_query($this->con,$canSale_ck_sql));

                        // 4. 상품등록부에 해당 상품이 등재되어있는지 확인한다
                        if($canSale_ck['Can_Sale'] == 'Y'){

                            $intCode_sql = "
                            select
                            code, serial, type
                            from ac_Title
                            where code = '".$canSale_ck['sub_code']."';
                            ";
                            $intCode = mysqli_fetch_assoc(mysqli_query($this->con,$intCode_sql));

                            // 5. 계좌개설을 위해 예금과목코드로 무결성 일련번호를 가져온다
                            // 6. 판매가능한 일련번호가 남았는지 확인한다
                            if($intCode['serial'] < 999999){

                                // 7. 각종 정보들을 활용해 신규되는 계좌번호를 만들기 시작한다
                                if($_SESSION['type'] == '개인'){
                                    $ac_info['type'] = '10';
                                }else if($_SESSION['type'] == '법인'){
                                    $ac_info['type'] = '20';
                                }
                                $ac_info['year'] = date("Y");
                                $ac_info['code'] = sprintf('%02d',$canSale_ck['sub_code']);
                                $ac_info['serial'] = sprintf('%06d',$intCode['serial']+1);
                                $ac_info['account_number'] = $ac_info['type'].$ac_info['year'].$ac_info['code'].$ac_info['serial'];
                                $ac_info['Product_Code'] = $canSale_ck['product_code'];
                                $ac_info['PID'] = $_SESSION['PID'];

                                $integrity_sql = "
                                select
                                IF(account_number='".$ac_info['account_number']."','N','Y')isIntegrity
                                from ac_List
                                where account_number = '".$ac_info['account_number']."';
                                ";
                                $integrity = mysqli_fetch_assoc(mysqli_query($this->con,$integrity_sql));

                                // 8. 만들어진 계좌번호의 중복성을 체크한다
                                if($integrity['isIntegrity'] != 'N'){

                                    // 9. 일관된 시간을 불러온다
                                    $time_sql = "
                                    SELECT NOW(6) time;
                                    ";
                                    $time = mysqli_fetch_assoc(mysqli_query($this->con,$time_sql));
                                    $ac_info['time'] = $time['time'];

                                    // 10. SQL 작업 실시
                                    // SQL 작업
                                    // 1. 계좌별 거래내역 테이블 생성
                                    // 2. 계좌리스트에 계좌번호 추가
                                    // 3. 이자수령정보 savings_details테이블에 입력
                                    // 4. 예금과목 일련번호 상승
                                    // 5. 신규된 계좌 거래내역 테이블에 최초 신규 거래내역 찍어주기
                                    // 6. 출금계좌에서 신규금액 출금

                                    // 1. 계좌별 거래내역 테이블 생성
                                    $ac_table_sql = "
                                    create table bank_account.".$ac_info['account_number']." like bank.ac;
                                    ";
                                    // 2. 계좌리스트에 계좌번호 추가
                                    $ac_list_sql = "
                                    INSERT INTO ac_List (account_number, holder, reg_date, product, isCredit, stopping, limit_ac_1, limit_ac_2)
                                    VALUES ('".$ac_info['account_number']."','".$ac_info['PID']."','".$ac_info['time']."','".$ac_info['Product_Code']."', 'N', 'N', 'N', 'N');
                                    ";
                                    // 3. 이자수령정보 테이블에 입력
                                    $interest_ac_sql = "
                                    INSERT INTO ac_Rating (account_number, rate_num)
                                    VALUES ('".$ac_info['account_number']."','".$ac_num."');
                                    ";
                                    // 4. 예금과목 일련번호 상승
                                    $int = (int)$intCode['serial']+1;
                                    $integrity_sql = "
                                    UPDATE ac_Title set serial = '".$int."', latest_datetime = '".$ac_info['time']."', latest_number = '".$ac_info['account_number']."'
                                    where code = '".$ac_info['code']."';
                                    ";
                                    // 5. 신규된 계좌 거래내역 테이블에 최초 신규 거래내역 찍어주기
                                    $first_trans_sql = "
                                    INSERT INTO bank_account.".$ac_info['account_number']." (time, type, amount, balance, memo_me)
                                    VALUES ('".$ac_info['time']."','D',".$amount.",".$amount.", '신규');
                                    ";
                                    // 6. 출금계좌에서 신규금액 출금
                                    $after_w_balance = ($balance - $amount);
                                    $Withdrawal_sql = "
                                    INSERT INTO bank_account.".$ac_num." (time, type, amount, balance, memo_me, memo_to, receive_number)
                                    VALUES ('".$ac_info['time']."','W','".$amount."','".$after_w_balance."','적립식예금 신규', '신규', '".$ac_info['account_number']."');
                                    ";

                                    $ac_table = mysqli_query($this->con,$ac_table_sql);
                                    $ac_list = mysqli_query($this->con,$ac_list_sql);
                                    $interest = mysqli_query($this->con,$interest_ac_sql);
                                    $integrity = mysqli_query($this->con,$integrity_sql);
                                    $first_trans = mysqli_query($this->con,$first_trans_sql);
                                    $Withdrawal = mysqli_query($this->con,$Withdrawal_sql);

                                    if($ac_table && $ac_list && $interest && $integrity && $first_trans && $Withdrawal){
                                        $ac_number = substr($ac_info['account_number'],0,6).'-'.substr($ac_info['account_number'],6,2).'-'.substr($ac_info['account_number'],8,6);
                                        $success = '계좌신규가 완료됐습니다. 신규계좌번호는'.$ac_number.'입니다';
                                        echo "<script>alert('$success')</script>";
                                        echo "<script>location.href='/bank'</script>";
                                    }else{
                                        // 쿼리문 4개중 한개라도 에러가 발생했을 경우
                                        echo "<script>alert('계좌개설중 문제가 발생했습니다. 관리자에게 문의하세요(code2)')</script>";
                                        echo "<script>history.back()</script>";
                                        return false;
                                    }
                                }else{
                                    // 만들어진 계좌번호의 중복성 검증에서 불합격했을 경우
                                    echo "<script>alert('계좌개설중 문제가 발생했습니다. 관리자에게 문의하세요(code1)')</script>";
                                    echo "<script>history.back()</script>";
                                    return false;
                                }
                            }else{
                                // 계좌개설을 위해 예금과목코드로 무결성 일련번호 검증에서 불합격했을 경우
                                // 사유: 과목별 최대한도인 999999개를 초과했을 경우
                                echo "<script>alert('생성가능 최대 한도에 도달하였습니다')</script>";
                                echo "<script>history.back()</script>";
                                return false;
                            }
                        }else{
                            // 상품등록부에 해당 상품이 등재되어있는지 검증에서 불합격했을 경우
                            echo "<script>alert('현재 판매하는 상품이 아닙니다')</script>";
                            echo "<script>history.back()</script>";
                            return false;
                        }
                    }else{
                        // 신규 금액이 상품별 최저 신규금액보다 작은지 검증에서 불합격했을 경우
                        echo "<script>alert('신규할 금액이 상품 최소 신규금액보다 작습니다')</script>";
                        echo "<script>history.back()</script>";
                        return false;
                    }
                }else{
                    // 출금계좌 잔액이 신규금액만큼 충분한지 검증에서 불합격했을 경우
                    echo "<script>alert('잔액이 부족합니다')</script>";
                    echo "<script>history.back()</script>";
                    return false;
                }
            }else{
                // 출금계좌가 본인명의인지, 활성계좌인지 검증에서 불합격했을 경우
                echo "<script>alert('출금계좌번호를 확인해주세요')</script>";
                echo "<script>history.back()</script>";
                return false;
            }
        }else{
            // 거래정지시간일 경우
            echo "<script>alert('거래정지 시간입니다')</script>";
            echo "<script>history.back()</script>";
            return false;
        }
    }

}