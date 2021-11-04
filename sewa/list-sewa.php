<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyewaan</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include("../home.php") ?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">Daftar Penyewaan</h4>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    <?php
                        include("../connection.php");
                        $sql ="select sewa.*, pelanggan.*, karyawan.*, penyewaan.id_pengembalian, penyewaan.tgl_pengembalian, penyewaan.denda
                        from sewa inner join pelanggan
                        on pelanggan.id_pelanggan=sewa.id_pelanggan
                        inner join karyawan
                        on sewa.id_karyawan=karyawan.id_karyawan
                        left outer join penyewaan
                        on sewa.id_sewa=penyewaan.id_sewa";

                        $hasil = mysqli_query($connect, $sql);
                        while ($sewa = mysqli_fetch_array($hasil)) {
                    ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">id sewa</small>
                                    <h5><?=($sewa["id_sewa"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Peminjam</small>
                                    <h5><?=($sewa["nama_pelanggan"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">karyawan</small>
                                    <h5><?=($sewa["nama_karyawan"])?></h5>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <small class="text-info">Tanggal sewa</small>
                                    <h5><?=($sewa["tgl_sewa"])?></h5>  
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-9 col-md-10">
                                    <small class="text-info">List penyewaan</small>
                                        <ul>
                                        <?php
                                        $id_sewa = $sewa["id_sewa"];
                                        $sql = "select * from detail_sewa 
                                        inner join mobil
                                        on detail_sewa.id_mobil = mobil.id_mobil
                                        where id_sewa = '$id_sewa'";

                                        //eksekusi
                                        $hasil_mobil = mysqli_query($connect, $sql);
                            
                                        //dijadikan array
                                        while ($mobil = mysqli_fetch_array($hasil_mobil)) {
                                        ?>
                                        <li>
                                            <h6>
                                                <?=($mobil["merk_mobil"])?>
                                                <i class="text-secondary">
                                                    <small>(Dibuat tahun <?=($mobil["tahun_pembuatan"])?>)</small>
                                                </i>
                                            </h6>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                        </ul>
                                </div>

                                <div class="col-lg-3 col-md-2">
                                    <small class="text-info">Status <br>
                                    <?php if ($sewa["id_pengembalian"] ==  null){?>
                                        <div class="badge badge-warning">
                                            Masih Disewa
                                        </div>
                                        <a href="proses-kembali.php?id_sewa=<?=($sewa["id_sewa"])?>" 
                                        onclick="return confirm('Apakah anda yakin ingin mengembalikan mobil?')">
                                            <button class="btn btn-sm btn-success mx-2">
                                                Kembalikan
                                            </button>
                                        </a>
                                    <?php } else {?>
                                        <div class="badge badge-info">
                                            Sudah dikembalikan
                                        </div>
                                        <div class="badge badge-danger">
                                            Denda : Rp <?=(number_format($sewa["denda"],2))?>
                                        </div>
                                    <?php } ?>
                                    </small>
                                </div>
                            </div>

                            
                        </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>