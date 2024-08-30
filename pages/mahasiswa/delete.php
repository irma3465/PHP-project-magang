<?php
$id_mahasiswa = $_GET['id_mahasiswa'];

$sql = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

if ($db->query($sql) === TRUE) {
   echo "<script>alert('mahasiswa deleted successfully.');window.location.href='index.php?page=pages/mahasiswa/index';</script>";
} else {
    if ($db->errno == 1451) { // Kode kesalahan untuk foreign key constraint fails
        echo "<script>alert('Cannot delete this mahasiswa because it is referenced in other tables.');window.location.href='index.php?page=pages/mahasiswa/index';</script>";
    } else {
        $error = "Error: " . $sql . "<br>" . $db->error;
        echo "<script>alert('$error');window.location.href='index.php?page=pages/mahasiswa/index';</script>";
    }
}