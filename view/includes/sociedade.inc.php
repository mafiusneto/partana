<?php
require_once '../model/Sociedade.class.php';
require_once '../model/connection.inc.php';
?>
<section id="content">
  
    <div class="separator">
        <h1>Cadastro</h1>
        <form method="post" action="">
            <label for="socio">Selecione o Sócio</label>
            <select name="cpf">
                <?php
                $sql = " SELECT * FROM socio ";
                $query = $mysqli->query($sql) or die(mysqli_error($mysqli));
                $row = $query->fetch_all(MYSQLI_NUM)or die(mysqli_error($mysqli));
                $c = (count($row));
                $i = 0;
                while ($i<$c){
                ?>
                <option value="<?php echo $row[$i][0] ?>"><?php echo $row[$i][1] ?></option>
                <?php
                $i++;
                }
                ?>
            </select>
            <label for="socio">Selecione a Empresa</label>
            <select name="rzsocial">
                <?php
                $sql = " SELECT * FROM empresa ";
                $query = $mysqli->query($sql) or die(mysqli_error($mysqli));
                $row = $query->fetch_all(MYSQLI_NUM)or die(mysqli_error($mysqli));
                $c = (count($row));
                $i = 0;
                while ($i<$c){
                ?>
                <option value="<?php echo $row[$i][0] ?>"><?php echo $row[$i][1] ?></option>
                <?php
                $i++;
                }
                ?>
            </select>
            <input required type="number" name="percent" placeholder="Participação percentual">
            <input required required type="submit" name="cadastrar" value="Cadastrar">
        </form>
        
        <?php
           @$cadastrar = $_POST['cadastrar'];
            
            if(isset($cadastrar)){
                $cpf = $_POST['cpf'];
                $cnpj = $_POST['rzsocial'];
                $participacao = $_POST['percent'];
            
                $sc = new Sociedade();
                $sc->inserir($cpf, $cnpj, $participacao);
            }
        ?>   
    </div>
    
    
    
    <div class="separator">
        <h1>Lista de Participações</h1>
        <?php
            $sc = new Sociedade();
            $sc->listar();
            
        ?>
    </div>
        
</section>