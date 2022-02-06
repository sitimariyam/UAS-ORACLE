<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['id_pembeli'];
  $idpeg = $_POST['id_pegawai'];
  $nama = $_POST['nama_pembeli'];
  $tpem= $_POST['tlpn_pembeli'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "UPDATE  PEMBELI  SET ID_PEGAWAI ='".$idpeg."', NAMA_PEMBELI ='".$nama."', TLPN_PEMBELI ='".$tpem."' WHERE  ID_PEMBELI= '".$id."' ";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data pembeli berhasil diubah'); window.location.href='pembeli.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data pembeli gagal diubah'); window.location.href='pembeli.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pembeli.php'); 
}