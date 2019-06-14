<!doctype html>
<html>
	<head>
		<title>Gerenciador de Tarefas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="tarefas.css">
	</head>

	<body>
		<h1>Gerenciador de Tarefas</h1>
        
		<?php require 'formulario.php'; ?>
        
        <?php if($exibir_tabela) : ?>
            <?php require 'tabela.php'; ?>
        <?php endif; ?>
	</body>
</html>