<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center bg-black">
            <h1 class="text-white my-5 py-0">BROWSE COURSES</h1>
        </div>
    </div>
    <?php
    if (isset($_SESSION['logado'])) :
    ?>
        <div>
            <a href="cad.php"><button type="button" class="btn btn-light btn-lg" style="position:absolute; top:0;left:0">Sair</button></a>
        </div>
    <?php endif; ?>
</div>