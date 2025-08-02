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
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">List Berita Dari Kami</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="row">
          <?php
            $no = 1;
            $kueri = mysqli_query($conn, "SELECT * FROM tb_berita ORDER BY judul ASC");
            while($tampil = mysqli_fetch_array($kueri)) {
          ?>
              <div class="col-md-6 col-lg-4 py-3">
                <div class="card-blog">
                  <!-- <div class="header">
                    <div class="avatar">
                      <img src="assets/img/person/person_1.jpg" alt="">
                    </div>
                    <div class="entry-footer">
                      <div class="post-author">Sam Newman</div>
                      <a href="#" class="post-date">23 Apr 2020</a>
                    </div>
                  </div> -->
                  <div class="body">
                    <div class="post-title"><a href="blog-single.html"><?php echo $tampil['judul'];?></a></div>
                    <div class="post-excerpt"><?php echo $tampil['keterangan'];?></div>
                  </div>
                  <div class="footer">
                    <a href="berita-baca.php?id=<?php echo $tampil['id_berita'];?>">Baca Selanjutnya <span class="mai-chevron-forward text-sm"></span></a>
                  </div>
                </div>
              </div>
              <?php } ?>

<!-- 
              <div class="col-12 my-5">
                <nav aria-label="Page Navigation">
                  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
              </div> -->
              
            </div>
          </div>
          
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