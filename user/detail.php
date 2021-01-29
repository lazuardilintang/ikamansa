 <!DOCTYPE html>
 <html>
 <head>
 	<title>detail</title>
  <link rel="shortcut icon" href="../gambar/1WebinarLogo-03.jpg">
 	<link rel="stylesheet" type="text/css" href="../boot/css/bootstrap.css">
 </head>
 <body>
 	<div class="container">
 		<?php 
include '../koneksi/koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"SELECT * FROM daftar WHERE id = '$id' ");
while ($ambil = mysqli_fetch_assoc($cek)) { ?>
<form action="" method="post">
  <div class="form-group">
    <label for="kampus">NAMA KAMPUS</label>
    <input type="text" name="kampus" class="form-control" id="kampus" readonly="readonly" aria-describedby="kampus" value="<?php echo $ambil['nama'] ?>">
  </div>
  <div class="form-group">
    <label for="2019">JENIS DAN TANGGAL SELESI MASUK TAHUN 2019</label>
    <textarea style="resize:none;width:100%;height:300px;" class="form-control" readonly="readonly" name="2019"> <?php echo $ambil['awal'] ?> </textarea>
  </div>
  <div class="form-group">
    <label for="2019">JENIS DAN TANGGAL SELESI MASUK TAHUN 2020</label>
    <textarea style="resize:none;width:100%;height:300px;" readonly="readonly" class="form-control" name="2020"><?php echo $ambil['akhir'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="web">Website Resmi : </label><a href="<?php echo $d['web'] ?>"><img src="../gambar/world-wide-web.svg" style="margin-left: 12px; box-sizing: border-box; width: 40px; margin: px;"></a><br>
    <label for="web">Instagram Resmi : </label>
    <a href="<?php echo $d['ig'] ?>"><img src="../gambar/instagram.svg" style=" box-sizing: border-box; width: 40px; margin: 2px;"></a>
  </div>
<button type="submit" name="kembali" class="btn btn-primary">kembali</button>
</form>	
<?php } ?>
 	</div>
 </body>
 </html>
 <?php 
if (isset($_POST['kembali'])) {
	header("location:coba.php");
}
  ?>