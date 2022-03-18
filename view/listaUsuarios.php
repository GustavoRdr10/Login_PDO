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
$listaUser = $cadUser->getUsuarios();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista de Usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th><th>Usuário</th><th>e-mail</th><th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaUser as $user): ?>
                    <tr>
                        <td><?php echo $user['idUser']; ?></td>
                        <td><?php echo $user['nomeUser']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <form action="editarUser.php" method="POST">
                                <input type="hidden" value="<?php echo $user['idUser']; ?>" name="idUser"/>
                                <input type="submit" value="Editar" name="editar"/>
                            </form>
                            <?php if ($_SESSION['emailN'] != $user['email']) { ?>
                                <form action="../controller/deletarUser.php" method="post">
                                    <input type="hidden" value="<?php echo $user['idUser']; ?>" name="idUser"/>
                                    <input type="submit" value="Deletar" name="deletar"/>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br><br>
        <button onclick="location.href = 'cadUsuario.php'">Voltar</button>
    </body>
</html>
