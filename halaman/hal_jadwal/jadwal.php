<script type="text/javascript" src="halaman/hal_perbaikan/jquery.js"></script>
<script language="javascript">
	$(document).ready(function() {
		$('#id_prodi').change(function() {
			var category = $(this).val();
			$.ajax({
				type: 'GET',
				url: 'halaman/hal_perbaikan/select-for-ajax.php',
				data: 'KoDe_TIPE=' + category, // Untuk data di MySQL dengan menggunakan kata kunci tsb
				dataType: 'html',
				beforeSend: function() {
					$('#id_mesin').html('<tr><td colspan=2>Loading ....</td></tr>');
				},
				success: function(response) {
					$('#id_mesin').html(response);
				}
			});
		});
	});
</script>
<?php
// Apabila jadwal belum login
if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {
	echo "<script>alert('Untuk mengakses halaman, Anda harus login dulu.'
	<meta http-equiv='refresh' content='0;url=index.php'>";
}
// Apabila jadwal sudah login dengan benar, maka terbentuklah session
else {
	$aksi = "halaman/hal_jadwal/aksi_jadwal.php";
	$id_prodi = $_SESSION['id_prodi'];
	// mengatasi variabel yang belum di definisikan (notice undefined index)
	$act = isset($_GET['act']) ? $_GET['act'] : '';

	switch ($act) {
	// Tampil jadwal
		default:
			echo "
			<div class='row'>
				<div class='col-xs-12'>    
                    <div class='clearfix'>
						<div class='pull-right tableTools-container'></div>
                      	<button class='btn btn-white btn-info btn-bold' onclick=window.location.href=\"?halamane=jadwal&act=tambahjadwal\"><i class='ace-icon glyphicon glyphicon-plus'></i>
                        Tambah jadwal</button>
                    </div><br/>
                    <div class='table-header'>
                      Tabel Perbaikan Rutin View
                    </div>
                    <div>";
					if($_SESSION['leveluser']=='superAdm'){
					$query  = "SELECT * FROM perawatan a inner join prodi b using(id_prodi) inner join mesin c using(id_mesin) ORDER BY id_jadwal";
					}else{
					$query  = "SELECT * FROM perawatan a inner join prodi b using(id_prodi) inner join mesin c using(id_mesin) WHERE a.id_prodi = '$id_prodi' ORDER BY id_jadwal";
					}
					$tampil = mysqli_query($konek, $query);
					echo "
					<table id='dynamic-table1' class='table table-striped table-bordered table-hover'>
            			<thead>
                			<tr>
            				    <th class='center'>No</th>
            				    <th>ID jadwal</th>
            				    <th>Tanggal</th>
            				    <th>Nama prodi</th>
            				    <th>Nama Mesin</th>
            				    <th>Point Check</th>
            				    <th>Tanggal Jadwal</th>
            				    <th>Status</th>";
								if ($_SESSION['leveluser'] == 'admin' OR $_SESSION['leveluser']=='superAdm') {
									echo "<th>Aksi</th>";
								}
					echo "</tr>
						</thead>
						<tbody>";
			$no = 1;
			while ($r = mysqli_fetch_array($tampil)) {
				echo "
                <tr>
                    <td class='center'>$no</td>
                    <td>$r[id_jadwal]</td>
					<td>$r[tgl]</td>
                    <td>$r[nama_prodi]</td>
					<td>$r[nama_mesin]</td>
                    <td>$r[point_chek]</td>
                    <td>$r[tgl_jadwal]</td>
                    <td>";
				if ($r['status'] == 'Open') {
					echo "
					<div class='btn-group'>
                    	<button data-toggle='dropdown' class='btn btn-xs btn-danger dropdown-toggle'>
                        Open <i class='ace-icon fa fa-angle-down icon-on-right'></i>
                       	</button>
                     	<ul class='dropdown-menu dropdown-danger'>
                     		<li><a href='$aksi?halamane=jadwal&act=updatestatus&id=$r[id_jadwal]&s=Waiting'>Waiting</a></li>
                     		<li><a href='$aksi?halamane=jadwal&act=updatestatus&id=$r[id_jadwal]&s=Closed'>Closed</a></li>
                    	</ul>
                    </div>";
				} elseif ($r['status'] == 'Waiting') {
					echo "
					<div class='btn-group'>
                        <button data-toggle='dropdown' class='btn btn-xs btn-warning dropdown-toggle'>
                        Waiting <i class='ace-icon fa fa-angle-down icon-on-right'></i>
                        </button>
                        <ul class='dropdown-menu dropdown-warning'>
                        	<li><a href='$aksi?halamane=jadwal&act=updatestatus&id=$r[id_jadwal]&s=Open'>Open</a></li>
                          	<li><a href='$aksi?halamane=jadwal&act=updatestatus&id=$r[id_jadwal]&s=Closed'>Closed</a></li>
                        </ul>
                	</div>";
				} elseif ($r['status'] == 'Closed') {
					echo "
					<div class='btn-group'>
                    	<button data-toggle='dropdown' class='btn btn-xs btn-success dropdown-toggle'>
                    	Closed <i class='ace-icon fa fa-angle-down icon-on-right'></i>
                        </button>
                    </div>";
				}
				echo "</td>";
				if ($_SESSION['leveluser'] == 'admin' OR $_SESSION['leveluser'] == 'superAdm') {
					echo "
                    <td><div class='hidden-sm hidden-xs action-buttons'>
                        	<a class='green' href='?halamane=jadwal&act=editjadwal&id=$r[id_jadwal]'>
                            	<i class='ace-icon fa fa-pencil bigger-130'></i>
                            </a>
                            <a class='red' href='$aksi?halamane=jadwal&act=hapus&id=$r[id_jadwal]'>
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
                                      <a href='?halamane=jadwal&act=editjadwal&id=$r[id_jadwal]' class='tooltip-success' data-rel='tooltip' title='Edit'>
                                        <span class='green'>
                                          <i class='ace-icon fa fa-pencil-square-o bigger-120'></i>
                                        </span>
                                      </a>
                                    </li>
                                    <li>
                                      	<a href='$aksi?halamane=jadwal&act=hapus&id=$r[id_jadwal]' class='tooltip-error' data-rel='tooltip' title='Delete'>
                                        	<span class='red'>
                                          		<i class='ace-icon fa fa-trash-o bigger-120'></i>
                                        	</span>
                                      	</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
					</td>";
				}
				echo "</tr>";
				$no++;
			}
			echo "</tbody>
            			</table>
        				</div>
    				</div>
				</div>";
			break;

		case "tambahjadwal":
			//GET Kode Otomastis
			$query = "select max(id_jadwal) as maksi from perawatan";
			$hasil = mysqli_query($konek, $query);
			$data_oto  = mysqli_fetch_array($hasil);
			$kode_user = buatkode($data_oto['maksi'], 'SC', 3);

			echo "
			<div class='row'>
    			<div class='col-xs-12'>
                    <div class='widget-box'>
                        <div class='widget-header'>
                        	<h4 class='widget-title'>Form Tambah jadwal</h4>
                          	<div class='widget-toolbar'>
                            	<a href='#' data-action='collapse'>
                              		<i class='ace-icon fa fa-chevron-up'></i>
                            	</a>
                          	</div>
                        </div>
                        <div class='widget-body'>
                          	<div class='widget-main'>
                          		<form method=\"POST\" action=\"$aksi?halamane=jadwal&act=input\">
                            		<div>
                              			<label>Kode Jadwal</label>
										<div class='row'>
											<div class='col-xs-8 col-sm-2'>
												<div class='input-group'>
                              						<input type=\"text\" name=\"id_jadwal\" class='form-control' placeholder='ID jadwal' required='required' value='$kode_user' readonly='yes'>
                            						<span class='input-group-addon'>
														<i class='fa fa-key bigger-110'></i>
													</span>
												</div>
											</div>
										</div><hr/>
										<label for=\"id-date-picker-1\">Tanggal Jadwal</label>
										<div class='row'>
											<div class='col-xs-8 col-sm-6'>
												<div class='input-group'>
													<input class='form-control date-picker' id='id-date-picker-2' type='text' name=\"tgl\" data-date-format='yyyy-mm-dd' required='required'/>
													<span class='input-group-addon'>
														<i class='fa fa-calendar bigger-110'></i>
													</span>
												</div>
											</div>
										</div><hr/>
										<div class='row'>
											<div class='col-xs-8 col-sm-6'>
												<div class='form-group'>
													<label for='form-field-select-3'>Pilih prodi</label>
													<div>
														<select name=\"id_prodi\" id='id_prodi' class='form-control' required='required'>
															<option value='' selected>- Pilih prodi -</option>";
															$query  = "SELECT * FROM prodi ORDER BY nama_prodi";
															$tampil = mysqli_query($konek, $query);
															while ($r = mysqli_fetch_array($tampil)) {
																echo "<option value=\"$r[id_prodi]\">$r[nama_prodi]</option>";
															}
															echo "</select>
													</div>
												</div>
											</div>
										</div><hr/>							
										<div class='row'>
											<div class='col-xs-8 col-sm-6'>
												<div class='form-group'>
													<label for='form-field-select-3'>Pilih Mesin</label>
													<div>
														<select name=\"id_mesin\" id='id_mesin' class='form-control' required='required'>
															<option value='' selected>- Pilih mesin -</option>";
															$query  = "SELECT * FROM mesin ORDER BY nama_mesin";
															$tampil = mysqli_query($konek, $query);
															while ($r = mysqli_fetch_array($tampil)) {
																echo "<option value=\"$r[id_mesin]\">$r[nama_mesin]</option>";
															}
															echo "</select>
													</div>
												</div>
											</div>
										</div><hr/>
										<label for=\"id-date-picker-1\">Point Check</label>
										<div class='row'>
											<div class='col-xs-8 col-sm-6'>
												<div class='input-group'>
													<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Pengecekan Arus Listrik Komponen'/>
														<span class='lbl'> Pengecekan Arus Listrik Komponen</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Filter Pelumas'/>
														<span class='lbl'> Filter Pelumas</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Oil Coller'/>
														<span class='lbl'> Oil Coller</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Pembersihan Kotoran'/>
														<span class='lbl'> Pembersihan Kotoran</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<label for=\"id-date-picker-1\">Tanggal Jadwal</label>
									<div class='row'>
										<div class='col-xs-8 col-sm-6'>
											<div class='input-group'>
												<input class='form-control date-picker' id='id-date-picker-1' type='text' data-date-format='yyyy-mm-dd' name='tgl_jadwal' required='required'/>
												<span class='input-group-addon'>
													<i class='fa fa-calendar bigger-110'></i>
												</span>
											</div>
										</div>
									</div>
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

		case "editjadwal":
			$query = "SELECT * FROM perawatan WHERE id_jadwal='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$r = mysqli_fetch_array($hasil);
			echo " 
			<div class='row'>
    			<div class='col-xs-12'>
            		<div class='widget-box'>
                		<div class='widget-header'>
                    		<h4 class='widget-title'>Form Ubah jadwal</h4>
                          	<div class='widget-toolbar'>
                            	<a href='#' data-action='collapse'>
                              		<i class='ace-icon fa fa-chevron-up'></i>
                            	</a>
                          	</div>
                        </div>
                        <div class='widget-body'>
                          	<div class='widget-main'>
                          		<form method=\"POST\" action=\"$aksi?halamane=jadwal&act=update\">

                              		<label>Kode Jadwal</label>
									<div class='row'>
										<div class='col-xs-8 col-sm-2'>
											<div class='input-group'>
                              					<input type=\"text\" name=\"id_jadwal\" class='form-control' placeholder='ID jadwal' required='required' value='$_GET[id]' readonly='yes'>
                            					<span class='input-group-addon'>
													<i class='fa fa-key bigger-110'></i>
												</span>
											</div>
										</div>
									</div><hr/>
									<label for=\"id-date-picker-1\">Tanggal Jadwal</label>
									<div class='row'>
										<div class='col-xs-8 col-sm-6'>
											<div class='input-group'>
												<input class='form-control date-picker' id='id-date-picker-2' type='text' name=\"tgl\" data-date-format='yyyy-mm-dd' required='required' value='$r[tgl]'/>
												<span class='input-group-addon'>
													<i class='fa fa-calendar bigger-110'></i>
												</span>
											</div>
										</div>
									</div><hr/>
									<div class='row'>
              							<div class='col-xs-8 col-sm-6'>
              								<div class='form-group'>
              									<label for='form-field-select-3'>Pilih prodi</label>
              									<div>
           											<select name=\"id_prodi\" id='id_prodi' class='form-control' required='required'>";
													$tampilX = mysqli_query($konek, "SELECT * FROM mesin WHERE id_mesin='$r[id_mesin]'");
													$d = mysqli_fetch_array($tampilX);
													if ($d['id_prodi'] == 0) {
														echo "<option value='' selected>- Pilih prodi -</option>";
													}
													$query2 = "SELECT * FROM prodi ORDER BY nama_prodi";
													$tampil = mysqli_query($konek, $query2);
													while ($w = mysqli_fetch_array($tampil)) {
														if ($d['id_prodi'] == $w['id_prodi']) {
															echo "<option value=\"$w[id_prodi]\" selected>$w[nama_prodi]</option>";
														} else {
															echo "<option value=\"$w[id_prodi]\">$w[nama_prodi]</option>";
														}
													}
													echo "</select>
												</div>
											</div>
										</div>
									</div><hr/>
									<div class='row'>
										<div class='col-xs-8 col-sm-6'>
											<div class='form-group'>
												<label for='form-field-select-3'>Pilih Mesin</label>
												<div>
													<select name=\"id_mesin\" id='id_mesin' class='form-control' required='required'>";
													if ($r['id_mesin'] == 0) {
														echo "<option value='' selected>- Pilih mesin -</option>";
													}
													$query2 = "SELECT * FROM mesin ORDER BY nama_mesin";
													$tampil = mysqli_query($konek, $query2);
													while ($w = mysqli_fetch_array($tampil)) {
														if ($r['id_mesin'] == $w['id_mesin']) {
															echo "<option value=\"$w[id_mesin]\" selected>$w[nama_mesin]</option>";
														} else {
															echo "<option value=\"$w[id_mesin]\">$w[nama_mesin]</option>";
														}
													}
													echo "</select>
												</div>
											</div>
										</div>
									</div><hr/>
									<label for=\"id-date-picker-1\">Point Check</label>
									<div class='row'>
										<div class='col-xs-8 col-sm-6'>
											<div class='input-group'>";

											if ($r['point_chek'] == 'Pengecekan Arus Listrik Komponen') {
												echo "<div class='radio'>
												<label>
													<input name='point_chek' type='radio' class='ace' value='Pengecekan Arus Listrik Komponen' checked/>
													<span class='lbl'> Pengecekan Arus Listrik Komponen</span>
												</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Filter Pelumas'/>
														<span class='lbl'> Filter Pelumas</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Oil Coller'/>
														<span class='lbl'> Oil Coller</span>
													</label>
												</div>		
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Pembersihan Kotoran'/>
														<span class='lbl'> Pembersihan Kotoran</span>
													</label>
												</div>";
											} elseif ($r['point_chek'] == 'Filter Pelumas') {
												echo "<div class='radio'>
												<label>
													<input name='point_chek' type='radio' class='ace' value='Pengecekan Arus Listrik Komponen'/>
													<span class='lbl'> Pengecekan Arus Listrik Komponen</span>
												</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Filter Pelumas' checked/>
														<span class='lbl'> Filter Pelumas</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Oil Coller'/>
														<span class='lbl'> Oil Coller</span>
													</label>
												</div>			
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Pembersihan Kotoran'/>
														<span class='lbl'> Pembersihan Kotoran</span>
													</label>
												</div>";
											} elseif ($r['point_chek'] == 'Oil Coller') {
												echo "<div class='radio'>
												<label>
													<input name='point_chek' type='radio' class='ace' value='Pengecekan Arus Listrik Komponen'/>
													<span class='lbl'> Pengecekan Arus Listrik Komponen</span>
												</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Filter Pelumas'/>
														<span class='lbl'> Filter Pelumas</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Oil Coller' checked/>
														<span class='lbl'> Oil Coller</span>
													</label>
												</div>			
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Pembersihan Kotoran'/>
														<span class='lbl'> Pembersihan Kotoran</span>
													</label>
												</div>";
											} elseif ($r['point_chek'] == 'Pembersihan Kotoran') {
												echo "<div class='radio'>
												<label>
													<input name='point_chek' type='radio' class='ace' value='Pengecekan Arus Listrik Komponen'/>
													<span class='lbl'> Pengecekan Arus Listrik Komponen</span>
												</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Filter Pelumas'/>
														<span class='lbl'> Filter Pelumas</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Oil Coller'/>
														<span class='lbl'> Oil Coller</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Pembersihan Kotoran' checked/>
														<span class='lbl'> Pembersihan Kotoran</span>
													</label>
												</div>";
											} else {
												echo "<div class='radio'>
												<label>
													<input name='point_chek' type='radio' class='ace' value='Pengecekan Arus Listrik Komponen'/>
													<span class='lbl'> Pengecekan Arus Listrik Komponen</span>
												</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Filter Pelumas'/>
														<span class='lbl'> Filter Pelumas</span>
													</label>
												</div>
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Oil Coller'/>
														<span class='lbl'> Oil Coller</span>
													</label>
												</div>			
												<div class='radio'>
													<label>
														<input name='point_chek' type='radio' class='ace' value='Pembersihan Kotoran'/>
														<span class='lbl'> Pembersihan Kotoran</span>
													</label>
												</div>";
											}
									echo "</div>
										</div>
									</div>
									<label for=\"id-date-picker-1\">Tanggal Jadwal</label>
									<div class='row'>
										<div class='col-xs-8 col-sm-6'>
											<div class='input-group'>
												<input class='form-control date-picker' id='id-date-picker-1' type='text' data-date-format='yyyy-mm-dd' name='tgl_jadwal' required='required' value='$r[tgl_jadwal]'/>
												<span class='input-group-addon'>
													<i class='fa fa-calendar bigger-110'></i>
												</span>
											</div>
										</div>
									</div>
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


