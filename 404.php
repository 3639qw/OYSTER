<html>
    <head>
        <title>
            Error 404
        </title>
    </head>
    <body>
    <?php
    $status = $_SERVER['REDIRECT_STATUS'] = 404;
    header($_SERVER['SERVER_PROTOCOL'].' '.$status);
    ?>
    <p>Error 404</p>
    </body>
</html>