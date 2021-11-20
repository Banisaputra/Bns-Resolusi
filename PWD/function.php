<?php
// doctype bns author
$conn = mysqli_connect('localhost','root','','latihanuts');

function tambah($data){
	global $conn;
	// ambil data dari tiap element dalam form
	$noktp = htmlspecialchars($data['noktp']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $gender = htmlspecialchars($data['gender']);
    $tmpLahir = htmlspecialchars($data['tmpLahir']);
    $tglLahir = htmlspecialchars($data['tglLahir']);
    $status = htmlspecialchars($data['status']);
    $pulau = htmlspecialchars($data['pulau']);

    $query = "INSERT INTO penduduk VALUES ('$noktp','$nama','$alamat','$gender','$tmpLahir','$tglLahir','$status','$pulau')";
	mysqli_query($conn, $query);
}

function hapus($noktp){
	global $conn;
	mysqli_query($conn, "DELETE FROM penduduk WHERE no_ktp ='$noktp'");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;
	// ambil data dari tiap element dalam form
	$noktp = htmlspecialchars($data['noktp']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $gender = htmlspecialchars($data['gender']);
    $tmpLahir = htmlspecialchars($data['tmpLahir']);
    $tglLahir = htmlspecialchars($data['tglLahir']);
    $status = htmlspecialchars($data['status']);
    $pulau = htmlspecialchars($data['pulau']);

    $query = "UPDATE penduduk SET no_ktp='$noktp', nama='$nama',alamat='$alamat',jenis_kelamin='$gender',tempat_lahir='$tmpLahir',
    tanggal_lahir='$tglLahir',status_wn='$status',pulau='$pulau' WHERE no_ktp='$noktp'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


?>
