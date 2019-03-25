<?php 

/**
* 
*/
class Halaman extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_keranjang");
		$this->load->model("M_halamanstatis");
			
	}
	function detail($id)
	{
		$data['detail']=$this->M_halamanstatis->ambil_halamanstatis($id);
		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();
		$data['judul']="Detail Halaman";
		$this->load->view("detailhalaman",$data);
	}
}

 ?>