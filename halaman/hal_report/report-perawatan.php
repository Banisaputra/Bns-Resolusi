<?php
session_start();
  include "../../config/koneksi.php";
  include "../../config/library.php";

// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "<script>alert('Untuk mengakses halaman, Anda harus login dulu.'
        <meta http-equiv='refresh' content='0;url=index.php'>"; 
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
?>
<html>
<head>
<title> :: LAPORAN DATA PERAWATAN</title>
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<script src="../../assets/js/highcharts.js"></script>
</head>
<body>
<center>

<h2> LAPORAN DATA PERAWATAN </h2>
<p><?php echo"Range Date : $_POST[dari] s/d $_POST[sampai]";?></p>
</center>
<div style="align: left;" id="blokgraf1">
  chart here..
</div>
<?php
if($_POST['dari'] !=='' && $_POST['sampai'] !==''){
 $query  = "SELECT * FROM perawatan inner join prodi using(id_prodi) inner join mesin using(id_mesin) WHERE tgl BETWEEN  '$_POST[dari]' AND '$_POST[sampai]' ORDER BY id_jadwal";
        $tampil = mysqli_query($konek, $query);
}
else {
$query  = "SELECT * FROM perawatan a
            inner join prodi b using(id_prodi)
      inner join mesin c using(id_mesin) ORDER BY id_jadwal";
        $tampil = mysqli_query($konek, $query);
}
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
<script type="text/javascript">
      Highcharts.chart('blokgraf1', {
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
        },
        title: {
          text: 'Laporan Penggunaan Peralatan Laboratorium FT UMS'
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
          point: {
            valueSuffix: '%'
          }
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
          }
        },
        series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [
            // {name: 'Chrome', y: 41.41},
            // {name: 'Internet Explorer', y: 31.84},
            // {name: 'Other', y: 2.61}

            <?php
            $data = mysqli_query($konek, "SELECT id_mesin AS mesin,count(*) AS jumlah FROM perawatan WHERE tgl_jadwal BETWEEN '$_POST[dari]' AND '$_POST[sampai]' GROUP BY id_mesin ORDER BY id_mesin");
            while ($x = mysqli_fetch_array($data)) {
              $mesin = $x['mesin'];
              $jumlah = $x['jumlah'];
              echo "
            {name: '$mesin', y: $jumlah},";
            }
            ?>
          ]
        }]
      });
    </script>

</body>
</html>
<?php
  
}
?>