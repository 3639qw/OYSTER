<?php
session_start();
error_reporting( E_ERROR );
ini_set( "display_errors", 1 );

require_once $_SERVER['DOCUMENT_ROOT']."/bank/function/Bank_Library.php";
$bank_lib = new Bank_Library();

$ac_list = $bank_lib->ac_list;
$ac_active = $bank_lib->active_ac;
$ac_trans = $bank_lib->transac;
$ac_send = $bank_lib->send;

if($ac_list->ac_List($_SESSION['PID']) == 'N'){
    $ac_list_ck = 'N';
}else if($ac_list->ac_List($_SESSION['PID']) == 'E01'){
    $ac_list_ck = 'E01';
}else{
    $account_lst = $ac_list->ac_List($_SESSION['PID']);
}
$checking_product_list = $ac_list->Checking_Product_List();
$savings_product_list = $ac_list->Savings_Product_List();

//$ac_list_ck = 'Y';

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';




?>

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>인터넷뱅킹</title>
        <link rel="stylesheet" href="style_2.css">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="/antidragclick.js"></script>
        <meta name="format-detection" content="telephone=no" />
    </head>
    <body>
        <div class="container">
            <div class="display">
            <?php


            if($ac_list_ck == 'E01'){
                // 매일 자정 정기점검시간
                session_destroy();
                include_once "window/daily_check.php";
            }else{
                if(!isset($_SESSION['PID']) && !isset($_GET['login_fn'])) {
                    // 로그인 정보가 없을 경우 로그인창 표출
                    include_once "window/login.php";
                }else{
                    // 아이디 조회, 비밀번호 재설정, 회원가입
                    if(isset($_GET['login_fn'])){
                        // 아이디 조회
                        if($_GET['login_fn'] == 'id'){
                            include_once "window/find_id.php";
                        }
                        // 비밀번호 재설정
                        if($_GET['login_fn'] == 'pw'){
                            include_once "window/reset_pw.php";
                        }
                    }else{
                        if(!isset($_POST['action'])){
                            // $_POST에 계좌번호가 없으면 GET값에 따라 표출
                            
                            if(!isset($_GET['log'])){
                                // 메인 화면
                                include_once "window/index_display.php";
                            }else{
                                // $_GET LOG값에 따라 변화
                                
                                if($_GET['log'] == 'ac'){
                                    // 전체계좌
                                    include_once "window/ac_list.php";
                                }else if($_GET['log'] == 'transfer'){
                                    // 계좌이체 타입리스트
                                    include_once "window/transfer_type.php";
                                }else if($_GET['log'] == 'transfer_1'){
                                    // 즉시이체
                                    include_once "window/transfer_step1.php";
                                }else if($_GET['log'] == 'transfer_2'){
                                    // 입출금계좌간 이체
                                    include_once "window/transfer_2.php";
                                }else if($_GET['log'] == 'transfer_3'){
                                    // 적립식계좌 추가입금
                                    include_once "window/transfer_3.php";
                                }else if($_GET['log'] == 'manage_ac'){
                                    // 계좌관리
                                    include_once "window/manage_ac/manage_list.php";
                                }else if($_GET['log'] == 'mall'){
                                    // 상품몰
                                    include_once "window/mall/product_list.php";
                                }else if($_GET['log'] == 'checking_mall'){
                                    // 입출금 상품리스트
                                    if(!isset($_GET['code'])){
                                        include_once "window/mall/checking_list.php";
                                    }else{
                                        include_once "window/mall/list/".$_GET['code'].".php";
                                    }
                                }else if($_GET['log'] == 'savings_mall'){
                                    // 적립식 상품리스트
                                    if(!isset($_GET['code'])){
                                        include_once "window/mall/savings_list.php";
                                    }else{
                                        include_once "window/mall/list/".$_GET['code'].".php";
                                    }
                                }else if($_GET['log'] == 'out'){
                                    // 로그아웃
                                    session_destroy();
                                    echo "<script>location.href='/bank'</script>";
                                }else if($_GET['log'] == 'credit'){
                                    // 신용한도 관리
                                    include_once "window/manage_credit.php";
                                }

                            }
                        }else{
                            if($_POST['action'] == 'ac'){
                                // 포스트 계좌번호가 있을 경우 계좌 거래내역 정보 표출
                                include_once "window/account.php";
                            }else if($_POST['action'] == 'transac_list'){
                                // 계좌 거래내역 표출
                                include_once "window/account.php";
                            }else if($_POST['action'] == 'transfer_1'){
                                // 계좌이체 1단계에서 2단계로 넘어가는 과정
                                include_once "window/transfer_step2.php";
                            }else if($_POST['action'] == 'transfer_2'){
                                // 계좌이체 2단계에서 실제 이체 돌입
                                include_once "Action/Send_Money.php";
                            }else if($_POST['action'] == 'between_ac'){
                                // 내 계좌간 이체 돌입
                                include_once "Action/Internal_Send.php";
                            }else if($_POST['action'] == 'savings_deposit'){
                                // 적립식 계좌 추가입금
                                include_once "Action/local_deposit.php";
                            }else if($_POST['action'] == 'change_credit'){
                                // 계좌별 신용한도 변경
                                include_once "window/change_credit.php";
                            }else if($_POST['action'] == 'change_ac_cr'){
                                // 계좌 신용한도 변경 돌입
                                include_once "Action/Change_Credit.php";
                            }else if($_POST['action'] == 'open_checking'){
                                // 입출금통장 개설진행 1단계
                                include_once "Action/open_ac.php";
                            }else if($_POST['action'] == 'open_savings'){
                                // 적립식통장 개설진행 1단계

                            }
                        }
                    }
                }

            }



            ?>
            </div>
        </div>
    </body>
</html>

<?php


//echo '<pre>';
//print_r($ac_info);
//echo '</pre>';


//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

?>