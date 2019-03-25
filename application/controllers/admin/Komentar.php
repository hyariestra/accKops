<?php 

/**
* 
*/
class Komentar extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata("pengguna")) 
		{
		redirect("admin/pengguna/login");
		}
		$this->load->model("M_komentar");

	}

	function tampil()
	{
		$data['komentar']=$this->M_komentar->tampil_komentar();
		$this->themeadmin->tampilkan("admin/tampilkomentar",$data);
	}

	function publikasi($id)
	{
		$this->M_komentar->publikasi_komentar($id);
		redirect("admin/komentar/tampil");
	}

	function hapus($id)
	{
		$this->M_komentar->hapus_komentar($id);
		redirect("admin/komentar/tampil");
	}
	function balas($id)
	{
		$data['judul']="Balas Komentar";
		$data['komentar']=$this->M_komentar->ambil_komentar($id);
		$this->themeadmin->tampilkan("admin/balaskomentar",$data);

		$inputan=$this->input->post("balas_komentar");
		if ($inputan) 
		{
			$this->M_komentar->simpan_balasan($inputan,$id);
			redirect("admin/komentar/tampil");
		}

	}


}

 ?>