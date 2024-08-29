<?php
$kategori = $db->query("SELECT * FROM kategori");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id_kategori =  $db->real_escape_string($_POST['id_kategori']);
   $nama_product =  $db->real_escape_string($_POST['nama_product']);
   $harga_product =  $db->real_escape_string($_POST['harga_product']);
   $deskripsi_product =  $db->real_escape_string($_POST['deskripsi_product']);
   $stock_product =  $db->real_escape_string($_POST['stock_product']);

   $namaFile = $_FILES['img']['name'];
   $tmpName = $_FILES['img']['tmp_name'];

   $generateUniqueName = uniqid("",true).$namaFile;
   // simpan ke project//
   $filedestination = 'uploads/'.$generateUniqueName;
   move_uploaded_file($tmpName,$filedestination);

   // Insert ke database
   $sql = "INSERT INTO product (id_kategori, nama_product, deskripsi_product, harga_product, stock_product,img) VALUES ('$id_kategori','$nama_product','$deskripsi_product', '$harga_product','$stock_product','$generateUniqueName')";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('Product created successfully.');window.location.href='index.php?page=pages/product/index';</script>";
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
            <h5 class="card-title mb-4">Inputkan data Product</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="id_kategori">Kategori Product </label>
                  <select name="id_kategori" id="id_kategori" class="form-control p-input" required>
                     <option value="">--select kategori</option>
                     <?php foreach($kategori as $item) :  ?>
                        <option value="<?= $item['id_kategori'] ?>"><?= $item['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="nama_product">Nama Product </label>
                  <input type="text" class="form-control p-input" id="nama_product" placeholder="Masukkan nama product" name="nama_product" required>
               </div>
               <div class="form-group">
                  <label for="nama_product">Img </label>
                  <input type="file" class="form-control p-input" id="img" placeholder="Masukkan nama img" name="img" required>
               </div>
               <div class="form-group">
                  <label for="deskripsi_product">Deskripsi Product </label>
                  <input type="text" class="form-control p-input" id="deskripsi_product" placeholder="Masukkan deskripsi product" name="deskripsi_product" required>
               </div>
               <div class="form-group">
                  <label for="harga_product">Harga Product </label>
                  <input type="number" class="form-control p-input" id="harga_product" placeholder="Masukkan harga product" name="harga_product" required>
               </div>
               <div class="form-group">
                  <label for="stock_product">Stock Product </label>
                  <input type="number" class="form-control p-input" id="stock_product" placeholder="Masukkan stock product" name="stock_product" required>
               </div>
               <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Submit</button>
            </form>
         </div>
      </div>
   </div>
</div>