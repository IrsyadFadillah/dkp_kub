<?php
require 'koneksi.php';

$sensus = query("SELECT * FROM sensus ORDER BY id DESC");

// Membuat nama file
$filename = "Data KUB DKP PROVINSI BANTEN -" . date('Ymd') . ".xls";

// Kodingan untuk export ke excel
header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Data KUB DKP PROVINSI BANTEN.xls");
?>

<table class="table text-start align-middle table-bordered" border="1">
    <tr class="text-dark table-border">
        <th style="border-color: grey;" rowspan="2">NO</td>
        <th style="border-color: grey;" rowspan="2">KAB / KOTA</td>
        <th style="border-color: grey;" rowspan="2">NAMA KUB</td>
        <th style="border-color: grey;" rowspan="2">ALAMAT KUB</td>
        <th style="border-color: grey;" rowspan="2">KETUA</td>
        <th style="border-color: grey;" rowspan="2">N0.TELP/ HP</td>
        <th style="border-color: grey;" rowspan="2">JUMLAH ANGGOTA</td>
        <th style="border-color: grey;" rowspan="2">AKTIF / NONAKTIF</td>
        <th style="border-color: grey;" colspan="5">KELENGKAPAN ADMINISTRASI KUB</td>
        <th style="border-color: grey;" rowspan="2">KELAS KUB</td>
        <th style="border-color: grey;" colspan="4">BANTUAN PEMERINTAH YANG PERNAH DITERIMA</td>
    </tr>
    <tr class="text-dark table-border">
        <th style="border-color: grey;">KUSUKA KUB</td>
        <th style="border-color: grey;">NPWP KUB</td>
        <th style="border-color: grey;">AKTE NOTARIS</td>
        <th style="border-color: grey;">SERTIFIKAT AHU</td>
        <th style="border-color: grey;">NIB-OSS</td>
        <th style="border-color: grey;">KAB/KOTA</td>
        <th style="border-color: grey;">PRVO</td>
        <th style="border-color: grey;">KKP</td>
        <th style="border-color: grey;">BELUM DIKATEGORIKAN</td>
    </tr>
    <?php
    $i = 1;
    foreach ($sensus as $row) :
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row["kab_kota"]; ?></td>
            <td><?php echo $row["nama_kub"]; ?></td>
            <td><?php echo $row["alamat_kub"]; ?></td>
            <td><?php echo $row["ketua"]; ?></td>
            <td><?php echo $row["notelp"]; ?></td>
            <td><?php echo $row["jumlah_anggota"]; ?></td>
            <td><?php echo $row["aktifnon"]; ?></td>
            <td><?php echo $row["kusuka"] ? '&#10003;' : '&#10007;'; ?></td>
            <td><?php echo $row["npwp"] ? '&#10003;' : '&#10007;'; ?></td>
            <td><?php echo $row["akte_notaris"] ? '&#10003;' : '&#10007;'; ?></td>
            <td><?php echo $row["sertifikat_ahu"] ? '&#10003;' : '&#10007;'; ?></td>
            <td><?php echo $row["nib_oss"] ? '&#10003;' : '&#10007;'; ?></td>
            <td><?php echo $row["kelas_kub"]; ?></td>
            <td><?php echo $row["b_kabkota"]; ?></td>
            <td><?php echo $row["b_prvo"]; ?></td>
            <td><?php echo $row["b_kkp"]; ?></td>
            <td><?php echo $row["belum"]; ?></td>
        </tr>
        <?php
        $i++;
    endforeach;
    ?>
</table>
