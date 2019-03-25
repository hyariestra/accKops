<?php 

/**
* 
*/
class Profil extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("M_keranjang");
		$this->load->model("M_pelanggan");
		$this->load->model("M_profil");
	}
	function tampil()
	{
		$id=$this->session->userdata("pelanggan")['id_pelanggan'];
		$data['pelanggan']=$this->M_profil->ambil_pelanggan($id);
		$data['keranjang']=$this->M_keranjang->tampil_keranjang();
		$this->load->view("profil",$data);
		if ($this->input->post("ubah"))
		 {
			$this->M_profil->ubah_profil($this->input->post(),$id);
			redirect("profil/tampil");
		}
	}
	function hapus($id)
	{
		//hapus id_produk tertentu dari session keranjang

		unset($_SESSION['keranjang'][$id]);

		$isipesan="<br><div class='alert alert-danger'>Produk telah dihapus dari kenjang belanja</div>";
		$this->session->set_flashdata("pesan",$isipesan);
		redirect("profil/tampil");
	}
}


 ?>