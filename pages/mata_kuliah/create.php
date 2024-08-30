<?php
$prodi = $db->query("SELECT * FROM prodi");
$dosen = $db->query("SELECT * FROM dosen");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id_prodi =  $db->real_escape_string($_POST['id_prodi']);
   $id_dosen =  $db->real_escape_string($_POST['id_dosen']);
   $kd_matakuliah=  $db->real_escape_string($_POST['kd_matakuliah']);
   $nama_matakuliah =  $db->real_escape_string($_POST['nama_matakuliah']);
   $sks =  $db->real_escape_string($_POST['sks']);

   // Insert ke database
   $sql = "INSERT INTO mata_kuliah (id_prodi, id_dosen, kd_matakuliah, nama_matakuliah) VALUES ('$id_prodi','$kd_matakuliah','$nama_matakuliah')";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('mata_kuliah created successfully.');window.location.href='index.php?page=pages/mata_kuliah/index';</script>";
   } else {
      $error = "Error: " . $sql . "<br>" . $db->error;
   }
}
?>

<h3 class="page-heading mb-4">Tambah</h3>
<div class="row">
   <div class="col-md-6">
      <div class="card">
         <div class="card-body">
            <h5 class="card-title mb-4">Inputkan data Mata Kuliah</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="id_prodi">Prodi</label>
                  <select name="prodi" id="prodi" class="form-control p-input" required>
                     <option value="">--select prodi</option>
                     <?php foreach($prodi as $item) :  ?>
                        <option value="<?= $item['id_prodi'] ?>"><?= $item['nama_prodi'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="id_dosen">Dosen</label>
                  <select name="dosen" id="dosen" class="form-control p-input" required>
                     <option value="">--select dosen</option>
                     <?php foreach($dosen as $item) :  ?>
                        <option value="<?= $item['id_dosen'] ?>"><?= $item['nama_dosen'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="kd_matakuliah">Kode Mata Kuliah</label>
                  <input type="text" class="form-control p-input" id="kd_matakuliah" placeholder="Masukkan kd_matakuliah " name="kd_matakuliah" required>
               </div>
               <div class="form-group">
                  <label for="nama_matakuliah">Nama Mata Kuliah </label>
                  <input type="text" class="form-control p-input" id="nama_matakuliah" placeholder="Masukkan nama_matakuliah" name="nama_matakuliah" required>
               </div>
               <div class="form-group">
                  <label for="sks">SKS </label>
                  <input type="number" class="form-control p-input" id="sks" placeholder="Masukkan harga product" name="sks" required>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>