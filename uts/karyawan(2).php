<?php
    $NIK = array("M001","M002", "M003");
    $Nama = array("Septiana", "Rizki", "Clarissa");
    $TmpLahir = array("Solo", "Jakarta", "Surabaya");
    $TglLahir = array("01-04-1998", "30-03-1985", "12-12-1990");
    date_default_timezone_set('Asia/Jakarta');

    function toMonth($date){
        $d = strtotime($date);
        return date("d F Y", $d);
    }
    function umur($date){
        $d = date("Y", strtotime($date));
        $now = date("Y");

        return $now-$d;
    }
?>
<body>
    <table border="1" cellspacing="0">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Usia</th>
        </tr>
        <?php for($i=0; $i < count($NIK); $i++){ ?>
        <tr>
            <td><?= $NIK[$i] ?></td>
            <td><?= $Nama[$i] ?></td>
            <td><?= $TmpLahir[$i].", ". toMonth($TglLahir[$i]) ?></td>
            <td><?= umur($TglLahir[$i]) ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
