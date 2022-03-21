<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else {
?>
  <div class="row">
    <div class="col-sm-12">
      <div class="widget-box">
        <div class="widget-header">
          <h4 class="widget-title">REKAP DATA <?php echo "" . strtoupper($_GET['id']) . ""; ?> MESIN</h4>
          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>
        <div class="widget-body">
          <div class="widget-main">
            <form method="POST" action="halaman/hal_report/report-<?php echo "$_GET[id]"; ?>.php" target="blank">
              <label for="timepicker1">Dari</label>
              <div class="input-group col-xs-8 col-sm-6">
                <input name='dari' class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" readonly='true' required='required' />
                <span class="input-group-addon">
                  <i class="fa fa-calendar bigger-110"></i>
                </span>
              </div>
              <hr />
              <label for="timepicker1">Sampai</label>
              <div class="input-group col-xs-8 col-sm-6">
                <input name='sampai' class="form-control date-picker" id="id-date-picker-2" type="text" data-date-format="yyyy-mm-dd" readonly='true' required='required' />
                <span class="input-group-addon">
                  <i class="fa fa-calendar bigger-110"></i>
                </span>
              </div>
              <hr />
              <div class='clearfix form-actions'>
                <div class='col-md-offset-4 col-md-6'>
                  <button class='btn btn-info' type='submit'>
                    <i class='ace-icon fa fa-check bigger-110'></i>
                    Submit
                  </button>
                </div>
              </div>
            </form>
            <div id="blokgraf1">
              chart here..
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    Highcharts.chart('blokgraf1', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Laboratorium FT UMS'
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
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
        name: 'Jumlah',
        colorByPoint: true,
        data: [
          // {name: 'Chrome', y: 41.41},
          // {name: 'Internet Explorer', y: 31.84},
          // {name: 'Other', y: 2.61}

          <?php
            $id_prodi = $_SESSION['id_prodi'];
            if($_GET['id']=='penggunaan'){
              if($_SESSION['leveluser']=='superAdm'){
                $data = mysqli_query($konek, "SELECT nama_mesin AS mesin, id_mesin AS idm, count(*) AS jumlah FROM penggunaan INNER JOIN mesin USING(id_mesin) GROUP BY mesin.id_mesin ORDER BY penggunaan.id_mesin");
              }else{
                $data = mysqli_query($konek, "SELECT nama_mesin AS mesin, id_mesin AS idm, count(*) AS jumlah FROM penggunaan INNER JOIN mesin USING(id_mesin) WHERE penggunaan.id_prodi = '$id_prodi' GROUP BY mesin.id_mesin ORDER BY penggunaan.id_mesin");
              } 
              while ($x = mysqli_fetch_array($data)) {
              $idm = $x['idm'];
              $jumlah = $x['jumlah'];
              $mesin = $x['mesin'];
              echo "{name: '$idm', y: $jumlah},";
              }
            }elseif($_GET['id']=='perawatan'){
              if($_SESSION['leveluser']=='superAdm'){
                $data = mysqli_query($konek, "SELECT id_mesin AS mesin,count(*) AS jumlah FROM perawatan GROUP BY id_mesin ORDER BY id_mesin");
              }else{
                $data = mysqli_query($konek, "SELECT id_mesin AS mesin,count(*) AS jumlah FROM perawatan WHERE perawatan.id_prodi = '$id_prodi' GROUP BY id_mesin ORDER BY id_mesin");
              }            
              while ($x = mysqli_fetch_array($data)){
                $mesin = $x['mesin'];
                $jumlah = $x['jumlah'];
                echo "{name: '$mesin', y: $jumlah},";
              }
            }elseif($_GET['id']=='perbaikan'){
              if($_SESSION['leveluser']=='superAdm'){
                $data = mysqli_query($konek, "SELECT id_mesin AS mesin,count(*) AS jumlah FROM perbaikan GROUP BY id_mesin ORDER BY id_mesin");
              }else{
                $data = mysqli_query($konek, "SELECT id_mesin AS mesin,count(*) AS jumlah FROM perbaikan WHERE perbaikan.id_prodi = '$id_prodi' GROUP BY id_mesin ORDER BY id_mesin");
              }
              while ($x = mysqli_fetch_array($data)) {
                $mesin = $x['mesin'];
                $jumlah = $x['jumlah'];
                echo "{name: '$mesin', y: $jumlah},";
              }
            }
          ?>
        ]
      }]
    });
  </script>

<?php } ?>