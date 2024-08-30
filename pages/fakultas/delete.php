<?php
$id_fakultas = $_GET['id_fakultas'];

$sql = "DELETE FROM fakultas WHERE id_fakultas = $id_fakultas";

if ($db->query($sql) === TRUE) {
   echo "<script>alert('fakultas deleted successfully.');window.location.href='index.php?page=pages/fakultas/index';</script>";
} else {
   $error = "Error: " . $sql . "<br>" . $db->error;
}
