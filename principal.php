<?php

include_once(dirname(__FILE__) . "/include/header.php");
?>
<div class="">
    <a href="cad.php"><button type="button" class="btn btn-secondary btn-lg" style="position:absolute; top:0;;left:0">Sair</button></a>
</div>
<div class="container p-5">

    <div class="row">

        <div class="col-12 py-4">

            <form class="form-inline" method="get" action="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <!-- Filtro de cursos -->
                            <select class="custom-select form-control" name="curso">
                                <option selected>Selecione o curso</option>
                                <option value="informatica">Técnico de Informática</option>
                                <option value="enfermagem">Técnico de Enfermagem</option>
                                <option value="administracao">Técnico em Administração </option>
                                <option value="rh">RH</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <!-- Filtro de valores -->
                            <select class="custom-select form-control" name="valor">
                                <option selected>Selecione Valor</option>
                                <option value="0-100">$0,00 a $100,00</option>
                                <option value="100-200">$100,00 a $200,00</option>
                                <option value="200-300">$200,00 a $300,00</option>
                                <option value="300-400">$300,00 a $400,00</option>
                                <option value="400_plus">$400,00 a $500,00</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <!-- Filtro de localização -->
                            <select class="custom-select form-control" name="cidade">
                                <option selected>Selecione a localização</option>
                                <option value="1">Joinville</option>
                                <option value="2">Blumenau</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <button class="btn btn-outline btn-light" type="submit">Pesquisar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <?php

    include_once(dirname(__FILE__) . "/include/MySql.php");


    $curso = isset($_GET['curso']) ? $_GET['curso'] : "*";
    // Aparece os cursos do bd.
    $valor = isset($_GET['valor']) ? $_GET['valor'] : "*";
    // Aparece os valores do bd.
    $cidade = isset($_GET['cidade']) ? $_GET['cidade'] : "*";
    // Aparece as cidades do bd.
    $sql = $pdo->prepare('SELECT * FROM curso WHERE categoria_curso = ?');

    if ($sql->execute(array($curso))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="text-w    hite">';
        foreach ($info as $key => $values) {
            echo '<div class="card border-dark card bg-secondary" style="width: 66rem;">';
            echo '<div class="card-body">';
            echo  "<h5 class='card-title'><b>Curso: </b>" . $values['nome'] . '</h5>';
            echo '<p class="card-title">';
            echo "<b>Cidade: </b>" . $values['cidade'] . '<br>';
            echo "<b>Valor: </b>" . $values['valor'] . '<br>';
            echo '<a class="btn btn-light" href="' . $values['link_curso'] . '">Clique e conheça</a>';

            echo '</p>';
            echo '</div>';
        }
    }

    ?>

</div>

</div>
<?php
include_once(dirname(__FILE__) . "/include/footer.php");
?>