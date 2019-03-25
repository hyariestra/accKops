<?php 

/**
* 
*/
class Pelanggan extends CI_Controller
{
	function __construct()
	{
	//menggabungkan class kita dengan class utama CI
		parent::__construct();
		$this->load->model("M_produk");
		$this->load->model("M_kategori");
		$this->load->model("M_halamanstatis");

	}
	function login()
	{
		//0. mengambil inoutan dari formulir
		$inputan=$this->input->post();
		//1. memamnggil model M_pelanggan
		$this->load->model("M_pelanggan");
		//2. menjalankan fungsi login_pelanggan (inputan dari formulir)
		$hasil=$this->M_pelanggan->login_pelanggan($inputan);
		//3. jika hasil dama degn sukses, maka terlgin dan masuk ke checkout
		if ($hasil=="sukses")
		{
			$isipesan="<br><div class='alert alert-info'>Login sukses</div>";
			$this->session->set_flashdata("pesan",$isipesan);
			redirect("");
		}
		//4. selain itu (hasil tdkk sama dgn sukses), maka gagal login
		else
		{
			$isipesan="<br><div class='alert alert-danger'>login gagal, cek kembali username dan password kamu</div>";
			$this->session->set_flashdata("pesan",$isipesan);
			redirect("");
		}
	}
	function riwayat()
	{
		//menampilkan riwayat belanja pelanggan yang login
	//1, memanggil model M_pembelian
		$this->load->model("M_pembelian");
	//1.1 mengambil id_peanggan org yg login dari session
		$idp=$this->session->userdata("pelanggan")['id_pelanggan'];
	//2. menjalankan fungsi tampil_pembelian_pelanggan(id pelanggan yg login)
		$data['riwayat']=$this->M_pembelian->tampil_pembelian_pelanggan($idp);
		$data['judul']="Riwayat Belanja";
		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();
	//3. menaruh di view riwayat.php
		$this->load->view("riwayat",$data);

	}

	function riwayat2()
		{
			$idx 	= $this->input->post('idx');
		$data['rw'] 	= $this->db->query("SELECT * FROM pembelian WHERE id_pembelian = ".$idx." ")->row_array();

			echo json_encode($data);
		}

	function daftar()
	{
		$this->load->model("M_pelanggan");
		//menaruh di view daftar pelanggan
		$data['judul']="Daftar Pelanggan";
		$data['halamanstatis']=$this->M_halamanstatis->tampil_halamanstatis();
		$this->load->view("pelanggandaftar",$data);
		//daftar
		$inputan=$this->input->post();
		if ($inputan) 
		{
			$hasil=$this->M_pelanggan->simpan_pelanggan($inputan);
			
			if ($hasil=="sukses")
			 {
			$isipesan="<br><div class='alert alert-info'>Pendaftaran sukses, gunakan akun untuk login</div>";
			}
			else
			{
				$isipesan="<br><div class='alert alert-danger'>Pendaftaran gagal, Email sudah Pernah digunakan</div>";
			}

			$this->session->set_flashdata("pesan",$isipesan);
			redirect("Pelanggan/daftar");
		}
	}
	function logout()
	{
		//hancurkan session
		$this->session->unset_userdata("pelanggan");
		redirect("");
	}

}


?>