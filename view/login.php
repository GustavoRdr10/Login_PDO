<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['logadoN']) && $_SESSION['logadoN'] == true) {
    header("location: ../index.php");
}
require_once '../controller/cLogin.php';
$login = new cLogin();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Login</h1>
        <form action="<?php $login->login(); ?>" method="post">
            <input type="email" name="email" required placeholder="E-mail aqui..."/>
            <br><br>
            <input type="password" name="pas" required placeholder="Senha aqui..."/>
            <br><br>
            <input type="submit" name="logar" value="Logar"/>
            <input type="reset" name="limpar" value="Limpar"/>
        </form>
    </body>
</html>
