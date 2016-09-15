<?php

class Conexao {
    private static $condbm;

    public static function condb() {
        $condbm = new mysqli('localhost', 'root', '', 'partana');
        return $condbm;
    }
    
}