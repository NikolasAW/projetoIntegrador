<?php
/// maquina que esta conectada ao localhost.
define('HOST', 'localhost:3308');
define('DB', 'pi');
define('USER', 'root');
define('PASS', '');


/// processo para puxar o banco de dados para o vs code.
try{
    $pdo = new PDO('mysql:host=' .HOST.';dbname='.DB, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
    /// caso não conecte exibe esses erros na pagina.
    echo'<h1>Erro ao conectar o banco: '.DB.'</h1>';
    echo '<h6>Mensagem: '.$e->getMessage().'</h6>';
    echo '<br>';
    return false;
}


 
 
?>