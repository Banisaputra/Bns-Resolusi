<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<script>alert('Untuk mengakses halaman, Anda harus login dulu.'
        <meta http-equiv='refresh' content='0;url=index.php'>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";

  $halamane = $_GET['halamane'];
  $act    = $_GET['act'];

  // Input perbaikan
  if ($halamane=='perbaikan-approval' AND $act=='input'){
    $id_perbaikan   = trim(htmlspecialchars($_POST['id_perbaikan']));
    $tgl_buat = trim(htmlspecialchars($_POST['tgl_buat']));
    $id_mesin = trim(htmlspecialchars($_POST['id_mesin']));
    $judul = trim(htmlspecialchars($_POST['judul']));
    $keterangan = trim(htmlspecialchars($_POST['keterangan']));
    $input = "INSERT INTO perbaikan(id_perbaikan, tgl_buat, id_mesin, id_user, judul, keterangan) 
              VALUES('$id_perbaikan','$tgl_buat','$id_mesin','$_SESSION[username]','$judul','$keterangan')";
    mysqli_query($konek, $input);
    header("location:../../site.php?halamane=".$halamane);
  }

  // Input Penggunaan
  if ($halamane=='penggunaan' AND $act=='input2'){
    $id_penggunaan   = trim(htmlspecialchars($_POST['id_penggunaan']));
    $tgl = trim(htmlspecialchars($_POST['tgl_buat']));
    $id_prodi = trim(htmlspecialchars($_POST['id_prodi']));
    $id_mesin = trim(htmlspecialchars($_POST['id_mesin']));
    $judul = trim(htmlspecialchars($_POST['judul']));
    $keterangan = trim(htmlspecialchars($_POST['keterangan']));
    $input = "INSERT INTO penggunaan (id_penggunaan, tgl_penggunaan, id_prodi, id_user, id_mesin, judul, keterangan) 
              VALUES('$id_penggunaan','$tgl','$id_prodi','$_SESSION[username]','$id_mesin','$judul','$keterangan')";
    mysqli_query($konek, $input);
    echo"<script>alert('Data Berhasil Ditambahkan')</script>";
    header("location:../../site.php?halamane=".$halamane."&act=penggunaan");
  
  }

  
  // Update perbaikan
  elseif ($halamane=='perbaikan-approval' AND $act=='update'){
    $id_perbaikan   = trim(htmlspecialchars($_POST['id_perbaikan']));
    $tgl_buat = trim(htmlspecialchars($_POST['tgl_buat']));
    $id_mesin = trim(htmlspecialchars($_POST['id_mesin']));
    $judul = trim(htmlspecialchars($_POST['judul']));
    $keterangan = trim(htmlspecialchars($_POST['keterangan']));

    $update = "UPDATE perbaikan SET tgl_buat = '$tgl_buat',
							id_mesin = '$id_mesin',
							id_user = '$_SESSION[username]',
							judul = '$judul',
							keterangan = '$keterangan'
              WHERE id_perbaikan = '$id_perbaikan'";
      mysqli_query($konek, $update);
      header("location:../../site.php?halamane=".$halamane);
  }

  // hapus perbaikan
  elseif ($halamane=='perbaikan-approval' AND $act=='hapus'){
      mysqli_query($konek, "DELETE FROM perbaikan WHERE id_perbaikan='$_GET[id]'"); 
      header("location:../../site.php?halamane=".$halamane);
  }
  //update status
  elseif ($halamane=='perbaikan-approval' AND $act=='updatestatus') {
    mysqli_query($konek, "UPDATE perbaikan SET id_teknisi='$_SESSION[username]',status = '$_GET[s]' WHERE id_perbaikan ='$_GET[id]'");
    header("location:../../site.php?halamane=".$halamane);
  }
}
?>
