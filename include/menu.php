<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center bg-white">
            <h1 class="text-blue my-4 py-2">BROWSE COURSES</h1>
        </div>
    </div>
    <?php
    if (isset($_SESSION['logado'])) :
    ?>
        <div>
            <input style="margin-left: 50%;" type="submit" id="sair" value="sair" name="sair"></input>
        </div>
        <?php
        if (isset($_POST["sair"])) {
            session_destroy();
            header('location: cad.php');
        }
        ?>
    <?php endif; ?>
</div>