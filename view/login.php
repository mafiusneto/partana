<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Partana</title>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    
    <?php include ('includes/header.inc.php'); ?>
    
    <section>
    <div id="login">    
    <form method="post" action="">
        <input required type="text" placeholder="Usuario" name="nome"/>
        <input required type="password" placeholder="Senha" name="senha"/>
        <input required type="submit" value="Acessar" name="acessar"/>
    </form>
    </div>
    </section>
    
    <?php
        @$envio = $_POST["acessar"];
        
        if(isset($envio)) {
            @$nome = $_POST["nome"];
            @$senha = sha1($_POST["senha"]);
            
            if(($nome!=null) OR ($senha!=null)) {
                require_once '../model/Login.class.php';
                $lg = new Login();
                $lg->autentic($nome, $senha);
            }
        }
        
    ?>
    
    
    
</body>
</html>
