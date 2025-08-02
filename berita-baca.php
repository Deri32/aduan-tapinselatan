<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'menu/head.php'; ?>
<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tb_berita WHERE id_berita = '$id'");
$row = mysqli_fetch_array($query);
$jumlah_komentar = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_komentar WHERE fk_berita = '$id'"));
?>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
  <nav class="navbar navbar-expand-lg navbar-light">
    <?php include 'menu/navbar.php'; ?>
    </nav> <!-- .navbar -->
  </header>

  <main>
    <div class="page-section pt-4">
      <div class="container">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb bg-transparent mb-4">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="berita.php">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $row['judul'];?></li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-12">
            <div class="blog-single-wrap">
              <div class="post-thumbnail">
                <center><img src="panel/assets/images/berita/<?php echo $row['gambar'];?>" alt=""></center>
              </div>
              <h1 class="post-title"><?php echo $row['judul'];?></h1>
              <div class="post-meta">
                <div class="post-author">
                  <span class="text-grey">By</span> <a href="#">Admin</a>  
                </div>
                <span class="gap">|</span>
                <div class="post-date">
                  <a href="#"><?php echo tglIndonesia(date('d F Y', strtotime($row['created'])));?></a>
                </div>
                <!-- <span class="gap">|</span>
                <div>
                  <a href="#">StreetStyle</a>, <a href="#">Fashion</a>, <a href="#">Couple</a>  
                </div> -->
                <span class="gap">|</span>
                <div class="post-comment-count">
                  <a href="#"><?php echo $jumlah_komentar;?> Komentar</a>
                </div>
              </div>
              <div class="post-content">
              <?php echo $row['deskripsi'];?>
                <!-- <div class="post-tags">
                  <p class="mb-2">Tags:</p>
                  <a href="#" class="tag-link">LifeStyle</a>
                  <a href="#" class="tag-link">Food</a>
                  <a href="#" class="tag-link">Coronavirus</a>
                </div> -->
              </div>
            </div> <!-- .blog-single-wrap -->

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Isi Komentar Kamu</h3>
				<?php if(isset($_SESSION['userid'])) { ?>
          <form action="" method="POST" id="data-form" class="contactForm" enctype="multipart/form-data">
								<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="anonim">Nama</label>
													<select class="form-control select2" name="anonim" id="anonim" required="">
														<option value="">Pilih Nama</option>
														<option value="0"><?php echo $online['nama_lengkap']; ?></option>
														<option value="1">Anonim</option>
													</select>
												</div>
											</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="label" for="komentar">Komentar</label>
											<input type="hidden" name="fk_masyarakat" id="fk_masyarakat" value="<?php echo $userid;?>">
											<input type="hidden" name="fk_berita" id="fk_berita" value="<?php echo $id;?>">
											<textarea name="isi" class="form-control" id="isi" cols="30" rows="4" placeholder="Tulis Komentar"></textarea>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" value="Kirim Komentar" class="btn btn-primary">
											<div class="submitting"></div>
										</div>
									</div>
								</div>
							</form>
				<?php }else{ ?>
          <h3 class="mb-5"><a href="masuk.php">Harus Login Terlebih Dahulu</a></h3>
				<?php } ?>
				<?php if(isset($_SESSION['userid'])) { ?>
              <?php
              $no = 1;
              $kueri = mysqli_query($conn, "SELECT * FROM tb_masyarakat, tb_komentar WHERE tb_komentar.fk_masyarakat=tb_masyarakat.id_masyarakat AND fk_berita = '$id' ORDER BY date(tb_komentar.created) DESC");
              while($tampil = mysqli_fetch_array($kueri)) {
                if ($tampil['anonim']=='0'){
                    $nama = $tampil['nama_lengkap'];
                }else{
                  $nama = 'Anonim';
                }
              ?>
								<div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label" for="nama_lengkap">Tanggal Komenter</label>
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required="" autocomplete="off" placeholder="Nama Lengkap"  minlength="1" maxlength="100"disabled value="<?php echo tglIndonesia(date('d F Y', strtotime($tampil['created'])));?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="label" for="nama_lengkap">Nama Lengkap</label>
                      <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required="" autocomplete="off" placeholder="Nama Lengkap"  minlength="1" maxlength="100" value="<?php echo $nama;?>" disabled>
                    </div>
                  </div>
                  <div class="col-md-12">
										<div class="form-group">
											<label class="label" for="komentar">Komentar</label>
											<textarea name="isi" class="form-control" id="isi" cols="30" rows="4" placeholder="Tulis Komentar" disabled><?php echo $tampil['isi'];?></textarea>
										</div>
									</div>
									</div>
                  <hr>
              <?php } ?>
        <?php } ?>


            </div> <!-- .comment-form-wrap -->
          </div>
          
          <!-- <div class="col-lg-4">
            <div class="widget">
              <div class="widget-box">
                <h3 class="widget-title">Search</h3>
                <div class="divider"></div>
                <form action="#" class="search-form">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                    <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                  </div>
                </form>
              </div>
              <div class="widget-box">
                <h3 class="widget-title">Categories</h3>
                <div class="divider"></div>
                <ul class="categories">
                  <li><a href="#">Food <span>12</span></a></li>
                  <li><a href="#">Dish <span>22</span></a></li>
                  <li><a href="#">Desserts <span>37</span></a></li>
                  <li><a href="#">Drinks <span>42</span></a></li>
                  <li><a href="#">Ocassion <span>14</span></a></li>
                </ul>
              </div>
  
              <div class="widget-box">
                <h3 class="widget-title">Recent Blog</h3>
                <div class="divider"></div>
                <div class="blog-item">
                  <div class="content">
                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                    <div class="meta">
                      <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                      <a href="#"><span class="mai-person"></span> Admin</a>
                      <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                    </div>
                  </div>
                </div>
                <div class="blog-item">
                  <div class="content">
                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                    <div class="meta">
                      <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                      <a href="#"><span class="mai-person"></span> Admin</a>
                      <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                    </div>
                  </div>
                </div>
                <div class="blog-item">
                  <div class="content">
                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h6>
                    <div class="meta">
                      <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                      <a href="#"><span class="mai-person"></span> Admin</a>
                      <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="widget-box">
                <h3 class="widget-title">Tag Cloud</h3>
                <div class="divider"></div>
                <div class="tagcloud">
                  <a href="#" class="tag-cloud-link">dish</a>
                  <a href="#" class="tag-cloud-link">menu</a>
                  <a href="#" class="tag-cloud-link">food</a>
                  <a href="#" class="tag-cloud-link">sweet</a>
                  <a href="#" class="tag-cloud-link">tasty</a>
                  <a href="#" class="tag-cloud-link">delicious</a>
                  <a href="#" class="tag-cloud-link">desserts</a>
                  <a href="#" class="tag-cloud-link">drinks</a>
                </div>
              </div>
  
              <div class="widget-box">
                <h3 class="widget-title">Paragraph</h3>
                <div class="divider"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div>
          </div> -->
          
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  </main>


  <footer class="page-footer">
  <?php include 'menu/footer.php'; ?>
  </footer>

  
  <?php include 'menu/script.php'; ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data-form").submit(function(e) {
				e.preventDefault();
				var data = $(this).serialize();
				$.ajax({
					type: "POST",
					url: "proses/add-komentar.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "0") {
							Swal.fire('Peringatan', 'Maaf, gagal mengirim komentar', 'error');
						}else if(dataresponse.status == "1") {
							Swal.fire({
								title: "Pemberitahuan",
								text: "Berhasil mengirim komentar",
								icon: "success"
							}).then(function() {
								location.reload();
							});
						}else {
							Swal.fire('Peringatan', 'Maaf, gagal mengirim komentar', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>