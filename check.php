<?php 
require_once 'init.php';

if(!isLoggedIn()){
	header('Location: formulario_login.php');
}

?>