<?php

require_once 'init.php';

//pega o codigo da url
$id_cadastro_motorista = isset($_GET['id_cadastro_motorista']) ? $_GET['id_cadastro_motorista']: null;

//valida o codigo
if(empty($id_cadastro_motorista))
{
	echo "codigo não informado";
	exit;
}
//remove do banco
$PDO = db_connect();
$sql = "DELETE FROM cadastro_motorista WHERE id_cadastro_motorista = :id_cadastro_motorista";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_cadastro_motorista', $id_cadastro_motorista, PDO::PARAM_INT);

if($stmt->execute())
{
	header('Location: tabela_motoristas.php');
}
else
{
	echo "Erro ao remover";
	print_r($stmt->errorInfo());
}


?>