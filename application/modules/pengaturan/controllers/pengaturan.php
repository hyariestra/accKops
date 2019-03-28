<?php 



/**

* 

*/

class pengaturan extends CI_Controller

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
		$data['judul'] = 'Halaman Informasi Perusahaan';

		$this->load->model("M_pengaturan");

		$data['informasi']=$this->M_pengaturan->tampilInformasi();

		$this->themeadmin->tampilkan('informasiperusahaan',$data);
	}

	function tampil()

	{

		$this->load->model("M_pengaturan");

		$data['pengaturan']=$this->M_pengaturan->tampil_pengaturan();



		$data['judul']="daftar pengaturan";

		$this->themeadmin->tampilkan('tampilpengaturan',$data);

	}



	function tambahInformasi()

	{

		parse_str($this->input->post('data'), $data);

		$NamaPerusahaan     = $data['NamaPerusahaan'];
		$AlamatPerusahaan 	= $data['AlamatPerusahaan'];
		$KodePos 			= $data['KodePos'];
		$WebPerusahaan 	    = $data['WebPerusahaan'];
		$EmailPerusahaan    = $data['EmailPerusahaan'];
		$NoTelp 	 	 	= $data['NoTelp'];
		$NoFax  			= $data['NoFax'];

		$this->load->model('M_pengaturan');

		$json = $this->M_pengaturan->tambahInformasi($NamaPerusahaan, $AlamatPerusahaan, $KodePos, $WebPerusahaan, $EmailPerusahaan, $NoTelp, $NoFax);

		echo $json;


	}

	function hapus($id)

	{

		$this->load->model("M_pengaturan");

		$this->M_pengaturan->hapus_pengaturan($id);

		redirect('pengaturan/tampil');

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

