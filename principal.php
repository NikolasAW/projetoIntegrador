<?php

include_once(dirname(__FILE__) . "/include/header.php");
?>
<div class="d-flex justify-content-xl-center bg-dark mb-5 ">
    <h1 class="text-white">BROWSE COURSES</h1>
</div>
<form class="form-inline" method="get" action="">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <select class="custom-select" name="curso">
                    <option selected>Selecione o curso</option>
                    <option value="1">Técnico de Informática</option>
                    <option value="2">Técnico de Enfermagem</option>
                    <option value="3">Técnico em Administração </option>
                    <option value="4">RH</option>
                </select>
            </div> 
            <div class="col-sm"> 
                <select class="custom-select" name="valor">
                    <option selected>Selecione Valor</option>
                    <option value="0-100">$0,00 a $100,00</option>
                    <option value="100-200">$100,00 a $200,00</option>
                    <option value="200-300">$200,00 a $300,00</option>
                    <option value="300-400">$300,00 a $400,00</option>
                    <option value="400_plus">$400,00 a $500,00</option>
                </select>
            </div>
            <div class="col-sm">
                <select class="custom-select" name="cidade">
                    <option selected>Selecione a localização</option>
                    <option value="1">Joinville</option>
                </select>
            </div>
            <div class="col-sm">
                <button class="btn btn-outline btn-light" type="submit">Pesquisar</button>
            </div>
        </div>
    </div>
</form>
<div>
    <a href="cad.php"><button type="button" class="btn btn-light btn-lg">Sair</button></a>
</div>

 


<?php 

include_once(dirname(__FILE__) . "/include/MySql.php");


$curso = isset($_GET['curso']) ? $_GET['curso'] : false;
$valor = $_GET['valor'];
$cidade = $_GET['cidade'];

$sql = $pdo->prepare('SELECT * FROM curso WHERE cod_curso = ?');
if ($sql->execute(array($curso))){
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($info as $key => $values){
        echo "<b><font color=\"white\">Código Curso: </font></b>" . $values['cod_curso'].'<br>';
        echo  "<b><font color=\"white\">Nome: </font></b>" . $values['nome'].'<br>';
        

        echo '<hr>';
    }
}



//include_once(dirname(__FILE__) . "/include/executaBusca.php");
?>


<?php
include_once(dirname(__FILE__) . "/include/footer.php");
?>