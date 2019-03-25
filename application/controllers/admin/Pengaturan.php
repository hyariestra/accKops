<?php 

/**
* 
*/
class Pengaturan extends CI_controller
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
		$this->load->model("M_pengaturan");
		$data['pengaturan']=$this->M_pengaturan->tampil_pengaturan();

		$data['judul']="daftar pengaturan";
		$this->themeadmin->tampilkan('admin/tampilpengaturan',$data);
	}

	function tambah()
	{
		$this->load->model('M_pengaturan');
		$datainputan = $this->input->post();
	
		if ($datainputan)
		{
			$this->M_pengaturan->simpan_pengaturan($datainputan);
			redirect("admin/pengaturan/tampil");	
		}
		$data['judul']="Tambah Pengaturan";
		$this->themeadmin->tampilkan("admin/tambahpengaturan",$data);

	}
	function hapus($id)
	{
		$this->load->model("M_pengaturan");
		$this->M_pengaturan->hapus_pengaturan($id);
		redirect('admin/pengaturan/tampil');
	}
	function ubah($id)
	{
		$this->load->model('M_pengaturan');
		$inputan=$this->input->post();

		if ($inputan) 
		{
			$this->M_pengaturan->ubah_pengaturan($inputan,$id);
			redirect("admin/pengaturan/tampil");
		}
		$data['judul']="ubah Pengaturan";
		$data['pengaturan']=$this->M_pengaturan->ambil_pengaturan($id);
		$this->themeadmin->tampilkan("admin/ubahpengaturan",$data);

	}

}


 ?>
