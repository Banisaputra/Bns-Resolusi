<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
  include "config/koneksi.php";
  include "config/library.php";

  // Home (Beranda)
  if ($_GET['halamane']=='beranda'){               
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user' OR $_SESSION['leveluser']=='teknisi' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_beranda/beranda.php";
    }  
  }

  // User
  elseif ($_GET['halamane']=='user'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_user/user.php";
    }
  }

// prodi
  elseif ($_GET['halamane']=='prodi'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_prodi/prodi.php";
    }
  }

  // Teknisi
  elseif ($_GET['halamane']=='teknisi'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_teknisi/teknisi.php";
    }
  }

  // Status
  elseif ($_GET['halamane']=='status'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_status/status.php";
    }
  }

  // Mesin
  elseif ($_GET['halamane']=='mesin'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_mesin/mesin.php";
    }
  }

   // Jadwal
  elseif ($_GET['halamane']=='jadwal'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='teknisi' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_jadwal/jadwal.php";
    }
  }

    // Perbaikan
  elseif ($_GET['halamane']=='perbaikan'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='teknisi' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_perbaikan/perbaikan.php";
    }
  }

    // Perbaikan Approval
  elseif ($_GET['halamane']=='perbaikan-approval'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='teknisi' OR $_SESSION['leveluser']=='user' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_perbaikan_approval/perbaikan_approval.php";
    }
  }

   // Report
  elseif ($_GET['halamane']=='report'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_report/report.php";
    }
  }

   // Riwayat Mesin
  elseif ($_GET['halamane']=='riwayat'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='superAdm'){
      include "halaman/hal_report/report-riwayat.php";
    }
  }

  // Apabila halaman tidak ditemukan
  else{
    echo "<p>halaman tidak ada.</p>";
  }
}
?>
