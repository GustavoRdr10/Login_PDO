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
    echo " | <button onclick=" . "location.href='../controller/logout.php'" . ">Sair</button>";
} else {
    header("location: login.php");
}
require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
$id = null;
if(isset($_POST['editar'])){
    $id = $_POST['idUser'];    
}
$user = $cadUser->getUsuarioById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Editar User</h1>
        <form action="../controller/updateUser.php" method="post">
            <input type="hidden" required value="<?php echo $user[0]['idUser']; ?>" name="idUser"/>
            <input type="text" required value="<?php echo $user[0]['nomeUser']; ?>" name="nomeUser"/>
            <br><br>
            <input type="email" disabled value="<?php echo $user[0]['email']; ?>" name="email"/>
            <br><br>
            <input type="submit" value="Salvar" name="update"/>
            <input type="button" onclick="location.href='listaUsuarios.php'" value="Cancelar"/>
        </form>
    </body>
</html>
