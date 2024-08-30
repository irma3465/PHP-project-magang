<?php
$sql = "SELECT * FROM dosen ORDER BY nama_dosen ASC";
$result = $db->query($sql);
?>

<h3 class="page-heading mb-4">#Aksesoris</h3>

<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-start">
               <h5 class="card-title mb-4">List Data Aksesoris</h5>
               <p class="ml-3">
                  <a href="?page=pages/dosen/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah dosen</a>
               </p>
            </div>
            <div class="table-responsive">
               <table class="table center-aligned-table">
                  <thead>
                     <tr class="text-primary">
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama dosen</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>#Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($result as $key => $value) : ?>
                        <tr>
                           <td><?= $key + 1 ?></td>
                           <td><?= ucfirst($value["nip"]) ?></td>
                           <td><?= ucfirst($value["nama_dosen"]) ?></td>
                           <td><?= ucfirst($value["email"]) ?></td>
                           <td><?= ucfirst($value["password"]) ?></td>
                           <td><?= ucfirst($value["no_telp"]) ?></td>
                           <td><?= ucfirst($value["alamat"]) ?></td>
                           <td>
                              <a href="?page=pages/dosen/edit&id_dosen=<?= $value["id_dosen"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a onclick="return confirm('Yakinn?')" href="?page=pages/dosen/delete&id_dosen=<?= $value["id_dosen"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Remove</a>
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