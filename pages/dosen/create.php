<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $nip =  $db->real_escape_string($_POST['nip']);
   $nama_dosen =  $db->real_escape_string($_POST['nama_dosen']);
   $email =  $db->real_escape_string($_POST['email']);
   $password =  $db->real_escape_string($_POST['password']);
   $no_telp =  $db->real_escape_string($_POST['no_telp']);
   $alamat =  $db->real_escape_string($_POST['alamat']);

   // Insert ke database
   $sql = "INSERT INTO dosen (nip,nama_dosen, email, password, no_telp, alamat) VALUES ('$nip','$nama_dosen','$email','$password','$no_telp','$alamat')";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('dosen created successfully.');window.location.href='index.php?page=pages/dosen/index';</script>";
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
            <h5 class="card-title mb-4">Inputkan data Dosen</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post">
               <div class="form-group">
                  <label for="nip">NIP</label>
                  <input type="text" class="form-control p-input" id="nip" placeholder="Masukkan nip" name="nip" required>
               </div>
               <div class="form-group">
                  <label for="nama_dosen">Nama Dosen</label>
                  <input type="text" class="form-control p-input" id="nama_dosen" placeholder="Masukkan nama_dosen" name="nama_dosen" required>
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control p-input" id="email" placeholder="Masukkan email" name="email" required>
               </div>
               <div class="form-group">
                  <label for="password">Password </label>
                  <input type="text" class="form-control p-input" id="password" placeholder="Masukkan password" name="password" required>
               </div>
               <div class="form-group">
                  <label for="no_telp">No Telp</label>
                  <input type="number" class="form-control p-input" id="no_telp" placeholder="Masukkan no_telp" name="no_telp" required>
               </div>
               <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control p-input" id="alamat" placeholder="Masukkan alamat" name="alamat" required>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>