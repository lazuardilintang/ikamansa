<?php 
include '../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>input data </title>
  <link rel="shortcut icon" href="../gambar/1WebinarLogo-03.jpg">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/[plkjfdxihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <div class =' my-5 alert alert-primary' role='alert'>
          <p>setelah mendaftar ada link yang mengarah ke WA GRUP silakan copy paste link tersebut. <br>
          silakan isi data sesuai persyaratan. dan baca baik baik apa saja yang diisikan</p>
        </div>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <img class="container" width="150 px" src="../gambar/2.1WebnarLogo-04.png" title="ikamansa">
  </div>
  <div class="form-group">
    <label for="nama">NAMA LENGKAP</label>
    <input type="text" required="required" name="nama" class="form-control" id="nama" aria-describedby="nama">
    <small id="nama" class="form-text text-muted">masukan nama lengkap dengan Jelas supaya tidak membingungkan</small>
  </div>
  <div class="form-group">
    <label for="sekolah">NAMA SEKOLAHAN</label>
    <input type="text" name="sekolah" required="required" class="form-control" id="sekolah" aria-describedby="sekolah">
    <small id="sekolah" class="form-text text-muted">masukan nama sekolah dengan lengkap supaya tidak membingungkan</small>
  </div>
  <div class="form-group">
    <label for="Alasan">Nomer hp</label>
    <input type="text" name="alasan" class="form-control"  required="required" id="alasan" aria-describedby="alasan">
  </div>
<div class="form-group">
  <label for="basic-url">masukan nama IG kamu</label>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">https://instagram.com/</span>
  </div>
  <input type="text" name="url" class="form-control"  required="required" id="alasan" aria-describedby="alasan">
</div>
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
  <button type="submit" name="masukan" id="masukan" class="btn btn-primary">Submit</button>
  <div class="custom-file">
 <div class="preview" id="imagePreview"></div>
</div>
</form>

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
<?php 
if (isset($_POST['masukan'])) {
  $nama = htmlspecialchars(strtoupper($_POST['nama']));
  $asal = htmlspecialchars(strtoupper($_POST['sekolah']));
  $alasan = htmlspecialchars($_POST['alasan']);
  $url = htmlspecialchars('https://instagram.com/'.$_POST['url']);
  $gambar = $_FILES['gambar']['name'];
  $eror = $_FILES['gambar']['error'];
  //persiapan gambar
  $eks = array('jpg','png','jpeg','gif');
  $ukuran = $_FILES['gambar']['size'];
  $tmpname = $_FILES['gambar']['tmp_name'];
  $angka = rand(1,999);
  $namabaru = $angka.'_'.$gambar;
  $eksgambar = explode('.', $gambar);
  $eksgambar1 = strtolower(end($eksgambar));


  if ($error === 4) {
     echo "<script>window.alert('isi dulu gambar')
    window.location='formulir.php'</script>";
  }
  //pengecekan gambar
  if(!in_array($eksgambar1, $eks) ){
      echo "<script>alert('yang anda upload bukan gambar!');</script>";
  }
  move_uploaded_file($tmpname, '../bukti/' . $namabaru);
  //cek asal
  if ($asal == 'MAN 1 KOTA KEDIRI') {
    echo "<script>window.alert('selamat bergabung semoga bermanfaat. Data anda sudah tersimpan. silakan bergabung disini https://chat.whatsapp.com/JeLuInBi9LtKI9fwzS4VAV');
    window.location='https://chat.whatsapp.com/JeLuInBi9LtKI9fwzS4VAV'</script>";
  }else{
     echo "<script>window.alert('selamat bergabung semoga bermanfaat. Data anda sudah tersimpan. silakan bergabung disini https://chat.whatsapp.com/INKeCksTubVKbWYl24UbHG')
    window.location='https://chat.whatsapp.com/INKeCksTubVKbWYl24UbHG'</script>";
  }
  //cek nama
   $cek = mysqli_num_rows(
          mysqli_query($koneksi,"SELECT * FROM formulir WHERE nama = '$nama' "));
   if ($cek > 0){
    echo "<script>window.alert('nama sudah daftar')
    window.location='formulir.php'</script>";
    }else {
    mysqli_query($koneksi,"INSERT INTO formulir VALUES ('','$nama','$asal','$alasan','$url','$namabaru')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='index.php'</script>";
    }
}
 ?>