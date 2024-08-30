<?php
$id_jurusan = $_GET['id_jurusan'];

$sql = "DELETE FROM jurusan WHERE id_jurusan = $id_jurusan";

if ($db->query($sql) === TRUE) {
   echo "<script>alert('jurusan deleted successfully.');window.location.href='index.php?page=pages/jurusan/index';</script>";
} else {
   $error = "Error: " . $sql . "<br>" . $db->error;
}