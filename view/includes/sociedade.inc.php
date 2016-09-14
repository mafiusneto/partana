<?php require_once '../model/Sociedade.class.php'; ?>
<section id="content">
    
    <?php
    
    $pr = new Sociedade();
    $pr->listar();
    
    ?>
    
    <div class="separator">
        <h1>Cadastro</h1>
        <form method="post" action="">
            <label for="socio">Selecione o Sócio</label>
            <select name="socio">
                <option value="trp">trompete</option>
            </select>
            <label for="socio">Selecione a Empresa</label>
            <select name="empresa">
                
                <option value="trp">trompete</option>
            </select>
            <input required type="number" name="percent" placeholder="Participação percentual">
            <input required required type="submit" name="cadastrar" value="Cadastrar">
        </form>
        
        <?php
           @$cadastrar = $_POST['cadastrar'];
            
            if(isset($cadastrar)){
                $cnpj = $_POST['cnpj'];
                $rzsocial = $_POST['rzsocial'];
                $fantasia = $_POST['fantasia'];
            
                $emp = new Empresa();
                $emp->inserir($cnpj, $rzsocial, $fantasia);
            }
        ?>
        
    </div>
    
    <div class="separator">
        <h1>Listar por Sócio ou Empresa</h1>
        <form method="post" action="">
        <input required type="number" name="cnpj" placeholder="CNPJ">
        <input required type="submit" name="buscar" value="Buscar">
        </form>
        <?php
           @$buscar = $_POST['buscar'];
            
            if(isset($buscar)){
                $cnpj = $_POST['cnpj'];
            
                $emp = new Empresa();
                $emp->buscar($cnpj);
                if ($emp->getTest() == true) {
        ?>
                <table>
                    <tr>
                        <td>CNPJ</td>
                        <td>Razão Social</td>
                        <td>Nome Fantasia</td>
                    </tr>
                    <tr>
                        <td><?php echo $emp->getCnpj(); ?></td>
                        <td><?php echo $emp->getRzsocial(); ?></td>
                        <td><?php echo $emp->getFantasia(); ?></td>
                    </tr>
                </table>
        <?php
                }
            }
        ?>
    </div>
        
</section>