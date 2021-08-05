<?php
       include 'include/MySql.php';
if (isset($_POST['acao'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare("SELECT * FROM cadastrados 
                         WHERE email = ? AND senha = ?");
    if($sql->execute(array($email,$senha))){
        $info = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($info) > 0){
            header('location:principal.php');
        } else {
            echo '<h6>Email de usuário não cadastrado</h6>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browse Courses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>

<body>
    <div class="d-flex justify-content-xl-center bg-warning mb-5 seila">
    <h1>BROWSE COURSES</h1>
    </div>
    <div class="container" >
    <a class="links" id="paracadastro"></a>
    <a class="links" id="paralogin"></a>
    
    <div class="content">      
      <div id="login">
        <form method="post" action=""> 
          <h1>Login</h1> 
          <p> 
            <label for="email_login">Seu e-mail</label>
            <input id="email_login" name="email_login" required="required" type="text" placeholder="contato@htmlecsspro.com"/>
          </p>
          
          <p> 
            <label for="senha_login">Sua senha</label>
            <input id="senha_login" name="senha_login" required="required" type="password" placeholder="1234" /> 
          </p>
          
          <p> 
            <input type="checkbox" name="manterlogado" id="manterlogado" value="" /> 
            <label for="manterlogado">Manter-me logado</label>
          </p>
          
          <p> 
            <input type="submit" value="Logar" /> 
          </p>
          
          <p class="link">
            Ainda não tem conta?
            <a href="#paracadastro">Cadastre-se</a>
          </p>
        </form>
      </div>

      <div id="cadastro">
        <form method="post" action=""> 
          <h1>Cadastro</h1> 
          
          <p> 
            <label for="nome_cad">Seu nome</label>
            <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Luiz Augusto" />
          </p>
          
          <p> 
            <label for="email_cad">Seu e-mail</label>
            <input id="email_cad" name="email_cad" required="required" type="email" placeholder="contato@htmlecsspro.com"/> 
          </p>
          
          <p> 
            <label for="senha_cad">Sua senha</label>
            <input id="senha_cad" name="senha_cad" required="required" type="password" placeholder="1234"/>
          </p>
          
          <p> 
           <a href="#paralogin"><input type="submit" value="Cadastrar"/> </a>
          </p>
          
          <p class="link">  
            Já tem conta?
            <a href="#paralogin"> Ir para Login </a>
          </p>
        </form>
      </div>
    </div>
  </div> 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>