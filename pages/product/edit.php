<?php
$id_product = $_GET['id_product'];
$kategori = $db->query("SELECT * FROM kategori");
$product = $db->query("SELECT * FROM product WHERE id_product = '$id_product'");
$product = $product->fetch_assoc();
if (empty($product)) {
   echo "<script>alert('product not found.');window.location.href='index.php?page=pages/product/index';</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kategori =  $db->real_escape_string($_POST['id_kategori']);
    $nama_product =  $db->real_escape_string($_POST['nama_product']);
    $harga_product =  $db->real_escape_string($_POST['harga_product']);
    $deskripsi_product =  $db->real_escape_string($_POST['deskripsi_product']);
    $stock_product =  $db->real_escape_string($_POST['stock_product']);
 

   // Update prodi
   $sql = "UPDATE product SET id_kategori='$id_kategori', nama_product = '$nama_product', deskripsi_product='$deskripsi_product',harga_product='$harga_product', stock_product='$stock_product' WHERE id_product = $id_product";
   if ($db->query($sql) === TRUE) {
      echo "<script>alert('product updated successfully.');window.location.href='index.php?page=pages/product/index';</script>";
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
            <h5 class="card-title mb-4">Update data product</h5>
            <?php if (isset($error)): ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endif; ?>
            <form action="" method="post">
            <div class="form-group">
                  <label for="nama_product">Kategori Product </label>
                  <select name="id_kategori" id="" class="form-control p-input" required>
                     <option value="">--select kategori</option>
                     <?php foreach($kategori as $item) :  ?>
                        <option value="<?= $item['id_kategori'] ?>" <?php echo $item['id_kategori'] == $product['id_kategori'] ? 'selected' : '' ?>><?= $item['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                  </select>
               </div>
               <div class="form-group">
                  <label for="nama_product">Nama Product </label>
                  <input type="text" class="form-control p-input" id="nama_product" placeholder="Masukkan nama product" name="nama_product" required value="<?=$product['nama_product']?>">
               </div>
               <div class="form-group">
                  <label for="deskripsi_product">Deskripsi Product </label>
                  <input type="text" class="form-control p-input" id="deskripsi_product" placeholder="Masukkan deskripsi product" name="deskripsi_product" required value="<?=$product['deskripsi_product']?>">
               </div>
               <div class="form-group">
                  <label for="harga_product">Harga Product </label>
                  <input type="int" class="form-control p-input" id="harga_product" placeholder="Masukkan harga product" name="harga_product" required value="<?=$product['harga_product']?>">
               </div>
               <div class="form-group">
                  <label for="stock_product">Stock Product </label>
                  <input type="int" class="form-control p-input" id="stock_product" placeholder="Masukkan stock product" name="stock_product" required value="<?=$product['stock_product']?>">
               </div>
                  <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Update</button>
            </form>
         </div>
      </div>
   </div>
</div>