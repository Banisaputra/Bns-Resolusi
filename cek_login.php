<?php
include "config/koneksi.php";
// fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
  return $filter;
}

$username = anti_injection($_POST['username']);
$password = anti_injection($_POST['password']);
$query = "SELECT * FROM user WHERE id_user='$username' AND password='$password'";
$login = mysqli_query($konek, $query);
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// Apabila username dan password ditemukan (benar)
if($ketemu > 0) {
  session_start();
  // bikin variabel session
  $_SESSION['username'] = $r['id_user'];
  $_SESSION['passuser'] = $r['password'];
  $_SESSION['namauser'] = $r['nama_user'];
  $_SESSION['leveluser'] = $r['level'];
  $_SESSION['id_prodi'] = $r['id_prodi'];

  // bikin id_session yang unik dan mengupdatenya agar slalu berubah 
  // agar user biasa sulit untuk mengganti password Administrator 
  $sid_lama = session_id();
  session_regenerate_id();
  $sid_baru = session_id();
  header("location:site.php?halamane=beranda");
}else {
  echo "<script>alert('Login Gagal!, Username atau Password Salah.')</script>
    <meta http-equiv='refresh' content='0;url=index.php'>";
}
