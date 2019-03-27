<?php 



/**

* 

*/

class kodeakun extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

	
		if (!$this->session->userdata("pengguna"))

		 {

			redirect("pengguna/login");

		}

	}

	function index()
	{
		$data['judul'] = 'Kode Akun';

		$this->themeadmin->tampilkan('tampilKodeAkun',$data);
	}

	



	function tambah()

	{

		
	}

	function hapus($id)

	{

		

	}

	function ubah($id)

	{


		
	}



}





 ?>

