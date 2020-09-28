<?php 

require_once 'init.php';

//resgata os valores do formulario
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cpf = isset($_POST['cpf'])? $_POST['cpf'] : null;
$situacao = isset($_POST['situacao']) ? $_POST['situacao'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$id_cadastro_motorista = isset($_POST['id_cadastro_motorista']) ? $_POST['id_cadastro_motorista']: null;

//validação 
if(empty($nome)|| empty($email)|| empty($cpf)|| empty($situacao) || empty($status))
{
	echo "Volte e preencha todos os campos";
	exit;
}

$PDO = db_connect();
$sql = "UPDATE cadastro_motorista SET nome = :nome, email = :email, cpf = :cpf, situacao = :situacao, status = :status WHERE id_cadastro_motorista = :id_cadastro_motorista";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':situacao', $situacao);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':id_cadastro_motorista', $id_cadastro_motorista, PDO::PARAM_INT);

if($stmt->execute())
{
	header('Location: tabela_motoristas.php');
}
else
{
	echo "Erro ao alterar";
	print_r($stmt->errorInfo());
}

?>