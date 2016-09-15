<?php

require_once '../model/socio.class.php'; ?>
<section id="content">
    
    <div class="separator">
        <h1>Cadastro</h1>
        <form method="post" action="">
            <input required type="number" name="cpf" placeholder="CPF">
            <input required type="text" name="nome" placeholder="Nome">
            <input required type="text" name="email" placeholder="E-mail">
            <input required type="submit" name="cadastrar" value="Cadastrar">
        </form>
        
        <?php
           @$cadastrar = $_POST['cadastrar'];
            
            if(isset($cadastrar)){
                $cpf = $_POST['cpf'];
                $nome = $_POST['nome'];
                $email = $_POST['email'];
            
                $sc = new Socio();
                $sc->inserir($cpf, $nome, $email);
            }
        ?>
        
    </div>
    
    <div class="separator">
        <h1>Buscar</h1>
        <form method="post" action="">
        <input required type="number" name="cpf" placeholder="CPF">
        <input required type="submit" name="buscar" value="Buscar">
        </form>
        <?php
           @$buscar = $_POST['buscar'];
            
            if(isset($buscar)){
                $cpf = $_POST['cpf'];
            
                $sc = new Socio();
                $sc->buscar($cpf);
                if ($sc->getTest() == true) {
        ?>
                <table>
                    <tr>
                        <td>CPF</td>
                        <td>Nome</td>
                        <td>Email</td>
                    </tr>
                    <tr>
                        <td><?php echo $sc->getCpf(); ?></td>
                        <td><?php echo $sc->getNome(); ?></td>
                        <td><?php echo $sc->getEmail(); ?></td>
                    </tr>
                </table>
        <?php
                }
            }
        ?>
    </div>
    
    <div class="separator">
        <h1>Deletar</h1>
        <form method="post" action="">
        <input required type="number" name="cpf" placeholder="CPF">
        <input required type="submit" name="deletar" value="Deletar">
        </form>
        <?php
           @$deletar = $_POST['deletar'];
            
            if(isset($deletar)){
                @$cpf = $_POST['cpf'];
            
                $sc = new Socio();
                $sc->excluir($cpf);
            }
        ?>
    </div>
    
    <div class="separator">
        <h1>Atualizar</h1>
        <form method="post" action="">
        <input required type="number" name="cpf" placeholder="CPF">
        <input required type="submit" name="buscList" value="Buscar">
        </form>
        <?php
           @$buscList = $_POST['buscList'];
            
            if(isset($buscList)){
                @$cpf = $_POST['cpf'];
            
                $sc = new Socio();
                $sc->lista($cpf);
                if ($sc->getTest() == true) {
        ?>
                    <form method="post" action="">
                        <input required type="number" name="cpf" placeholder="CPF" value="<?php echo $sc->getCpf(); ?>">
                        <input required type="text" name="nome" placeholder="Nome" value="<?php echo $sc->getNome(); ?>">
                        <input required type="text" name="email" placeholder="E-mail" value="<?php echo $sc->getEmail(); ?>">
                    <input required type="submit" name="atualizar" value="Atualizar">
                    </form>
        <?php
                }
            }
            
            @$atualizar = $_POST['atualizar'];
            if(isset($atualizar)){
                $attCpf     = $_POST['cpf'];
                $attNome    = $_POST['nome'];
                $attEmail   = $_POST['email'];
               
                $sc = new Socio();
                $sc->alterar($attCpf, $attNome, $attEmail);
            }            
            
        ?>

    </div>
    
</section>