<?php
session_start();

require '../../connection.php';

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

$total = 0;
$jumlah = 0;

$id = $_GET['id'];

$rakha1 = "SELECT ph.*, a.namaanggota, a.jk, a.noidentitas, a.tempat_lahir, a.tgl_lahir, a.alamat
            FROM pinjaman_header ph, anggota a
            where ph.noanggota=a.noanggota order by ph.id_pinjam desc";
$query = mysqli_query($conn, $rakha1);
$dataA = mysqli_fetch_assoc($query);
// var_dump($dataA);

$rakha2 = "SELECT * FROM pinjaman_detail where id_pinjam = '$id' ORDER BY id_pinjam, cicilan";
$query = mysqli_query($conn, $rakha2);


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Detail Pinjaman | Koperasi</title>
</head>

<body>

    <!-- Header -->
    <div class="header py-5 bg-info">
        <div class="container">
            <div class="row">
                <h1 class="display-3 text-white col-sm-12 col-md-6">Koperasi</h1>
                <div class="col-sm-12 col-md-6 d-flex align-items-end justify-content-end text-light">
                    <a href="view.php" class="btn btn-secondary mr-2">Back</a>
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
            <div class="path text-right mb-3">
                Main Menu | Transaksi | Pinjaman |
                <span class="badge badge-secondary">Detail</span> |
            </div>

            <!-- Body -->
            <div class="row mb-5">

                <div class="col">
                    <!-- card data pinjaman -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Pinjaman</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">Nomor Pinjaman</div>
                                <div class="col">: <?= $dataA['id_pinjam'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Nomor Anggota</div>
                                <div class="col">: <?= $dataA['noanggota'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Tanggal Pinjaman</div>
                                <div class="col">: <?= $dataA['tgl'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Lama Pinjaman</div>
                                <div class="col">: <?= $dataA['lama'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Bunga</div>
                                <div class="col">: <?= $dataA['bunga'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Jumlah</div>
                                <div class="col">: <?= $dataA['jumlah'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <!-- card data anggota -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Anggota</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">Nomor KTP</div>
                                <div class="col">: <?= $dataA['noidentitas'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Nama Anggota</div>
                                <div class="col">: <?= $dataA['namaanggota'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Jenis Kelamin</div>
                                <div class="col">: <?= $dataA['jk'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Tempat, Tanggal Lahir</div>
                                <div class="col">: <?= $dataA['tempat_lahir'], $dataA['tgl_lahir'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col">Alamat</div>
                                <div class="col">: <?= $dataA['alamat'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h3 class="card-title col-sm-9">Detail Pinjaman</h3>
                        <!-- <div class="col-sm-3 text-right">
                            <a href="ui_add.php" class="btn btn-success btn-sm">Add New</a>
                        </div> -->
                    </div>


                    <!-- table -->
                    <div class="table-responsive">
                        
                        <table class="table">
                            <thead class="thead-dark">
                                <th scope="col">Tanggal Bayar</th>
                                <th scope="col">Cicilan Ke-</th>
                                <th scope="col">Angsuran</th>
                                <th scope="col">Bunga</th>
                                <th scope="col">Total</th>
                                <th scope="col">Jumlah Bayar</th>
                                <th scope="col" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_assoc($query)) :
                                $ttl = $row['angsuran'] + $row['bunga']; ?>
                                <tr>
                                    <td><?= $row['tgl_bayar'] ?></td>
                                    <td><?= $row['cicilan'] ?></td>
                                    <td><?= number_format($row['angsuran']) ?></td>
                                    <td><?= number_format($row['bunga']) ?></td>
                                    <td><?= number_format($ttl) ?></td>
                                    <td><?= $row['jumlah_bayar'] ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-warning btn-sm" href="bayar_pinjaman.php?id=<?= $row['id_pinjam'] ?>&cicilan=<?= $row['cicilan'] ?>">Bayar</a>
                                    </td>
                                </tr>
                                <?php 
                                $total += $ttl;
                                endwhile; 
                                ?>
                            </tbody>
                            <tfoot>
                                <td colspan="4">Total</td>
                                <th><?= number_format($total) ?></th>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>

            <!-- End Body -->

    </div>

    <!-- Footer -->
    <div class="footer bg-transparent text-muted text-center font-weight-light py-5">
        Rakha Zahran Nurfirmansyah | XII RPL 1 | 2020
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>