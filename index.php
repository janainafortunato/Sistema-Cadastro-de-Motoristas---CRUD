<?php

session_start();
require 'init.php';
require_once  'cabecalho.php';

?>
 
<main role="main" class="inner cover">
	<div class="text-center">
		<h2 class="cover-heading">Sistema de Cadastro de Motoristas</h2>

	<?php if(isLoggedIn()): ?>
		<p class="lead"> Olá, <?php echo $_SESSION['email']; ?> . <a href="panel.php">Painel </a> | <a href="logout.php">Sair</a></p>
		<?php else: ?>
			<p class="lead">Olá, visitante. <a href="formulario_login.php">Login</a></p><br>
			<p class="lead">Faça o seu cadastro para inserir Motoristas no sistema. <a href="admin.php">Cadastro</a></p>
		<?php endif; ?>
	</div>
	<div class="card bg-dark text-white">
		<img src="motorista.jpg" class="card-img" alt="imagem de caminhão">
	</div>
</main>
<?php
require_once  'rodape.php';
?>