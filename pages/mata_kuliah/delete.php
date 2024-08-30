<?php
$id_matakuliah = $_GET['id_matakuliah'];

$sql = "DELETE FROM matakuliah WHERE id_matakuliah = $id_matakuliah";

if ($db->query($sql) === TRUE) {
   echo "<script>alert('matakuliah deleted successfully.');window.location.href='index.php?page=pages/matakuliah/index';</script>";
} else {
   $error = "Error: " . $sql . "<br>" . $db->error;
}