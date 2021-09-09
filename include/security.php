<?php

/// função do session_start utiliza um arquivo localizado na pasta temporária.
session_start();
include_once(dirname(__FILE__) . "/MySql.php");

$aviso = "";
if (isset($_POST['cadastrar'])) {


  $nome = $_POST['nome_cad'];
  // Insere o nome do Usuário
  $email = $_POST['email_cad'];
  // Insere o email do Usuário
  $senha = md5($_POST['senha_cad']);
  // Insere a senha do Usuário

  if ($senha == "") {
    $aviso .= "<b>Aviso</b>: Senha incorreta!";
    // Avisa o usuário que a senha está incorreta
  } else {
    $sql = $pdo->prepare("SELECT * FROM cadastrados WHERE email = ?");
    if ($sql->execute(array($email))) {
      $info = $sql->fetchAll(PDO::FETCH_ASSOC);
      if (count($info) > 0) {
        $aviso .=  '<h6>Email de usuário já cadastrado. Cadastre novamente!';
        // Avisa o Usuário que o email já é cadastrado
      } else {
        $sql = $pdo->prepare("INSERT INTO cadastrados (cod_usuario
                ,nome,email,senha)
    values (null,?,?,?)");
        if ($sql->execute(array($nome, $email, $senha))) {
          $aviso .= 'Dados cadastrados com sucesso';
          // Avisa que foi cadastrado
          header('location:cad.php');
        } else {
          $aviso .= 'Dados não cadastrados!';
          // Avisa que não foi cadastrado
        }
      }
    }
  }
}
