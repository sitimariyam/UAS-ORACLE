<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_pegawai'];
  $nama = $_POST['nama_pegawai'];
  $tlpn= $_POST['tlpn_pegawai'];
  $alamat = $_POST['alamat_pegawai'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  pegawai  SET NAMA_PEGAWAI ='".$nama."', TLPN_PEGAWAI ='".$tlpn."', ALAMAT_PEGAWAI ='".$alamat."' WHERE  ID_PEGAWAI= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data pegawai berhasil diubah'); window.location.href='pegawai.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data pegawai gagal diubah'); window.location.href='pegawi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pegawai.php'); 
}