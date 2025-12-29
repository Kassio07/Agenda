<?php
include_once("templates/header.php");

$id = isset($_GET['id']) ? $_GET['id'] : "";

$stmt = $conn->prepare("SELECT * FROM fornecedores WHERE id = :id");
$stmt->bindParam(":id", $id);
$stmt->execute();
$forne = $stmt->fetch(PDO::FETCH_ASSOC);

$status = ($forne['status_fornecedor'] == 1) ? "Ativo" : "Inativo";
?>

<div class="container">
 <main>
  <div class="title-pag">
   <h1>Fornecedor</h1>
  </div>
  <div class="card text-bg-secondary mb-3" style="max-width: 50%;">
   <div class="card-header">Nome: <?= $forne['nome_fornecedor'] ?></div>
   <div class="card-header">Contato: <?= $forne['contato_fornecedor'] ?></div>
   <div class="card-body">
    <h5 class="card-title">Descrição</h5>
    <p class="card-text"><?= $forne['descricao_fornecedor'] ?></p>
   </div>
   <div class="card-header">Status: <?= $status ?></div>
  </div>
  <div class="col-12">
   <a href="<?= $BASE_URL ?>edit-fornecedor.php" class="btn btn-primary">Editar</a>
   <a href="<?= $BASE_URL ?>index.php" class="btn btn-secondary">Voltar</a>
  </div>
 </main>
</div>
<?php
include_once("templates/footer.php");
?>