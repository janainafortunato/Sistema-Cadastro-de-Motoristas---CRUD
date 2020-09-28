<?php
require 'init.php';
require_once  'cabecalho.php';
?>
    <div class="container-fluid">
        <div class="container">
        <form class="form-signin"  action="adiciona.php" method="post">
            <div class="text-center md-4">
                <h2 class="h3 mb-3 font-weight-normal">Sistema de Cadastro de Motoristas</h2>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome completo">
                <label for="nome">Nome</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="email" id="email" placeholder="exemplo@exemplo.com" >
                <label for="email">Email </label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="cpf" id="cpf" placeholder="00.000.000-00">
                <label for="cpf">CPF</label>
            </div>
            <div class="form-group">
                <label for="situacao">Situação</label>
                    <select type="text" id="situacao" name="situacao" class="form-control">
                        <option>Livre</option>
                        <option>Em Curso</option>
                        <option>Retornando</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                        <select id="status" type="text" name="status" class="form-control">
                            <option>Ativo</option>
                            <option>Não ativo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
<?php
require_once  'rodape.php';
?>
   