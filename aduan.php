<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'menu/head.php'; ?>
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg" ></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<?php include 'menu/navbar.php'; ?>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<?php include 'menu/aside.php'; ?>
				</aside>
			</div>
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Aduan</h1>
						<div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="beranda">Beranda</a></div>
							<div class="breadcrumb-item">Aduan</div>
						</div>
					</div>
					<div class="section-body">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<!-- <div class="card-header">
										<a href="tambah-layanan" class="btn btn-primary" style="border-radius: 4px;"><i
												class="fas fa-plus"></i></a>
									</div> -->
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>No</th>
														<th>Tanggal Aduan</th>
														<th>Batas Penyelesaian</th>
														<th>Nama</th>
														<th>Keterangan</th>
														<th>Aspirasi</th>
														<th>Isi</th>
														<th>Konfirmasi Aduan</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													if($_SESSION['level'] == "Admin") {
													$kueri = mysqli_query($conn, "SELECT * FROM tb_masyarakat,tb_layanan,tb_aspirasiaduan WHERE tb_layanan.fk_masyarakat=tb_masyarakat.id_masyarakat AND tb_layanan.id_aspirasiaduan=tb_aspirasiaduan.id_aspirasiaduan AND status='Aduan' ORDER BY date(tb_layanan.tanggal) DESC");
													}else{
													$kueri = mysqli_query($conn, "SELECT * FROM tb_masyarakat,tb_layanan,tb_aspirasiaduan, tb_penanganan WHERE tb_penanganan.fk_layanan=tb_layanan.id_layanan AND tb_layanan.fk_masyarakat=tb_masyarakat.id_masyarakat AND tb_layanan.id_aspirasiaduan=tb_aspirasiaduan.id_aspirasiaduan AND status='Aduan' ORDER BY date(tb_layanan.tanggal) DESC");
													}
													while($tampil = mysqli_fetch_array($kueri)) {
														$cek = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_penanganan WHERE fk_layanan = '" . $tampil['id_layanan'] . "'"));
														$cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_proses WHERE fk_layanan = '" . $tampil['id_layanan'] . "'"));
														// $tgl2 = date('Y-m-d', strtotime('+6 days', strtotime($tgl1)));
														?>
													<tr>
														<td><?php echo $no++;?></td>
														<td><?php echo tglIndonesia(date('d-F-Y', strtotime($tampil['tanggal']))); ?></td>
														<td><?php echo tglIndonesia(date('d-F-Y', strtotime($tampil['tanggal'] . ' +6 days'))); ?></td>
														<td><?php echo $tampil['nama_lengkap'];?></td>
														<td><?php echo $tampil['status_aspirasiaduan'];?></td>
														<td><?php echo $tampil['nama_aspirasiaduan'];?></td>
														<td><?php echo $tampil['isi'];?></td>
														<td><?php echo $tampil['konfirmasi'];?></td>
														<td style="white-space: nowrap;">
															<?php if ($cek==0){ ?>
																<a href="tambah-penanganan1?id=<?php echo $tampil['id_layanan'];?>" class="btn btn-success">Beri Tanggapan</a>
															<?php }else{ ?>
																	<a href="detail-penanganan?id=<?php echo $tampil['id_layanan'];?>" class="btn btn-warning">Sudah Di Beri Tanggapan</a>
																	<?php if ($cek2==0){ ?>
																	<a href="proses-aduan?id=<?php echo $tampil['id_layanan'];?>" class="btn btn-dark">Proses Aduan</a>
																	<?php } ?>
															<?php } ?>
															<?php if($_SESSION['level'] <> "Admin") { ?>
																<a href="konfirmasi-penanganan?id=<?php echo $tampil['id_layanan'];?>" class="btn btn-primary">Beri Konfirmasi Status</a>
															<?php } ?>
															<a href="" class="btn btn-danger" id="delete-data"
																data-id="<?php echo $tampil['id_layanan'];?>"><i
																	class="fas fa-trash-alt"></i></a>
														</td>
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
				</section>
			</div>
			<footer class="main-footer">
				<?php include 'menu/footer.php'; ?>
			</footer>
		</div>
	</div>
	<?php include 'menu/script.php'; ?>
	<script type="text/javascript">
	"use strict";
	$("#table-1").dataTable();
	</script>
	<script type="text/javascript">
	$(document).on('click', '#delete-data', function(e) {
		e.preventDefault();
		var id = $(this).data('id');
		swal({
			title: 'Apakah Anda yakin?',
			text: 'Setelah dihapus, Anda tidak dapat memulihkan data ini !',
			icon: 'warning',
			buttons: {
				cancel: {
					text: "Jangan",
					value: false,
					visible: true,
					className: "",
					closeModal: true,
				},
				confirm: {
					text: "Ya, hapus saja!",
					value: true,
					visible: true,
					className: "",
					closeModal: true
				},
			},
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					type: "POST",
					url: "proses/delete-layanan.php",
					data: {
						'id': id
					},
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if (dataresponse.status == "1") {
							swal({
								title: "Pemberitahuan",
								text: "Berhasil menghapus data",
								icon: "success"
							}).then(function() {
								window.location = "aduan";
							});
						} else {
							swal('Peringatan', 'Kesalahan dalam sebuah query', 'error');
						}
					}
				});
			}
		});
	});
	</script>
</body>

</html>