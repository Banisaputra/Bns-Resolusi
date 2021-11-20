<?php 
session_start();

if( !isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// mengambil data dalam URL
$id = $_GET["id"];
// query data berdasar id
$mhs = query ("SELECT * FROM mahasiswa WHERE id_mhs = $id")[0];


// cek tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {
	// cek apakah data berhasil diubah atau tidak
	if ( ubah($_POST) > 0) {
		echo "
			<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('data gagal diubah!');
			document.location.href = 'index.php';
			</script>
		";
	}
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>update data mahasiswa</title>
</head>
<body>
<h1>update data mahasiswa</h1>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $mhs['id_mhs']; ?>">
	<input type="hidden" name="gambarLama" value="<?= $mhs['gambar']; ?>">
	<ul>
		<li>
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
		</li>
		<li>
			<label for="nim">Nim :</label>
			<input type="text" name="nim" id="nim"required value="<?= $mhs["nim"]; ?>">
		</li>
		<li>
			<label for="email">Email :</label>
			<input type="text" name="email" id="email"required value="<?= $mhs["email"]; ?>">
		</li>
		<li>
			<label for="jurusan">Jurusan :</label>
			<input type="text" name="jurusan" id="jurusan"required value="<?= $mhs["jurusan"]; ?>">
		</li>
		<li>
			<label for="gambar">Gambar :</label><br>
			<img src="img/<?= $mhs['gambar']; ?>" width="100" ><br>
			<input type="file" name="gambar" id="gambar" >
		</li>
		<li>
			<button type="submit" name="submit">Ubah Data</button>
		</li>
	</ul>


</form>
</body>
</html>