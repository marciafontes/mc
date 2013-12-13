<?php 
	include_once 'controller/ControllerPessoa.php';

	$controllerPessoa = new ControllerPessoa;
	$controllerPessoa->authenticate(new Request);
?>

<html>
	<head>
		
	</head>
	<body>
		<form method="post" action="">
				email: <input type="text" name="email" placeholder="myemail@server" required pattern="([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+">
				cpf: <input type="text" name="cpf" id="cpf" required >

				<input type="submit" name="acesso">
		</form>
	</body>
	<script type="text/javascript" src="styles/js/jquery-2.0.0.min.js"></script>
		<script type="text/javascript" src="styles/js/jquery.mask.min.js"></script>
		<script type="text/javascript" src="styles/js/masks.js"></script>
</html>