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
  <?php 
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"SELECT * FROM dekat WHERE id = '$id' ");
while ($ambil = mysqli_fetch_assoc($cek)) {
 ?>
<form action="" method="post">
  <div class="form-group">
    <label for="kampus">NAMA KAMPUS</label>
    <input type="text" name="kampus" class="form-control" id="kampus" required="required" aria-describedby="kampus" value="<?php echo $ambil['nama'] ?>">
    <small id="kampus" class="form-text text-muted">masukan nama kampus dengan lengkap supaya tidak membingungkan</small>
  </div>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input name="status" type="radio" aria-label="Checkbox for following text input" value="on">
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with checkbox" value="on" readonly="readonly">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input name="status" type="radio" aria-label="Checkbox for following text input" value="off">
    </div>
  </div>
  <input type="text" class="form-control" aria-label="Text input with checkbox" value="off" readonly="readonly">
</div>
  <div class="form-group">
    <label for="2019">JENIS JALUR MASUK</label>
    <input type="text" name="tes" class="form-control" id="tes" required="required" aria-describedby="tes" value="<?php echo $ambil['tes'] ?>"> 
    <small class="form-text text-muted">isi dengan jelas dan jangan disingkat</small>
  </div>
  <div class="form-group">
    <label for="2019">Tanggal pelaksanaan (tahun-bulan-tanggal)</label>
    <input type="text"  name="tanggal" value="<?php echo $ambil['tanggal'] ?>" class="form-control datepicker"  required/>
    <small id="tanggal" class="form-text text-muted" >isi dengan jelas dan jangan disingkat</small> 
  </div>
   <div class="form-group">
    <label for="2019">Tanggal Penutupan (tahun-bulan-tanggal)</label>
    <input type="text"  name="akhir" value="<?php echo $ambil['akhir'] ?>" class="form-control datepicker"  required/>
    <small id="tanggal" class="form-text text-muted" >isi dengan jelas dan jangan disingkat</small> 
  </div>
  <div class="form-group">
    <label for="url">masukan URL website Yang Mengandung Pengumuman</label>
    <input type="text" name="url" class="form-control" id="url" value="<?php echo $ambil['url'] ?>" required="required" aria-describedby="nama">
    <small id="url" class="form-text text-muted">masukan URL dengan lengkap contoh : https://admisi.ipb.ac.id/info-seleksi-masuk-sv-ipb/</small>
  </div>
  <button type="submit" name="masukan" class="btn btn-primary">Submit</button>
</form>
<?php } ?>
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
  $nama = htmlspecialchars(strtoupper($_POST['kampus']));
  $status = $_POST['status'];
  $tes = htmlspecialchars($_POST['tes']);
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $akhir = htmlspecialchars($_POST['akhir']);
  $url = htmlspecialchars($_POST['url']);
      if(filter_var($url, FILTER_VALIDATE_URL)){
         mysqli_query($koneksi,"UPDATE dekat SET nama= '$nama', status = '$status', tes='$tes', tanggal='$tanggal', akhir= '$akhir' ,url='$url' WHERE id = '$id' ");
          echo "<script>window.alert('DATA SUDAH DISIMPAN')
          window.location='index.php'</script>";
       } else{
            echo "<script>window.alert('masukan URL web dengan baik')</script>";
          }
}
 ?>