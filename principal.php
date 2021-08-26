<?php
include_once(dirname(__FILE__) . "/include/header.php");
?>
<div class="container bg-white">

    <div class="row">

        <div class="col-12 py-3 bg-black">

            <form class="form-inline" method="get" action="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <select class="custom-select form-control" name="curso">
                                <option selected>Selecione o curso</option>
                                <option value="informatica">Técnico de Informática</option>
                                <option value="enfermagem">Técnico de Enfermagem</option>
                                <option value="administracao">Técnico em Administração </option>
                                <option value="rh">RH</option>
                            </select>
                        </div>
                        <div class="col-sm">
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
                            <select class="custom-select form-control" name="cidade">
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
        </div>
    </div>



    <?php

    include_once(dirname(__FILE__) . "/include/MySql.php");


    $curso = isset($_GET['curso']) ? $_GET['curso'] : "*";
    $valor = isset($_GET['valor']) ? $_GET['valor'] : "*";
    $cidade = isset($_GET['cidade']) ? $_GET['cidade'] : "*";


    $sql = $pdo->prepare('SELECT * FROM curso WHERE categoria_curso = ?');

    if ($sql->execute(array($curso))) {
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="">';
        foreach ($info as $key => $values) {
            echo '<div class="card" style="width: 18rem;">';
            echo '<div class="card-body">';

            echo  "<h5 class='card-title'><b>Nome: </b>" . $values['nome'] . '</h5>';
            echo '<p class="card-text">';
            echo "<b>Código Curso:</b>" . $values['cod_curso'] . '<br>';
            echo '<a class="btn btn-primary" href="' . $values['link_curso'] . '">Clique e conheça</a>';

            echo '</p>';
            echo '</div>';
        }
    }

    ?>

</div>
<?php
include_once(dirname(__FILE__) . "/include/footer.php");
?>