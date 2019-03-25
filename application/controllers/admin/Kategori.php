<?php 



class Kategori extends CI_controller

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

		$this->load->model("M_kategori");

		$data['kategori']=$this->M_kategori->tampil_kategori();



		$data['judul']="Daftar Kategori";

		$this->themeadmin->tampilkan('admin/tampilkategori',$data);

	}



	function tambah()

	{

		$this->load->model("M_kategori");

		$datainputan=$this->input->post();



		if ($datainputan) 

		{

			$this->M_kategori->simpan_kategori($datainputan);

			redirect('admin/kategori/tampil');

		}

		$data['judul']="Tambah kategori";

		$this->themeadmin->tampilkan("admin/tambahkategori",$data);



	}

	function hapus($id)

	{

		$this->load->model('M_kategori');

		$this->M_kategori->hapus_kategori($id);

		redirect('admin/kategori/tampil');

	}

	function ubah($id)

	{

		$this->load->model('M_kategori');

		

		$inputan=$this->input->post();

		if ($inputan) 

		{

			$this->M_kategori->ubah_kategori($inputan,$id);

			redirect("admin/kategori/tampil");

		}

			$data['judul']="Ubah kategori";

			$data['kategori']=$this->M_kategori->ambil_kategori($id);



			$this->themeadmin->tampilkan("admin/ubahkategori",$data);



	}

	function detail($id)

	{

		//1. abmil data yang mau di detailkan 

		$this->load->model('M_kategori');

		$data['judul']="Detail kategori";

		$data['kategori']=$this->M_kategori->ambil_kategori($id);

		//2. taruh di interface

		$this->themeadmin->tampilkan("admin/detailkategori",$data);





	}

}











?>