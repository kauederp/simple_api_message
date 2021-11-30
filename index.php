<?php session_start(); 
	unset($_SESSION['nick']);
?>
<!doctype html>
<html>
	<!--
	Este projeto é uma simples API de troca de mensagens, fornecendo registro de mensagens e retorno de mensagens com banco de dados MySQL.
	Projeto apresentado como exemplo nas aulas de criação de site do CIMOL
	  -->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8" />
		<title>Criação de Sites</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body>
	<?php
	if(isset($_POST['login'])){
		if(!empty($_POST['nick']))
			$_SESSION['nick'] = $_POST['nick'];
	} 
	if(!isset($_SESSION['nick'])){
		echo '<form class="container-fluid bg-dark text-light justify-content-center d-flex flex-row" action="" method="post">
			<fieldset>
				<legend>Personalia:</legend>
				<label for="nick">nickname:</label>
				<input type="text" id="nick" name="nick"><br><br>
						
				<input name="login" type="submit" value="Submit">
			</fieldset>
		</form>';
	}else{
		echo "<form id='form' class='row justify-content-center'>
				<div class='col-4 m-0 p-0'>
				<a href='' class='btn btn-danger'>sair</a>
					<h1 class='text-dark fw-bolder'>".$_SESSION['nick']."</h1>
					<input class='mt-3' id='nick' type=hidden value='".$_SESSION['nick']."'>
					<input id='message' type='text' name='message'>
					<button id='enviar' class='btn btn-success'>enviar</button>
				</div>
			  </form>
			";
			

	}

	?>
	
	<div class="row justify-content-center">
		<div id="history" class="col-4 border border-1 border-dark" id="mensagens">
			
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="script.js"></script>
	</body>

</html>