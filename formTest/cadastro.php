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
		
		<form  enctype="multipart/form-data"  method="POST" action="" id="formRegister" name="formCadastroPessoal">
			Nome: <input type="text" name="nome"  placeholder="adicione seu nome" required ><br>
			Cpf: <input type="text" name="cpf" placeholder="000.000.000-00" id="cpf" required ><br>
			Rg: <input type="text" name="rg" required pattern="^\d{7}$"><br>
			email: <input type="text" id="email" name="email" placeholder="myemail@server" required pattern="([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+"><br>
			cnpj: <input type="text" name="cnpj" id="cnpj" required pattern="^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$" ><br>
			cep: <input type="text" name="cep" id="cep" placeholder="99999-000" required pattern="\d{5}-?\d{3}"><br>
			endere&ccedil;o: <input type="text" name="endereco"  required><br>
			complemento <input type="text" name="complemento" placeholder="alguma referencia ao endere&ccedil;o" ><br>
			telefone: <input type="text" class="cell" name="telefone" placeholder="(dd)0000-0000" required pattern="^\(?\d{2}\)?[\s-]?\d{4}-?\d{4}$" ><br>
			celular: <input type="text"  class="cell" name="celular" placeholder="(dd)0000-0000" ><br>
			telefone Comercial: <input type="text" class="cell" name="telefone_comercial"  placeholder="(dd)0000-0000" ><br>
			informa&ccedil;&otilde;es : <textarea name="informacao" required></textarea>
			observa&ccedil;&otilde;es : <textarea name="observacao"></textarea>
			outros : <textarea name="outros"></textarea>
			<br><br><br>
			Arquivos:
			<input type="file" name="file">

			<input type="submit" name="cadastrar" value="Cadastrar">
			<input type="submit" id="regLater" name="cadastrarDepois" value="Continuar depois">
		<form>	
	</body>

<!--
nome, cpf, cnpj, rg, endereço, e-mail, cep, telefone e informações
nome, cpf, cnpj, rg, endereço, e-mail, complemento, cep, telefone, celular, telefone comercial, informações, observações, outros) -->

<script type="text/javascript" src="styles/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="styles/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="styles/js/masks.js"></script>
<script type="text/javascript" src="styles/js/form.js"></script>