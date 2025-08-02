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
                <li class="breadcrumb-item active" aria-current="page">Masuk</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">Masukan Data Anda Untuk Login</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Silahkan Login</h2>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
									<form action="" method="POST" id="data-form" class="contactForm" enctype="multipart/form-data">
              							<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="username">Nama Pengguna</label>
													<input type="text" class="form-control" name="username" id="username" required="" autofocus="" autocomplete="off" placeholder="Nama Pengguna" minlength="5" maxlength="20">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="password">Kata Sandi</label>
													<input type="password" class="form-control" name="password" id="password" required="" autocomplete="off" placeholder="Kata Sandi" minlength="5" maxlength="20">
												</div>
											</div>
                							<div class="col-12 mt-3">
												<div align="right">
													<a href="daftar.php">Buat Akun</a>
												</div>
												<button	button type="submit" class="btn btn-primary px-5">Login</button>
											</div>
										</div>
									</form>
          </div>
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
					url: "proses/login.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "0") {
							Swal.fire('Peringatan', 'Maaf, Kami tidak dapat menemukan akun Anda', 'error');
						}else if(dataresponse.status == "1") {
							Swal.fire({
								title: "Pemberitahuan",
								text: "Selamat datang "+dataresponse.nama,
								icon: "success"
							}).then(function() {
								window.location = "index.php";
							});
						}else {
							Swal.fire('Peringatan', 'Maaf, Kami tidak dapat menemukan akun Anda', 'error');
						}
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>