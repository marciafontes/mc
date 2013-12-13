<?php
	include_once 'controller/ControllerPessoa.php';
	include_once 'controller/ControllerArquivo.php';
	$controllerPessoa = new ControllerPessoa();
	$controllerArquivo = new ControllerArquivo;
	$pessoa = $controllerPessoa->showById();
	$controllerArquivo->deleteFile(new Request);
	$controllerPessoa->edit(new Request);
 ?>
 <html>
 	<head>
 		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
 		<script type="text/javascript" src="styles/js/jquery-2.0.0.min.js"></script>
		<script type="text/javascript" src="styles/js/jquery.mask.min.js"></script>
		<script type="text/javascript" src="styles/js/masks.js"></script>
		<title>Formulário</title>
	<head>
	<body>
		<a href="sair.php"><h3>Sair</h3></a>
		<form  enctype="multipart/form-data"  method="POST" action="" name="formCadastroPessoal">
			Nome: <input type="text" name="nome"  placeholder="adicione seu nome" required value="<?php echo $pessoa->getNome();?>"><br>
			Cpf: <input type="text" name="cpf" id="cpf" required  value="<?php echo $pessoa->getCpf();?>"><br>
			Rg: <input type="text" name="rg" required pattern="^\d{7}$" value="<?php echo $pessoa->getRg();?>"><br>
			email: <input type="text" name="email" placeholder="myemail@server" required pattern="([0-9a-zA-Z]+([_.-]?[0-9a-zA-Z]+)*@[0-9a-zA-Z]+[0-9,a-z,A-Z,.,-]*(.){1}[a-zA-Z]{2,4})+" value="<?php echo $pessoa->getEmail();?>"><br>
			cnpj: <input type="text" name="cnpj" id="cnpj" required pattern="^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$" value="<?php echo $pessoa->getCnpj();?>" ><br>
			cep: <input type="text" name="cep" id="cep" placeholder="99999-000" required pattern="\d{5}-?\d{3}" value="<?php echo $pessoa->getCep();?>"><br>
			endere&ccedil;o: <input type="text" name="endereco"  required value="<?php echo $pessoa->getEndereco();?>"><br>
			complemento <input type="text" name="complemento" placeholder="alguma referencia ao endere&ccedil;o" value="<?php echo $pessoa->getComplemento();?>"><br>
			telefone: <input type="text" class="cell" name="telefone" placeholder="(dd)0000-0000" required pattern="^\(?\d{2}\)?[\s-]?\d{4}-?\d{4}$" value="<?php echo $pessoa->getTelefone();?>" ><br>
			celular: <input type="text"  class="cell" name="celular" placeholder="(dd)0000-0000"  value="<?php echo $pessoa->getCelular();?>"><br>
			telefone Comercial: <input type="text" class="cell" name="telefone_comercial"  placeholder="(dd)0000-0000" value="<?php echo $pessoa->getTelefone_comercial();?>"><br>
			informa&ccedil;&otilde;es : <textarea name="informacao" required><?php echo $pessoa->getInformacao();?></textarea>
			observa&ccedil;&otilde;es : <textarea name="observacao"><?php echo $pessoa->getObservacao();?></textarea>
			outros : <textarea name="outros"><?php echo $pessoa->getOutros();?></textarea>

			<br><br><br>
			Arquivos:
			<input type="file" name="file">


			<input type="submit" name="cadastrar" value="salvar">
		<form>	
	</body>


	<h3>LISTA DE ARQUIVOS</h3>

	<?php $controllerArquivo->showLinkToFiles(); ?>

nome, cpf, cnpj, rg, endereço, e-mail, cep, telefone e informações
nome, cpf, cnpj, rg, endereço, e-mail, complemento, cep, telefone, celular, telefone comercial, informações, observações, outros)

<script type="text/javascript" src="styles/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="styles/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="styles/js/masks.js"></script>