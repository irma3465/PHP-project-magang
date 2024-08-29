<?php
$sql = "SELECT * FROM product JOIN kategori ON product.id_kategori=kategori.id_kategori ORDER BY nama_product ASC";
$result = $db->query($sql);
?>

<h3 class="page-heading mb-4">Product Aksesoris</h3>

<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <h5 class="card-title mb-4">List Data Product Aksesoris</h5>
               <p class="ml-3">
                  <a href="?page=pages/product/create" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Product</a>
               </p>
            </div>
            <div class="table-responsive">
               <table class="table center-aligned-table">
                  <thead>
                     <tr class="text-primary">
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Img</th>
                        <th>Nama Product</th>
                        <th>Deskripsi Product</th>
                        <th>Harga Product</th>
                        <th>Stock Produck</th>
                        <th style="width:25%">#Aksi</th>
                     </tr>
                    
                  </thead>
                  <tbody>
                     <?php foreach ($result as $key => $value) : ?>
                        <tr>
                           <td><?= $key + 1 ?></td>
                           <td><?= ucfirst($value["nama_kategori"]) ?></td>
                        <td>
                           <?php if($value ['img']==null):?>
                              <i>No Image</i>
                              <?php else: ?>
                                 <img src="uploads/<?= $value['img'] ?>" alt="" width="50" height="50">
                                 <?php endif ?>
                           <td><?= ucfirst($value["nama_product"]) ?></td>
                           <td><?= ucfirst($value["deskripsi_product"]) ?></td>
                           <td><?= ucfirst($value["harga_product"]) ?></td>
                           <td><?= ucfirst($value["stock_product"]) ?></td>
                           <td>
                              <a href="?page=pages/product/edit&id_product=<?= $value["id_product"] ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                              <a onclick="return confirm('Yakinn?')" href="?page=pages/product/delete&id_product=<?= $value["id_product"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Remove</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>