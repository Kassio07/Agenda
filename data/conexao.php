<!-- ARQUIVO DE CONEXÃO COM BANCO DE DADOS -->
<?php
// Variavéis de conexão
$host = "localhost";
$user = "root";
$pass = "";
$db = "blogti";

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Se de error na conexão com banco
try {
 $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

 // Mostrar erro de PDO
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 echo "Erro na conexão" . $e->getMessage();
 exit;
}
?>

