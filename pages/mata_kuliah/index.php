<?php
$sql = "SELECT * FROM mata_kuliah JOIN prodi ON mata_kuliah.id_prodi=prodi.id_prodi JOIN dosen ON mata_kuliah.id_dosen=dosen.id_dosen ORDER BY nama_matakuliah ASC";
$result = $db->query($sql);
?>

<h3 class="page-heading mb-4">Mata Kuliah</h3>

<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <h5 class="card-title mb-4">List Data Mata  Kuliah</h5>
               <p class="ml-3">
                  <a href="?page=pages/mata_kuliah/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah mata kuliah</a>
               </p>
            </div>
            <div class="table-responsive">
               <table class="table center-aligned-table">
                  <thead>
                     <tr class="text-primary">
                        <th>No.</th>
                        <th>Prodi</th>
                        <th>Dosen</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th style="width:25%">#Aksi</th>
                     </tr>
                    
                  </thead>
                  <tbody>
                     <?php foreach ($result as $key => $value) : ?>
                        <tr>
                           <td><?= $key + 1 ?></td>
                           <td><?= ucfirst($value["nama_prodi"]) ?></td>
                           <td><?= ucfirst($value["nama_dosen"]) ?></td>
                           <td><?= ucfirst($value["kd_matakuliah"]) ?></td>
                           <td><?= ucfirst($value["nama_matakuliah"]) ?></td>
                           <td><?= ucfirst($value["sks"]) ?></td>
                           <td>
                              <a href="?page=pages/mata_kuliah/edit&id_matakuliah=<?= $value["id_matakuliah"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a onclick="return confirm('Yakinn?')" href="?page=pages/mata_kuliah/delete&id_matakuliah=<?= $value["id_matakuliah"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Remove</a>
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