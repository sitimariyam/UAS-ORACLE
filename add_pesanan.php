<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_pesanan'];
  $nama = $_POST['nama_menu_pesanan'];
  $qty = $_POST['qty'];
  $hrg = $_POST['harga'];
  $ttl = $_POST['total'];


	$query = "INSERT INTO PESANAN (ID_PESANAN,NAMA_MENU_PESANAN,QTY,HARGA,TOTAL) VALUES ('".$id."','".$nama."','".$qty."','".$hrg."','".$ttl."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Pesanan berhasil ditambahkan'); 
	window.location.href='pesanan.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Pesanan gagal ditambahkan');
	window.location.href='pesanan.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: pesanan.php'); 
}