<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'menu/head.php'; ?>
<link rel="stylesheet" href="panel/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="panel/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css">
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
                <li class="breadcrumb-item active" aria-current="page">Akun</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">Berikut Data Anda</h1>
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

            <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-2 d-flex">
					<div class="row justify-content-start py-5">
						<div class="col-md-12 heading-section ftco-animate">
							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Data Diri</a>
								<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Kata Sandi</a>
								<a class="nav-link" id="v-komentar-tab" data-toggle="pill" href="#v-komentar" role="tab" aria-controls="v-komentar" aria-selected="false">Komentar</a>
								<a class="nav-link" id="v-aspirasi-tab" data-toggle="pill" href="#v-aspirasi" role="tab" aria-controls="v-aspirasi" aria-selected="false">Aspirasi</a>
								<a class="nav-link" id="v-aduan-tab" data-toggle="pill" href="#v-aduan" role="tab" aria-controls="v-aduan" aria-selected="false">Aduan</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-10 d-flex">
					<div class="row justify-content-start py-5">
						<div class="col-md-12 heading-section ftco-animate">
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<form action="" method="POST" id="data-form-pertama" class="contactForm" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="nama_lengkap">Nama Lengkap</label>
														<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required="" autocomplete="off" placeholder="Nama Lengkap" autofocus="" minlength="1" maxlength="100" value="<?php echo $online['nama_lengkap'];?>">
														<input type="hidden" name="id" id="id" value="<?php echo $userid;?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="telepon">Telepon</label>
														<input type="number" name="telepon" id="telepon" class="form-control" required="" autocomplete="off" placeholder="Telepon" value="<?php echo $online['telepon'];?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="nik">Nomor Induk Kependudukan</label>
														<input type="number" name="nik" id="nik" class="form-control" required="" autocomplete="off" placeholder="Nomor Induk Kependudukan" value="<?php echo $online['nik'];?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="pekerjaan">Pekerjaan</label>
														<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="" autocomplete="off" autofocus="" minlength="1" maxlength="100" value="<?php echo $online['pekerjaan'];?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="tempat_lahir">Tempat Lahir</label>
														<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" autocomplete="off" autofocus="" minlength="1" maxlength="50" required="" value="<?php echo $online['tempat_lahir'];?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="tanggal_lahir">Tanggal Lahir</label>
														<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off" autofocus="" required="" value="<?php echo $online['tanggal_lahir'];?>">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="alamat">Alamat</label>
														<textarea name="alamat" class="form-control" id="alamat" cols="30" rows="4" required="" placeholder="Tulis Alamat"><?php echo $online['alamat'];?></textarea>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Simpan Perubahan" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<form action="" method="POST" id="data-form-kedua" class="contactForm" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="username">Nama Pengguna</label>
														<input type="text" name="username" id="username" class="form-control" required="" autocomplete="off" placeholder="Nama Pengguna" minlength="5" maxlength="20" value="<?php echo $online['username'];?>">
														<input type="hidden" name="id" id="id" value="<?php echo $userid;?>">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="oldPassword">Kata Sandi Lama</label>
														<input type="password" name="oldPassword" id="oldPassword" class="form-control" required="" autocomplete="off" placeholder="Kata Sandi Lama" minlength="5" maxlength="20">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="newPassword">Kata Sandi Baru</label>
														<input type="password" name="newPassword" id="newPassword" class="form-control" required="" autocomplete="off" placeholder="Kata Sandi Baru" minlength="5" maxlength="20">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="confirmPassword">Konfirmasi Kata Sandi</label>
														<input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required="" autocomplete="off" placeholder="Konfirmasi Kata Sandi" minlength="5" maxlength="20">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Simpan Perubahan" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="tab-pane fade" id="v-komentar" role="tabpanel" aria-labelledby="v-komentar-tab">
									<div class="contact-wrap w-100 p-md-5 p-4">
											<div class="row">
                     				 <div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th style="width: 200px;">Tanggal Komentar</th>
														<th style="width: 800px;">Isi Komentar</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													$kueri = mysqli_query($conn, "SELECT * FROM tb_komentar WHERE fk_masyarakat='$userid' ORDER BY date(created) DESC");
													while($tampil = mysqli_fetch_array($kueri)) {
														?>
													<tr>
														<td><?php echo tglIndonesia(date('d F Y', strtotime($tampil['created'])));?></td>
														<td><?php echo $tampil['isi'];?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
											</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-aspirasi" role="tabpanel" aria-labelledby="v-aspirasi-tab">
									<div class="contact-wrap w-100 p-md-5 p-4">
											<div class="row">
                     				 <div class="table-responsive">
											<table class="table table-striped" id="table-2">
												<thead>
													<tr>
														<th style="width: 200px;">Tanggal Aspirasi</th>
														<th style="width: 800px;">Isi Komentar</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													$kueri = mysqli_query($conn, "SELECT * FROM tb_layanan WHERE status='Aspirasi' AND fk_masyarakat='$userid' ORDER BY date(tanggal) DESC");
													while($tampil = mysqli_fetch_array($kueri)) {
														?>
													<tr>
														<td><?php echo tglIndonesia(date('d F Y', strtotime($tampil['tanggal'])));?></td>
														<td><?php echo $tampil['isi'];?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
											</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-aduan" role="tabpanel" aria-labelledby="v-aduan-tab">
									<div class="contact-wrap w-100 p-md-5 p-4">
											<div class="row">
                     				 <div class="table-responsive">
											<table class="table table-striped" id="table-3">
												<thead>
													<tr>
														<th style="width: 200px;">Tanggal Aduan</th>
														<th style="width: 800px;">Isi Komentar</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													$kueri = mysqli_query($conn, "SELECT * FROM tb_layanan WHERE status='Aduan' AND fk_masyarakat='$userid' ORDER BY date(tanggal) DESC");
													while($tampil = mysqli_fetch_array($kueri)) {
														?>
													<tr>
														<td><?php echo tglIndonesia(date('d F Y', strtotime($tampil['tanggal'])));?></td>
														<td><?php echo $tampil['isi'];?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
              
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
  <script src="panel/assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="panel/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="panel/assets/plugins/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script type="text/javascript">
	"use strict";
	$("#table-1").dataTable();
	</script>
<script type="text/javascript">
	"use strict";
	$("#table-2").dataTable();
	</script>
<script type="text/javascript">
	"use strict";
	$("#table-3").dataTable();
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data-form-pertama").submit(function(e) {
				e.preventDefault();
				var data = new FormData(this);
				$.ajax({
					type: "POST",
					url: "proses/update-akun-1.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							Swal.fire({
								title: "Pemberitahuan",
								text: "Berhasil mengubah data",
								icon: "success"
							}).then(function() {
								window.location = "akun.php";
							});
						}else {
							if(dataresponse.type == "telepon") {
								Swal.fire('Peringatan', 'Maaf, Telepon sudah digunakan', 'error');
							}else if(dataresponse.type == "nik") { 
								Swal.fire('Peringatan', 'Maaf, Nomor Induk Kependudukan sudah digunakan', 'error');
							}else {
								Swal.fire('Peringatan', 'Maaf, gagal mengubah data', 'error');
							}
						}
					}
				});
				return false;
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data-form-kedua").submit(function(e) {
				e.preventDefault();
				var data = new FormData(this);
				$.ajax({
					type: "POST",
					url: "proses/update-akun-2.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							Swal.fire({
								title: "Pemberitahuan",
								text: "Berhasil mengubah data",
								icon: "success"
							}).then(function() {
								window.location = "akun.php";
							});
						}else if(dataresponse.status == "2") {
							Swal.fire('Peringatan', 'Kata Sandi Lama yang Anda masukkan salah', 'error');
						}else if(dataresponse.status == "3") {
							Swal.fire('Peringatan', 'Kata Sandi tidak cocok', 'error');
						}else {
							if(dataresponse.type == "username") {
								Swal.fire('Peringatan', 'Maaf, Nama pengguna sudah digunakan', 'error');
							}else {
								Swal.fire('Peringatan', 'Maaf, gagal mengubah data', 'error');
							}
						}
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>