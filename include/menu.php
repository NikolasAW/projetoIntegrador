<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center bg-white">
        <!-- foi inserido o titulo para o site -->
            <h1 class="text-blue my-4 py-2">BROWSE COURSES</h1>
        </div>
    </div> 
    <?php
    if (isset($_SESSION['logado'])) :
    ?>
    <!-- botao para voltar para tela de login -->
        <div>
            <input style="margin-left: 50%;" type="submit" id="sair" value="sair" name="sair"></input>
        </div>
        <!-- foi inserido o botao sair no site -->
        <?php
        if (isset($_POST["sair"])) {
            session_destroy();
            // ao clicar no botao o usuario volta para a tela de login e a sessao é destruida
            header('location: cad.php');
        }
        ?>
    <?php endif; ?>

</div>