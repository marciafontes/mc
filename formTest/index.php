<?php
	include_once 'controller/ControllerPessoa.php';
	$controllerPessoa = new ControllerPessoa();
	$controllerPessoa->savePessoa(new Request());

 ?>
 <html>
 	<head>
 		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>Formulário</title>
		
	<head>
	<body>
		
		<h3><a href="cadastro.php">Cadastrar Usuario </a></h3>
		<h3><a href="acesso.php">Acesso</a></h3>
	</body>	
		