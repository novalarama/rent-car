<?php
include("../connection.php");
# menampung data yang dikirim

$tgl_sewa = $_POST["tgl_sewa"];
$durasi = $_POST["durasi"];

# perintah SQL untuk insert ke table sewa
$sql = "insert into sewa values
('','','','$tgl_sewa','$durasi')";

if (mysqli_query($connect, $sql)) {
    header('Location:list-sewa.php');
}else{
    # jia gagal insert tabel sewa
    echo mysqli_error($connect);
}
?>