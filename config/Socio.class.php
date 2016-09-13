<?php

class Socio {
    private $cpf;
    private $nome;
    private $email;

    //Getters and Setters
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
            $mysqli = new mysqli('localhost', 'root', '', 'partana');
            $query = $mysqli->query($sql);
        }  
    }
    
    //Método Pesquisar
    public function buscar($cpf){
        if($cpf != NULL) {
            $sql = " SELECT * FROM socio WHERE cpf = ".$cpf." ";
            $mysqli = new mysqli('localhost', 'root', '', 'partana');
            $query = $mysqli->query($sql);
            
            print_r ($query);
        }
    }

}
