<?php
include("../connection.php");
# menampung data yang dikirim

$id_sewa = $_POST["id_sewa"];
$id_karyawan = $_POST["id_karyawan"];
$id_pelanggan = $_POST["id_pelanggan"];
$tgl_sewa = $_POST["tgl_sewa"];
$durasi = $_POST["durasi"];
$mobil = $_POST["id_mobil"]; //array
// $biaya_sewa = $_POST["biaya_sewa"];
$biaya_sewa =0;
for ($i=0; $i < count($mobil); $i++) { 
    // select mobil
    $id_mobil = $mobil[$i];
    $sql = "select * from mobil where id_mobil ='$id_mobil'";
    $hasil = mysqli_query($connect, $sql);
    $car = mysqli_fetch_array($hasil);
    $biaya = $car["biaya_sewa"];

    $biaya_sewa += $durasi * $biaya;
}

// $total_bayar = $biaya_sewa*$durasi;
# perintah SQL untuk insert ke table sewa
$sql = "insert into sewa values
('$id_sewa','$id_karyawan','$id_pelanggan','$tgl_sewa','$durasi','$biaya_sewa')";

if (mysqli_query($connect, $sql)) {
    # jika berhasil insert ke tabel sewa
    # insert ke tabel detail sewa
    for ($i=0; $i < count($mobil); $i++) { 
        $id_mobil = $mobil[$i];
        
        $sql = "insert into detail_sewa values
        ('$id_sewa','$id_mobil')";
        if (mysqli_query($connect, $sql)) {
            
        }else {
            # jika gaga insert ke table detail_sewa
            echo mysqli_error($connect);
            exit;
        }
    }
    header('Location:list-sewa.php');
}else{
    # jia gagal insert tabel sewa
    echo mysqli_error($connect);
}
?>