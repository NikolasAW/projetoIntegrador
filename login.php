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
    <title>Login</title>
</head>

<body>
    <form action="" method="POST">
        Email: <input type="text" name="email" placeholder="Digite seu email" required>
        <br>
        Senha: <input type="senha" name="senha" placeholder="Digite sua senha">
        <br>
        <input type="submit" value="Login" name="acao" >
        <input type="submit" value="Cadastrar" onclick="parent.location='cad.php'">
    </form>
</body>

</html>