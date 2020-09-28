<?php
require_once  'cabecalho.php';
?>
 <div class="container-fluid">
        <div class="container">
        <form class="form-signin"  action="login.php" method="post">
            <div class="text-center md-4">
                <h2 class="h3 mb-3 font-weight-normal">Login</h2>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com">
                <label for="email">Email</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="password" id="password" placeholder="Senha">
                <label for="password">Senha</label>
			</div>
			<button type="submit" class="btn btn-primary">Entrar</button>
			<button><a href="index.php" >Volta</a></button>
		</form><br>	
    </div>
</div>
<?php
require_once  'rodape.php';
?>
   