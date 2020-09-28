<?php 

require_once  'init.php';

//pega os dados do formulario
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cpf = isset($_POST['cpf'])? $_POST['cpf'] : null;
$situacao = isset($_POST['situacao']) ? $_POST['situacao'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;

//validação  do formulario para evitar dados vazios
if(empty($nome)|| empty($email)|| empty($cpf)|| empty($situacao) || empty($status))
{
	echo "Volte e preencha todos os campos";
	exit;
}

$PDO = db_connect();
$sql = "INSERT INTO cadastro_motorista(nome, email, cpf, situacao, status) VALUES (:nome, :email, :cpf, :situacao , :status)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':situacao', $situacao);
$stmt->bindParam(':status', $status);

if($stmt->execute())
{
	header('Location: tabela_motoristas.php');
}
else
{
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}

?>