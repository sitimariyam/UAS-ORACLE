<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_pembeli'];
  $idpeg = $_POST['id_pegawai'];
  $nama = $_POST['nama_pembeli'];
  $tpem = $_POST['tlpn_pembeli'];


	$query = "INSERT INTO PEMBELI (ID_PEMBELI,ID_PEGAWAI,NAMA_PEMBELI,TLPN_PEMBELI) VALUES ('".$id."','".$idpeg."','".$nama."','".$tpem."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Pembeli berhasil ditambahkan'); 
	window.location.href='pembeli.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Pembeli gagal ditambahkan');
	window.location.href='pembeli.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pembeli.php'); 
}