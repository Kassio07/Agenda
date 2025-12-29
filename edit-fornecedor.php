<?php
include_once("templates/header.php");

?>

<div class="container">
 <main>
  <div class="title-pag">
   <h1>Editar Fornecedor</h1>
  </div>
  <form class="row g-3 needs-validation" method="POST" action="<?= $BASE_URL ?>config/process.php">
   <!-- Campo oculto -->
   <input type="hidden" name="type" value="edit">
   <input type="hidden" name="id" value="<?= $cont['id']; ?>">
   <!-- nome -->
   <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Nome</label>
    <input type="text" class="form-control" name="novoNome" value="<?= $cont['nome_fornecedor'] ?>">
   </div>
   <!-- Contato -->
   <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Contato</label>
    <input type="number" class="form-control" name="novoNumber" value="<?= $cont['contato_fornecedor'] ?>">
   </div>
   <!-- Decrição -->
   <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Descrição</label>
    <input type="text" class="form-control" name="novaDescricao" value="<?= $cont['descricao_fornecedor'] ?>">
   </div>
   <!-- Status -->
   <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Status</label>
    <select class="form-select" name="novoStatus" id="validationCustom04" required>
     <option <?php echo ($cont['status_fornecedor'] == 1) ? "selected" : "" ?> value="1">Ativo</option>
     <option <?php echo ($cont['status_fornecedor'] == 0) ? "selected" : "" ?> value="0">Inativo</option>
    </select>
   </div>
   <div class="col-12">
    <button class="btn btn-success" type="submit">Atualizar</button>
    <a href="<?= $BASE_URL ?>index.php" class="btn btn-secondary">Voltar</a>
   </div>
  </form>
 </main>
</div>

<?php
include_once("templates/footer.php");

?>