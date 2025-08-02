<?php
include 'panel/koneksi.php';
$status_aspirasiaduan = $_POST['status_aspirasiaduan2'];

echo "<option value=''>Pilih Aspirasi</option>";

$select2 = mysqli_query($conn, "SELECT * FROM tb_aspirasiaduan WHERE status_aspirasiaduan = '$status_aspirasiaduan'");
while($option2 = mysqli_fetch_array($select2)) {
	echo "<option value='".$option2['id_aspirasiaduan']."'>".$option2['nama_aspirasiaduan']."</option>";
}
?>