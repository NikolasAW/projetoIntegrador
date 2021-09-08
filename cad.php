<?php

include_once(dirname(__FILE__) . "/include/header.php");
include_once(dirname(__FILE__) . "/include/MySql.php");


if (isset($_POST['acao'])) {
  $email = $_POST['email_login'];
<<<<<<< HEAD
  // identificar o ato de cadastramento do email
  $senha = md5($_POST['senha_login']);
  // identificar o ato de cadastramento da senha
=======
  // Verifica se o E-mail está cadastrado.
  $senha = md5($_POST['senha_login']);
  // Verifica se a senha está cadastrada.
>>>>>>> 23e37e48e60ff6aa5cfec7ede8cbcb5ed77334d6

  $sql = $pdo->prepare("SELECT * FROM cadastrados 
                         WHERE email = ? AND senha = ?");
  if ($sql->execute(array($email, $senha))) {
    $info = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($info) > 0) {
      header('location:principal.php');
<<<<<<< HEAD
      // quando a pessoa entra no site fazendo login, ele vai para a pagina principal do site
    } else {
      $aviso .= '<h6>Email de usuário não cadastrado!!</h6>';
      // ele diz que o email nao esta cadastrado
=======
      // Após o usuário fazer o login, ele será redirecionado para a página principal.
    } else {
      $aviso .= '<h6>Email de usuário não cadastrado!!</h6>';
      // Avisa o usuário que o email não está cadastrado no site.
>>>>>>> 23e37e48e60ff6aa5cfec7ede8cbcb5ed77334d6
    }
  }
}

?>

<div class="container p-5">
  <div class="content p-4">
    <div id="login">
      <form method="post" action="">
        <h1>Login</h1>
      
        <p>
          <label for="email_login">Seu e-mail</label>
          <input id="email_login" name="email_login" required="required" type="text" placeholder="Nome@gmail.com" />
        </p>

        <p>
          <label for="senha_login">Sua senha</label>
          <input id="senha_login" name="senha_login" required="required" type="password" placeholder="1234" />
        </p>

        <p class="">
          <input type="submit" name="acao" class="button" value="Login" />
        </p>

        <p class="link">
          Ainda não tem conta?
          <a href="index.php">Cadastre-se</a>
        </p>
        <?php if ($aviso != "") :?>
          <div class="alert alert-danger"><?php echo $aviso; ?></div>
        <?php endif; ?>
      </form>

    </div>
  </div>
</div>

<?php
include_once(dirname(__FILE__) . "/include/footer.php");
?>