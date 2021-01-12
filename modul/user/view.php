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

$rakha1 = "select * from users";
$rakha2 = mysqli_query($conn,$rakha1);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Users | Koperasi</title>
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
                Main Menu | Master |
                <span class="badge badge-secondary">Users</span> |
            </div>

            <!-- Body -->

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h3 class="card-title col-sm-9">Data User</h3>
                        <div class="col-sm-3 text-right">
                            <a href="ui_add.php" class="btn btn-success btn-sm">Add New</a>
                        </div>
                    </div>

                    <!-- table -->
                    <div class="table-responsive-sm">
                        
                        <table class="table">
                            <thead class="thead-dark">
                                <th>User Id</th>
                                <th>Password</th>
                                <th class="text-center" width="150px">Action</th>
                            </thead>
                            <tfoot class="thead-dark">
                                <th>User Id</th>
                                <th>Password</th>
                                <th class="text-center">Action</th>
                            </tfoot>
                            <tbody>
                                <?php while ($rakha3 = mysqli_fetch_assoc($rakha2)) : ?>
                                  <tr>
                                    <td><?= $rakha3['user_id'] ?></td>
                                    <td><?= $rakha3['password'] ?></td>
                                    <td class="text-center">
                                      <a href="ui_edit.php?id=<?= $rakha3['user_id'] ?>" class="btn btn-outline-info btn-sm">Edit</a> |
                                      <a href="delete.php?id=<?= $rakha3['user_id'] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                  </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- End Body -->

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