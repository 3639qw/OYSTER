<?php
$_POST['deposit_amount'] = preg_replace('/[,]/','',$_POST['deposit_amount']);

require_once "../function/Send.php";
$send = new Send();

$integrity = $send->Integrity_Check($_POST['ac_number'],$_POST['savings_number'],$_POST['deposit_amount'],'S','Y');

if($integrity == 'Y'){
    $deposit = $send->Local_Deposit($_POST['ac_number'],$_POST['savings_number'],$_POST['deposit_amount']);
}
?>