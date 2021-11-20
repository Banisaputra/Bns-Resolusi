<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "","universitas");

function query ($query) {
	global $conn;
	$result = mysqli_query ($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;
	// ambil data dari tiap element dalam form
	$nama =  htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	// upload gambar
	$gambar = upload();
	if (!$gambar){
		return false;
	}

	// query insert data
	$query = "INSERT INTO mahasiswa VALUES ('','$nim','$nama','$email','$jurusan','$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES["gambar"]["name"];
	$ukuranFile = $_FILES["gambar"]["size"];
	$error = $_FILES["gambar"]["error"];
	$tmpName = $_FILES["gambar"]["tmp_name"];

	// cek apakah ada gambar yang diuplod
	if( $error === 4) {
		echo "
			<script>
			alert('pilih gambar untuk diupload');
			</script>
		";
		return false;
	}

	// cek hanya gambar yang bisa diupload
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensi = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensi, $ekstensiGambarValid)){
		echo "
			<script>
			alert('gunakan gambar dengan format yang benar');
			</script>
		";
		return false;
	}

	// cek jika ukuran gambar terlalu besar
	if($ukuranFile > 1000000) {
		echo "
			<script>
			alert('ukuran gambar terlalu besar!');
			</script>
		";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensi;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru );
	return $namaFileBaru;
}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mhs = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;
	// ambil data dari tiap element dalam form
	$id = ($data["id"]);
	$nama =  htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	// cek user ganti gambar atau tidak
	if($_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	// query insert data
	$query = "UPDATE mahasiswa SET nama ='$nama', nim = '$nim',email = '$email',jurusan = '$jurusan',gambar ='$gambar' WHERE id_mhs = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


?>