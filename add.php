<?php
 
 require 'init.php';
 
// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$situacao = isset($_POST['situacao']) ? $_POST['situacao'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($cpf) || empty($email) || empty($password) || empty($situacao)  || empty($status))
{
  echo "Volte e preencha todos os campos";
    exit;
}
  
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO motorista(nome, cpf, email, password, situacao, status) VALUES(:nome, :cpf, :email, :password, :situacao, :status)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':cpf', $cpf);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':situacao', $situacao);
$stmt->bindParam(':status', $status);
 
 
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
} ?>