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
		$data['judul'] = 'Halaman Pengaturan';

		$this->themeadmin->tampilkan('pengaturan',$data);
	}

	function tampil()

	{

		$this->load->model("M_pengaturan");

		$data['pengaturan']=$this->M_pengaturan->tampil_pengaturan();



		$data['judul']="daftar pengaturan";

		$this->themeadmin->tampilkan('tampilpengaturan',$data);

	}



	function tambah()

	{

		$this->load->model('M_pengaturan');

		$datainputan = $this->input->post();

	

		if ($datainputan)

		{

			$this->M_pengaturan->simpan_pengaturan($datainputan);

			redirect("pengaturan/tampil");	

		}

		$data['judul']="Tambah Pengaturan";

		$this->themeadmin->tampilkan("tambahpengaturan",$data);



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

