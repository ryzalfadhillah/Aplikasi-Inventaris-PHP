<!DOCTYPE html>
<html lang="en">
<?php
session_start();

include 'koneksi.php';

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

    <title>Tambah Inventaris</title>
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
                    Tambah Data Inventaris
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Kode Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kode-barang" placeholder="Kode Barang">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama-barang" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="satuan" placeholder="Satuan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Datang</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="tanggal-datang" placeholder="Tanggal Datang">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-4">
                                <select name="kategori" class="form-control">
                                    <option value="Alat Tulis Kantor">Alat Tulis Kantor</option>
                                    <option value="Bangunan">Bangunan</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Kendaraan">Kendaraan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="Baik">
                                    <label class="form-check-label" for="status">Baik</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="Perawatan">
                                    <label class="form-check-label" for="status">Perawatan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="Rusak">
                                    <label class="form-check-label" for="status">Rusak</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Harga Satuan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="harga-satuan" placeholder="Harga Satuan">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-logout" name="tambah" style="color: white;">Tambah</button>
                            <button type="reset" class="btn btn-logout" name="reset"><a href="daftar_inventaris.php" style="color: white;">Batal</a></button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['tambah'])) {
                        $kode_barang = $_POST['kode-barang'];
                        $nama_barang = $_POST['nama-barang'];
                        $jumlah = $_POST['jumlah'];
                        $satuan = $_POST['satuan'];
                        $tanggal_datang = $_POST['tanggal-datang'];
                        $kategori = $_POST['kategori'];
                        $status = $_POST['status'];
                        $harga_satuan = $_POST['harga-satuan'];

                        $insert = mysqli_query($conn, "INSERT INTO inventaris VALUES ('$kode_barang', '$nama_barang', '$jumlah', '$satuan', '$tanggal_datang', '$kategori', '$status', '$harga_satuan')");

                        if ($insert) {
                            echo '<script>window.location="daftar_inventaris.php"</script>';
                        } else {
                            echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>


</body>

</html>