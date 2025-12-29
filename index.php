<!-- ARQUIVO DE INICIO DO PROJETO -->
<?php
include_once("templates/header.php");
?>

<!-- Conteúdo da página -->
<div class="container">
 <!-- content -->
 <main>
  <?php
  if (isset($_SESSION['msg'])): ?>
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $_SESSION['msg'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
  <?php
   unset($_SESSION['msg']);
  endif; ?>


  <div class="title-pag">
   <h1>Meus Fornecedores</h1>
  </div>

  <!-- Conteúdo -->
  <table class="table">
   <thead>
    <tr>
     <th scope="col">#</th>
     <th scope="col">Nome</th>
     <th scope="col">Contato</th>
     <th scope="col">Descrição</th>
     <th scope="col">Status</th>
     <th scope="col">Ação</th>
     <th scope="col"><a style="font-size: 1.5rem;" href="<?= $BASE_URL ?>create.php" title="Adicionar"><i class="bi bi-person-add"></i></a></th>
    </tr>
   </thead>
   <tbody class="table-group-divider">
    <?php if (count($fornecedores) > 0): ?>
     <?php foreach ($fornecedores as $fornecedor): ?>
      <!-- Formatação de dados -->
      <?php $status = $fornecedor['status_fornecedor'] ?>
      <tr>
       <th scope="row"><?= $fornecedor['id'] ?></th>
       <td><?= $fornecedor['nome_fornecedor'] ?></td>
       <td><?= $fornecedor['contato_fornecedor'] ?></td>
       <td><?= $fornecedor['descricao_fornecedor'] ?></td>
       <td><span class="badge <?= ($status == 1) ? "text-bg-success" : "text-bg-danger"; ?> "><?= ($status == 1) ? "Ativo" : "Inativo"; ?></span></td>
       <td>
        <span><a href="<?= $BASE_URL ?>ver-fornecedor.php?id=<?= $fornecedor['id']; ?>"><i class="bi bi-eye"></i></a></span>

        <!-- Btn edit -->
        <span><a href="<?= $BASE_URL ?>edit-fornecedor.php?id=<?= $fornecedor['id']; ?>" style="font-size: .5rem;" class="btn btn-success btn-sm" type="submit"><i class="bi bi-pencil-square"></i></a></span>


        <!-- Btn Delete  -->
        <form action="<?= $BASE_URL ?>config/process.php" class="formDell" method="POST">
         <input type="hidden" name="type" value="apagar">
         <input type="hidden" name="id" value="<?= $fornecedor['id']; ?>">
         <span><button style="font-size: .5rem;" class="btn btn-dark btn-sm" type="submit"><i class="bi bi-trash3"></i></button></span>
        </form>
       </td>
       <td></td>
      </tr>
     <?php endforeach ?>
    <?php else: ?>
     <p style="color: red;">Nenhum fornecedor na lista ainda <a href="<?= $BASE_URL ?>create.php">Adicionar</a></p>
    <?php endif ?>
   </tbody>
  </table>
 </main>
</div>


<?php include_once("templates/footer.php"); ?>