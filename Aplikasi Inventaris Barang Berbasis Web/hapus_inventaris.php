<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include('koneksi.php');

if ($_SESSION['login'] != true)
    header("Location: login.php?");

$kode_barang = $_GET['kode'];
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Hapus Inventaris</title>
</head>

<body style="height: auto;">
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

    <div class="container">
        <div class="inventaris mt-5 mb-5" style="width: 90%;">
            <div class="card">
                <div class="card-header text-center bg-biru">
                    Hapus Data Inventaris
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <form action="#" method="post">
                                <div class="col-12 text-center">
                                    <h5>Yakin ingin menghapus?</h5>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-logout" name="hapus" style="color: white;">Hapus</button>
                                    <button type="reset" class="btn btn-logout" name="reset"><a href="daftar_inventaris.php" style="color: white;">Batal</a></button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['hapus'])) {

                                $hapus = mysqli_query($conn, "DELETE FROM inventaris WHERE kode_barang='$kode_barang'");

                                if ($hapus)
                                    header('location: daftar_inventaris.php');
                                else
                                    echo "Hapus data gagal";
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>