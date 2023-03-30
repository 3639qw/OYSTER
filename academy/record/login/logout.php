<?php

session_start(); // 세션

if($_SESSION['level']!=null){
   session_destroy();
}

echo "<script>location.href='../';</script>";

?>
