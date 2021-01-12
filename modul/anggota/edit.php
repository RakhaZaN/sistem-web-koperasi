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

$query = "update anggota set namaanggota='$nama', jk='$jkel', tempat_lahir='$tmp', tgl_lahir='$tgl', alamat='$alamat', noidentitas='$iden', hp='$hp', pwd='$pass' where noanggota='$noa'";
$insert = mysqli_query($conn, $query);

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
