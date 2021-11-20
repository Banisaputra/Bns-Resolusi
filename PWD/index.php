<?php
require "function.php";

$mahasiswa = query ("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
	<table border='1' cellpadding='20' cellspacing='0'>
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
			<th>Gambar</th>
		</tr>
		<?php $i = 1; ?>
		<?php foreach ($mahasiswa as $row) : ?>
		<tr>
			<td><?= $i; ?></td>
			<td><a href = "edit.php">Edit</a> |
				<a href = "delete.php">Delete</a></td>
			<td><?= $row ["nim"]; ?></td>
			<td><?= $row ["nama"]; ?></td>
			<td><?= $row ["email"]; ?></td>
			<td><?= $row ["jurusan"]; ?></td>
			<td><img src = "images/<?= $row ['gambar']; ?>" width = "50" height ="50"></td>
		</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
		
</body>
</html>

