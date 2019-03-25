<?php 

/**
* 
*/
class Slider extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata("pengguna")) 
		{
			redirect("admin/pengguna/login");
		}

	}

	function tampil()
	{
		$this->load->model("M_slider");
		$data['slider']=$this->M_slider->tampil_slider();
		$data['judul']="Pengaturan Slider";
		$this->themeadmin->tampilkan('admin/tampilslider',$data);

	}
	function tambah()
	{
		$data['judul']="Tambah Slider";
		$this->load->model("M_slider");
		$data['slider']=$this->M_slider->tampil_slider();
		$inputan=$this->input->post();
		if ($inputan) {
			$this->M_slider->simpan_slider($inputan);
			redirect('admin/slider/tampil');
		}
		$this->themeadmin->tampilkan('admin/tambahslider',$data);

	}
	function hapus($id)
	{
		$this->load->model('M_slider');
		$this->M_slider->hapus_slider($id);
		redirect('admin/slider/tampil');
	}
	function ubah ($id)
	{
		$this->load->model('M_slider');

		$inputan=$this->input->post();
		if ($inputan) 
		{
			$this->M_slider->ubah_slider($inputan,$id);
			redirect('admin/slider/tampil');
		}
		$data['judul']="Ubah Slider";
		$data['slider']=$this->M_slider->ambil_slider($id);
		$this->themeadmin->tampilkan("admin/ubahslider",$data);
	}
}

 ?>