<?php
$account_num = $_POST['ac_number'];
require_once ("../function/Active_Account.php");
$ac_active = new Active_Account();
$deactive_ac = $ac_active->Close_Account($_POST['close_ac_number_2'],$_POST['transfer_account']);

if($deactive_ac == true){
    echo "<script>location.href='/bank'</script>";
}else{
    echo "<script>location.href='/bank'</script>";
}
?>