<?php 

/**
* 
*/
class Keranjang extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_keranjang");
		$this->load->model("M_halamanstatis");
			
	}
	function tampil()
	{
		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();
		$data['keranjang']=$this->M_keranjang->tampil_keranjang();
		$data['judul']="Keranjang Belanja";
		$this->load->view("keranjang",$data);
	}
	function hapus($id)
	{
		//hapus id_produk tertentu dari session keranjang

		unset($_SESSION['keranjang'][$id]);

		$isipesan="<br><div class='alert alert-danger'>Produk telah dihapus dari kenjang belanja</div>";
		$this->session->set_flashdata("pesan",$isipesan);
		redirect("keranjang/tampil");
	}
}

 ?>