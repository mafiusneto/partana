<?php

require_once 'Conexao.class.php';

class Empresa {
    private $cnpj;
    private $rzsocial;
    private $fantasia;
    private $test;
    
    //Getters and Setters
    public function getTest(){
        return $this->test;
    }
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
            $sql = "INSERT INTO `empresa`(`cnpj`, `rzsocial`, `fantasia`)VALUES ('$cnpj','$rzsocial','$fantasia')";
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $mysqli->query($sql) or die(mysqli_error($mysqli));
        }  
    }
    
    //Método Pesquisar
    public function buscar($cnpj){
        if($cnpj != NULL) {
            $sql = " SELECT * FROM empresa WHERE cnpj = $cnpj ";
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $query = $mysqli->query($sql);
            
            $row = $query->fetch_array(MYSQLI_NUM);

            if((count($row)) < 1 ) {
                echo "CNPJ não encontrado";
            } else {
                $this->test = true;
                $this->cnpj = $row[0];
                $this->rzsocial = $row[1];
                $this->fantasia = $row[2];
            }
       }
    }

}
