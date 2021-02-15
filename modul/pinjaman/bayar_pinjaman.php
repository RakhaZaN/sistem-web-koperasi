<?php

require '../../connection.php';

$id = $_GET['id'];
$cicilan = $_GET['cicilan'];

$query = mysqli_query($conn, "SELECT * FROM pinjaman_detail where id_pinjam='$id' and cicilan='$cicilan' order by id_pinjam, cicilan");
$data = mysqli_fetch_assoc($query);

$rakha1 = date("Y/m/d");
$rakha2 = $data['angsuran'] + $data['bunga'];

if (mysqli_num_rows($query) > 0) {
	$update = "UPDATE pinjaman_detail set tgl_bayar='$rakha1', jumlah_bayar='$rakha2' where id_pinjam='$id' and cicilan='$cicilan'";
	mysqli_query($conn, $update);
	header("location:detail.php?id=$id");
}