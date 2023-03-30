<?php
$bank_lib->send->Wire_Transfer($_POST['from_ac'],$_POST['to_ac'],$_POST['amount'],$_POST['from_memo'],$_POST['to_memo'],'N');
?>