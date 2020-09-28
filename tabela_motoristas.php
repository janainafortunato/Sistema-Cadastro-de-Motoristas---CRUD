<?php
require_once  'cabecalho.php';
session_start();
require_once 'init.php';
//require 'check.php';
//abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM cadastro_motorista ORDER BY id_cadastro_motorista ASC";

// SQL para selecionar os registros
$sql = "SELECT id_cadastro_motorista, nome, email, cpf, situacao, status FROM cadastro_motorista ORDER BY id_cadastro_motorista ASC";

//conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

//seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();



?>
 <div class="container-fluid">
    <div class="container">
    <p><a class="button" href="logout.php" style="float: right; border:1px solid; padding: 8px 8px; vertical-align: middle; background:#2D888F; color:white;border-radius:6px; font-size: 10px; font-family:helvetica, serif;text-decoration:none;">Sair</a></p>
        <div>
            <h2>Sistema de Cadastro de Motoristas</h2><br>
            <button><a href="cadastro.php">Adicionar Motorista</a></button>
        </div><br>
        <div>
            <h4>Quantidade de Motoristas Cadastrados</h4>
            <div class="alert alert-success"  role="alert">
                <h5><p>Total de Registros: <?php echo $total ?></p></h5>
                <?php if($total > 0 ): ?>
            </div>
        </div>
        <div>
            <h4>Sistema de Busca</h4>
        </div>
            <form action="search.php">
                <label for="search">Busca: </label>
                <input type="text" name="search" id="search" placeholder="Busca...">
                <input type="submit" value="Buscar">
            </form><br><br>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Codigo</th>
					<th scope="col">Nome</th>
					<th scope="col">Email</th>
					<th scope="col">CPF</th>
					<th scope="col">Situação</th>
					<th scope="col">Status</th>
					<th scope="col">Editar</th>
                    <th scope="col">Remover</th>
				</tr>
			</thead>
			<tbody>
				 <?php while ($cadastro_motorista = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td scope="row"><?php echo $cadastro_motorista['id_cadastro_motorista'] ?></td>
                    <td scope="row"><?php echo $cadastro_motorista['nome'] ?></td>
                    <td scope="row"><?php echo $cadastro_motorista['email'] ?></td>
                    <td scope="row"><?php echo $cadastro_motorista['cpf'] ?></td>
                    <td scope="row"><?php echo $cadastro_motorista['situacao'] ?></td>
                    <td scope="row"><?php echo $cadastro_motorista['status'] ?></td>
                    <td scope="row">
                        <a href="formulario_editar.php?id_cadastro_motorista=<?php echo $cadastro_motorista['id_cadastro_motorista'] ?>">Editar</a>
                    </td>
                    <td scope="row">
                       
                        <a href="delete.php?id_cadastro_motorista=<?php echo $cadastro_motorista['id_cadastro_motorista'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
 
        <?php else: ?>
 
        <p>Nenhum usuário registrado</p>
 
        <?php endif; ?>
    </div>
</div>

<?php
require_once  'rodape.php';
?>