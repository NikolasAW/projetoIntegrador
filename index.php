<?php
include_once(dirname(__FILE__)."/include/header.php");
?>
<<<<<<< HEAD
  <div class="container p-5">
    <div class="content p-4">
=======
  <div class="container">
    <div class="content p-5">
>>>>>>> a09a30ff686ba69a2c20dff7de4610aaa8200e32
      <div id="cadastro">
        <form method="post" action="">
          <h1>Cadastro</h1>

          <p>
            <label for="nome_cad">Seu nome</label>
            <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Digite seu nome" />
          </p>

          <p>
            <label for="email_cad">Seu e-mail</label>
            <input id="email_cad" name="email_cad" required="required" type="email" placeholder="Nome@gmail.com" />
          </p>

          <p>
            <label for="senha_cad">Sua senha</label>
            <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="1234" />
          </p>

          <p class="">
            <input type="submit" name="cadastrar" class="button" value="Cadastrar" />
          </p>

          <p class="link">
            Já tem conta?
            <a href="cad.php"> Ir para Login </a>
          </p>
        </form>
      </div>
    </div>
  </div>
  <?php
include_once(dirname(__FILE__)."/include/footer.php");
?>