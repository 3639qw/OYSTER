<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

require_once "function/Send.php";
$send = new Send();

$integrity = $send->Integrity_Check($_POST['from_ac'],$_POST['to_ac'],$_POST['to_amount'],'S','Y');

if($integrity == 'Y'){
    $deposit = $send->Local_Deposit($_POST['from_ac'],$_POST['to_ac'],$_POST['to_amount']);
}




?>