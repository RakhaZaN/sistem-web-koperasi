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

$query = "delete from jenis_simpan where id_jenis = '$id'";
$delete = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
	echo "<script>
            alert('Deleted Successfully');
            document.location.href = 'view.php';
            </script>";
} else {
	echo "<script>
            alert('Deleted Failed');
            document.location.href = 'view.php';
            </script>";
}
