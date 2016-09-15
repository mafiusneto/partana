<?php
require_once 'Conexao.class.php';

class Socio {
    
    private $cpf;
    private $nome;
    private $email;
    private $test;

    //Getters and Setters
    public function getTest(){
        return $this->test;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    //Construtor
    public function __construct() {
        $this->cpf = "00000000000";
        $this->nome = "abcdef";
        $this->email = "email@servidor.com";
    }

    //Método Cadastrar
    public function inserir($cpf, $nome, $email) {
        
        if(($cpf != NULL) AND ($nome != NULL) AND ($email != NULL)) {
            $sql = "INSERT INTO `socio`(`cpf`, `nome`, `email`)VALUES ('".$cpf."','".$nome."','".$email."')";
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $mysqli->query($sql);
        }  
    }
    
    //Método Pesquisar
    public function buscar($cpf){
        if($cpf != NULL) {
            $sql = " SELECT * FROM socio WHERE cpf = ".$cpf." ";
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $query = $mysqli->query($sql);
            
            $row = $query->fetch_array(MYSQLI_NUM);

            if((count($row)) < 1 ) {
                echo "CPF não encontrado";
            } else {
                $this->test = true;
                $this->cpf = $row[0];
                $this->nome = $row[1];
                $this->email = $row[2];
            }
       }
    }
    
    //Método Listagem para Atualização
    public function lista($cpf){
        if($cpf != NULL) {
            $sql = " SELECT * FROM socio WHERE cpf = ".$cpf." ";
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $query = $mysqli->query($sql);
            
            $row = $query->fetch_array(MYSQLI_NUM);

            if((count($row)) < 1 ) {
                echo "CPF não encontrado";
            } else {
                $this->test = true;
                $this->cpf      = $row[0];
                $this->nome     = $row[1];
                $this->email    = $row[2];
            }
       }
    }
    
    //Método Atualização
    public function alterar($cpf, $nome, $email) {        
        if(($cpf != NULL) AND ($nome != NULL) AND ($email != NULL)) {
            $sql = " UPDATE `socio` SET `nome` = '".$nome."', `email` = '".$email."' WHERE `cpf` = '".$cpf."' ";
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $mysqli->query($sql);
        }
    }
    
    //Método Deletar
    public function excluir($cpf) {
        if($cpf != NULL) {
            
            $sql = " SELECT * FROM socio WHERE cpf = ".$cpf." ";
            $conn = new Conexao();
            $mysqli = $conn->condb();
            $query = $mysqli->query($sql);
            
            $row = $query->fetch_array(MYSQLI_NUM);
            
            if((count($row)) < 1 ) {
                echo "CPF não encontrado";
            } else {
                $sql = " DELETE FROM socio WHERE cpf = ".$cpf." ";
                //$conn = new Conexao();
                $mysqli = $conn->condb();
                $mysqli->query($sql);
                return "Sócio inscrito sob CPF: $cpf, foi deletado.";
            }
            
        }
    }

}
