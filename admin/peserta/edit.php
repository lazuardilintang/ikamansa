<?php 
include '../../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>input data </title>
  <link rel="shortcut icon" href="../../gambar/1WebinarLogo-03.jpg">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <?php 
  $id = $_GET['id'];
  $ambil = mysqli_query($koneksi,"SELECT *FROM formulir where id = '$id' ");
  while ($cek = mysqli_fetch_assoc($ambil)) {
   ?>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <img class="container" width="150 px" src="../gambar/2.1WebnarLogo-04.png" title="ikamansa">
  </div>
  <div class="form-group">
    <label for="nama">NAMA LENGKAP</label>
    <input type="text" readonly="readonly" name="nama" class="form-control" id="nama" value="<?php echo $cek['nama'] ?>" aria-describedby="nama" >
    <small id="nama" class="form-text text-muted">masukan nama lengkap dengan Jelas supaya tidak membingungkan</small>
  </div>
  <div class="form-group">
    <label for="sekolah">NAMA SEKOLAHAN</label>
    <input type="text" readonly="readonly" name="sekolah" value="<?php echo $cek['asal'] ?>" class="form-control" id="sekolah" aria-describedby="sekolah">
    <small id="sekolah" class="form-text text-muted">masukan nama sekolah dengan lengkap supaya tidak membingungkan</small>
  </div>
  <div class="form-group">
    <label for="Alasan">Alasan Untuk Ikut</label>
    <input type="text" readonly="readonly" name="alasan" class="form-control" value="<?php echo $cek['alasan'] ?>" id="alasan" aria-describedby="alasan">
  </div>
  <div class="form-group">
    <label for="url">masukan URL IG kamu</label>
    <input type="text" readonly="readonly" value="<?php echo $cek['url'] ?>" name="url" class="form-control" id="url" aria-describedby="url">
    <small id="url" class="form-text text-muted">masukan URL dengan lengkap contoh : https://www.ui.ac.id/</small>
  </div>
  <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroupFileAddon01">Upload Bukti SS</span>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="gambar" id="file" onchange="return fileValidation()"/>
      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
  </div>
  <img width="500px" src="../../bukti/<?php echo $cek['gambar'] ?>">
  <button type="submit" name="masukan" id="masukan" class="btn btn-primary">Submit</button>
  <div class="custom-file">
 <div class="preview" id="imagePreview"></div>
</div>
</form>
<?php } ?>
</div>
<script type="text/javascript">
  function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img width="300px" src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>
</body>
</html>