<?php
//Membangun koneksi
$username="mariam_311810791";
$password="311810791";
$database="LOCALHOST/XE";

$koneksi=oci_connect($username,$password,$database);

if(!$koneksi){
	$err=oci_error();
	echo "Gagal tersambung ke ORACLE". $err['text'];
} else {
	echo "Koneksi Berhasil";
}

?>