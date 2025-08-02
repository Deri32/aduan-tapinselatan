<?php
    include("panel/koneksi.php");
        if ($_GET['nik']==''){
            $data = array(
                'nama_lengkap'      => '',
                'telepon'      => '',
                'pekerjaan'      => '',
                'tempat_lahir'      => '',
                'alamat'      => '',
                'tanggal_lahir'      => '',
                'jenis_kelamin'      => '',
                );
     echo json_encode($data);
     
        }else{
        $kueri = mysqli_query($conn, "SELECT * FROM tb_masyarakat WHERE nik='$_GET[nik]'");
        $tampil = mysqli_fetch_array($kueri);

        $data = array(
                    'nama_lengkap'      =>  $tampil['nama_lengkap'],
                    'telepon'      =>  $tampil['telepon'],
                    'pekerjaan'      =>  $tampil['pekerjaan'],
                    'tempat_lahir'      =>  $tampil['tempat_lahir'],
                    'alamat'      =>  $tampil['alamat'],
                    'tanggal_lahir'      =>  $tampil['tanggal_lahir'],
                    'jenis_kelamin'      =>  $tampil['jenis_kelamin'],
                    );
         echo json_encode($data);
        }
?>