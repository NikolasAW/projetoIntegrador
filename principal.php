<?php
include_once(dirname(__FILE__) . "/include/header.php");
?>
<div class="">
    <button type="button" onclick="location.href='include/logout.php'" class="btn btn-primary btn-lg" style="position:absolute; top:0;;left:0">Sair</button>
</div>
<div class="container p-5" > 

    <div class="row"> 

        <div class="col-12 py-4">

            <form class="form-inline" method="get" action="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <select class="custom-select form-control" name="curso">
                                <option selected>Selecione o curso</option>
                                <option value="administracao">Técnico em Administração</option>
                                <option value="enfermagem">Técnico de Enfermagem</option>
                                <option value="informatica">Técnico de Informática</option>
                                <option value="rh">RH</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <select class="custom-select form-control" name="valor">
                                <option selected>Selecione Valor</option>
                                <option value="$0,00 a $100,00">$0,00 a $100,00</option>
                                <option value="$100,00 a $200,00">$100,00 a $200,00</option>
                                <option value="$200,00  a $300,00">$200,00 a $300,00</option>
                                <option value="$300,00 a $400,00">$300,00 a $400,00</option>
                                <option value="$400,00 a $500,00">$400,00 a $500,00</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <select class="custom-select form-control" name="cidade">
                                <option selected>Selecione a localização</option>
                                <option value="Joinville">Joinville</option>
                                <option value="Blumenau">Blumenau</option>
                                <option value="Florianopolis">Florianópolis</option>
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

    if (isset($_SESSION['logado'])) {
        /// aqui filtramos os cursos do BD.
        $string = "";
        if (isset($_GET['curso']) && $_GET['curso'] != 'Selecione o curso') {
            if ($string == "")
                $string = $string . ' WHERE ';
            else
                $string = $string . ' AND ';
            $string = $string . " categoria_curso = '". $_GET['curso'] . "'";
        }
        ///aqui filtramos os valores do BD.       
        if (isset($_GET['valor']) && $_GET['valor'] != 'Selecione Valor') {
            if ($string == "")
                $string = $string . ' WHERE ';
            else
                $string = $string . ' AND ';
            $string = $string . " valor = '" . $_GET['valor'] . "'";
        }
        ///aqui filtramos as cidades do BD.
        if (isset($_GET['cidade']) && $_GET['cidade'] != 'Selecione a localização') {
            if ($string == "")
                $string = $string . ' WHERE ';
            else
                $string = $string . ' AND ';
            $string = $string . " cidade = '" . $_GET['cidade'] . "'";
        }

        echo "Aqui: " . $string;

        /// aqui executa a string para funcionar os filtros.
        $sql = $pdo->prepare('SELECT * FROM curso ' . $string);



        /// aqui vão exibir os resultados do filtro.
        if ($sql->execute()) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo '<div class="text-black">';
            foreach ($info as $key => $values) {
                echo '<div class="card border-black card bg-light" style="width: 66rem;">';
                echo '<div class="card-body">';
                echo  "<h5 class='card-title'><b>Curso: </b>" . $values['nome'] . '</h5>';
                echo '<p class="card-title">';
                echo "<b>Cidade: </b>" . $values['cidade'] . '<br>';
                echo "<b>Valor: </b>" . $values['valor'] . '<br>';
                echo '<a class="btn btn-primary" href="' . $values['link_curso'] . '">Clique e conheça</a>';

                echo '</p>';
                echo '</div>';
            }
        }
    }    
    ?>

</div>

</div>
<?php
include_once(dirname(__FILE__) . "/include/footer.php");
?>