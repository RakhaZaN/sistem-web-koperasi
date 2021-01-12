<?php 

session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    echo "<script>
        alert('You are not login yet, please login first !');
        document.location.href = '../../login.php';
        </script>";
    }

require '../../connection.php';

$id = htmlspecialchars($_POST['idJenis']);
$jenis = htmlspecialchars($_POST['jenis']);
$jml = htmlspecialchars($_POST['jumlah']);

$query = "update jenis_simpan set jenis_simpanan = '$jenis', jumlah = '$jml' where id_jenis = '$id'";
$update = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
	echo "<script>
            alert('Updated Successfully');
            document.location.href = 'view.php';
            </script>";
} else {
	echo "<script>
            alert('Updated Failed');
            document.location.href = 'view.php';
            </script>";
}
