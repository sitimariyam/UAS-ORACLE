<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_menu'];
  $nama = $_POST['nama_menu'];
  $hrg = $_POST['harga_menu'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  menu  SET NAMA_MENU ='".$nama."', HARGA_MENU ='".$hrg."' WHERE  ID_MENU= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data menu berhasil diubah'); window.location.href='menu.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data menu gagal diubah'); window.location.href='menu.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: menu.php'); 
}