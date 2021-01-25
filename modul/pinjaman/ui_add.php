<?php 

session_start();

require '../../connection.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    echo "<script>
        alert('You are not login yet, please login first !');
        document.location.href = '../../login.php';
        </script>";
}

$query = "select noanggota, namaanggota from anggota";
$search = mysqli_query($conn, $query);

$getDate = date("Y-m-d");

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Add New Pinjaman | Koperasi</title>
</head>

<body>


    <div class="container">
        <div class="container pt-5">

            <div class="card border-dark mt-5">
                <form action="rakha.php" method="post">
                    <div class="card-header text-center">
                        <h1>Create New</h1>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            <div class="form-group row">
                                <label for="nopin" class="col-sm-2">Nomor Pinjaman</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="nopin" name="rakha1"> 
                                </div>
                                <label for="tgl" class="col-sm-2 text-right">Tanggal</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="tgl" name="rakha2" value="<?= $getDate ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="noa" class="col-sm-2">Anggota</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="noa" name="rakha3">
                                        <?php while ( $data = mysqli_fetch_assoc($search) ) : ?>
                                        <option value="<?= $data['noanggota'] ?>">
                                            <?= $data['noanggota'] ." | ". $data['namaanggota'] ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lapin" class="col-sm-2">Lama Pinjam</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="lapin" name="rakha4">
                                      <option value="6">6 bulan</option>
                                      <option value="12">12 bulan</option>
                                      <option value="24">24 bulan</option>
                                    </select>
                                </div>
                                <label for="bunga" class="col-sm-2 text-right">Bunga</label>
                                <div class="input-group col-sm-4">
                                    <select class="form-control" id="bunga" name="rakha5">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="input-group-text"> % </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah" class="col-sm-2">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="jumlah" name="rakha6">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-right px-5">
                        <a href="view.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>