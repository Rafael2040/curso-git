<?php

require './conexao.php';

$login = $_POST['email'];
$entrar = $_POST['entrar'];
$senha = MD5($_POST['senha']);

    if (isset($entrar)) {
    	$query = "SELECT * FROM aluno WHERE email = '$login' AND senha = '$senha'";
      	$verifica = mysqli_query($conexao, $query) or die($connect->error);

      	var_dump(mysqli_num_rows($verifica));
        if (mysqli_num_rows($verifica) <= 0){
         	echo"<script>alert('Login e/ou senha incorretos');window.location.href='login_aluno.html';</script>";

          die();

        }else{
        	session_start();
        	$dados = mysqli_fetch_assoc($verifica);
        	$_SESSION['nome'] = $dados['nome'];
        	$_SESSION['id'] = $dados['id'];
          	header("Location: ./index_aluno.php");
        }
    }
?>