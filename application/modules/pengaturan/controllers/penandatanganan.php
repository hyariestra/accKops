<?php 



/**

* 

*/

class penandatanganan extends CI_Controller

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
		$data['judul'] = 'Setting Penandatanganan';

		$this->themeadmin->tampilkan('penandatanganan',$data);
	}




	function ubah($id)

	{

		$this->load->model('M_pengaturan');

		$inputan=$this->input->post();



		if ($inputan) 

		{

			$this->M_pengaturan->ubah_pengaturan($inputan,$id);

			redirect("pengaturan/tampil");

		}

		$data['judul']="ubah Pengaturan";

		$data['pengaturan']=$this->M_pengaturan->ambil_pengaturan($id);

		$this->themeadmin->tampilkan("ubahpengaturan",$data);



	}



}





 ?>

