<?php
$id_jurusan = $_GET['id_jurusan'];
$fakultas = $db->query("SELECT * FROM fakultas");
$jurusan = $db->query("SELECT * FROM jurusan WHERE id_jurusan = '$id_jurusan'");
$jurusan = $jurusan->fetch_assoc();
if (empty($jurusan)) {
   echo "<script>alert('jurusan not found.');window.location.href='index.php?page=pages/jurusan/index';</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_fakultas =  $db->real_escape_string($_POST['id_fakultas']);
    $nama_jurusan =  $db->real_escape_string($_POST['nama_jurusan']);

   // Update prodi
   $sql = "UPDATE jurusan SET id_fakultas='$id_fakultas', nama_jurusan = '$nama_jurusan' WHERE id_jurusan = $id_jurusan";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('jurusan updated successfully.');window.location.href='index.php?page=pages/jurusan/index';</script>";
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
            <h5 class="card-title mb-4">Update data jurusan</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post">
            <div class="form-group">
                  <label for="nama_jurusan">Fakultas </label>
                  <select name="id_fakultas" id="" class="form-control p-input" required>
                     <option value="">--select fakultas</option>
                     <?php foreach($fakultas as $item) :  ?>
                        <option value="<?= $item['id_fakultas'] ?>" <?php echo $item['id_fakultas'] == $jurusan['id_fakultas'] ? 'selected' : '' ?>><?= $item['nama_fakultas'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="nama_jurusan">Nama Jurusan </label>
                  <input type="text" class="form-control p-input" id="nama_jurusan" placeholder="Masukkan nama jurusan" name="nama_jurusan" required value="<?=$jurusan['nama_jurusan']?>">
               </div>
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Update</button>
            </form>
         </div>
      </div>
   </div>
</div>