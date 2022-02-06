<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['id_menu'];
  $nama = $_POST['nama_menu'];
  $hrg = $_POST['harga_menu'];


	$query = "INSERT INTO MENU (ID_MENU,NAMA_MENU,HARGA_MENU) VALUES ('".$id."','".$nama."','".$hrg."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data tersimpan
    echo "<script>alert('Data Menu berhasil ditambahkan'); 
	window.location.href='menu.php'</script>";
  } else {
    // pesan jika data gagal disimpan
    echo "<script>alert('Data Menu gagal ditambahkan');
	window.location.href='menu.php'</script>";
  }
} else {
  //jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: menu.php'); 
}