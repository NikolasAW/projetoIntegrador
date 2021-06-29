<?php
    include 'include/MySql.php';
session_start();


if (isset($_GET['cadastro'])) {
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $senha = $_GET['senha'];
    $senhaConfirma = $_GET['confirma'];

    if ($senha == "" || $senha != $senhaConfirma) {
        echo "<b>Aviso</b>: Senha incorreta!";
    } else {
        $sql = $pdo->prepare("SELECT * FROM cadastrados WHERE email = ?");
        if ($sql->execute(array($email))) {
            $info = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (count($info) > 0) {
                echo '<h6>Email de usuário já cadastrado. Cadastre novamente!';
            } else {
                $sql = $pdo->prepare("INSERT INTO cadastrados (cod_usuario
                ,nome,email,senha)
    values (null,?,?,?)");
                if ($sql->execute(array($nome, $email, $senha))) {
                    echo 'Dados cadastrados com sucesso';
                    header('location:login.php');
                } else {
                    echo 'Dados não cadastrados!';
                }
            }
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
    <title>Cadastre-se</title>
</head>

<body>
    <form action="">
        Nome: <input type="text" name="nome" placeholder="Informe seu nome" required>
        <br>
        Email: <input type="text" name="email" placeholder="Informe seu email" required>
        <br>
        Senha: <input type="password" name="senha" placeholder="Informe sua senha" required>
        <br>
        Confirme sua senha: <input type="password" name="confirma" id="confirma" placeholder="Confirme sua senha" required>
        <br>
        <input type="submit" name="cadastro" value="Cadastrar">
    </form>
</body>

</html>