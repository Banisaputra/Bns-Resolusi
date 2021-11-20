<?php
// doctype bns autor
require 'function.php';

error_reporting(0);
$p=$_POST['panjang'];
$l=$_POST['lebar'];
$luas=$_POST['luas'];
$keliling=$_POST['keliling'];
$hasil='';
if($luas){
    $hasil = "Luas Persegi Panjang dengan P=".$p." dan L=".$l." adalah ".$p*$l;
}else if($keliling){
    $hasil = "Keliling Persegi Panjang dengan P=".$p." dan L=".$l." adalah ". ($p+$l)*2;
}
$kali = $_POST['kali'];
$bagi = $_POST['bagi'];
$angka1 = $_POST['angka1'];
$angka2 = $_POST['angka2'];
$hasil2 = '';
if($kali){
    $hasil2 = "Hasil Perkalian ".$angka1." dan ".$angka2." adalah ".$angka1*$angka2;
}else if($bagi){
    $hasil2 = "Hasil Pembagian ".$angka1." dan ".$angka2." adalah ".$angka1/$angka2;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan UTS</title>

</head>
<body>
    <h2>Soal No1</h2>
    <table border='1' width=50% cellspacing='0'>
        <tr>
            <td align='center'>1</td>
            <td colspan='3' align='center'>2</td>
        </tr>
        <tr>
            <td rowspan='2' align='center'>3</td>
            <td align='center'>4</td>
            <td rowspan='2' align='center'>5</td>
            <td align='center'>6</td>
        </tr>
        <tr>
            <td align='center'>7</td>
            <td align='center'>8</td>
        </tr>
    </table>

    <h2>Soal No2</h2>
    <form action="" method='POST' enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="panjang">Masukan Panjang</label></td>
                <td>&nbsp;</td>
                <td><input type="number" name="panjang" id="panjang"></td>
            </tr>
            <tr>
                <td><label for="lebar">Masukan Lebar</label></td>
                <td>&nbsp;</td>
                <td><input type="number" name="lebar" id="lebar"><br></td>
            </tr>       
        </table>
    <input type="submit" name='luas' id='luas' value='Hitung Luas'>
    <input type="submit" name='keliling' id='keliling' value='Hitung Keliling'>
    </form>
    <h4 style='color:blue'><?= $hasil?></h4>

    <h2>Soal No3</h2>
    <form action="" method='POST' enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="panjang">Angka Pertama</label></td>
                <td>&nbsp;</td>
                <td><input type="number" name="angka1" id="panjang"></td>
            </tr>
            <tr>
                <td><label for="lebar">Angka Kedua</label></td>
                <td>&nbsp;</td>
                <td><input type="number" name="angka2" id="lebar"><br></td>
            </tr>       
        </table>
    <input type="submit" name='kali' id='kali' value='Kalikan'>
    <input type="submit" name='bagi' id='bagi' value='Pembagian'>
    </form>
    <h3 style='color:blue'><?= $hasil2?></h3>


    <h2>Soal No4</h2>
    <h4>Data Kependudukan</h4>
    <form action="" method='POST' enctype='multipart/form-data'>
        <table>
            <tr>
                <td>No.KTP</td>
                <td>&nbsp;</td>
                <td><input type="text" name='noktp' id='noktp'></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>&nbsp;</td>
                <td><input type="text" name='nama' id='nama'></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>&nbsp;</td>
                <td><input type="text" name='alamat' id='alamat'></td>
            </tr>    
            <tr>
                <td>Jenis Kelamin</td>
                <td>&nbsp;</td>
                <td><input type="text" name='gender' id='gender'></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>&nbsp;</td>
                <td><input type="text" name='tmpLahir' id='tmplahir'></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>&nbsp;</td>
                <td><input type="date" name='tglLahir' id='tglLahir'></td>
            </tr>
                <td>Status WN</td>
                <td>&nbsp;</td>
                <td><input type="radio" name='status' id='wna' value=WNA>
                <label for="wna">WNA</label>
                <input type="radio" name='status' id='wni' value=WNI>
                <label for="wni">WNI</label></td>
            </tr>
            <tr>
                <td>Pulau</td>
                <td>&nbsp;</td>
                <td><input type="checkbox" name='pulau' id='jawa' value='Jawa'>
                <label for="jawa">Jawa</label>
                <input type="checkbox" name="pulau" id="kalimantan" value='Kalimantan'>
                <label for="kalimantan">Kalimatan</label>
                <input type="checkbox" name="pulau" id="sumatera" value='Sumatera'>
                <label for="sumatera">Sumatera</label>
                <input type="checkbox" name="pulau" id="papua" value='Papua'>
                <label for="papua">Papua</label></td>
            </tr>
        </table><br>
        <input type="submit" name='update' id='update' value='update'>
        <input type="submit" name='delete' id='delete' value='delete'>
        <input type="submit" name='insert' id='insert' value='insert'>
    </form>
<?php
error_reporting(0);
$noktp = $_POST['noktp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];
$tmpLahir = $_POST['tmpLahir'];
$tglLahir = $_POST['tglLahir'];
$status = $_POST['status'];
$pulau = $_POST['pulau'];
$update = $_POST['update'];
$delete = $_POST['delete'];
$insert = $_POST['insert'];

if($update){
    ubah($_POST);
    echo "<script>
    alert('data berhasil diupdate!')
    </script>";
}else if($delete){
    hapus($noktp);
    echo "<script>
    alert('data berhasil dihapus!')
    </script>";
}else if($insert){
    tambah($_POST);
    echo "<script>
    alert('data berhasil ditambahkan!')
    </script>";
}


?>

</body>
</html>