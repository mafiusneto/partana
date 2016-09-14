<?php

class Sociedade {
    
    private $cpf;
    private $cnpj;
    private $percent;
    private $test = false;
   
    //Getters and Setters
    public function getTest(){
        return $this->test;
    }
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
    
    //Método Pesquisar
    public function buscar($id){
        if($cnpj != NULL) {
            $sql = " SELECT * FROM participacao WHERE id = $id ";
            $mysqli = new mysqli('localhost', 'root', '', 'partana');
            $mysqli->query($sql);
            
            $row = $query->fetch_array(MYSQLI_NUM);

            if((count($row)) < 1 ) {
                echo "Código não encontrado";
            } else {
                $this->test = true;
                $this->cnpj = $row[0];
                $this->cnpj = $row[0];
                $this->rzsocial = $row[1];
                $this->fantasia = $row[2];
            }
       }
    }
    
    //Método Pesquisar
    public function listar(){
        $sql = " SELECT * FROM participacao ";
        $mysqli = new mysqli('localhost', 'root', '', 'partana');
        $query = $mysqli->query($sql) or die(mysqli_error($mysqli));

        $row = $query->fetch_all(MYSQLI_NUM)or die(mysqli_error($mysqli));
        echo "<pre>";
        print_r ($row[0]);
        echo "</pre>";
       
    }
    
}
