<?php

require './conexao.php';

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$email = $_POST['email'];
$nasc = $_POST['nasc'];
$endereco = $_POST['endereco'];
$sexo = $_POST['sexo'];
$nivel = $_POST['nivel'];
$objetivo = $_POST['objetivo'];
$observacoes = $_POST['observacoes'];

$query_select= "SELECT nome FROM aluno WHERE nome='$login'";
$resultado = mysqli_query($conexao, $query_select);

$usuario_verificado = mysqli_fetch_assoc($resultado)['nome'];

	if($login == ""|| $login == null){ ?>
		<script>
			alert('O campo login deve ser preenchido');
			window.location.href='cadastro_personal.html';
		</script>
	<?php } else {
		if($usuario_verificado == $login){ ?>
			<script>
					alert('Esse login já existe');
					window.location.href='cadastro_aluno.html';
			</script>
		<?php	
		die();

		}else{
			
			$query = "INSERT INTO aluno(nome,senha,endereco,sexo,data_de_nascimento,nivel_de_treinamento,objetivo,email,observacoes) VALUES ('$login','$senha','$endereco','$sexo','$nasc','$nivel','$objetivo','$email','$observacoes')";
			$insert = mysqli_query($conexao, $query);
			

			if($insert){
				header('Location: ./login_aluno.html');
			}else{
				echo $conexao->error."<br>".$query;
			}
		}
	}
?>