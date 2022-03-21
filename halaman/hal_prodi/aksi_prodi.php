<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";

  $halamane = $_GET['halamane'];
  $act    = $_GET['act'];

  // Input prodi
  if ($halamane=='prodi' AND $act=='input'){
    $id_prodi   = trim(htmlspecialchars($_POST['id_prodi']));
    $nama_prodi = trim(htmlspecialchars($_POST['nama_prodi']));

    $input = "INSERT INTO prodi(id_prodi, 
                                nama_prodi) 
                         VALUES('$id_prodi', 
                                '$nama_prodi')";
    mysqli_query($konek, $input);
    header("location:../../site.php?halamane=".$halamane);
  }

  // Update prodi
  elseif ($halamane=='prodi' AND $act=='update'){
    $id_prodi   = trim(htmlspecialchars($_POST['id_prodi']));
    $nama_prodi = trim(htmlspecialchars($_POST['nama_prodi']));

     $update = "UPDATE prodi SET nama_prodi = '$nama_prodi' 
                            WHERE id_prodi = '$id_prodi'";
      mysqli_query($konek, $update);
      header("location:../../site.php?halamane=".$halamane);
  }

   // hapus prodi
  elseif ($halamane=='prodi' AND $act=='hapus'){
      mysqli_query($konek, "DELETE FROM prodi WHERE id_prodi='$_GET[id]'"); 
       header("location:../../site.php?halamane=".$halamane);
  }
}
?>
