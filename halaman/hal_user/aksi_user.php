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

  // Input user
  if($halamane=='user' AND $act=='input'){
    $id_user = trim(htmlspecialchars($_POST['id_user']));
    $nama_user = trim(htmlspecialchars($_POST['nama_user']));
    $password = trim(htmlspecialchars($_POST['password']));
    $id_prodi = trim(htmlspecialchars($_POST['id_prodi']));
    $level = trim(htmlspecialchars($_POST['level']));
    $input = "INSERT INTO user(id_user, nama_user, password, id_prodi, level) VALUES('$id_user','$nama_user','$password','$id_prodi','$level')";
    mysqli_query($konek, $input);
    header("location:../../site.php?halamane=".$halamane);
  }

  // Update user
  elseif ($halamane=='user' AND $act=='update'){
    $id_user   = trim(htmlspecialchars($_POST['id_user']));
    $nama_user = trim(htmlspecialchars($_POST['nama_user']));
    $password  = trim(htmlspecialchars($_POST['password']));
    $id_prodi  = trim(htmlspecialchars($_POST['id_prodi']));
    $level  = trim(htmlspecialchars($_POST['level']));
    $update = "UPDATE user SET nama_user = '$nama_user',password = '$password', id_prodi = '$id_prodi', level = '$level' WHERE id_user = '$id_user'";
    mysqli_query($konek, $update);
    header("location:../../site.php?halamane=".$halamane);
  }
  elseif ($halamane=='user' AND $act=='hapus'){
    mysqli_query($konek, "DELETE FROM user WHERE id_user='$_GET[id]'"); 
    header("location:../../site.php?halamane=".$halamane);
  }
}
?>
