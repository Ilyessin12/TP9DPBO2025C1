<?php

include(__DIR__. "/view/TampilMahasiswa.php");

$tp = new TampilMahasiswa();
$prosesmahasiswa = new ProsesMahasiswa();

// CRUD Operations
if(isset($_POST['add'])){
	// Proses tambah data
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tl = $_POST['tl'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	
	$prosesmahasiswa->add($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	header("location:index.php");
}
else if(isset($_POST['update'])){
	// Proses update data
	$id = $_POST['id'];
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tl = $_POST['tl'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$telp = $_POST['telp'];
	
	$prosesmahasiswa->update($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	header("location:index.php");
}
else if(isset($_POST['delete'])){
	// Proses delete data
	$id = $_POST['id'];
	
	$prosesmahasiswa->delete($id);
	header("location:index.php");
}

// Tampilkan data
$data = $tp->tampil();
