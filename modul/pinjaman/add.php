<?php 

session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('location:../../login.php');
    }

require '../../connection.php';

$rakha1 = $_POST['rakha1'];
$rakha2 = $_POST['rakha2'];
$rakha3 = $_POST['rakha3'];
$rakha4 = $_POST['rakha4'];
$rakha5 = $_POST['rakha5'];
$rakha6 = $_POST['rakha6'];
$rakha7 = $_SESSION['username'];

$query = "insert into pinjaman_header (id_pinjam, tgl, noanggota, jumlah, lama, bunga, user_id) 
        values ('$rakha1', '$rakha2', '$rakha3', '$rakha6', '$rakha4', '$rakha5', '$rakha7')";
$insert = mysqli_query($conn, $query);
$err = mysqli_error($conn);

if (mysqli_affected_rows($conn) > 0) {
	for ($i=1; $i <= $rakha4; $i++) { 
        $angsuran = $rakha6 / $rakha4;
        $bunga = round(($angsuran * $rakha5) / 100);
        $angsuran = round($angsuran);

        $query = "insert into pinjaman_detail (id_pinjam, cicilan, angsuran, bunga) 
                values ('$rakha1', '$i', '$angsuran', '$bunga')";
        $insert = mysqli_query($conn, $query);
        $err = mysqli_error($conn);

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                    alert('Pinjaman Added Successfully');
                    document.location.href = 'view.php';
                    </script>";
        } else {
            echo "<script>
                    alert('Something Error, Recheck Input Value');
                    document.location.href = 'ui_add.php';
                    </script>";
        }
    }
} else {
	echo "<script>
            alert('Something Error, Recheck Input Value');
            document.location.href = 'ui_add.php';
            </script>";
}
