<?php
include("../connection.php");

if (isset($_POST["simpan_pelanggan"])) {
    // tampung data input anggota dari user
    
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat_pelanggan = $_POST["alamat_pelanggan"];
    $kontak = $_POST["kontak"];

    //membuat perintah sql untuk insert data ke table anggota
    $sql = "insert into pelanggan values
    ('','$nama_pelanggan','$alamat_pelanggan','$kontak')";

    //eksekusi perintah sql
    $tambah = mysqli_query($connect, $sql);

    //direct ke halaman list-anggota
    if ($tambah) {
        header('Location:list-pelanggan.php');
    } else {
        printf('Gagal'.mysqli_error($connect));
        exit();
    }

# untuk update

}else if(isset($_POST["edit_pelanggan"])){
        # menampung dulu data yang akan di update
        $id_pelanggan = $_POST["id_pelanggan"];
        $nama_pelanggan = $_POST["nama_pelanggan"];
        $alamat_pelanggan = $_POST["alamat_pelanggan"];
        $kontak = $_POST["kontak"];

        $sql = "update pelanggan set nama_anggota='$nama_anggota', alamat_anggota='$alamat_anggota',
        kontak='$kontak' where id_anggota='$id_anggota'";
        
        $edit = mysqli_query($connect, $sql);
        
        if ($edit) {
            header('Location:list-pelanggan.php');
        } else {
            printf('Gagal'.mysqli_error($connect));
            exit();
        }
        
}
?>