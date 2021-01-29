<?php 
include '../koneksi/koneksi.php';
 
$id = $_GET['id'];

$cek = mysqli_query($koneksi,"DELETE FROM minta WHERE id_minta = $id ");

if ($cek) {
	echo "<script>window.alert('DATA SUDAH DIHAPUS')
    window.location='index.php'</script>";
    }

 ?>