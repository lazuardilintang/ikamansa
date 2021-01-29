<?php 
include '../koneksi/koneksi.php';
error_reporting(0);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>ikamansa</title>
<link rel="shortcut icon" href="../gambar/1WebinarLogo-03.jpg">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#cari").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tampilkan tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <link rel="stylesheet" type="text/css" href="../boot/index.css">
 </head>
 <body>
<?php 
$hitung = mysqli_num_rows(mysqli_query($koneksi,"SELECT *FROM daftar"));?>
 <div class="container-fluid my-5">
  <div class="row">
    <div class="col-sm p-2">
      <div class="d-flex justify-content-center">
       <h5>Jumlah Perguruan yang terdata = <?php echo $hitung; ?></h5>
      </div>
    </div>
    <div class="col-sm p-2">
         <input class="form-control container-fluid" name="cari" type="search" placeholder="Search" id="cari" aria-label="Search">
    </div>
    <div class="col-sm p-2">
      <div class="d-flex justify-content-center" >
        <a href="input.php"><button type="button" class="mx-2 btn btn-primary"> + tambah</button></a>
        <a href="minta/"><button type="button" class="mx-2 btn btn-primary"> daftar minta</button></a>
        <a href="terdekat/"><button type="button" class="mx-2 btn btn-primary"> daftar terdekat</button></a>
        <a href="peserta/"><button type="button" class="mx-2 btn btn-primary">daftar peserta</button></a>
        <a href="../"><button type="button" class="mx-2 btn btn-primary"> menu user</button></a>
    </div>
    </div>
  </div>
</div>
<div class="container" > 
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat datang !!</h4>
  <p>Trimakasih atas kebikan anda sudah berkenan datang kemari dan mendukung acara yang akan datang.</p>
  <hr>
  <p class="mb-0">
  Tata cara mengisi <br>
  1. Tekan tombol tambah di sebelah tombol pencarian. <br>
  2. Bila yang anda masukan sudah ada anda akan tetap di halaman input data. <br>
  3. Isi dengan baik dan benar. <br> 
  4. Semoga menjadi amal yang bermanfaat untuk orang lain
  </p>
   <button type="button" class=" my-3 btn btn-primary" data-dismiss="alert">Sudah Paham</button>
  </div>
</div>

<table id="tampil" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">jenis</th>
      <th scope="col">Tahun 2019</th>
      <th scope="col">Tahun 2020</th>
      <th scope="col">Web/ig</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
  <?php 
	$batas = 10;
	$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
	$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
	$previous = $halaman - 1;
	$next = $halaman + 1;
				
	$data = mysqli_query($koneksi,"SELECT * from daftar");
	$jumlah_data = mysqli_num_rows($data);
	$total_halaman = ceil($jumlah_data / $batas);
	$data_pegawai = mysqli_query($koneksi,"SELECT * from daftar order by id desc limit $halaman_awal, $batas");
	$nomor = $halaman_awal+1;
	while($d = mysqli_fetch_assoc($data_pegawai)){
	?>
  	<tbody id="tampilkan">
					<tr>
						<td><?php echo $nomor++; ?></td>
						<td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['jenis']; ?></td>
						<td><textarea readonly="readonly"><?php echo $d['awal']; ?></textarea></td>
						<td><textarea readonly="readonly"><?php echo $d['akhir']; ?></textarea></td>
						<td>
      						<a href="<?php echo $d['web'] ?>"><img src="../gambar/world-wide-web.svg" style=" box-sizing: border-box; width: 40px; margin: px;"></a>
      						<a href="<?php echo $d['ig'] ?>"><img src="../gambar/instagram.svg" style=" box-sizing: border-box; width: 40px; margin: 2px;"></a>
      					</td>
      					<td>
      						<a href="edit.php?id=<?php echo $d['id'] ?>"><button type="button" class="mb-2 btn btn-success">Edit</button></a>
      						<a href="hapus.php?id=<?php echo $d['id'] ?>"><button type="button" class=" mb-2 btn btn-danger">Hapus</button></a>
      					</td>
						</tr>
					<?php
				}
				?>
  </tbody >
</table>
<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
 </body>
 </html>