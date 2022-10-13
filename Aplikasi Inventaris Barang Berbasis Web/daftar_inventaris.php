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

    <title>Daftar Inventaris</title>
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
        <div class="inventaris mt-5 mb-5">
            <button type="button" class="btn btn-logout ms-4"><a href="tambah_inventaris.php" style="color: white;">+ Tambah</a></button>
            <div class="card">
                <table>
                    <thead class="text-center bg-biru">
                        <tr>
                            <th width="30px">No</th>
                            <th class="col-sm-auto">Kode</th>
                            <th class="col-sm-auto">Nama Barang</th>
                            <th class="col-sm-auto">Jumlah</th>
                            <th class="col-sm-auto">Satuan</th>
                            <th class="col-sm-auto">Tanggal Datang</th>
                            <th class="col-sm-auto">Kategori</th>
                            <th class="col-sm-auto">Status</th>
                            <th class="col-sm-auto">Harga Satuan</th>
                            <th class="col-sm-auto">Total Harga</th>
                            <th class="col-sm-auto">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        include('koneksi.php');
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM inventaris");
                        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                        ?>

                        <?php foreach ($result as $result) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $result['kode_barang']  ?></td>
                                <td><?php echo $result['nama_barang']  ?></td>
                                <td><?php echo $result['jumlah']  ?></td>
                                <td><?php echo $result['satuan']  ?></td>
                                <td><?php echo $result['tgl_datang']  ?></td>
                                <td><?php echo $result['kategori']  ?></td>
                                <td><?php echo $result['status_barang']  ?></td>
                                <td>Rp. <?php echo number_format($result['harga']); ?></td>
                                <td>
                                    Rp.
                                    <?php
                                    $total_harga = $result['harga'] * $result['jumlah'];
                                    echo number_format($total_harga);
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-logout "><a href="edit_inventaris.php?kode=<?php echo $result['kode_barang']  ?>" style="color: white;">Edit</a></button>
                                    <button type="button" class="btn btn-logout "><a href="hapus_inventaris.php?kode=<?php echo $result['kode_barang']  ?>" style="color: white;">Hapus</a></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>