<?php
require 'init.php';
require_once  'cabecalho.php';
?>
 <div class="container-fluid">
    <div class="container">
        <form class="form-signin"  action="admin_add.php" method="post">
            <div class="text-center md-4">
                <h2 class="h3 mb-3 font-weight-normal">Sistema de Cadastro de Adminstrador</h2>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo" >
                <label for="nome">Nome</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com" >
                <label for="email">Email </label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="password" id="password" placeholder="Senha">
                <label for="password">Senha</label>
            </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button><a href="index.php" >Volta</a></button>
        </form>
    </div>
</div>
 
<?php
require_once  'rodape.php';
?>