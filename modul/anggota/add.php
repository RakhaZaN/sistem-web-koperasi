<?php 

session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    echo "<script>
        alert('You are not login yet, please login first !');
        document.location.href = '../../login.php';
        </script>";
    }

require '../../connection.php';

$noa = htmlspecialchars($_POST['noanggota']);
$iden = htmlspecialchars($_POST['noiden']);
$nama = htmlspecialchars($_POST['namaanggota']);
$jkel = htmlspecialchars($_POST['jkel']);
$tmp = htmlspecialchars($_POST['tmplahir']);
$tgl = htmlspecialchars($_POST['tgllahir']);
$alamat = htmlspecialchars($_POST['alamat']);
$hp = htmlspecialchars($_POST['nohp']);
$pass = $_POST['pass'];

$query = "insert into anggota values ('$noa', '$nama', '$jkel', '$tmp', '$tgl', '$alamat', '$hp', '$iden', '$pass')";
$insert = mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
	echo "<script>
            alert('Added Successfully');
            document.location.href = 'view.php';
            </script>";
} else {
	echo "<script>
            alert('Added Failed');
            document.location.href = 'view.php';
            </script>";
}
