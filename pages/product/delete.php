<?php
$id_product = $_GET['id_product'];

$sql = "DELETE FROM product WHERE id_product = $id_product";

if ($db->query($sql) === TRUE) {
   echo "<script>alert('Product deleted successfully.');window.location.href='index.php?page=pages/product/index';</script>";
} else {
   $error = "Error: " . $sql . "<br>" . $db->error;
}