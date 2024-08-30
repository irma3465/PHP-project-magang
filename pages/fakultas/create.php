<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $nama_fakultas =  $db->real_escape_string($_POST['nama_fakultas']);
   $alamat_fakultas =  $db->real_escape_string($_POST['alamat_fakultas']);
  
   // Insert ke database
   $sql = "INSERT INTO fakultas (nama_fakultas,alamat_fakultas) VALUES ('$nama_fakultas','$alamat_fakultas')";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('fakultas created successfully.');window.location.href='index.php?page=pages/fakultas/index';</script>";
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
            <h5 class="card-title mb-4">Inputkan data Fakultas</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post">
               <div class="form-group">
                  <label for="nama_fakultas">Nama Fakultas </label>
                  <input type="text" class="form-control p-input" id="nama_fakultas" placeholder="Masukkan nama fakultas" name="nama_fakultas" required>
               </div>
               <div class="form-group">
                  <label for="alamat_fakultas">Alamat Fakultas</label>
                  <input type="text" class="form-control p-input" id="alamat_fakultas" placeholder="Masukkan alamat fakultas" name="alamat_fakultas" required>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>