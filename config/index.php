<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto Partana</title>
</head>
<body>
<pre>
<?php

    require_once 'Socio.class.php';

    $sc = new Socio();

    $sc->setCpf("69170789487");
    $sc->setNome("Sônia Maria");
    $sc->setEmail("sonia@gmail.com");

    $sc->inserir($sc->getCpf(), $sc->getNome(), $sc->getEmail());
    $sc->buscar("08684540441");
        
?>
</pre>
</body>
</html>
