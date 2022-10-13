<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Masuk</title>
</head>

<body>
    <div class="container">
        <div class="card login-regis-form">
            <div class="card-body">
                <h2 class="card-title mt-5">Masuk</h2>

                <form class="mt-5" method="post" action="#">
                    <div class="mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password">
                    </div>

                    <div class="d-grid mt-5 mb-5">
                        <button type="submit" name="submit" class="btn btn-success btn-login">Login</button>
                    </div>

                </form>

                <?php
                if (isset($_POST['submit'])) {
                    session_start();
                    include 'koneksi.php';

                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $cek = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");

                    if (mysqli_num_rows($cek) > 0) {

                        $data = mysqli_fetch_object($cek);
                        $_SESSION['login'] = true;
                        $_SESSION['data'] = $data;
                        $_SESSION['username'] = $data->username;

                        header('location: home.php');
                    } else {
                        echo '<script>alert("Username atau Password anda salah!!!")</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>