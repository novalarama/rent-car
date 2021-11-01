<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="anggota/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .log{
            float: right;
        }
        *{
            list-style-type: none;
            text-decoration : none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-danger navbar-dark sticky-top mb-2">
        <a href="../sewa/list-sewa.php" class="navbar-brand">PERPUS</a>

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="../mobil/list-mobil.php" class="nav-link log">
                    Mobil
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="../pelanggan/list-pelanggan.php" class="nav-link log">
                    Pelanggan
                </a>

            </li>

            <li class="nav-item dropdown">
                <a href="../karyawan/list-karyawan.php" class="nav-link log">
                    Karyawan
                </a>
            </li>
        </ul>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link log" href="../login/login.php">Log in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link log" href="../karyawan/form-karyawan.php">Sign up</a>
            </li>
            <li>
                <a href="../sewa/form-sewa.php">
                    <button class="btn btn-white btn-block ">sewa</button>
                </a>
            </li>
        </ul>

    </nav>

        </div>
    </div>
</body>
</html>