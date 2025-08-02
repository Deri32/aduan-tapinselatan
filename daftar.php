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
                <li class="breadcrumb-item active" aria-current="page">Daftar</li>
              </ol>
            </nav>
            <h1 class="fg-white text-center">Masukan Data Anda Untuk Melakukan Pendaftaran</h1>
          </div>
        </div>
      </div>
    </div> <!-- .page-banner -->
  </header>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Silahkan Isi Data Anda</h2>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
		<form action="" method="POST" id="data-form" class="contactForm" enctype="multipart/form-data">
              <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="nik">Nomor Induk Kependudukan</label>
						<input type="text" name="nik" id="nik" class="form-control" required="" autocomplete="off" placeholder="Nomor Induk Kependudukan" autofocus="" onkeyup="changeValue()" maxlength="16">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="nama_lengkap">Nama Lengkap</label>
						<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required="" autocomplete="off" placeholder="Nama Lengkap"  minlength="1" maxlength="100" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="telepon">Telepon</label>
						<input type="number" name="telepon" id="telepon" class="form-control" required="" autocomplete="off" placeholder="Telepon" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="tempat_lahir">Tempat Lahir</label>
						<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" autocomplete="off" minlength="1" maxlength="50" required="" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="tanggal_lahir">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" autocomplete="off" required="" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" autocomplete="off" minlength="1" maxlength="50" required="" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="pekerjaan">Pekerjaan</label>
						<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="" readonly autocomplete="off" minlength="1" maxlength="100">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="label" for="alamat">Alamat</label>
						<textarea name="alamat" class="form-control" id="alamat" cols="30" rows="4" required="" readonly placeholder="Tulis Alamat"></textarea>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="name">Nama Pengguna</label>
						<input type="text" name="username" id="username" class="form-control" required="" autocomplete="off" placeholder="Nama Pengguna" minlength="5" maxlength="20">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="label" for="email">Kata Sandi</label>
						<input type="password" name="password" id="password" class="form-control" required="" autocomplete="off" placeholder="Kata Sandi" minlength="5" maxlength="20">
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<input type="submit" value="Daftar" class="btn btn-primary">
						<div class="submitting"></div>
					</div>
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
		function setInputFilter(textbox, inputFilter) {
			["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
				textbox.addEventListener(event, function() {
					if (inputFilter(this.value)) {
						this.oldValue = this.value;
						this.oldSelectionStart = this.selectionStart;
						this.oldSelectionEnd = this.selectionEnd;
					} else if (this.hasOwnProperty("oldValue")) {
						this.value = this.oldValue;
						this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
					} else {
						this.value = "";
					}
				});
			});
		}
		setInputFilter(document.getElementById("nik"), function(value) {
			return /^\d*\.?\d*$/.test(value);
		});
		function changeValue() {
			var nik = $('#nik').val();
			if(nik.length == 16) {
            $.ajax({
                type: 'GET',
                url: "get-nik.php",
                data: {nik: nik},
                cache: false,
                success: function(msg){
                   var json = msg,
                    obj = JSON.parse(json);
                    $('#nama_lengkap').val(obj.nama_lengkap);
                    $('#telepon').val(obj.telepon);
                    $('#tempat_lahir').val(obj.tempat_lahir);
                    $('#tanggal_lahir').val(obj.tanggal_lahir);
                    $('#jenis_kelamin').val(obj.jenis_kelamin);
                    $('#pekerjaan').val(obj.pekerjaan);
                    $('#alamat').val(obj.alamat);
                }
            });
				// var res = nik.substring(6, 12);
				// var tanggal = res.substring(0, 2);
				// var bulan = res.substring(2, 4);
				// var tahun = res.substring(4, 6);
				// if(tahun <= 99) {
				// 	var tahunT = "19"+tahun;
				// }
				// if(tahunT <= 1950) {
				// 	var tahunT = "20"+tahun;
				// }
				// function isValidDate(s) {
				// 	var bits = s.split('/');
				// 	var d = new Date(bits[2], bits[1] - 1, bits[0]);
				// 	return d && (d.getMonth() + 1) == bits[1];
				// }
				// var myDate = tanggal+"/"+bulan+"/"+tahunT;
				// console.log(myDate + isValidDate(myDate));
				// if(isValidDate(myDate)) {
				// 	$('#tanggal_lahir').val(tahunT+"-"+bulan+"-"+tanggal);
				// }else {
				// 	Swal.fire('Peringatan', 'Maaf, Format NIK yang Anda masukkan salah', 'error');
				// }
			}
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data-form").submit(function(e) {
				e.preventDefault();
				var nik = $('#nik').val();
				if(nik.length == 16) {
					var res = nik.substring(6, 12);
					var tanggal = res.substring(0, 2);
					var bulan = res.substring(2, 4);
					var tahun = res.substring(4, 6);
					if(tahun <= 99) {
						var tahunT = "19"+tahun;
					}
					if(tahunT <= 1950) {
						var tahunT = "20"+tahun;
					}
					function isValidDate(s) {
						var bits = s.split('/');
						var d = new Date(bits[2], bits[1] - 1, bits[0]);
						return d && (d.getMonth() + 1) == bits[1];
					}
					var myDate = tanggal+"/"+bulan+"/"+tahunT;
					console.log(myDate + isValidDate(myDate));
					if(isValidDate(myDate)) {
						var data = $(this).serialize();
						$.ajax({
							type: "POST",
							url: "proses/register.php",
							data: data,
							success: function(response) {
								var dataresponse = JSON.parse(response);
								console.log(dataresponse);
								if(dataresponse.status == "0") {
									Swal.fire('Peringatan', 'Maaf, gagal melakukan pendaftaran', 'error');
								}else if(dataresponse.status == "1") {
									Swal.fire({
										title: "Pemberitahuan",
										text: "Berhasil melakukan pendaftaran",
										icon: "success"
									}).then(function() {
										window.location.href='masuk.php';
									});
								}else if(dataresponse.status == "2") {
									Swal.fire('Peringatan', 'Maaf, Telepon sudah digunakan', 'error');
								}else if(dataresponse.status == "3") {
									Swal.fire('Peringatan', 'Maaf, Nomor Induk Kependudukan sudah digunakan', 'error');
								}else if(dataresponse.status == "4") {
									Swal.fire('Peringatan', 'Maaf, Nama Pengguna sudah digunakan', 'error');
								}else {
									Swal.fire('Peringatan', 'Maaf, gagal melakukan pendaftaran', 'error');
								}
							}
						});
						return false;
					}else {
						Swal.fire('Peringatan', 'Maaf, Format NIK yang Anda masukkan salah', 'error');
					}
				}else {
					Swal.fire('Peringatan', 'Maaf, NIK harus 16 angka', 'error');
				}
			});
		});
	</script>

</body>
</html>