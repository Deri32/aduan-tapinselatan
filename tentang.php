<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'menu/head.php'; ?>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
    <?php include 'menu/navbar.php'; ?>
    </nav> <!-- .navbar -->

    <div class="page-banner bg-img bg-img-parallax overlay-dark" style="background-image: url(assets/img/bg_image_3.jpg);">
      <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0">
                <li class="breadcrumb-item"><a href="index.index">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tentang</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">Tentang</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <h2 class="title-section">Tentang <span class="fg-primary">Kami</span></h2>

            <p>Pelayanan adalah salah satu kegiatan yang dilakukan di setiap instansi atau kantor pemerintahan terutama pada kantor Kecamatan Tapin Selatan. Banyak aktifitas yang dilakukan pada kantor Kecamatan Tapin Selatan contoh nya dalam pelayanan, permohonan, surat masuk, surat keluar, dan lain-lain. Setiap hari nya banyak aspirasi dan keluhan yang di dapat dari masyarakat yang melakukan pelayanan atau masyarakatan pada kantor Kecamatan Tapin Selatan.</p>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="assets/img/logo1.png" alt="">
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Pegawai Kami</div>
          <h2 class="title-section">Berikut Kami Perkenalkan Pegawai Kami</h2>
        </div>

        <div class="owl-carousel team-carousel mt-5">
      <?php
        $no = 1;
        $kueri = mysqli_query($conn, "SELECT * FROM tb_pegawai,tb_jabatan WHERE tb_pegawai.id_jabatan=tb_jabatan.id_jabatan ORDER BY nama_pegawai ASC");
        while($tampil = mysqli_fetch_array($kueri)) {
      ?>
          <div class="team-wrap">
            <div class="team-profile">
              <img src="panel/assets/images/berkas/<?php echo $tampil['foto']; ?>" alt="" style="height:300px;" >
            </div>
            <div class="team-content">
              <h5><?php echo $tampil['nama_pegawai'];?></h5>
              <div class="text-sm fg-grey"><?php echo $tampil['nama_jabatan'];?></div>
            </div>
          </div>
      <?php } ?>
        </div>

      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>

  <footer class="page-footer">
  <?php include 'menu/footer.php'; ?>
  </footer>

  
  <?php include 'menu/script.php'; ?>

</body>
</html>