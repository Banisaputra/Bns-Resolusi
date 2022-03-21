<?php
// Apabila mesin belum login
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";
}
// Apabila mesin sudah login dengan benar, maka terbentuklah session
else {
  $aksi = "halaman/hal_mesin/aksi_mesin.php";
  $id_prodi = $_SESSION['id_prodi'];

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';

  switch ($act) {
      // Tampil mesin
    default:
      echo " <div class='row'>
                  <div class='col-xs-12'>
                  
                    <div class='clearfix'>
                      <div class='pull-right tableTools-container'></div>
                      
                      <button class='btn btn-white btn-info btn-bold' onclick=window.location.href=\"?halamane=mesin&act=tambahmesin\"><i class='ace-icon glyphicon glyphicon-plus'></i>
                        Tambah mesin</button>
                    </div>
                    <br/>
                    <div class='table-header'>
                      Tabel mesin View
                    </div>
                    <div>";
      if($_SESSION['leveluser']== 'superAdm'){
      $query  = "SELECT * FROM mesin inner join prodi using(id_prodi) ORDER BY id_mesin";
      }else{
      $query  = "SELECT * FROM mesin inner join prodi using(id_prodi) WHERE mesin.id_prodi = '$id_prodi' ORDER BY id_mesin";
      }
      $tampil = mysqli_query($konek, $query);

      echo "<table id='dynamic-table1' class='table table-striped table-bordered table-hover'>
                        <thead>
                          <tr>
                            <th class='center'>No</th>
                            <th>ID mesin</th>
                            <th>Nama mesin</th>
                            <th>Merk Mesin</th>
                            <th>Kapasitas</th>
                            <th>prodi</th>
                            <th>Tahun_pembuatan</th>
                            <th>Periode Pakai</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>";

      $no = 1;
      while ($r = mysqli_fetch_array($tampil)) {
        echo "
                          <tr>
                            <td class='center'>$no</td>
                            <td>$r[id_mesin]</td>
                            <td>$r[nama_mesin]</td>
							              <td>$r[merk_mesin]</td>
                            <td>$r[kapasitas]</td>
                            <td>$r[nama_prodi]</td>
                            <td>$r[tahun_pembuatan]</td>
                            <td>$r[periode_pakai]</td>
                            <td>
                              <div class='hidden-sm hidden-xs action-buttons'>
                                
                                <a class='green' href='?halamane=mesin&act=editmesin&id=$r[id_mesin]'>
                                  <i class='ace-icon fa fa-pencil bigger-130'></i>
                                </a>

                                <a class='red' href='$aksi?halamane=mesin&act=hapus&id=$r[id_mesin]'>
                                  <i class='ace-icon fa fa-trash-o bigger-130'></i>
                                </a>
                              </div>

                              <div class='hidden-md hidden-lg'>
                                <div class='inline pos-rel'>
                                  <button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown' data-position='auto'>
                                    <i class='ace-icon fa fa-caret-down icon-only bigger-120'></i>
                                  </button>

                                  <ul class='dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close'>
                                    

                                    <li>
                                      <a href='?halamane=mesin&act=editmesin&id=$r[id_mesin]' class='tooltip-success' data-rel='tooltip' title='Edit'>
                                        <span class='green'>
                                          <i class='ace-icon fa fa-pencil-square-o bigger-120'></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href='$aksi?halamane=mesin&act=hapus&id=$r[id_mesin]' class='tooltip-error' data-rel='tooltip' title='Delete'>
                                        <span class='red'>
                                          <i class='ace-icon fa fa-trash-o bigger-120'></i>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                          </tr>";
        $no++;
      }
      echo "</tbody>
                      </table>
                    </div>
                  </div>
                </div>
";
      break;

    case "tambahmesin":
      //GET Kode Otomastis.........
      $query = "select max(id_mesin) as maksi from mesin";
      $hasil = mysqli_query($konek, $query);
      $data_oto  = mysqli_fetch_array($hasil);
      $kode_user = buatkode($data_oto['maksi'], 'MC', 3);

      echo " <div class='row'>
    <div class='col-xs-12'>
                      <div class='widget-box'>
                        <div class='widget-header'>
                          <h4 class='widget-title'>Form Tambah mesin</h4>

                          <div class='widget-toolbar'>
                            <a href='#' data-action='collapse'>
                              <i class='ace-icon fa fa-chevron-up'></i>
                            </a>
                          </div>
                        </div>

                        <div class='widget-body'>
                          <div class='widget-main'>
                          <form method=\"POST\" action=\"$aksi?halamane=mesin&act=input\">
                            <div>
                              <label>ID mesin</label>
                              <input type=\"text\" name=\"id_mesin\" class='form-control' placeholder='ID mesin' required='required' value='$kode_user' readonly='yes'>
                            </div>
                            <hr />

                             <div>
                              <label>Nama mesin</label>
                              <input type=\"text\" name=\"nama_mesin\" class='form-control' placeholder='Nama mesin' required='required'>
                            </div>
                            <hr />
							
							 <div>
                              <label>Merk Mesin</label>
                              <input type=\"text\" name=\"merk_mesin\" class='form-control' placeholder='Merk mesin' required='required'>
                            </div>
                            <hr />
							
							<div>
                              <label>Kapasitas</label>
                              <input type=\"text\" name=\"kapasitas\" class='form-control' placeholder='Kapasitas' required='required'>
                            </div>
                            <hr />
							
							 <div>
                              <label>Pilih prodi</label>
                              <select name=\"id_prodi\" class='form-control' required='required'>
            <option value='' selected>- Pilih prodi -</option>";
      $query  = "SELECT * FROM prodi ORDER BY nama_prodi";
      $tampil = mysqli_query($konek, $query);
      while ($r = mysqli_fetch_array($tampil)) {
        echo "<option value=\"$r[id_prodi]\">$r[nama_prodi]</option>";
      }
      echo "</select>
                            </div>
                            <hr />
							
							<div>
                              <label>Tahun Pembuatan</label>
                              <input type=\"text\" name=\"tahun_pembuatan\" class='form-control' placeholder='Tahun Pembuatan' required='required'>
                            </div>
                            <hr />
							
							<div>
                              <label>Periode</label>
                              <input type=\"text\" name=\"periode_pakai\" class='form-control' placeholder='Periode Pakai' required='required'>
                            </div>
                            <hr />

                            <div class='clearfix form-actions'>
                        <div class='col-md-offset-3 col-md-9'>
                      <button class='btn btn-info' type='submit'>
                        <i class='ace-icon fa fa-check bigger-110'></i>
                        Submit
                      </button>

                      &nbsp; &nbsp; &nbsp;
                      <button class='btn' type='reset' onclick=\"self.history.back()\">
                        <i class='ace-icon fa fa-undo bigger-110'></i>
                        Reset
                      </button>
                    </div>
                  </div>

                  </form>

                            
                          </div>
                        </div>
                      </div>
                    </div><!-- /.span -->
    </div>";

      break;

    case "editmesin":
      $query = "SELECT * FROM mesin WHERE id_mesin='$_GET[id]'";
      $hasil = mysqli_query($konek, $query);
      $r     = mysqli_fetch_array($hasil);

      echo " <div class='row'>
    <div class='col-xs-12'>
                      <div class='widget-box'>
                        <div class='widget-header'>
                          <h4 class='widget-title'>Form Ubah mesin</h4>

                          <div class='widget-toolbar'>
                            <a href='#' data-action='collapse'>
                              <i class='ace-icon fa fa-chevron-up'></i>
                            </a>
                          </div>
                        </div>

                        <div class='widget-body'>
                          <div class='widget-main'>
                          <form method=\"POST\" action=\"$aksi?halamane=mesin&act=update\">
                            <div>
                              <label for='form-field-8'>ID mesin</label>
                              <input type=\"text\" name=\"id_mesin\" class='form-control' placeholder='ID mesin' required='required' value='$r[id_mesin]' readonly='yes'>
                            </div>
                            <hr />

                             <div>
                              <label for='form-field-8'>Nama mesin</label>
                              <input type=\"text\" name=\"nama_mesin\" class='form-control' placeholder='Nama mesin' required='required' value='$r[nama_mesin]'>
                            </div>
                            <hr />
							
							<div>
                              <label>Merk Mesin</label>
                              <input type=\"text\" name=\"merk_mesin\" class='form-control' placeholder='Merk mesin' required='required' value='$r[merk_mesin]'>
                            </div>
                            <hr />
							
							<div>
                              <label>Kapasitas</label>
                              <input type=\"text\" name=\"kapasitas\" class='form-control' placeholder='Kapasitas' required='required' value='$r[kapasitas]'>
                            </div>
                            <hr />
							
							 <div>
                              <label>Pilih Prodi</label>
                              <select name=\"id_prodi\" class='form-control' required='required'>";

      if ($r['id_prodi'] == 0) {
        echo "<option value='' selected>- Pilih prodi -</option>";
      }

      $query2 = "SELECT * FROM prodi ORDER BY nama_prodi";
      $tampil = mysqli_query($konek, $query2);

      while ($w = mysqli_fetch_array($tampil)) {
        if ($r['id_prodi'] == $w['id_prodi']) {
          echo "<option value=\"$w[id_prodi]\" selected>$w[nama_prodi]</option>";
        } else {
          echo "<option value=\"$w[id_prodi]\">$w[nama_prodi]</option>";
        }
      }

      echo "</select>
                            </div>
                            <hr />
							
							<div>
                              <label>Tahun Pembuatan</label>
                              <input type=\"text\" name=\"tahun_pembuatan\" class='form-control' placeholder='Tahun Pembuatan' required='required' value='$r[tahun_pembuatan]'>
                            </div>
                            <hr />
							
							<div>
                              <label>Periode</label>
                              <input type=\"text\" name=\"periode_pakai\" class='form-control' placeholder='Periode Pakai' required='required' value='$r[periode_pakai]'>
                            </div>
                            <hr />


                            <div class='clearfix form-actions'>
                        <div class='col-md-offset-3 col-md-9'>
                      <button class='btn btn-info' type='submit'>
                        <i class='ace-icon fa fa-check bigger-110'></i>
                        Submit
                      </button>

                      &nbsp; &nbsp; &nbsp;
                      <button class='btn' type='reset' onclick=\"self.history.back()\">
                        <i class='ace-icon fa fa-undo bigger-110'></i>
                        Reset
                      </button>
                    </div>
                  </div>

                  </form>

                            
                          </div>
                        </div>
                      </div>
                    </div><!-- /.span -->
    </div>";

      break;
  }
}
