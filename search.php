<?php
require_once  'cabecalho.php';
?>

<?php 
// credenciais de acesso ao MySQL 

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '' );
define('MYSQL_DB_NAME', 'FUSION_TESTE');

// palavra digitada na busca 
$search = isset($_GET['search']) ? $_GET['search'] : ''; 
$sql = "SELECT id_cadastro_motorista, nome, email, cpf, situacao, status FROM cadastro_motorista WHERE id_cadastro_motorista  LIKE :search  OR nome  LIKE :search ";
$PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD); 
$PDO->exec("set names utf8");
 
// cria o Prepared Statement e o executa
$stmt = $PDO->prepare($sql);
$stmt->bindValue(':search', '%'. $search . '%');
$stmt->execute();
 
// cria um array com os resultados
$cadastro_motorista = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
 <div class="container-fluid">
<div class="text-center md-4">
    <div class="alert alert-success" role="alert">
        <h3>Resultado da busca</h3>
       <h5> <?php if (count($cadastro_motorista) > 0): ?><h5>
    </div>
</div> 
    <div class="alert alert-success" role="alert">
        <h5><?php echo(json_encode($cadastro_motorista))  ?></h5>
    </div>
</div>
</div > 
<?php else: ?>
 
Nenhum resultado encontrado
  
<?php endif; ?>
<div class="text-center md-4">      
   <button><a href="tabela_motoristas.php">Volta</a></button>
</div>
<?php
require_once 'rodape.php';
?>