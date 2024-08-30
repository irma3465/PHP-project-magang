<?php
$prodi = $db->query("SELECT * FROM prodi");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id_prodi =  $db->real_escape_string($_POST['id_prodi']);
   $nama_mahasiswa =  $db->real_escape_string($_POST['nama_mahasiswa']);
   $nim =  $db->real_escape_string($_POST['nim']);
   $email =  $db->real_escape_string($_POST['email']);
   $tgl_lahir =  $db->real_escape_string($_POST['tgl_lahir']);
   $semester =  $db->real_escape_string($_POST['semester']);
   $alamat =  $db->real_escape_string($_POST['alamat']);


   // Insert ke database
   $sql = "INSERT INTO mahasiswa (id_prodi, nama_mahasiswa, nim, email, tgl_lahir,semester,alamat) VALUES ('$id_prodi','$nama_mahasiswa','$nim','$email','$tgl_lahir','$semester','$alamat')";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('mahasiswa created successfully.');window.location.href='index.php?page=pages/mahasiswa/index';</script>";
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
            <h5 class="card-title mb-4">Inputkan data mahasiswa</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="id_prodi">Prodi </label>
                  <select name="id_prodi" id="id_prodi" class="form-control p-input" required>
                     <option value="">--select prodi</option>
                     <?php foreach($prodi as $item) :  ?>
                        <option value="<?= $item['id_prodi'] ?>"><?= $item['nama_prodi'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="nama_mahasiswa">Nama Mahasiswa</label>
                  <input type="text" class="form-control p-input" id="nama_mahasiswa" placeholder="Masukkan nama_mahasiswa" name="nama_mahasiswa" required>
               </div>
               <div class="form-group">
                  <label for="nim">NIM </label>
                  <input type="number" class="form-control p-input" id="nim" placeholder="Masukkan nim" name="nim" required>
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control p-input" id="email" placeholder="Masukkan email" name="email" required>
               </div>
               <div class="form-group">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control p-input" id="tgl_lahir" placeholder="Masukkan tgl_lahir" name="tgl_lahir" required>
               </div>
               <div class="form-group">
                  <label for="semester">Semester</label>
                  <input type="number" class="form-control p-input" id="semester" placeholder="Masukkan semester" name="semester" required>
               </div>
               <div class="form-group">
                  <label for="alamat">Alamat </label>
                  <input type="text" class="form-control p-input" id="alamat" placeholder="Masukkan alamat" name="alamat" required>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>