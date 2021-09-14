<?php
    include_once(dirname(__FILE__) . "../header.php");

    if (isset($_SESSION['logado'])) {
        session_destroy();
    }   
    header('location:../cad.php');
?>

teste