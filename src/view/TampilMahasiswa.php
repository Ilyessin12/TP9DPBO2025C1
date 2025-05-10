<?php


include("KontrakView.php");
include(__DIR__. "/../presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
	private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesmahasiswa = new ProsesMahasiswa();
	}

	function tampil()
	{
		$this->prosesmahasiswa->prosesDataMahasiswa();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++){
			$no = $i + 1;
			$id = $this->prosesmahasiswa->getId($i);
			$nim = $this->prosesmahasiswa->getNim($i);
			$nama = $this->prosesmahasiswa->getNama($i);
			$tempat = $this->prosesmahasiswa->getTempat($i);
			$tl = $this->prosesmahasiswa->getTl($i);
			$gender = $this->prosesmahasiswa->getGender($i);
			$email = $this->prosesmahasiswa->getEmail($i);
			$telp = $this->prosesmahasiswa->getTelp($i);
			
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $nim . "</td>
			<td>" . $nama . "</td>
			<td>" . $tempat . "</td>
			<td>" . $tl . "</td>
			<td>" . $gender . "</td>
			<td>" . $email . "</td>
			<td>" . $telp . "</td>
			<td>
				<button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#formModal' data-action='edit'
					data-id='" . $id . "' 
					data-nim='" . $nim . "' 
					data-nama='" . $nama . "' 
					data-tempat='" . $tempat . "' 
					data-tl='" . $tl . "' 
					data-gender='" . $gender . "' 
					data-email='" . $email . "' 
					data-telp='" . $telp . "'
				>Edit</button>
				<button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal' data-id='" . $id . "'>Hapus</button>
			</td>
			</tr>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("DATA_ID", "value=''");
		$this->tpl->replace("DATA_NIM", "value=''");
		$this->tpl->replace("DATA_NAMA", "value=''");
		$this->tpl->replace("DATA_TEMPAT", "value=''");
		$this->tpl->replace("DATA_TL", "value=''");
		$this->tpl->replace("DATA_GENDER_L", "selected");
		$this->tpl->replace("DATA_GENDER_P", "");
		$this->tpl->replace("DATA_EMAIL", "value=''");
		$this->tpl->replace("DATA_TELP", "value=''");
		$this->tpl->replace("DATA_MODAL_TITLE", "Tambah Mahasiswa");
		$this->tpl->replace("DATA_SUBMIT_TYPE", "add");

		// Menampilkan ke layar
		$this->tpl->write();
	}
}
