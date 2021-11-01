<?php
include("../connection.php");

if (isset($_POST["simpan_karyawan"])) {
    // tampung data input anggota dari user
    
    $nama_karyawan = $_POST["nama_karyawan"];
    $alamat_karyawan = $_POST["alamat_karyawan"];
    $kontak = $_POST["kontak"];
    $username = $_POST["username"];
    $password = sha1($_POST["password"]);

    //membuat perintah sql untuk insert data ke table anggota
    $sql = "insert into karyawan values
    ('','$nama_karyawan','$alamat_karyawan','$kontak','$username','$password')";

    //eksekusi perintah sql
    $tambah = mysqli_query($connect, $sql);

    //direct ke halaman list-anggota
    if ($tambah) {
        header('Location:list-karyawan.php');
    } else {
        printf('Gagal'.mysqli_error($connect));
        exit();
    }

# untuk update

}else if(isset($_POST["edit_karyawan"])){
        # menampung dulu data yang akan di update
        $id_karyawan = $_POST["id_karyawan"];
        $nama_karyawan = $_POST["nama_karyawan"];
        $alamat_karyawan = $_POST["alamat_karyawan"];
        $kontak = $_POST["kontak"];
        $username = $_POST["username"];

        //karena password bersifat optional, maka

        if (empty($_POST["password"])) {
            // password tidak ikut teredit
            $sql = "update karyawan set
            nama_karyawan='$nama_karyawan',
            alamat_karyawan='$alamat_karyawan',
            kontak='$kontak',
            username='$username'
            where id_karyawan='$id_karyawan'";
        } else {
            // password ikut teredit
            $password = sha1($_POST["password"]);
            $sql = "update karyawan set
            nama_karyawan='$nama_karyawan',
            alamat_karyawan='$alamat_karyawan',
            kontak='$kontak',
            username='$username',
            password='$password'
            where id_karyawan='$id_karyawan'";
        }
        
        $edit = mysqli_query($connect, $sql);
        
        if ($edit) {
            header('Location:list-karyawan.php');
        } else {
            printf('Gagal'.mysqli_error($connect));
            exit();
        }
        
}
?>