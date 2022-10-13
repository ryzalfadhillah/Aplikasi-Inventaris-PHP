<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION['login'] != true)
    header("Location: login.php?");
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Home</title>
</head>

<body>

    <header>
        <div class="container">
            <center>
                <h1 style="font-weight:900;">DAFTAR INVENTARIS BARANG <br>KANTOR SERBA ADA</h1>
            </center>
        </div>
    </header>

    <div class="navbar">
        <div class="container-navbar">
            <div class="navbar-kiri">
                <a href="home.php">Beranda</a>
                <a href="daftar_inventaris.php">Daftar Inventaris</a>
                <a href="#">List per Kategori</a>
            </div>

            <div class="navbar-kanan">
                <button type="button" class="btn btn-logout"><a href="logout.php" style="color: white;">LOGOUT</a></button>
            </div>
        </div>
    </div>

    <div class="main-home">
        <div class="container">
            <h3><b>Selamat Datang</b>
                <br>
                <div class="container-nama">
                    <p><?php echo $_SESSION['data']->nama_lengkap ?></p>
                </div>
            </h3>
        </div>
    </div>

    <footer>
        <p class="container">
            Inventaris 2016
        </p>
    </footer>

</body>

</html>