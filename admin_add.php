<?php
 
 require 'init.php';
 
// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome)|| empty($email)|| empty($password))
{
  echo "Volte e preencha todos os campos";
    exit;
}
  
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO admin(nome, email, password ) VALUES(:nome, :email, :password)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
 
if ($stmt->execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
} ?>

