<?php 
require 'functions.php';

$mahasiswa = query ("SELECT * FROM mahasiswa");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		.loader {
			width: 80px;
			position: absolute;
			top: 130px;
			left: 350px;
			z-index: -1;
			display: none;
		}
		@media print {
			.logout, .tambah, .form-cari, .aksi{
				display: none;
			}
		}
	</style>
</head>
<body>

<h1>Daftar Mahasiswa</h1>
<a href="tambah.php" class="tambah">Tambah Data Mahasiswa</a>
<br><br>
<div id='container'>
<br>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th class="aksi">Aksi</th>
		<th>Gambar</th>
		<th>NIM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
	<?php $no = 1; ?>
	<?php foreach($mahasiswa as $row) : ?>
		
	<tr>
		<td><?= $no; ?></td>
		<td class="aksi">
			<a href="ubah.php?id=<?= $row["id_mhs"]; ?>">ubah</a> | <a href="hapus.php?id=<?= $row["id_mhs"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus?');">hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" width="50" height="50"></td>
		<td><?= $row["nim"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $no++; ?>
	<?php endforeach; ?>

</table>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>