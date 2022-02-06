<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_pegawai'];
  $nama = $_POST['nama_pegawai'];
  $tlpn= $_POST['tlpn_pegawai'];
  $alamat = $_POST['alamat_pegawai'];


	$query = "INSERT INTO PEGAWAI (ID_PEGAWAI,NAMA_PEGAWAI,TLPN_PEGAWAI,ALAMAT_PEGAWAI) VALUES ('".$id."','".$nama."','".$tlpn."','".$alamat."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data pegawai berhasil ditambahkan'); 
	window.location.href='pegawai.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data pegawai gagal ditambahkan');
	window.location.href='pegawai.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pegawai.php'); 
}