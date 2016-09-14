<?php

class Login {
    
    public function autentic($user, $pass){
        $user = trim($user);//limpa espaços vazio
        $user = strip_tags($user);//tira tags html e php
        $user = addslashes($user);//Adiciona barras invertidas a uma string
        
        $pass = trim($pass);//limpa espaços vazio
        $pass = strip_tags($pass);//tira tags html e php
        $pass = addslashes($pass);//Adiciona barras invertidas a uma string
        
        $sql = " SELECT * FROM usuarios WHERE nome = '".$user."' AND senha = '".$pass."' ";
        $mysqli = new mysqli('localhost', 'root', '', 'partana');
        $query = $mysqli->query($sql);

        $row = $query->fetch_array(MYSQLI_NUM);
        
        if((count($row)) < 1 ) {
            echo "<script>alert('Usuário não autenticado');</script>";
        } else {
            session_start("access");
            $_SESSION['cod']     = $row['0'];
            $_SESSION['nome']   = $row['1'];
            $_SESSION['senha']   = $row['2'];
            $_SESSION['status'] = $row['3'];
            print "<script> window.location='index.php';</script>";
        }
        
    }

}
