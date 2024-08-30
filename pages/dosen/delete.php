<?php
$id_dosen = $_GET['id_dosen'];

$sql = "DELETE FROM dosen WHERE id_dosen = $id_dosen";

if ($db->query($sql) === TRUE) {
   echo "<script>alert('dosen deleted successfully.');window.location.href='index.php?page=pages/dosen/index';</script>";
} else {
   $error = "Error: " . $sql . "<br>" . $db->error;
}