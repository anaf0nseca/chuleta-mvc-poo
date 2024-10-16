<?php 
include '../../init.php';
// inicia a verificação do login
if($_POST){
    $login  = $_POST['login'];
    $senha = md5($_POST['senha']);
    $loginRes = $conn->query("select * from usuarios where login = '$login' and senha  = '$senha'");
    $rowLogin = $loginRes->fetch_assoc();
    $numRow  = $loginRes->num_rows;
    // se a sessão não existir
    if(!isset($_SESSION)){
        $sessaoAntiga = session_name('chuleta');
        session_start();
        $session_name_new = session_name();
    }
    if($numRow>0){
        $_SESSION['login_usuario'] = $login;
        $_SESSION['nivel_usuario'] = $rowLogin['nivel'];
        $_SESSION['nome_da_sessao'] = session_name();
        if($rowLogin['nivel']=='sup'){
            echo "<script>window.open('index.php?','_self')</script>";
        }
        else{
            echo "<script>window.open('../cliente/index.php?cliente=".$login."','_self')</script>";
        }
    }
    else{
       echo "<script>window.open('invasor.php','_self')</script>";
    }
}
?>