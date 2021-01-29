<?php 
include 'koneksi/koneksi.php';
error_reporting(0);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Ikamansa</title>
    <link rel="shortcut icon" href="gambar/1WebinarLogo-03.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="boot/index.css" rel="stylesheet">
  </head>
  <body>
  <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Tentang</h4>
          <p class="text-muted">Tujuan di buatnya web ini adalah untuk membantu Teman Teman yang masih bingung mencari perkuliahan dan tidak tahu ada berapa saja jalur masuk di Perguruan Tinggi. Disini Tanggal dan Bulan yang tertera berlaku untuk tahun tersebut dan jadwal terdekat adalah jadwal terbaru. Web ini Diisi sendiri oleh mahasiswa yang bersangkutan.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li>
              <a href="https://www.instagram.com/ikamansa.id/" class="text-white"><img src="gambar/instagram.svg" style=" box-sizing: border-box; width: 30px; margin: 2px;">ikamansa.id</a></li>
            <li>
              <a href="" class="text-white"> <img style=" box-sizing: border-box; width: 30px; margin:2px 3px;" src="gambar/gmail.svg">ikamansa</a>
            </li>
            <li>
               <a href="admin/login.php" class="text-white"> <img style=" box-sizing: border-box; width: 30px; margin:2px 3px;" src="gambar/enter.svg">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="http://ikamansa.rf.gd/" class="navbar-brand d-flex align-items-center">
        <img style="width: 60px;" src="gambar/1.2WebinarLogo-03.png">
        <strong>Ikamansa</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">
  <div class="container" >
<div class="my-2 alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat datang para pejuang!!</h4>
  <p>Trimakasih sudah datang di website ikamansa. </p>
  <hr>
  <p class="mb-0">
  Disini kita mempunyai 2 tema :<br>
  1. bentuk table yang anda akses ini. <br> 
  2. bentuk box silakan tekan tombol box untuk mengganti tampilan yang tersedia. <br>
  3. bila tidak ingin mengganti tekan tombol sudah paham. <br>
  </p>
   <button type="button" class=" my-3 btn btn-primary" data-dismiss="alert">Sudah Paham</button>
   <a href="uer/"><button type="button" class=" my-3 btn btn-primary">Box</button></a>
  </div>
</div>
  <section class="jumbotron text-center">
    <div class="container">
      <h1>Jadwal Terdekat</h1>
      <?php 
        $ambil = mysqli_query($koneksi,"SELECT *FROM dekat where status = 'on'");
        $hitung = mysqli_num_rows($ambil);
        if ($hitung < 1 ) {
          echo "<div class ='alert alert-primary' role='alert'>
          <p>belum ada jadwal terdekat. Tetap Semangat!!</p>";
        } else {
        while ($cek = mysqli_fetch_assoc($ambil)) {
       ?>
      <div class="alert alert-primary" role="alert">
         <p>Perguruan Tinggi <?php echo $cek['nama']; ?> mengadakan tes <?php echo  $cek['tes']; ?> pada  <?php echo $cek['tanggal']; ?> dan di tutup pada  <?php echo $cek['akhir'];?> info lebih lengkap <a href="<?php echo $cek['url']; ?>">disini</a></p>
      </div>
    <?php } } ?>
    </div>
  </section>
  <div class="album py-5 bg-light">
    <div class="row" style="width: 100%">
    <div class="col-sm-8 p-2">
      <input class="ml-5 form-control container-fluid" name="cari" type="search" placeholder="Search" id="cari" aria-label="Search">
    </div>
    <div class="col-sm-4">
      <div class="d-flex justify-content-center my-2" >
        <a href="user/request/index.php">
          <button type="button" class="mx-2 btn btn-primary"> 
            + request Univ
          </button>
        </a>
        <a href="user/formulir.php">
          <button type="button" class="mx-2 btn btn-primary"> 
            daftar
          </button>
        </a>
      </div>
      </div>
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
            <td><?php echo nl2br($d['awal']); ?></td>
            <td><?php echo nl2br($d['akhir']); ?></td>
            <td>
                  <a href="<?php echo $d['web'] ?>"><img src="gambar/world-wide-web.svg" style=" box-sizing: border-box; width: 40px; margin: px;"></a>
                  <a href="<?php echo $d['ig'] ?>"><img src="gambar/instagram.svg" style=" box-sizing: border-box; width: 40px; margin: 2px;"></a>
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
  </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Proudly present : <a href="https://www.instagram.com/ikamansa.id/">Ikamansa.id</a></p>
    <p>Design Web by <a href="https://getbootstrap.com/"> Bootstrap</a> & Icon by <a href="https://www.flaticon.com/">Visit the homepage</a></p>
    <p></p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="boot/js/bootstrap.bundle.min.js"></script>
</html>