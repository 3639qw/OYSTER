<html>
<head>
    <title>
        Error 403
    </title>
</head>
<body>
<?php
$status = $_SERVER['REDIRECT_STATUS'] = 403;
header($_SERVER['SERVER_PROTOCOL'].' '.$status);
?>
<p>Error 403</p>
</body>
</html>