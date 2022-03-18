<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cLogin
 *
 * @author Gustavo
 */
class cLogin {
    //put your code here
    public function login() {
        if(isset($_POST['logar'])){
            $email = $_POST['email'];
            $pas = $_POST['pas'];
            
            $pdo = require '../pdo/connection.php';
            $sql = "select * from usuario where email = ?";
            $sth = $pdo->prepare($sql);
            $sth->execute([$email]);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            $count = $sth->rowCount();
            
            if($count > 0){
                if(password_verify($pas, $result['pas'])){
                    session_start();
                    $_SESSION['usuarioN'] = $result['nomeUser'];
                    $_SESSION['emailN'] = $result['email'];
                    $_SESSION['logadoN'] = true;
                    header("Location: ../index.php");
                }
            }else{
                header("Location: login.php");
            }
            unset($sth);
            unset($pdo);
        }
    }
}
