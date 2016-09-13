<?php

function inserir($a, $b, $c, $d) {
    if ($d == "socio"){
        $sql = "INSERT INTO `socio`(`cpf`, `nome`, `email`)VALUES ('".$a."','".$b."','".$c."')"; 
    } elseif ($d == "empresa"){
        $sql = "INSERT INTO `empresa`(`cnpj`, `rzsocial`, `fantasia`)VALUES ('".$a."','".$b."','".$c."')"; 
    } elseif ($d == "participacao") {
        $sql = "INSERT INTO `participacao`(`socio`, `empresa`, `percentual`)VALUES ('".$a."','".$b."','".$c."')";
    }
    
    $mysqli = new mysqli('localhost', 'root', '', 'partana');
    $query = $mysqli->query($sql);
}