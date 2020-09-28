<?php
/**
*Inicia a sessão
*/
session_start();

/**
*Muda o Valor de logged in para false
*/
$_SESSION['logged_in'] = false;

/**
*Finalizar a sessão
*/
session_destroy();

/**
*Retorna para a index.php
*/
header('Location: index.php');

?>