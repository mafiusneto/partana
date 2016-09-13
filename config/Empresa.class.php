<?php

class Empresa implements Crud {
    private $cnpj;
    private $rzsocial;
    private $fantasia;
    
    function getCnpj() {
        return $this->cnpj;
    }
    function getRzsocial() {
        return $this->rzsocial;
    }
    function getFantasia() {
        return $this->fantasia;
    }
    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    function setRzsocial($rzsocial) {
        $this->rzsocial = $rzsocial;
    }
    function setFantasia($fantasia) {
        $this->fantasia = $fantasia;
    }

    //Método Cadastrar
    public function inserir($cnpj, $rzsocial, $fantasia) {
        
        if(($cnpj != NULL) AND ($rzsocial != NULL) AND ($fantasia != NULL)) {
            $sql = "INSERT INTO `empresa`(`cnpj`, `rzsocial`, `fantasia`)VALUES ('".$cnpj."','".$rzsocial."','".$fantasia."')";
            $mysqli = new mysqli('localhost', 'root', '', 'partana');
            $query = $mysqli->query($sql);
        }  
    }

}
