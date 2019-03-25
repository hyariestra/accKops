<?php 

/**
* 
*/
class Voucher extends CI_controller
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
		$this->load->model('M_voucher');
		$data['voucher']=$this->M_voucher->tampil_voucher();

		$data['judul']="Daftar Kode Voucher";
		$this->themeadmin->tampilkan('admin/tampilvoucher',$data);
	}

	function tambah()
	{
		$this->load->model('M_voucher');
		$datainputan = $this->input->post();

		if ($datainputan) 
		{
			$this->M_voucher->simpan_voucher($datainputan);
			redirect('admin/voucher/tampil');
		}
			$data['judul']="Tambah Kode voucher";
			$this->themeadmin->tampilkan("admin/tambahvoucher",$data);
	}
	function hapus($id)
	{
		$this->load->model('M_voucher');
		$this->M_voucher->hapus_voucher($id);
		redirect('admin/voucher/tampil');
	}
	function ubah($id)
	{
		$this->load->model('M_voucher');
		$inputan=$this->input->post();
		if ($inputan)
		 {
			$this->M_voucher->ubah_voucher($inputan,$id);
			redirect('admin/voucher/tampil/');
		}
		$data['judul']="Ubah Kode Voucher";
		$data['voucher']=$this->M_voucher->ambil_voucher($id);

		$this->themeadmin->tampilkan("admin/ubahvoucher",$data);

	}
}


 ?>