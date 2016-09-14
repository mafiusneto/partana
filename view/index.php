<!DOCTYPE html>
<?php

session_start("access");

if ( (!isset($_SESSION['cod']) or !isset($_SESSION['nome']) or !isset($_SESSION['senha'])) or ($_SESSION['status'] == 1 ) ) {
    print "<script> window.location='login.php';</script>";
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=index.php'>";
} else {
    $user_id     = @$_SESSION['cod'];
    $user_nome   = @$_SESSION['nome'];
    $user_email  = @$_SESSION['senha'];
    $user_pass   = @$_SESSION['status'];

    $upst = " UPDATE `usuarios` SET `status` = '1' WHERE `cod` = $user_id ";
    $x = new mysqli('localhost', 'root', '', 'partana');
    $query = $x->query($upst) or die(mysqli_error($x));
}

if (@$_GET['act'] == 'loggout') {
    $upst = " UPDATE `usuarios` SET `status` = 0 WHERE `id` = '".$user_id."' ";
    $x = new mysqli('localhost', 'root', '', 'partana');
    $query = $x->query($upst);

    unset($_SESSION['email']);
    unset($_SESSION['pass']);
    session_destroy();

    print "<script> window.location='login.php';</script>";
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Partana</title>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/content.css">
</head>
<body>

    <?php
    include ('includes/header.inc.php');
    include ('includes/main.inc.php');
    
    @$l = $_GET['l'];
    
    switch ($l) {
        case "socios":
            include ('includes/socios.inc.php');
            break;
        case "empresa":
            include ('includes/empresas.inc.php');
            break;
        case "sociedade":
            include ('includes/sociedade.inc.php');
            break;
        default:
            include ('includes/socios.inc.php');
            break;
    }
    
    ?>
    
</body>
</html>
