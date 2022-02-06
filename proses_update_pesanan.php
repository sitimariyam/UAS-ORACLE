<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_pesanan'];
  $nama = $_POST['nama_menu_pesanan'];
  $qty = $_POST['qty'];
  $hrg = $_POST['harga'];
  $ttl = $_POST['total'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  pesanan  SET NAMA_MENU_PESANAN ='".$nama."', QTY ='".$qty."', HARGA ='".$hrg."', TOTAL ='".$ttl."' WHERE  ID_PESANAN = '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data pesanan berhasil diubah'); window.location.href='pesanan.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data pegawai gagal diubah'); window.location.href='pesanan.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pesanan.php'); 
}