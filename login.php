<?php
/**
*Inclui o arquivo de inicialização
*/
require 'init.php';

/**
*Resgata variáveis do formulario
*/
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if(empty($email) || empty($password)){
	echo "Informe email e senha";
	exit;
}
/**
*Cria o hash da senha
*/
//$passwordHash = make_hash($password);

$PDO = db_connect();
$sql = "SELECT nome, email, password FROM admin WHERE id_admin = id_admin";
$stmt = $PDO->prepare($sql);

//var_dump($PDO);

$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$admin = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump(PDO::FETCH_ASSOC);
//var_dump($);

if(count($admin)<= 0){
	echo " Email ou senha incorretos";
	exit;
}

/**
*Pega o primeiro usuário
*/
$admin = $admins[0];

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['id_admin'] = $admin['id_admin'];
$_SESSION['email'] = $admin['email'];


header('Location:tabela_motoristas.php');

?>
