<?php 

session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    echo "<script>
        alert('You are not login yet, please login first !');
        document.location.href = '../../login.php';
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

    <title>Add New Anggota | Koperasi</title>
</head>

<body>


    <div class="container">
        <div class="container pt-5">

            <div class="card border-success">
                <form action="add.php" method="post">
                    <div class="card-header text-center border-success bg-success text-white">
                        <h1>Create New</h1>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            <div class="form-group row">
                                <label for="noanggota" class="col-sm-3">Nomor Anggota</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noanggota" name="noanggota"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="noiden" class="col-sm-3">Nomor Identitas</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noiden" name="noiden">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaanggota" class="col-sm-3">Nama Anggota</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="namaanggota" name="namaanggota">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jkel" class="col-sm-3">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="jkel" id="laki" value="LK">
                                      <label class="form-check-label" for="laki">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="jkel" id="pr" value="PR">
                                      <label class="form-check-label" for="pr">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tmplahir" class="col-sm-3">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tmplahir" name="tmplahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgllahir" class="col-sm-3">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="tgllahir" name="tgllahir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nohp" class="col-sm-3">No Handphone</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="nohp" name="nohp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass" class="col-sm-3">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="pass" name="pass">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-right border-success px-5">
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