<?php
include_once(dirname(__FILE__)."/include/header.php");
?>
  <div class="container p-5">
    <div class="content p-4">
      <!-- Cadastro do usuário -->
      <div id="cadastro">
        <form method="post" action="">
          <h1>Cadastro</h1>

          <p>
            <!-- Usuário deve inserir o nome -->
            <label for="nome_cad">Seu nome</label>
            <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Digite seu nome" />
          </p>

          <p>
            <!-- Usuário deve inserir o email -->
            <label for="email_cad">Seu e-mail</label>
            <input id="email_cad" name="email_cad" required="required" type="email" placeholder="Nome@gmail.com" />
          </p>

          <p>
            <!-- Usuário deve inserir a senha-->
            <label for="senha_cad">Sua senha</label>
            <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="1234" />
          </p>

          <p class="">
            <!-- Faz o cadastro e manda as informações para o bd -->
            <input type="submit" name="cadastrar" class="button" value="Cadastrar" />
          </p>

          <p class="link">
            Já tem conta?
            <!-- Se usuário tiver conta, ao clicar leva para a página de login -->
            <a href="cad.php"> Ir para Login </a>
          </p>
        </form>
      </div>
    </div>
  </div>
  <?php
include_once(dirname(__FILE__)."/include/footer.php");
?>