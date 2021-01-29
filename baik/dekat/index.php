<?php 
include '../../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>input data </title>
  <link rel="shortcut icon" href="../../gambar/1WebinarLogo-03.jpg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../../boot/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="../../boot/datepicker.css">
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
    <label for="2019">JENIS JALUR MASUK</label>
    <input type="text" name="tes" class="form-control" id="tes" required="required" aria-describedby="tes"> 
    <small class="form-text text-muted">isi dengan jelas dan jangan disingkat</small>
  </div>
  <div class="form-group">
    <label for="2019">Tanggal pelaksanaan (tahun-bulan-tanggal)</label>
    <input type="text"  name="tanggal"  class="form-control datepicker"  required/>
    <small id="tanggal" class="form-text text-muted">isi dengan jelas dan jangan disingkat</small> 
  </div>
  <div class="form-group">
    <label for="2019">Tanggal Penutupan (tahun-bulan-tanggal)</label>
    <input type="text"  name="akhir" class="form-control datepicker"  required/>
    <small id="tanggal" class="form-text text-muted" >isi dengan jelas dan jangan disingkat</small> 
  </div>
  <div class="form-group">
    <label for="url">masukan URL website Yang Mengandung Pengumuman</label>
    <input type="text" name="url" class="form-control" id="url" required="required" aria-describedby="nama">
    <small id="url" class="form-text text-muted">masukan URL dengan lengkap contoh : https://admisi.ipb.ac.id/info-seleksi-masuk-sv-ipb/</small>
  </div>
  <button type="submit" name="masukan" class="btn btn-primary">Submit</button>
</form> 
</div>
</body>
<script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
    </script>
</html>
<?php 
if (isset($_POST['masukan'])) {
  $status = 'off';
  $nama = htmlspecialchars(strtoupper($_POST['kampus']));
  $tes = htmlspecialchars($_POST['tes']);
  $tanggal = $_POST['tanggal'];
  $akhir = htmlspecialchars($_POST['akhir']);
  $url = htmlspecialchars($_POST['url']);
      if(filter_var($url, FILTER_VALIDATE_URL)){
         mysqli_query($koneksi,"INSERT INTO dekat VALUES ('','$nama','$status','$tes','$tanggal','$akhir','$url')");
          echo "<script>window.alert('DATA SUDAH DISIMPAN')
          window.location='../../'</script>";
       } else{
            echo "<script>window.alert('masukan URL web dengan baik')</script>";
          }
}
 ?>