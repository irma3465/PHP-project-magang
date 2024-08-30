<?php
$fakultas = $db->query("SELECT * FROM fakultas");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id_fakultas =  $db->real_escape_string($_POST['id_fakultas']);
   $nama_jurusan =  $db->real_escape_string($_POST['nama_jurusan']);

   // Insert ke database
   $sql = "INSERT INTO jurusan (id_fakultas, nama_jurusan) VALUES ('$id_fakultas','$nama_jurusan')";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('jurusan created successfully.');window.location.href='index.php?page=pages/jurusan/index';</script>";
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
            <h5 class="card-title mb-4">Inputkan data Jurusan</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="id_fakultas">Fakultas</label>
                  <select name="id_fakultas" id="id_fakultas" class="form-control p-input" required>
                     <option value="">--select fakultas</option>
                     <?php foreach($fakultas as $item) :  ?>
                        <option value="<?= $item['id_fakultas'] ?>"><?= $item['nama_fakultas'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="nama_jurusan">Nama Jurusan</label>
                  <input type="text" class="form-control p-input" id="nama_jurusan" placeholder="Masukkan nama jurusan" name="nama_jurusan" required>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>