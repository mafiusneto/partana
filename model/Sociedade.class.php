<?php

class Sociedade {
    
    private $cpf;
    private $cnpj;
    private $percent;
    
    function getCpf() {
        return $this->cpf;
    }
    function getCnpj() {
        return $this->cnpj;
    }
    function getPercent() {
        return $this->percent;
    }
    function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    function setPercent($percent) {
        $this->percent = $percent;
    }

    //Método Cadastrar
    public function inserir($cpf, $cnpj, $participacao) {
        
        if(($cpf != NULL) AND ($cnpj != NULL) AND ($participacao != NULL)) {
            $sql = " INSERT INTO `participacao`(`socio`, `empresa`, `percentual`)VALUES ('$cpf','$cnpj','$participacao') ";
            $mysqli = new mysqli('localhost', 'root', '', 'partana');
            $mysqli->query($sql);
        }  
    }
    
}
