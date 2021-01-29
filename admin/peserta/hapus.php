<?php 
include '../../koneksi/koneksi.php';
 
$id = $_GET['id'];

$cek = mysqli_query($koneksi,"DELETE FROM formulir WHERE id = $id ");

if ($cek) {
	echo "<script>window.alert('DATA SUDAH DIHAPUS')
    window.location='index.php'</script>";
    }

 ?>