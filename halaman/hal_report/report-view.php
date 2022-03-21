<?php
session_start();
  include "../../config/koneksi.php";
  include "../../config/library.php";

// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{

?>
<html>
<head>
<title> :: Laporan Data Petugas - Universitas Internasional Batam</title>
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
</head>
<body>
<h2> LAPORAN DATA PERAWATAN </h2>
<?php
 $query  = "SELECT * FROM perawatan a
            inner join prodi b using(id_prodi)
      inner join mesin c using(id_mesin) ORDER BY id_jadwal";
        $tampil = mysqli_query($konek, $query);
echo"<table class='table-list' width='100%' border='0' cellspacing='1' cellpadding='2'>
                        <thead>
                          <tr>
                            <td bgcolor='#F5F5F5'>No</td>
                            <td bgcolor='#F5F5F5'>ID jadwal</td>
                            <td bgcolor='#F5F5F5'>Tanggal</td>
                            <td bgcolor='#F5F5F5'>Nama prodi</td>
                            <td bgcolor='#F5F5F5'>Nama Mesin</td>
                            <td bgcolor='#F5F5F5'>Point Check</td>
                            <td bgcolor='#F5F5F5'>Tanggal Jadwal</td>
                            <td bgcolor='#F5F5F5'>Status</td>
                          </tr>
                        </thead>
                        <tbody>"; 
            
      $no = 1;
      while ($r=mysqli_fetch_array($tampil)){
        echo "
                          <tr>
                            <td class='center'>$no</td>
                            <td>$r[id_jadwal]</td>
                            <td>$r[tgl]</td>
                            <td>$r[nama_prodi]</td>
                            <td>$r[nama_mesin]</td>
                            <td>$r[point_chek]</td>
                            <td>$r[tgl_jadwal]</td>
                            <td>$r[status]</td>
                            
                          </tr>";
                          $no++;
                         }
                          echo "</tbody>
                      </table>";
?>
<img src="btn_print.png" width="20" onClick="javascript:window.print()" />
</body>
</html>
<?php
  
}
?>