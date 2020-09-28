<?php 
require_once  'cabecalho.php';
require 'init.php';

//pega o codigo da url
$id_cadastro_motorista = isset($_GET['id_cadastro_motorista']) ? (int) $_GET['id_cadastro_motorista']: null;

//valida o codigo
if(empty($id_cadastro_motorista))
{
	echo "codigo para alateração não defindo";
	exit;
}

//busca os dados do funcionario  a ser editado
$PDO = db_connect();
$sql = "SELECT nome, email, cpf, situacao, status FROM cadastro_motorista WHERE id_cadastro_motorista = id_cadastro_motorista";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_cadastro_motorista', $id_cadastro_motorista, PDO::PARAM_INT);

$stmt->execute();

$cadastro_motorista = $stmt->fetch(PDO::FETCH_ASSOC);

//se o método fetch() não retornar um array, significa que o codigo não corresponder a um usuario valido.
if(!is_array($cadastro_motorista))
{
	echo "Nenhum usuario encontrado";
	exit;
}

?>
 <div class="container-fluid">
    <div class="container">
        <form class="form-signin"  action="edite.php" method="post">
            <div class="text-center md-4">
                <h2 class="h3 mb-3 font-weight-normal">Formulario de Alteração</h2>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $cadastro_motorista['nome']?>">
                <label for="nome">Nome</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $cadastro_motorista['email']?>">
                <label for="email">Email </label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" name="cpf" id="cpf" value="<?php echo $cadastro_motorista['cpf']?>" >
                <label for="cpf">CPF</label>
            </div>
            <div class="form-group">
                <label for="situacao">Situação</label>
                    <select type="text" id="situacao" name="situacao" class="form-control" value="<?php echo $cadastro_motorista['situacao']?>">
                        <option>Livre</option>
                        <option>Em Curso</option>
                        <option>Retornando</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                        <select id="status" type="text" name="status" class="form-control" value="<?php echo $cadastro_motorista['status']?>" >
                            <option>Ativo</option>
                            <option>Não ativo</option>
                        </select>
                    </div>
                    <br>
                    <input type="hidden" name="id_cadastro_motorista" value="<?php echo $id_cadastro_motorista ?>">
                    <button type="submit" class="btn btn-primary"  value="Alterar">Alterar</button>
                </form>
            </div>
        </div>
<?php
require_once  'rodape.php';
?>