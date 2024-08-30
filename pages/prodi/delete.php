<<?php
$id_prodi = $_GET['id_prodi'];

$sql = "DELETE FROM prodi WHERE id_prodi = $id_prodi";

if ($db->query($sql) === TRUE) {
   echo "<script>alert('prodi deleted successfully.');window.location.href='index.php?page=pages/prodi/index';</script>";
} else {
   if ($db->errno == 1451) { // Kode kesalahan untuk foreign key constraint fails
      echo "<script>alert('Cannot delete this jurusan because it is referenced in other tables.');window.location.href='index.php?page=pages/jurusan/index';</script>";
  } else {
      $error = "Error: " . $sql . "<br>" . $db->error;
      echo "<script>alert('$error');window.location.href='index.php?page=pages/prodi/index';</script>";
  }
}