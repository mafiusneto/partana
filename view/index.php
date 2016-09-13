<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto Partana</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" placeholder="Usuario" name="usuario"/>
        <input type="password" placeholder="Senha" name="senha"/>
        <input type="submit" value="Acessar" name="acessar"/>
    </form>
    
    <?php
        @$envio = $_POST["acessar"];
        
        if(isset($envio)) {
            @$nome = $_POST["nome"];
            @$senha = $_POST["senha"];

            require_once '../model/Login.class.php';
            $lg = new Login();
            $lg->autentic($nome, $senha);
        }
        
    ?>
</body>
</html>
