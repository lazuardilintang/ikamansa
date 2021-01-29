<?php 
include '../../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>input data </title>
  <link rel="shortcut icon" href="../../gambar/1WebinarLogo-03.jpg">
	<link rel="stylesheet" type="text/css" href="../../boot/css/bootstrap.css">
</head>
<body>
<div class="container">
<form action="" method="post">
  <div class="form-group">
    <label for="kampus">NAMA KAMPUS</label>
    <input type="text" name="kampus" class="form-control" id="kampus" aria-describedby="kampus">
    <small id="kampus" class="form-text text-muted">masukan nama kampus dengan lengkap supaya tidak membingungkan</small>
  </div>
  <button type="submit" name="masukan" class="btn btn-primary">Submit</button>
  <button type="submit" name="kembali" class="btn btn-warning">Kembali</button>
</form>	
</div>
</body>
</html>
<?php 
if (isset($_POST['masukan'])) {
  $nama = htmlspecialchars(strtoupper($_POST['kampus']));
  if ($nama != "") {
     $cek = mysqli_num_rows(
          mysqli_query($koneksi,"SELECT * FROM minta WHERE nama = '$nama' "));
   if ($cek > 0){
    echo "<script>window.alert('nama universitas sudah ada nih !!')
    window.location='../'</script>";
    }else {
         mysqli_query($koneksi,"INSERT INTO minta VALUES ('','$nama')");
          echo "<script>window.alert('DATA SUDAH DISIMPAN')
          window.location='../'</script>";
    }
  }
}
if (isset($_POST['kembali'])) {
  header("location:../");
}
?>
