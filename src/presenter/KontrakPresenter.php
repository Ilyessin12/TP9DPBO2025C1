<?php

include(__DIR__. "/../model/Template.class.php");
include(__DIR__. "/../model/DB.class.php");
include(__DIR__. "/../model/Mahasiswa.class.php");
include(__DIR__. "/../model/TabelMahasiswa.class.php");

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenter
{
	public function prosesDataMahasiswa();
	public function getId($i);
	public function getNim($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
	public function add($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function update($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function delete($id);
	public function getDataById($id);
}