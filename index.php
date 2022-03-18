<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['logadoN']) && $_SESSION['logadoN'] == true) {
    echo $_SESSION['usuarioN'] . " | " . $_SESSION['emailN'];
    echo " | <button onclick=" . "location.href='controller/logout.php'" . ">Sair</button>";
} else {
    header("location: view/login.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Página Inicial</h1>
        <br><br>
        <button onclick="location.href = 'view/cadUsuario.php'">Cadastro de usuário</button>
    </body>
</html>
