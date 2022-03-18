<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['update'])) {
    $id = $_POST['idUser'];
    $nome = $_POST['nomeUser'];
    var_dump($_POST);
    $pdo = require_once '../pdo/connection.php';
    $sql = "update usuario set nomeUser = ? where idUser = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $nome, PDO::PARAM_STR);
    $sth->bindParam(2, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../view/listaUsuarios.php");
}