<?php 

/**
* 
*/
class Pelanggan extends CI_controller
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
		// 1. mengambil data dari model pelanggan
		// a. memanggil model M_pelanggan
		$this->load->model("M_pelanggan");
		// b. menjalankan fungsi tampil_pelanggan() dari model M_pelanggan
		$data['pelanggan']=$this->M_pelanggan->tampil_pelanggan();

		// 2. Menaruh di view/interface tampil_pelanggan.php
		// a. membuat data judul
		$data['judul']="Daftar Pelanggan";
		// b. menaruh di view tampilpelanggan.php dengan library themeadmin
		$this->themeadmin->tampilkan('admin/tampilpelanggan',$data);
	}


	function tambah()
	{
		$this->load->model('M_pelanggan');
		//1. mengambil semua data dari formulir ke array krn formnya1, tapi datanya banyk
		$datainputan = $this->input->post();
		//jika ada data di inputkan, maka M_pelanggan menjalankan fungsi simpan_pelanggan(data dari formulir)
		if ($datainputan)
		{
			$this->M_pelanggan->simpan_pelanggan($datainputan);
			redirect("admin/pelanggan/tampil");	
		}

		$data['judul']= "Tambah Pelanggan";
		//menaruh interface tembahpelanggan melalui lib themeadmin
		$this->themeadmin->tampilkan("admin/tambahpelanggan",$data);
}

	function hapus($id)
	{
		//1. memanggil model M_Pelanggan
		$this->load->model('M_pelanggan');
		//2. M_pelanggan menjalankan fungsi hapus_pelanggan(berdasar id di URL)
		$this->M_pelanggan->hapus_pelanggan($id);
		//redirect ke tampil
		redirect("admin/pelanggan/tampil");	
	}

	function ubah($id)
	{
		$this->load->model('M_pelanggan');
		//3. mengubah datanya
			//a. mengambil inputan dari formulir
		$inputan=$this->input->post();
			//b. jika ada inputan,
		if ($inputan) 
		{
			//maka M_pelanggan menjalankan fungsi ubah pelanggan(data inputan dan id di URL)
			$this->M_pelanggan->ubah_pelanggan($inputan,$id);
			redirect("admin/pelanggan/tampil");
		}
		//1. mengambil data yang mau dirubah 
			//a. m_pelanggan menjalankan fungsi ambil_pelanggan($id);
			$data['judul']="ubah Pelanggan";
			$data['pelanggan']=$this->M_pelanggan->ambil_pelanggan($id);

		//2. menampilkan data di halaman ubahpelanggan
			$this->themeadmin->tampilkan("admin/ubahpelanggan",$data);

	}
	
	function detail($id)
	{
		//1. abmil data yang mau di detailkan 
		$this->load->model('M_pelanggan');
		$data['judul']="Detail Pelanggan";
		$data['pelanggan']=$this->M_pelanggan->ambil_pelanggan($id);

		//data riwayat pembelian pelanggan
		$this->load->model("M_pembelian");
		$data['riwayat']=$this->M_pembelian->tampil_pembelian_pelanggan($id);

		//2. taruh di interface
		$this->themeadmin->tampilkan("admin/detailpelanggan",$data);



	}

}

?>