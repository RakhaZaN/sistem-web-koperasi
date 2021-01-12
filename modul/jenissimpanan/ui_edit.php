<?php 

session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    echo "<script>
        alert('You are not login yet, please login first !');
        document.location.href = '../../login.php';
        </script>";
}

require '../../connection.php';

$id = $_GET['id'];
$query = "select * from jenis_simpan where id_jenis = '$id'";
$search = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($search);
if ($data == null) {
    echo "<script>
        alert('Data Not Found');
        document.location.href = 'view.php';
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

    <title>Change Data Jenis Simpanan | Koperasi</title>
</head>

<body>


    <div class="container">
        <div class="container pt-5">

            <div class="card border-success mt-5">
                <form action="edit.php" method="post">
                    <div class="card-header text-center border-success bg-success text-white">
                        <h1>Change Data</h1>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            <div class="form-group row">
                                <label for="idJenis" class="col-sm-2">Id Jenis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="idJenis" name="idJenis" value="<?= $data['id_jenis'] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-sm-2">Jenis Simpanan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $data['jenis_simpanan'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah" class="col-sm-2">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['jumlah'] ?>">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-right border-success bg-success px-5">
                        <a href="view.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-light">Save Change</button>
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