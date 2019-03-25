<?php 

//buat controller produk

/**

* 

*/

class Produk extends CI_controller

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

			

		$data['judul']="Data Produk";

		//1. mengambil data ke model

			//a. memanggil model M_produk.php

		$this->load->model('M_produk');

			//b. memanggil fungsi tampil_produk() dari model M_produk.php dan disimpan di dataproduk

		$data['dataproduk']= $this->M_produk->tampil_produk();



		//2. menaruh di library themeadmin fungsi tampilkan dgn namafile tampilproduk.php

		$this->themeadmin->tampilkan('admin/tampilproduk',$data);

	}



	function tambah()

	{

		$this->load->model('M_kategori');

		$data['kategori']=$this->M_kategori->tampil_kategori();

		$this->load->model("M_produk");

		$datainputan=$this->input->post();



		if ($datainputan) 

		{

			$this->M_produk->simpan_produk($datainputan);

			redirect('admin/produk/tampil');

		}

		$data['judul']="Tambah produk";

		$this->themeadmin->tampilkan("admin/tambahproduk",$data);



	}	

	function hapus($id)

	{

	

		$this->load->model('M_produk');

		$this->M_produk->hapus_produk($id);

		redirect('admin/produk/tampil');

	}

	function ubah($id)

	{

		$this->load->model('M_kategori');

		$this->load->model('M_produk');



		$inputan=$this->input->post();

		if ($inputan)

		 {

			$this->M_produk->ubah_produk($inputan,$id);

			redirect('admin/produk/tampil');

		}

		$data['judul']="Ubah Produk";

		$data['produk']=$this->M_produk->ambil_produk($id);

		$data['kategori']=$this->M_kategori->tampil_kategori($id);

		$this->themeadmin->tampilkan("admin/ubahproduk",$data);

	}

}









 ?>