<?php 
/**
* 
*/
class Halamanstatis extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		//jika blm login, maka di redirect ke pengguna/login untk login
		//jk tdk ada session pengguna, maka dilarikan ke login\
		if (!$this->session->userdata("pengguna"))
		 {
			redirect("admin/pengguna/login");
		}
	}

	function tampil()
	{
		$this->load->model("M_halamanstatis");
		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();
		$data['judul']="Pengaturan Halaman";
		$this->themeadmin->tampilkan("admin/tampilhalamanstatis",$data);

	}
	function ubah($id)
	{
		$this->load->model("M_halamanstatis");
		$inputan=$this->input->post();

		if ($inputan)
		 {
		$this->M_halamanstatis->ubah_halamanstatis($inputan,$id);
		redirect("admin/halamanstatis/tampil");
		}
		$data['judul']="Ubah Halaman";
		$data['halamanstatis']=$this->M_halamanstatis->ambil_halamanstatis($id);
		$this->themeadmin->tampilkan("admin/ubahhalamanstatis",$data);

	}
	
	function tambah()
	{
		$this->load->model("M_halamanstatis");
		$datainputan=$this->input->post();

		if ($datainputan) 
		{
			$this->M_halamanstatis->simpan_halamanstatis($datainputan);
			redirect('admin/halamanstatis/tampil');
		}
		$data['judul']="Tambah Halaman";
		$this->themeadmin->tampilkan("admin/tambahhalamanstatis",$data);
	}


}


 ?>