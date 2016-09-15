<?php
require_once 'Conexao.class.php';

class Sociedade {
    
    private $cpf;
    private $cnpj;
    private $percent;
    private $test = false;
    private $contOne;
   
    //Getters and Setters
    public function getContOne(){
        return $this->contOne;
    }
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
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $mysqli->query($sql);
        }  
    }
   
    //Método Pesquisar
    public function listar(){
        $sql = " SELECT * FROM participacao ";
        $conn = new Conexao();
        $mysqli = $conn->condb();
        $query = $mysqli->query($sql) or die(mysqli_error($mysqli));
        $row = $query->fetch_all(MYSQLI_NUM)or die(mysqli_error($mysqli));
        $c = (count($row));
        echo "<table><tr><td>Sócio</td><td>Empresa</td><td>Participação</td></tr>";
        for($i=0; $i<$c;$i++){
            echo "<tr><td>".$row[$i][1]."</td><td>".$row[$i][2]."</td><td>".$row[$i][3]."%</td></tr>";
        }
        echo "</table>";
    }
    
}
