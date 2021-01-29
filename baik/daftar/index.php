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
    <input type="text" name="kampus" class="form-control" id="kampus" required="required" aria-describedby="kampus">
    <small id="kampus" class="form-text text-muted">masukan nama kampus dengan lengkap supaya tidak membingungkan</small>
  </div>
  <div class="form-group">
  <label for="jenis">Kategori Perguruan</label>
  <select name="jenis" class="form-control">
    <option>UNIVERSITAS/INSTITUT</option>
    <option>POLITEKNIK</option>
    <option>IAIN</option>
    <option>UIN</option>
    <option>PTS</option>
    <option>KEDINASAN</option>
    <option>IKATAN DINAS</option>
    <option>ANGKATAN LAUT</option>
    <option>ANGKATAN DARAT</option>
    <option>ANGKATAN UDARA</option>
    <option>POLISI</option>
  </select>
  </div>
  <div class="form-group">
    <label for="2019">CONTOH MASUKAN JENIS DAN TANGGAL SELEKSI</label>
    <textarea style="resize:none;width:100%;height:300px;" class="form-control" readonly>
    	SNMPTN : 16 FEBRUARI 
    	UTBK : 15 MARET 
    	UTM : 17 DESEMBER 
    	BUD : 20 MARET 
    	DLL...
    </textarea>
    <small id="nama" class="form-text text-muted">isi dengan jelas dan jangan disingkat</small>
  </div>
  
  <div class="form-group">
    <label for="2019">JENIS DAN TANGGAL SELESI MASUK TAHUN 2019</label>
    <textarea style="resize:none;width:100%;height:300px;" required="required" class="form-control" name="2019"></textarea> 	
    <small class="form-text text-muted">isi dengan jelas dan jangan disingkat</small>
  </div>
  <div class="form-group">
    <label for="2019">JENIS DAN TANGGAL SELESI MASUK TAHUN 2020</label>
    <textarea style="resize:none;width:100%;height:300px;" required="required" class="form-control" name="2020"></textarea>
    <small id="nama" class="form-text text-muted">isi dengan jelas dan jangan disingkat</small>	
  </div>
  <div class="form-group">
    <label for="url">masukan URL website resmi kampus</label>
    <input type="text" name="url" class="form-control" id="url" required="required" aria-describedby="nama">
    <small id="url" class="form-text text-muted">masukan URL dengan lengkap contoh : https://www.ui.ac.id/</small>
  </div>
  <div class="form-group">
    <label for="url">masukan URL IG resmi kampus</label>
    <input type="text" name="urlig" class="form-control" id="url" required="required" aria-describedby="nama">
    <small id="url" class="form-text text-muted">masukan URL dengan lengkap contoh : https://www.instagram.com/univ_indonesia/</small>
  </div>
  <button type="submit" name="masukan" class="btn btn-primary">Submit</button>
</form>	
</div>
</body>
</html>
<?php 
if (isset($_POST['masukan'])) {
  $nama = htmlspecialchars(strtoupper($_POST['kampus']));
  $jenis = htmlspecialchars($_POST['jenis']);
  $awal = htmlspecialchars(strtoupper($_POST['2019']));
  $akhir = htmlspecialchars(strtoupper($_POST['2020']));
  $url = htmlspecialchars($_POST['url']);
  $urlig = htmlspecialchars($_POST['urlig']);


   $cek = mysqli_num_rows(
          mysqli_query($koneksi,"SELECT * FROM daftar WHERE nama = '$nama' "));
   if ($cek > 0){
    echo "<script>window.alert('nama universitas sudah ada nih !!')
    window.location='input.php'</script>";
    }else {
      if(filter_var($url, FILTER_VALIDATE_URL)){
        if(filter_var($urlig, FILTER_VALIDATE_URL)){
         mysqli_query($koneksi,"INSERT INTO daftar VALUES ('','$nama','$jenis','$awal','$akhir','$url','$urlig')");
          echo "<script>window.alert('DATA SUDAH DISIMPAN')
          window.location='../../index.php'</script>"; }
          else{
            echo "<script>window.alert('masukan URL IG dengan baik')</script>";
          }
       } else{
            echo "<script>window.alert('masukan URL web dengan baik')</script>";
          }
    }
    
}
 ?>