<?php
$sql = "SELECT * FROM mahasiswa JOIN prodi ON mahasiswa.id_prodi=prodi.id_prodi ORDER BY nama_mahasiswa ASC";
$result = $db->query($sql);
?>

<h3 class="page-heading mb-4">Mahasiswa</h3>

<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <h5 class="card-title mb-4">List Data Mahasiswa</h5>
               <p class="ml-3">
                  <a href="?page=pages/mahasiswa/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah mahasiswa</a>
               </p>
            </div>
            <div class="table-responsive">
               <table class="table center-aligned-table">
                  <thead>
                     <tr class="text-primary">
                        <th>No.</th>
                        <th>Nama Prodi</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Tanggal Lahir</th>
                        <th>Semester</th>
                        <th>Alamat</th>
                        <th style="width:25%">#Aksi</th>
                     </tr>
                    
                  </thead>
                  <tbody>
                     <?php foreach ($result as $key => $value) : ?>
                        <tr>
                           <td><?= $key + 1 ?></td>
                           <td><?= ucfirst($value["nama_prodi"]) ?></td>
                           <td><?= ucfirst($value["nama_mahasiswa"]) ?></td>
                           <td><?= ucfirst($value["nim"]) ?></td>
                           <td><?= ucfirst($value["email"]) ?></td>
                           <td><?= ucfirst($value["tgl_lahir"]) ?></td>
                           <td><?= ucfirst($value["semester"]) ?></td>
                           <td><?= ucfirst($value["alamat"]) ?></td>
                           <td>
                              <a href="?page=pages/mahasiswa/edit&id_mahasiswa=<?= $value["id_mahasiswa"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a onclick="return confirm('Yakinn?')" href="?page=pages/mahasiswa/delete&id_mahasiswa=<?= $value["id_mahasiswa"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Remove</a>
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