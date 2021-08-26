<?php


session_start();
include_once(dirname(__FILE__) . "/MySql.php");

$aviso = "";
if (isset($_POST['cadastrar'])) {
  $nome = $_POST['nome_cad'];
  $email = $_POST['email_cad'];
  $senha = md5($_POST['senha_cad']);

  if ($senha == "") {
    $aviso .= "<b>Aviso</b>: Senha incorreta!";
  } else {
    $sql = $pdo->prepare("SELECT * FROM cadastrados WHERE email = ?");
    if ($sql->execute(array($email))) {
      $info = $sql->fetchAll(PDO::FETCH_ASSOC);
      if (count($info) > 0) {
        $aviso .=  '<h6>Email de usuário já cadastrado. Cadastre novamente!';
      } else {
        $sql = $pdo->prepare("INSERT INTO cadastrados (cod_usuario
                ,nome,email,senha)
    values (null,?,?,?)");
        if ($sql->execute(array($nome, $email, $senha))) {
          $aviso .= 'Dados cadastrados com sucesso';
          header('location:cad.php');
        } else {
          $aviso .= 'Dados não cadastrados!';
        }
      }
    }
  }
}
