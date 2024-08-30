<?php
$sql = "SELECT * FROM fakultas ORDER BY nama_fakultas ASC";
$result = $db->query($sql);
?>

<h3 class="page-heading mb-4">Fakultas</h3>

<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-start">
               <h5 class="card-title mb-4">List Data Fakultas</h5>
               <p class="ml-3">
                  <a href="?page=pages/fakultas/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Fakultas</a>
               </p>
            </div>
            <div class="table-responsive">
               <table class="table center-aligned-table">
                  <thead>
                     <tr class="text-primary">
                        <th>No.</th>
                        <th>Id Fakultas</th>
                        <th>Nama Fakultas</th>
                        <th>Alamat Fakultas</th>
                        <th>#Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($result as $key => $value) : ?>
                        <tr>
                           <td><?= $key + 1 ?></td>
                           <td><?= ucfirst($value["id_fakultas"]) ?></td>
                           <td><?= ucfirst($value["nama_fakultas"]) ?></td>
                           <td><?= ucfirst($value["alamat_fakultas"]) ?></td>
                           <td>
                              <a href="?page=pages/fakultas/edit&id_fakultas=<?= $value["id_fakultas"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a onclick="return confirm('Yakinn?')" href="?page=pages/fakultas/delete&id_fakultas=<?= $value["id_fakultas"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Remove</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>