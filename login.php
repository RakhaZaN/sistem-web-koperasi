<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login | Koperasi</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-info">
      <span class="navbar-brand mb-0 h1">Sistem Koperasi Sederhana</span>
    </nav>

    <!-- Login card -->
    <div class="container">
        <div class="col-md-4 offset-4 pt-5">

            <div class="card mt-5">
                <form action="loginproses.php" method="post">
                    <div class="card-header">
                        <h3 class="card-title">Sign In</h3>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            <div class="form-group row">
                                <label for="username" class="">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="">Password</label>
                                <input type="password" class="form-control" id="inputPassword3" name="password">
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-right px-5">
                        <button type="submit" class="btn btn-info">Login</button>
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