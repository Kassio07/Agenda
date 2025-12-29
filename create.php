<?php
include_once("templates/header.php");

?>

<div class="container">
 <main>
  <div class="title-pag">
   <h1>Adicionar Fornecedor</h1>
  </div>
  <form class="row g-3 needs-validation" method="POST" action="<?= $BASE_URL ?>config/process.php">
   <!-- Campo oculto -->
   <input type="hidden" name="type" value="adicionar">
   <!-- nome -->
   <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" id="validationCustom01" required>
   </div>
   <!-- Contato -->
   <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Contato</label>
    <input type="number" class="form-control" name="contato" id="validationCustom02" required>
   </div>
   <!-- Decrição -->
   <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Descrição</label>
    <input type="text" class="form-control" name="descricao" id="validationCustom03" required>
   </div>
   <!-- Status -->
   <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Status</label>
    <select class="form-select" name="status" id="validationCustom04" required>
     <option selected disabled value=""></option>
     <option value="1">Ativo</option>
     <option value="0">Inativo</option>
    </select>
   </div>
   <div class="col-12">
    <button class="btn btn-primary" type="submit">Adicionar</button>
    <a href="<?= $BASE_URL ?>index.php" class="btn btn-secondary">Voltar</a>
   </div>
  </form>
 </main>
</div>

<?php
include_once("templates/footer.php");

?>