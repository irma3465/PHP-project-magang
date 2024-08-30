<?php
$id_prodi = $_GET['id_prodi'];
$jurusan = $db->query("SELECT * FROM jurusan");
$prodi = $db->query("SELECT * FROM prodi WHERE id_prodi = '$id_prodi'");
$prodi = $prodi->fetch_assoc();
if (empty($prodi)) {
   echo "<script>alert('prodi not found.');window.location.href='index.php?page=pages/prodi/index';</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_jurusan =  $db->real_escape_string($_POST['id_jurusan']);
    $nama_prodi =  $db->real_escape_string($_POST['nama_prodi']);

   // Update prodi
   $sql = "UPDATE prodi SET id_jurusan='$id_jurusan', nama_prodi = '$nama_prodi' WHERE id_prodi = $id_prodi";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('prodi updated successfully.');window.location.href='index.php?page=pages/prodi/index';</script>";
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
            <h5 class="card-title mb-4">Update data prodi</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post">
            <div class="form-group">
                  <label for="id_jurusan">Jurusan</label>
                  <select name="id_jurusan" id="id_jurusan" class="form-control p-input" required>
                     <option value="">--select jurusan</option>
                     <?php foreach($jurusan as $item) :  ?>
                        <option value="<?= $item['id_jurusan'] ?>"><?= $item['nama_jurusan'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="nama_prodi">Nama Prodi </label>
                  <input type="text" class="form-control p-input" id="nama_prodi" placeholder="Masukkan nama prodi" name="nama_prodi" required value="<?=$product['nama_prodi']?>">
               </div>
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Update</button>
            </form>
         </div>
      </div>
   </div>
</div>