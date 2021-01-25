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

$rakha1 = "select ph.*, a.namaanggota, a.jk from pinjaman_header ph, anggota a where ph.noanggota = a.noanggota order by ph.id_pinjam DESC";
$rakha2 = mysqli_query($conn,$rakha1);

function jmlBayar($id)
{
    require '../../connection.php';
    $hasil = 0;

    $get = "select sum(angsuran + bunga) as total from pinjaman_detail where id_pinjam = '$id'";
    $dt = mysqli_fetch_assoc(mysqli_query($conn, $get));
    $row = mysqli_num_rows(mysqli_query($conn, $get));

    if ($row > 0) {
        $hasil = $dt['total'];
    }

    return $hasil;
}

function sisa($id)
{
    require '../../connection.php';
    $hasil = 0;

    $get = "select jumlah_bayar as total from pinjaman_detail where id_pinjam = '$id'";
    $dt = mysqli_fetch_assoc(mysqli_query($conn, $get));
    $row = mysqli_num_rows(mysqli_query($conn, $get));

    if ($row > 0) {
        $hasil = $dt['total'];
    }

    return $hasil;
}

$total = 0;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Pinjaman | Koperasi</title>
</head>

<body>

    <!-- Header -->
    <div class="header py-5 bg-info">
        <div class="container">
            <div class="row">
                <h1 class="display-3 text-white col-sm-12 col-md-6">Koperasi</h1>
                <div class="col-sm-12 col-md-6 d-flex align-items-end justify-content-end text-light">
                    <a href="../../" class="btn btn-secondary mr-2">Back To Main Menu</a>
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
                Main Menu | Transaksi |
                <span class="badge badge-secondary">Pinjaman</span> |
            </div>

            <!-- Body -->

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h3 class="card-title col-sm-9">Data Pinjaman</h3>
                        <div class="col-sm-3 text-right">
                            <a href="ui_add.php" class="btn btn-success btn-sm">Add New</a>
                        </div>
                    </div>

                    <!-- table -->
                    <div class="table-responsive">
                        
                        <table class="table">
                            <thead class="thead-dark">
                                <th>No. Pinjaman</th>
                                <th>Tanggal</th>
                                <th>No. Anggota</th>
                                <th>Nama</th>
                                <th>Kelamin</th>
                                <th>Lama</th>
                                <th>Jumlah</th>
                                <th>Bunga</th>
                                <th>Jumlah Bayar</th>
                                <th>Jumlah Cicilan</th>
                                <th>Sisa</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <?php while ($rakha3 = mysqli_fetch_assoc($rakha2)) : 
                                    $jmlBayar = jmlBayar($rakha3['id_pinjam']);
                                    $jmlCicil = sisa($rakha3['id_pinjam']);
                                    $sisa = $jmlBayar - $jmlCicil;
                                    $total = $total + $rakha3['jumlah'];
                                    ?>
                                  <tr>
                                    <td><?= $rakha3['id_pinjam'] ?></td>
                                    <td><?= $rakha3['tgl'] ?></td>
                                    <td><?= $rakha3['noanggota'] ?></td>
                                    <td><?= $rakha3['namaanggota'] ?></td>
                                    <td><?= $rakha3['jk'] ?></td>
                                    <td><?= $rakha3['lama'] ?></td>
                                    <td><?= $rakha3['jumlah'] ?></td>
                                    <td><?= $rakha3['bunga'] ?></td>
                                    <td><?= $jmlBayar ?></td>
                                    <td><?= $jmlCicil ?></td>
                                    <td><?= $sisa ?></td>
                                    <td class="text-center">
                                      <a href="delete.php?id=<?= $rakha3['id_pinjam'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                  </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <td colspan="6"><b>Total Jumlah<b></td>
                                <td> <b><?= $total ?> <b></td>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>

            <!-- End Body -->

    </div>

    <!-- Footer -->
    <div class="footer bg-transparent text-muted text-center font-weight-light">
        Rakha Zahran Nurfirmansyah | XII RPL 1 | 2020
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>