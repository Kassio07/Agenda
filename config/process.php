<!-- ARQUIVO ONDE PROCESSA O BACKEND -> ADD- EDIT - DELL - VER -->
<?php
session_start();
include_once(__DIR__ . "/../data/conexao.php");


$data = $_POST;

// MODIFICAÇÕES NO BANCO
if (!empty($data)) {

 // Pega a referencia do form
 $dataForm = isset($_POST['type']) ? $_POST['type'] : "";

 if ($dataForm === "adicionar") {
  // Recebe os parametros
  $nome = $_POST['nome'];
  $contato = trim($_POST['contato']);
  $descricao = $_POST['descricao'];
  $status = $_POST['status'];

  // Inicia a query
  $stmt = "INSERT INTO fornecedores(nome_fornecedor, contato_fornecedor, descricao_fornecedor, status_fornecedor) VALUES (:nome, :contato, :descricao, :status_fornecedor)";
  // Prepara
  $stmt = $conn->prepare($stmt);
  $stmt->bindParam(":nome", $nome);
  $stmt->bindParam(":contato", $contato);
  $stmt->bindParam(":descricao", $descricao);
  $stmt->bindParam(":status_fornecedor", $status);
  // Se de error na conexão com banco
  try {

   $stmt->execute();
   $_SESSION['msg'] = "Fornecedor adicionado com sucesso!";
  } catch (PDOException $e) {
   $error = $e->getMessage();
   echo "Error: $error";
  }
 } else if ($dataForm === "apagar") {
  // Recebe os dados
  $id = isset($_POST['id']) ? $_POST['id'] : "";

  $stmt = "DELETE FROM fornecedores WHERE id = :id";
  $stmt = $conn->prepare($stmt);
  $stmt->bindParam(":id", $id);

  try {
   $stmt->execute();
   $_SESSION['msg'] = "Fornecedor <b>$id</b> excluído com sucesso!";
  } catch (PDOException $e) {
   $error = $e->getMessage();
   echo "Error: $error";
  }
 } else if ($dataForm === "edit") {
  // Recupera os dados
  $nome = $_POST['novoNome'];
  $contato = $_POST['novoNumber'];
  $descricao = $_POST['novaDescricao'];
  $status = $_POST['novoStatus'];
  $id = $_POST['id'];


  $query = "UPDATE fornecedores SET nome_fornecedor = :novoNome, contato_fornecedor = :novoNumber, descricao_fornecedor = :novaDescricao, status_fornecedor = :novoStatus WHERE id = :id";

  $stmt = $conn->prepare($query);
  $stmt->bindParam(":novoNome", $nome);
  $stmt->bindParam(":novoNumber", $contato);
  $stmt->bindParam(":novaDescricao", $descricao);
  $stmt->bindParam(":novoStatus", $status);
  $stmt->bindParam(":id", $id);

  try {
   $stmt->execute();
   $_SESSION['msg'] = "Fornecedor <b>$id</b> atualizado com sucesso!";
  } catch (PDOException $e) {
   $error = $e->getMessage();
   echo "Error: $error";
  }
 }

 // Direciona para o home
 header("Location:" . $BASE_URL . "../index.php");
 exit;
 // SELEÇÃO
} else {
 $id;

 if (!empty($_GET)) {
  $id = $_GET['id'];
 }

 // Retorna os dados de um contato
 if (!empty($_GET)) {
  $query = "SELECT * FROM fornecedores WHERE id = :id";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  $cont = $stmt->fetch();
 }

 // Busca todos os fornecedores
 $fornecedores = [];
 $stmt = $conn->prepare("SELECT * FROM fornecedores ORDER BY status_fornecedor DESC, id DESC");
 $stmt->execute();

 $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>