<?php

require './conexao.php';

$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$email = $_POST['email'];
$nasc = $_POST['nasc'];

$query_select= "SELECT nome FROM personal WHERE nome='$login'";
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
					window.location.href='cadastro_personal.html';
			</script>
		<?php	
		die();

		}else{
			
			$query = "INSERT INTO personal(nome,senha,email,data_de_nascimento) VALUES('$login','$senha','$email','$nasc')";
			$insert = mysqli_query($conexao, $query);
			

			if($insert){
				header('Location: ./login_personal.html');
			}else{
				echo "Deu erro";
			}
		}
	}
?>