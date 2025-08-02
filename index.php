<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'menu/head.php'; ?>
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
    <?php include 'menu/navbar.php'; ?>
    </nav> <!-- .navbar -->

    <div class="page-banner home-banner mb-5">
      <div class="slider-wrapper">
        <div class="owl-carousel hero-carousel">
          <div class="hero-carousel-item">
            <img src="assets/img/bg_image_1.jpg" alt="">
            <div class="img-caption">
              <div class="subhead">KECAMATAN TAPIN SELATAN</div>
              <h1 class="mb-4">Anda Dapat Mengajukan Pengaduan Dan Aspirasi Pada<br>Kecamatan Tapin Selatan</h1>
              <a href="#" class="btn btn-primary">Sampaikan Pengaduan Dan Aspirasi Anda</a>
            </div>
          </div>
        </div>
      </div> <!-- .slider-wrapper -->
    </div> <!-- .page-banner -->
  </header>

  <main>

					<div class="page-section">
						<div class="container">
							<div class="text-center">
							<h4 class="title-section mb-3">Masukan Aspirasi Atau Aduan Anda Dengan Mengisi Form Di Bawah Ini</h4>
							</div>
							<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="perbulan-tab" data-toggle="tab"
										href="#perbulan" role="tab" aria-controls="perbulan"
										aria-selected="true">Aspirasi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pertanggal-tab" data-toggle="tab"
										href="#pertanggal" role="tab" aria-controls="pertanggal"
										aria-selected="false">Aduan</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="perbulan" role="tabpanel" aria-labelledby="perbulan-tab">
								<div class="row justify-content-center mt-5">
								<div class="col-lg-12">
								<form action="" method="POST" id="data1-form" class="contactForm" enctype="multipart/form-data">
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
										<div class="col-md-6">
											<div class="form-group">
												<label for="status_aspirasiaduan1">Keterangan</label>
												<select class="form-control select2" name="status_aspirasiaduan1"
													id="status_aspirasiaduan1" required="" style="width: 100%;">
													<option value="">Pilih Keterangan</option>
													<option value="Fasilitas">Fasilitas</option>
													<option value="Layanan">Layanan</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="id_aspirasiaduan1">Aspirasi</label>
												<select class="form-control select2" name="id_aspirasiaduan1" id="id_aspirasiaduan1" required="">
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label class="label" for="komentar">Detail Aspirasi</label>
												<input type="hidden" name="fk_masyarakat" id="fk_masyarakat" value="<?php echo $userid;?>">
												<textarea name="isi" class="form-control" id="isi" cols="30" rows="4" placeholder="Tulis Detail Aspirasi"></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<?php if(isset($_SESSION['userid'])) { ?>
													<input type="submit" value="Kirim Aspirasi" class="btn btn-primary">
												<?php }else{ ?>
													<a href="masuk.php" class="btn btn-primary">Anda Harus Masuk Terlebih Dahulu</a>
												<?php } ?>
												<div class="submitting"></div>
											</div>
										</div>
									</div>
								</form>
							</div>
							</div>
							</div>
							<div class="tab-pane fade" id="pertanggal" role="tabpanel" aria-labelledby="pertanggal-tab">
							<div class="row justify-content-center mt-5">
							<div class="col-lg-12">
								<form action="" method="POST" id="data2-form" class="contactForm" enctype="multipart/form-data">
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
													<div class="col-md-6">
														<div class="form-group">
															<label for="status_aspirasiaduan2">Keterangan</label>
															<select class="form-control select2" name="status_aspirasiaduan2"
																id="status_aspirasiaduan2" required="" style="width: 100%;">
																<option value="">Pilih Keterangan</option>
																<option value="Fasilitas">Fasilitas</option>
																<option value="Layanan">Layanan</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="id_aspirasiaduan2">Aduan</label>
															<select class="form-control select2" name="id_aspirasiaduan2" id="id_aspirasiaduan2" required="">
															</select>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="label" for="komentar">Detail Aduan</label>
															<input type="hidden" name="fk_masyarakat" id="fk_masyarakat" value="<?php echo $userid;?>">
															<textarea name="isi" class="form-control" id="isi" cols="30" rows="4" placeholder="Tulis Detail Aduan"></textarea>
														</div>
													</div>
											<div class="col-md-12">
												<div class="form-group">
													<?php if(isset($_SESSION['userid'])) { ?>
														<input type="submit" value="Kirim Aduan" class="btn btn-primary">
													<?php }else{ ?>
														<a href="masuk.php" class="btn btn-primary">Anda Harus Masuk Terlebih Dahulu</a>
													<?php } ?>
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
							</div>
							</div>
						</div> <!-- .container -->
						</div> <!-- .page-section -->
					</div>
				</div>
			</div>
		</div>
	</div>


	
    <!-- Testimonials -->
    <div class="page-section" style="margin-top: -80px;">
      <div class="container">
      <div class="col-md-6 py-3">
            <h3 class="title-section">Aspirasi dan Aduan Masyarakat</h3>
        </div>
        <div class="owl-carousel testimonial-carousel">

          <?php
            $no = 1;
            $kueri = mysqli_query($conn, "SELECT * FROM tb_layanan,tb_masyarakat,tb_aspirasiaduan WHERE tb_layanan.fk_masyarakat=tb_masyarakat.id_masyarakat AND tb_layanan.id_aspirasiaduan=tb_aspirasiaduan.id_aspirasiaduan ORDER BY RAND()");
            while($tampil = mysqli_fetch_array($kueri)) {
                if ($tampil['anonim']=='0'){
                    $nama = $tampil['nama_lengkap'];
                }else{
                  $nama = 'Anonim';
                }
          ?>
          <div class="card-testimonial">
            <div class="content" style="height: 100px;">
            <?php echo $tampil['isi'];?>
            </div>
			<div class="author">
			<div class="d-inline-block ml-2">
				<div class="author-name"><?php echo $nama;?></div>
				<div class="author-info"><?php echo $tampil['status'];?> (<?php echo $tampil['status_aspirasiaduan'];?>)</div>
				
				<?php
				// Ambil id masyarakat dari sesi login
				$id_masyarakat = $_SESSION['userid']; 
				$id_layanan = $tampil['id_layanan'];

				// Cek apakah user sudah like
				$cek_like = mysqli_query($conn, "SELECT * FROM tb_like WHERE fk_masyarakat='$id_masyarakat' AND id_layanan='$id_layanan'");
				$sudah_like = mysqli_num_rows($cek_like);
				?>

				<?php if ($sudah_like == 0): ?>
				<form method="post" style="margin-top: 5px;">
					<input type="hidden" name="id_layanan" value="<?php echo $id_layanan; ?>">
					<button type="submit" name="btn_like" class="btn btn-sm btn-outline-primary">👍 Like</button>
				</form>
				<?php else: ?>
				<button class="btn btn-sm btn-secondary" disabled>👍 Liked</button>
				<?php endif; ?>
				<?php
				$jumlah_like = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_like WHERE id_layanan='$id_layanan'"));
				?>
				<small><?php echo $jumlah_like; ?> orang menyukai ini</small>

			</div>
			</div>
          </div>
          <?php } ?>
			<?php
			$pesan = ''; // variabel untuk menampung pesan

			if (isset($_POST['btn_like'])) {
			$id_layanan = $_POST['id_layanan'];
			$id_masyarakat = $_SESSION['userid'];

			// Cek apakah sudah like
			$cek_like = mysqli_query($conn, "SELECT * FROM tb_like WHERE fk_masyarakat='$id_masyarakat' AND id_layanan='$id_layanan'");
			if (mysqli_num_rows($cek_like) == 0) {
				mysqli_query($conn, "INSERT INTO tb_like (fk_masyarakat, id_layanan) VALUES ('$id_masyarakat', '$id_layanan')");
				// $pesan = 'Berhasil memberikan Like.';
				echo '<script language="javascript">
					alert ("Terimakasih sudah melike post ini");
					location.href="javascript:history.go(-1)";
					</script>';
					exit();
			} else {
				// $pesan = 'Anda sudah memberikan Like sebelumnya.';
				echo '<script language="javascript">
					alert ("Anda sudah like post ini");
					location.href="javascript:history.go(-1)";
					</script>';
					exit();
			}
			}
			?>


        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <!-- Testimonials -->
    <div class="page-section" style="margin-top: -180px;"> 
      <div class="container">
		  <div class="col-md-6 py-3">
			  <h3 class="title-section">Tindakan Kami Untuk Aduan</h3>
			</div>
				<div class="chart-container" style="position: relative; height:40vh; width:80vw">
					<canvas id="myChart"></canvas>
				</div>
				<hr>
        <div class="owl-carousel testimonial-carousel">
          <?php
            $no = 1;
            $kueri = mysqli_query($conn, "SELECT * FROM tb_layanan,tb_masyarakat,tb_aspirasiaduan WHERE tb_layanan.fk_masyarakat=tb_masyarakat.id_masyarakat AND tb_layanan.id_aspirasiaduan=tb_aspirasiaduan.id_aspirasiaduan AND konfirmasi='Selesai' ORDER BY RAND()");
            while($tampil = mysqli_fetch_array($kueri)) {
                if ($tampil['anonim']=='0'){
                    $nama = $tampil['nama_lengkap'];
                }else{
                  $nama = 'Anonim';
                }
          ?>
          <div class="card-testimonial">
            <div class="content" style="height: 200px;">
            <?php echo $tampil['isi'];?>
			<hr>
			<strong><?php echo $tampil['keterangan_konfirmasi'];?></strong>
            </div>
            <div class="author">
              <div class="d-inline-block ml-2">
                <div class="author-name"><?php echo $nama;?></div>
                <div class="author-info"><?php echo $tampil['status'];?> (<?php echo $tampil['status_aspirasiaduan'];?>)</div>
              </div>
            </div>
          </div>
          <?php } ?>


        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .page-section -->



    <div class="page-section">
      <div class="container-fluid">
        <div class="row row-cols-md-3 row-cols-lg-5 justify-content-center text-center">
          <div class="py-4 px-5">
            <img src="assets/img/logo1.png" alt="" style="height: 100px;">
          </div>
          <div class="py-4 px-5">
          <img src="assets/img/logo2.png" alt="" style="height: 100px;">
          </div>
          <div class="py-4 px-5">
          <img src="assets/img/logo3.png" alt="" style="height: 100px;">
          </div>
        </div>
      </div> <!-- .container-fluid -->
    </div> <!-- .page-section -->

  </main>

  <footer class="page-footer">
  <?php include 'menu/footer.php'; ?>
  </footer>

  
  <?php include 'menu/script.php'; ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data1-form").submit(function(e) {
				e.preventDefault();
				var data = $(this).serialize();
				$.ajax({
					type: "POST",
					url: "proses/add-aspirasi.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "0") {
							Swal.fire('Peringatan', 'Maaf, gagal mengirim aspirasi', 'error');
						}else if(dataresponse.status == "1") {
							Swal.fire({
								title: "Pemberitahuan",
								text: "Berhasil mengirim aspirasi",
								icon: "success"
							}).then(function() {
								location.reload();
							});
						}else {
							Swal.fire('Peringatan', 'Maaf, gagal mengirim aspirasi', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data2-form").submit(function(e) {
				e.preventDefault();
				var data = $(this).serialize();
				$.ajax({
					type: "POST",
					url: "proses/add-aduan.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "0") {
							Swal.fire('Peringatan', 'Maaf, gagal mengirim aduan', 'error');
						}else if(dataresponse.status == "1") {
							Swal.fire({
								title: "Pemberitahuan",
								text: "Berhasil mengirim aduan",
								icon: "success"
							}).then(function() {
								location.reload();
							});
						}else {
							Swal.fire('Peringatan', 'Maaf, gagal mengirim aduan', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>

	<script type="text/javascript">
		$("#status_aspirasiaduan1").on('change', function(){
			var status_aspirasiaduan1 = $(this).val();
			$.ajax({
				type: 'POST',
				url: "get-aspirasiaduan1.php",
				data: {status_aspirasiaduan1: status_aspirasiaduan1},
				cache: false,
				success: function(msg){
					$("#id_aspirasiaduan1").html(msg);
				}
			});
		});
	</script>

	<script type="text/javascript">
		$("#status_aspirasiaduan2").on('change', function(){
			var status_aspirasiaduan2 = $(this).val();
			$.ajax({
				type: 'POST',
				url: "get-aspirasiaduan2.php",
				data: {status_aspirasiaduan2: status_aspirasiaduan2},
				cache: false,
				success: function(msg){
					$("#id_aspirasiaduan2").html(msg);
				}
			});
		});
	</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	<?php 
		// $koneksi = mysqli_connect("localhost","root","","malasngoding");
		// $dokter = mysqli_query($koneksi,"select * from dokter");
		// while($dr = mysqli_fetch_array($dokter)){
		// 	$nama_dokter[] = $dr['dokter_nama'];
		// 	$id_dokter = $dr['dokter_id'];
 
		// 	$pasien = mysqli_query($koneksi,"select * from pasien where pasien_dokter='$id_dokter'");
		// 		$jumlah_pasien[] = mysqli_num_rows($pasien);
		// }

		$kueri = mysqli_query($conn, "SELECT * FROM tb_layanan,tb_masyarakat,tb_aspirasiaduan WHERE tb_layanan.fk_masyarakat=tb_masyarakat.id_masyarakat AND tb_layanan.id_aspirasiaduan=tb_aspirasiaduan.id_aspirasiaduan AND konfirmasi<>'Selesai' ORDER BY RAND()");
		$tampil1 = mysqli_num_rows($kueri);

		$kueri = mysqli_query($conn, "SELECT * FROM tb_layanan,tb_masyarakat,tb_aspirasiaduan WHERE tb_layanan.fk_masyarakat=tb_masyarakat.id_masyarakat AND tb_layanan.id_aspirasiaduan=tb_aspirasiaduan.id_aspirasiaduan AND konfirmasi='Selesai' ORDER BY RAND()");
		$tampil2 = mysqli_num_rows($kueri);
	 ?>
	const ctx = document.getElementById('myChart');
	new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ['Belum Di Proses', 'Sudah Di Proses'],
			datasets: [{
				label: 'Jumlah Data',
				data: [<?php echo $tampil1 ?>, <?php echo $tampil2; ?>],
				backgroundColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)',
					'rgba(255, 128, 6, 0.8)'
					],
				borderColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)',
					'rgba(255, 128, 6, 0.8)'
					],
				borderWidth: 1
			}]
		},
		options: {
			// scales: {
			// 	y: {
			// 		beginAtZero: true
			// 	}
			// }
		}
	});
</script>
</body>
</html>