<?php
$id_fakultas = $_GET['id_fakultas'];
$fakultas = $db->query("SELECT * FROM fakultas WHERE id_fakultas = $id_fakultas");
$fakultas = $fakultas->fetch_assoc();
if (empty($fakultas)) {
   echo "<script>alert('fakultas not found.');window.location.href='index.php?page=pages/fakultas/index';</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $nama_fakultas =  $db->real_escape_string($_POST['nama_fakultas']);
   $alamat_fakultas =  $db->real_escape_string($_POST['alamat_fakultas']);


   // Update prodi
   $sql = "UPDATE fakultas SET nama_fakultas = '$nama_fakultas' WHERE id_fakultas = $id_fakultas";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('fakultas updated successfully.');window.location.href='index.php?page=pages/fakultas/index';</script>";
   } else {
      $error = "Error: " . $sql . "<br>" . $db->error;
   }
}
?>

<h3 class="page-heading mb-4">Edit</h3>
<div class="row">
   <div class="col-md-6">
      <div class="card">
         <div class="card-body">
            <h5 class="card-title mb-4">Update data fakultas</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post">
            <form action="" method="post">
            <div class="form-group">
                  <label for="nama_fakultas">Nama Fakultas </label>
                  <input type="text" class="form-control p-input" id="nama_fakultas" placeholder="Masukkan nama fakultas" name="nama_fakultas" required>
               </div>
               <div class="form-group">
                  <label for="alamat_fakultas">Alamat Fakultas</label>
                  <input type="text" class="form-control p-input" id="alamat_fakultas" placeholder="Masukkan alamat fakultas" name="alamat_fakultas" required>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Update</button>
            </form>
         </div>
      </div>
   </div>
</div>