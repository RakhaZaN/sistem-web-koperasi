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

    <title>Add New User | Koperasi</title>
</head>

<body>


    <div class="container">
        <div class="container pt-5">

            <div class="card border-success mt-5">
                <form action="add.php" method="post">
                    <div class="card-header text-center border-success bg-success text-white">
                        <h1>Create New</h1>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            <div class="form-group row">
                                <label for="userId" class="col-sm-2">User Id</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="userId" name="userId"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pass" class="col-sm-2">Password</label>
                                <div class="col-sm-10">
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