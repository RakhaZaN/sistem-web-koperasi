<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    echo "<script>
        alert('You are not login yet, please login first !');
        document.location.href = 'login.php';
        </script>";
}

if (isset($_POST['logoutbtn'])) {
    $_SESSION['login'] = false;
    echo "<script>
        alert('You are logout !');
        document.location.href = 'login.php';
        </script>";
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Dashboard | Koperasi</title>
</head>

<body>

    <!-- Header -->
    <div class="header py-5 bg-info">
        <div class="container">
            <div class="row">
                <h1 class="display-3 text-white col-sm-12 col-md-6">Koperasi</h1>
                <div class="col-sm-12 col-md-6 d-flex align-items-end justify-content-end text-light">
                    <form action="" method="post">
                        <button type="submit" class="btn btn-outline-dark" name="logoutbtn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- body -->
    <div class="body">
        <div class="container py-5 px-5">

            <!-- Page Path -->
            <div class="path text-right mb-5">
                <span class="badge badge-secondary">Main Menu</span> |
            </div>

            <div class="card-deck text-center">

                <div class="card border-dark">
                    <div class="card-header bg-warning">
                        Master
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="modul/jenissimpanan/view.php" class="list-group-item list-group-item-action">Jenis Pinjaman</a>
                            <a href="modul/anggota/view.php" class="list-group-item list-group-item-action">Anggota</a>
                            <a href="modul/user/view.php" class="list-group-item list-group-item-action">User</a>
                        </div>
                    </div>
                </div>

                <div class="card border-dark">
                    <div class="card-header bg-success text-light">
                        Transaksi
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="modul/pinjaman/view.php" class="list-group-item list-group-item-action">Pinjaman</a>
                            <a href="" class="list-group-item list-group-item-action">Bayar Pinjaman</a>
                            <a href="" class="list-group-item list-group-item-action">Simpanan</a>
                            <a href="" class="list-group-item list-group-item-action">Penarikan Simpanan</a>
                        </div>
                    </div>
                </div>

                <div class="card border-dark">
                    <div class="card-header bg-danger text-light">
                        Laporan
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <a href="" class="list-group-item list-group-item-action">Pinjaman</a>
                            <a href="" class="list-group-item list-group-item-action">Simpanan</a>
                            <a href="" class="list-group-item list-group-item-action">Anggota</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Footer -->
    <div class="footer bg-transparent text-muted text-center py-5 font-weight-light">
        Rakha Zahran Nurfirmansyah | XII RPL 1 | 2020
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>