<?php
$hasil = 0;
$hasil2 = 0;
for($bil=1; $bil<=100; $bil++){
    if ($bil%2 != 0){
        $hasil += 1;
        $hasil2 += $bil;
    }
}

echo "Banyak bilangan ganjil antara 1 -100 adalah $hasil </br>";
echo "Jumlah bilangan ganjil antara 1 -100 adalah $hasil2";
?>