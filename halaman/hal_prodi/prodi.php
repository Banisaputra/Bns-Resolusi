<?php
// Apabila prodi belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>Untuk mengakses halaman, Anda harus login dulu.</h1><p><a href=\"index.php\">LOGIN</a></p>";  
}
// Apabila prodi sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "halaman/hal_prodi/aksi_prodi.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    // Tampil prodi
    default:
     echo" <div class='row'>
                  <div class='col-xs-12'>
                    <div class='clearfix'>
                      <div class='pull-right tableTools-container'></div>";
                      if($_SESSION['leveluser'] == 'superAdm'){
                      echo"
                      <button class='btn btn-white btn-info btn-bold' onclick=window.location.href=\"?halamane=prodi&act=tambahprodi\"><i class='ace-icon glyphicon glyphicon-plus'></i>
                        Tambah Program Studi</button>";}
                    echo"
                    </div>
                    <br/>
                    <div class='table-header'>
                      Tabel prodi View
                    </div>
                    <div>";

        $query  = "SELECT * FROM prodi ORDER BY id_prodi";
        $tampil = mysqli_query($konek, $query);

                      echo"<table id='dynamic-table1' class='table table-striped table-bordered table-hover'>
                        <thead>
                          <tr>
                            <th class='center'>No</th>
                            <th>ID Program Studi</th>
                            <th>Nama Program Studi</th>";
                            if($_SESSION['leveluser'] == 'superAdm'){
                              echo"<th>Aksi</th>";}
                          echo"
                          </tr>
                        </thead>
                        <tbody>"; 
            
      $no = 1;
      while ($r=mysqli_fetch_array($tampil)){
        echo "
                          <tr>
                            <td class='center'>$no</td>
                            <td>$r[id_prodi]</td>
                            <td>$r[nama_prodi]</td>";
                            if($_SESSION['leveluser'] == 'superAdm'){
                            echo"
                            <td>
                              <div class='hidden-sm hidden-xs action-buttons'>
                                <a class='green' href='?halamane=prodi&act=editprodi&id=$r[id_prodi]'>
                                  <i class='ace-icon fa fa-pencil bigger-130'></i>
                                </a>
                                <a class='red' href='$aksi?halamane=prodi&act=hapus&id=$r[id_prodi]'>
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
                                      <a href='?halamane=prodi&act=editprodi&id=$r[id_prodi]' class='tooltip-success' data-rel='tooltip' title='Edit'>
                                        <span class='green'>
                                          <i class='ace-icon fa fa-pencil-square-o bigger-120'></i>
                                        </span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href='$aksi?halamane=prodi&act=hapus&id=$r[id_prodi]' class='tooltip-error' data-rel='tooltip' title='Delete'>
                                        <span class='red'>
                                          <i class='ace-icon fa fa-trash-o bigger-120'></i>
                                        </span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </td>";}
                            echo"
                          </tr>";
                          $no++;
                         }
                          echo "</tbody>
                      </table>
                    </div>
                  </div>
                </div>";
    break;
  
    case "tambahprodi":
     //GET Kode Otomastis.........
      $query = "select max(id_prodi) as maksi from prodi";
      $hasil = mysqli_query($konek, $query);
      $data_oto  = mysqli_fetch_array($hasil);
      $kode_user=buatkode($data_oto['maksi'], 'DV00', 1);

    echo" <div class='row'>
    <div class='col-xs-12'>
                      <div class='widget-box'>
                        <div class='widget-header'>
                          <h4 class='widget-title'>Form Tambah Prodi</h4>

                          <div class='widget-toolbar'>
                            <a href='#' data-action='collapse'>
                              <i class='ace-icon fa fa-chevron-up'></i>
                            </a>
                          </div>
                        </div>

                        <div class='widget-body'>
                          <div class='widget-main'>
                          <form method=\"POST\" action=\"$aksi?halamane=prodi&act=input\">
                            <div>
                              <label>ID prodi</label>
                              <input type=\"text\" name=\"id_prodi\" class='form-control' placeholder='ID prodi' required='required' value='$kode_user' readonly='yes'>
                            </div>
                            <hr />

                             <div>
                              <label>Nama Prodi</label>
                              <input type=\"text\" name=\"nama_prodi\" class='form-control' placeholder='Nama prodi' required='required'>
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
    
    case "editprodi":
      $query = "SELECT * FROM prodi WHERE id_prodi='$_GET[id]'";
      $hasil = mysqli_query($konek, $query);
      $r     = mysqli_fetch_array($hasil);

      echo" <div class='row'>
    <div class='col-xs-12'>
                      <div class='widget-box'>
                        <div class='widget-header'>
                          <h4 class='widget-title'>Form Ubah prodi</h4>

                          <div class='widget-toolbar'>
                            <a href='#' data-action='collapse'>
                              <i class='ace-icon fa fa-chevron-up'></i>
                            </a>
                          </div>
                        </div>

                        <div class='widget-body'>
                          <div class='widget-main'>
                          <form method=\"POST\" action=\"$aksi?halamane=prodi&act=update\">
                            <div>
                              <label for='form-field-8'>ID prodi</label>
                              <input type=\"text\" name=\"id_prodi\" class='form-control' placeholder='ID prodi' required='required' value='$r[id_prodi]' readonly='yes'>
                            </div>
                            <hr />

                             <div>
                              <label for='form-field-8'>Nama prodi</label>
                              <input type=\"text\" name=\"nama_prodi\" class='form-control' placeholder='Nama prodi' required='required' value='$r[nama_prodi]'>
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
?>
