<?php
require_once 'koneksi.php';
// cek id
if (isset($_GET['id'])) {
  $ID = $_GET['id'];
	$sql = "delete from pesanan where ID_PESANAN='$ID' ";
	$parsesql = oci_parse($koneksi, $sql);
	$q = oci_execute($parsesql) or die(oci_error());
	
  // cek perintah
  if ($q) {
    // pesan apabila hapus berhasil
    echo "<script>alert('Data berhasil dihapus'); window.location.href='pesanan.php'</script>";
  } else {
    // pesan apabila hapus gagal
    echo "<script>alert('Data gagal dihapus'); window.location.href='pesanan.php'</script>";
  }
} else {
  // jika mencoba akses langsung ke file ini akan diredirect ke halaman index
  header('Location:pesanan.php');
}