<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_pegawai'];
  $nama = $_POST['nama_pegawai'];
  $tlpn= $_POST['tlpn_pegawai'];
  $alamat = $_POST['alamat'];


	$query = "INSERT INTO BARANG_0019 (ID_PEGAWAI,NAMA_PEGAWAI,TLPN_PEGAWAI,ALAMAT) VALUES ('".$id."','".$nama."','".$tlpn."','".$alamat."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Barang berhasil ditambahkan'); 
	window.location.href='pegawai.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Barang gagal ditambahkan');
	window.location.href='pegawai.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pegawai.php'); 
}