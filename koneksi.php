<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "dkpkub_banten";

    $koneksi  = mysqli_connect($host, $username, $password, $database);

    if(!$koneksi){
        echo "Koneksi Gagal";
    }
    function query($query)
    {
        // Koneksi database
        global $koneksi;
    
        $result = mysqli_query($koneksi, $query);
    
        // membuat varibale array
        $rows = [];
    
        // mengambil semua data dalam bentuk array
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    
        return $rows;
    }
    //membuat fungsi tambah data
    function tambah($data)
    {
        global $koneksi;

        // Periksa apakah kunci ada sebelum mengaksesnya
        $kab_kota = isset($data['kab_kota']) ? $data['kab_kota'] : '';
        $nama_kub = isset($data['nama_kub']) ? $data['nama_kub'] : '';
        $alamat_kub = isset($data['alamat_kub']) ? $data['alamat_kub'] : '';
        $ketua = isset($data['ketua']) ? $data['ketua'] : '';
        $notelp = isset($data['notelp']) ? $data['notelp'] : '';
        $jumlah_anggota = isset($data['jumlah_anggota']) ? $data['jumlah_anggota'] : '';
        $aktifnon = isset($data['aktifnon']) ? $data['aktifnon'] : '';
        $kelas_kub = isset($data['kelas_kub']) ? $data['kelas_kub'] : '';
        $b_kabkota = isset($data['b_kabkota']) ? $data['b_kabkota'] : '';
        $b_prvo = isset($data['b_prvo']) ? $data['b_prvo'] : '';
        $b_kkp = isset($data['b_kkp']) ? $data['b_kkp'] : '';
        $belum = isset($data['belum']) ? $data['belum'] : '';
        $verif = isset($data['verif']) ? $data['verif'] : '';

        // Upload file
        $kusuka = upload_file('kusuka');
        $npwp = upload_file('npwp');
        $akte_notaris = upload_file('akte_notaris');
        $sertifikat_ahu = upload_file('sertifikat_ahu');
        $nib_oss = upload_file('nib_oss');

        // Lakukan operasi tambah data
        $query = "INSERT INTO `sensus`(`kab_kota`, `nama_kub`, `alamat_kub`, `ketua`, `notelp`, `jumlah_anggota`, `aktifnon`, `kusuka`, `npwp`, `akte_notaris`, `sertifikat_ahu`, `nib_oss`, `kelas_kub`, `b_kabkota`, `b_prvo`, `b_kkp`, `belum`, `verif`) VALUES ('$kab_kota','$nama_kub','$alamat_kub','$ketua','$notelp','$jumlah_anggota','$aktifnon','$kusuka','$npwp','$akte_notaris','$sertifikat_ahu','$nib_oss','$kelas_kub','$b_kabkota','$b_prvo','$b_kkp','$belum','$verif')";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function upload_file($fieldName) {
        // Cek apakah file diunggah
        if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] === UPLOAD_ERR_NO_FILE) {
            return null; // Atau Anda bisa melakukan tindakan lainnya
        }
    
        $namaFile = $_FILES[$fieldName]['name'];
        $ukuranFile = $_FILES[$fieldName]['size'];
        $error = $_FILES[$fieldName]['error'];
        $tmpName = $_FILES[$fieldName]['tmp_name'];
    
        $extensifileValid = ['jpg', 'jpeg', 'png', 'pdf'];
        $extensifile = explode('.', $namaFile);
        $extensifile = strtolower(end($extensifile));
    
        if ($ukuranFile > 2048000) {
            echo "<script> alert('Ukuran File Max 2 MB');
            document.location.href = 'inputdatakub.php';
            </script>";
            die();
        }
    
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $extensifile;
    
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }
    
    

 // Membuat fungsi hapus data
    function hapus($id)
    {
        global $koneksi;
    
        mysqli_query($koneksi, "DELETE FROM sensus WHERE id = $id");
        return mysqli_affected_rows($koneksi);
    }

    //membuat fungsi ubah data
    function update($data)
    {
        global $koneksi;

        if ($_FILES['kusuka']['error'] === 4) {
            $kusuka = $data['kusukalama'];
        } else {
            $kusuka = upload_file('kusuka');
        }
        if ($_FILES['npwp']['error'] === 4) {
            $npwp = $data['npwplama'];
        } else {
            $npwp = upload_file('npwp');
        }
        if ($_FILES['akte_notaris']['error'] === 4) {
            $akte_notaris = $data['akte_notarislama'];
        } else {
            $akte_notaris = upload_file('akte_notaris');
        }
        if ($_FILES['sertifikat_ahu']['error'] === 4) {
            $sertifikat_ahu = $data['sertifikat_ahulama'];
        } else {
            $sertifikat_ahu = upload_file('sertifikat_ahu');
        }
        if ($_FILES['nib_oss']['error'] === 4) {
            $nib_oss = $data['nib_osslama'];
        } else {
            $nib_oss = upload_file('nib_oss');
        }

        $id = $data['id'];
        $kab_kota = $data['kab_kota'];
        $nama_kub = $data['nama_kub'];
        $alamat_kub = $data['alamat_kub'];
        $ketua = $data['ketua'];
        $notelp = $data['notelp'];
        $jumlah_anggota = $data['jumlah_anggota'];
        $aktifnon = $data['aktifnon'];
        $kelas_kub = $data['kelas_kub'];
        $b_kabkota = $data['b_kabkota'];
        $b_prvo = $data['b_prvo'];
        $b_kkp = $data['b_kkp'];
        $belum = $data['belum'];

        $sql = "UPDATE `sensus` SET kab_kota='$kab_kota',nama_kub='$nama_kub',alamat_kub='$alamat_kub',ketua='$ketua',notelp='$notelp',jumlah_anggota='$jumlah_anggota',aktifnon='$aktifnon',kusuka='$kusuka',npwp='$npwp',akte_notaris='$akte_notaris',sertifikat_ahu='$sertifikat_ahu',nib_oss='$nib_oss',kelas_kub='$kelas_kub',b_kabkota='$b_kabkota',b_prvo='$b_prvo',b_kkp='$b_kkp',belum='$belum' WHERE id = $id";

        mysqli_query($koneksi, $sql);

        return mysqli_affected_rows($koneksi);
    }


    function updateData($table, $data, $condition)
    {
        global $koneksi;

        $setValues = "";
        $setParams = array();
        foreach ($data as $key => $value) {
            $setValues .= "$key = ?, ";
            $setParams[] = $value;
        }
        $setValues = rtrim($setValues, ", ");

        $conditionValues = "";
        $conditionParams = array();
        foreach ($condition as $key => $value) {
            $conditionValues .= "$key = ? AND ";
            $conditionParams[] = $value;
        }
        $conditionValues = rtrim($conditionValues, " AND ");

        $stmt = $koneksi->prepare("UPDATE $table SET $setValues WHERE $conditionValues");

        if (!$stmt) {
            die("Error in preparing statement: " . $koneksi->error);
        }

        $types = str_repeat("s", count($setParams) + count($conditionParams));
        $values = array_merge($setParams, $conditionParams);

        if (!$stmt->bind_param($types, ...$values)) {
            die("Error in binding parameters: " . $stmt->error);
        }

        // Menjalankan query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

    $stmt->close();
    $koneksi->close();

    
}


?>